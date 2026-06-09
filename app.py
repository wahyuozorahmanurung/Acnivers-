from fastapi import FastAPI, File, UploadFile
from fastapi.responses import JSONResponse
from ultralytics import YOLO
from fastapi.middleware.cors import CORSMiddleware
from fastapi.staticfiles import StaticFiles

import torch
import shutil
import uuid
import os

app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

app.mount("/uploads", StaticFiles(directory="uploads"), name="uploads")

model = YOLO("best.pt")

UPLOAD_DIR = "/tmp/uploads"
os.makedirs(UPLOAD_DIR, exist_ok=True)

def get_recommendations(labels):
    rules = {
        "Bekas Jerawat": [
            "Gunakan serum pencerah (niacinamide)",
            "Gunakan sunscreen setiap hari",
        ],
        "Blackhead": [
            "Gunakan eksfoliasi dengan asam salisilat",
            "Gunakan masker tanah liat mingguan",
        ],
        "Nodule": [
            "Pertimbangan pengobatan retinoid + konsultasi medis",
            "Konsultasikan ke dokter kulit",
            "HIndari memencet nodul",
        ],
        "Papules": [
            "Oleskan asam salisilat",
            "Gunakan toner antibakteri",
        ],
        "Pori-Pori": [
            "Gunakan niacinamide",
            "Cuci muka 2x sehari dengan pH seimbang",
        ],
        "Pustule": [
            "Gunakan benzoyl peroxicde (5%)",
            "Gunakan produk anti-inflamasi",
        ],
        "Whitehead": [
            "Gunakan pembersih yang lembut dengan AHAs",
            "Eksfoliasi ringan 2-3 kali seminggu"
        ],
    }

    return {
        label: rules[label]
        for label in set(labels)
        if label in rules
    }

@app.post("/predict/")
async def predict(file: UploadFile = File(...)):

    ext = file.filename.split(".")[-1]
    file_name = f"{uuid.uuid4()}.{ext}"
    file_path = os.path.join(UPLOAD_DIR, file_name)

    with open(file_path, "wb") as buffer:
        shutil.copyfileobj(file.file, buffer)

    results = model(file_path)
    labels = []
    boxes = []

    for box in results[0].boxes.data.tolist():
        x1, y1, x2, y2, conf, class_id = box
        label = results[0].names[int(class_id)]
        labels.append(label)
        boxes.append({
            "label": label,
            "confidence": round(conf, 2),
            "box": [round(x1), round(y1), round(x2), round(y2)],
        })

    result_img_path = file_path.replace(f".{ext}", f"_result.{ext}")
    results[0].save(filename=result_img_path)

    recommendations = get_recommendations(labels)

    return JSONResponse(content={
        "result_image": f"/{result_img_path.replace(os.sep, '/')}",
        "detections": boxes,
        "recommendations": recommendations,
    })