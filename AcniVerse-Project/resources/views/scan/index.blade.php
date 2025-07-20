<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Deteksi Jerawat - AcneScan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


</head>
<body class="font-sans antialiased bg-pink-100 min-h-screen">
   @include('layouts.header')

  <div class="max-w-md mx-auto bg-white border-2 border-[#E07A91] rounded-2xl p-6 my-10 text-center shadow">
    <h2 class="text-xl font-semibold text-[#3E3E3E] mb-2">Deteksi Jerawatmu Sekarang</h2>
    <p class="text-[#3E3E3E] mb-4">Gunakan selfie kamu untuk mengetahui kondisi kulit secara cepat & akurat</p>

    <div class="w-36 h-36 mx-auto bg-gray-200 rounded-lg flex items-center justify-center overflow-hidden" id="preview-block">
      <img src="{{ asset('images/wajahScan.jpg') }}" alt="Contoh wajah" class="h-full" id="preview-image"/>
    </div>

    
    <form action="{{ route('scan.proses') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="flex justify-center gap-4 my-4">
            <!-- Tombol Ambil Selfie -->
            <label class="bg-white border border-[#E07A91] w-48 h-14 rounded-lg font-semibold flex items-center justify-center gap-2 text-[#E07A91] hover:bg-pink-50 transition" for="startCamera">
            <!-- Ikon kamera SVG -->
            <svg class="w-6 h-6 text-[#E07A91]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M4 18V8a1 1 0 0 1 1-1h1.5l1.707-1.707A1 1 0 0 1 8.914 5h6.172a1 1 0 0 1 .707.293L17.5 7H19a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Z"/>
                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
            </svg>
    
            <!-- Teks tombol -->
            <span class="text-sm leading-tight text-left">
                Ambil Selfie<br>Sekarang
            </span>
            </label>
            <input class="hidden" type="button" name="gambar" id="startCamera">
    
    
            <!-- Tombol Upload Foto -->
            <label class="bg-white border border-[#E07A91] w-48 h-14 rounded-lg font-semibold flex items-center justify-center gap-2 text-[#E07A91] hover:bg-pink-50 transition cursor-pointer" for="file">
            <!-- Ikon upload SVG -->
            <svg class="w-6 h-6 text-[#E07A91]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 5v9m-5 0H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2M8 9l4-5 4 5m1 8h.01"/>
            </svg>
    
            <!-- Teks tombol -->
            <span class="text-sm leading-tight text-left">
                Upload Foto<br>dari Galeri
            </span>
            </label>
            <input type="file" name="file" class="hidden" id="file">
            <input type="hidden" name="kamera_gambar" id="kameraGambar">
    
        </div>
    
        <p class="text-sm text-[#3E3E3E] mb-4">Foto harus jelas & wajah terlihat penuh.</p>
    
        <button class="w-full bg-[#E07A91] text-[#3E3E3E] px-4 py-2 rounded-lg font-semibold">Generate</button>

    </form>

    <div id="camera" class="hidden fixed top-0 left-0 right-0 h-full bg-[#33333354] flex items-center justify-center">
        <div class="w-full max-w-[80%] bg-[#fff] shadow-2xl p-4">
            <div class="flex justify-between items-center w-full">
                <h3 class="font-semibold text-base">Ambil gambar</h3>
                <button class="px-3 py-1.5 rounded bg-red-600 text-white" onclick="stopCamera()" type="button">Kembali</button>
            </div>
            <video class="mx-auto my-2.5" id="video" width="520" height="340" autoplay playsinline></video>
            <canvas id="canvas" style="display:none;"></canvas>
            <button class="py-2.5 rounded shadow bg-[#E07A91] px-3 font-medium text-white" id="ambilFoto" type="button">Ambil Gambar</button>
        </div>
    </div>
  </div>

@include('layouts.footer')

<script>
    var previewImg = document.getElementById('preview-image'), inputImg = document.getElementById('file'), previewBlock = document.getElementById('preview-block'), streamContainer = document.getElementById('');
    inputImg.addEventListener('change', () => {
        var fileInput = inputImg.files[0];
        previewBlock.classList.remove("w-36", "h-36");
        previewBlock.classList.add("w-full", "h-auto");
        previewImg.src = URL.createObjectURL(fileInput);
    });

    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const kameraGambar = document.getElementById('kameraGambar');
    let stream = null;

    document.getElementById('startCamera').addEventListener('click', startCamera);

    async function startCamera() {
        document.getElementById("camera").classList.remove("hidden");
        stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.srcObject = stream;
    }

    function stopCamera() {
        document.getElementById("camera").classList.add("hidden");
      if (stream) {
        stream.getTracks().forEach(track => track.stop());
        video.srcObject = null;
      }
    }

    document.getElementById('ambilFoto').addEventListener('click', () => {
        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0);
        const imageData = canvas.toDataURL('image/png');
        kameraGambar.value = imageData;
        previewBlock.classList.remove("w-36", "h-36");
        previewBlock.classList.add("w-full", "h-auto");
        previewImg.src = canvas.toDataURL();
        stopCamera()
    });

</script>
</body>
</html>