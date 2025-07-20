<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ScanController extends Controller
{
    public function index() {
        return view('scan.index');
    }

    public function scan(Request $request) {
        if ($request->hasFile('file')) {
            // ✨ Validasi dan simpan file dari galeri
            $request->validate([
                'file_gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            $image = $request->file('file');
            $response = Http::timeout(90)->attach(
                'file',               // nama field yang diharapkan FastAPI
                fopen($image->getPathname(), 'r'),  // buka stream file (lebih aman)
                $image->getClientOriginalName()
            )->post('https://rhtms-fastapi-model.hf.space/predict/');
        
            //dd($response->json());
        
            return view('rekomendasi.index', ['result' => $response->json()]);
        } elseif ($request->filled('kamera_gambar')) {
            $imageData = $request->input('kamera_gambar');

if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $type)) {
    $imageData = substr($imageData, strpos($imageData, ',') + 1);
    $type = strtolower($type[1]);

    if (!in_array($type, ['jpg', 'jpeg', 'png', 'gif'])) {
        return back()->withErrors('Format gambar dari kamera tidak valid.');
    }

    $decodedImage = base64_decode($imageData);
    if ($decodedImage === false) {
        return back()->withErrors('Gagal decode gambar.');
    }

    // Simpan sebagai file sementara
    $tmpFilePath = tempnam(sys_get_temp_dir(), 'cam_img_') . '.' . $type;
    file_put_contents($tmpFilePath, $decodedImage);

    // Kirim ke FastAPI
    $response = Http::timeout(90)->attach(
        'file',
        fopen($tmpFilePath, 'r'),
        'kamera.' . $type
    )->post('https://rhtms-fastapi-model.hf.space/predict/');

    // Hapus file sementara (opsional tapi disarankan)
    unlink($tmpFilePath);

    return view('rekomendasi.index', ['result' => $response->json()]);
} else {
    return back()->withErrors('Data gambar dari kamera tidak valid.');
}

        } else {
            return back()->withErrors('Tidak ada gambar yang dikirim.');
        }
    }
}
