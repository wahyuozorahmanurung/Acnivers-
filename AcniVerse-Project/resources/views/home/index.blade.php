<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AcneScan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


</head>

<body class="font-[Poppins]">
    @include('layouts.header')

    <div class="bg-[#F0BDC8] p-6 rounded-lg shadow-md flex flex-col lg:flex-row items-center justify-between gap-6 px-[5%]">
        <!-- Kiri: Teks -->
        <div class="lg:w-1/2 space-y-4 text-center lg:text-left text-[#3E3E3E]">
            <h2 class="text-3xl lg:text-4xl font-bold text-[#3E3E3E]">
                Solusi Deteksi Jerawat<br>Secara Instan dengan<br>AcneScan
            </h2>
            <p class="text-[#A85B5B] text-left text-left">
                Kenali jenis jerawat yang kamu alami dan temukan langkah awal perawatan yang sesuai,untuk membantu mengatasi masalah kulitmu dengan lebih tepat dan efektif
            </p>
            <a href="{{ route('scan') }}" class="inline-block bg-[#E07A91] hover:bg-pink-600 text-[#3E3E3E] font-semibold px-4 py-2 rounded-md transition">
                Mulai Scan Sekarang
            </a>
        </div>

        <!-- Kanan: Gambar -->
        <div class="lg:w-1/2 flex flex-col lg:flex-row items-center justify-end gap-4">
            <!-- Gambar utama -->
            <div class="rounded-md overflow-hidden">
                <img src="{{ asset('images/jerawat-main.png') }}" alt="Scan Jerawat" class="w-64 h-auto object-cover">
            </div>

            <!-- Dua gambar kecil di samping -->
            <div class="flex flex-col gap-4">
                <div class="rounded-md overflow-hidden">
                    <img src="{{ asset('images/jerawat-1.png') }}" alt="Jerawat 1" class="w-[200px] h-[200px] object-cover">
                </div>
                <div class="rounded-md overflow-hidden">
                    <img src="{{ asset('images/jerawat-2.png') }}" alt="Jerawat 2" class="w-[200px] h-[160px] object-cover">
                </div>

            </div>
        </div>
    </div>
    <section id="jenis-jerawat" class="bg-[#FFEFF1] py-10 px-4 md:px-10">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-8 text-[#3E3E3E]">Jenis Jerawat yang Terdeteksi</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 max-w-4xl mx-auto">
            <!-- Papula -->
            <div class="bg-[#F0BDC8] p-5 rounded-xl shadow-sm flex gap-4 items-start">
                <img src="{{ asset('images/papula.png') }}" alt="Papula" class="w-16 h-16 rounded-full object-cover">
                <div>
                    <h3 class="font-bold text-lg text-[#3E3E3E]">Papula</h3>
                    <p class="text-sm text-[#A85B5B] mb-2 line-clamp-2">Benjolan merah kecil tanpa nanah,<br>Cenderung sakit saat disentuh.</p>
                    <a href="https://www.siloamhospitals.com/en/informasi-siloam/artikel/jenis-jenis-jerawat" target="_blank" class="text-sm text-[#3E3E3E] font-semibold hover:underline block text-right">
                        Selengkapnya...
                    </a>
                </div>
            </div>

            <!-- Pustula -->
            <div class="bg-[#F0BDC8]  p-5 rounded-xl shadow-sm flex gap-4 items-start">
                <img src="{{ asset('images/pustula.png') }}" alt="Pustula" class="w-16 h-16 rounded-full object-cover">
                <div>
                    <h3 class="font-bold text-lg text-[#3E3E3E]">Pustula</h3>
                    <p class="text-sm text-[#A85B5B] mb-2 line-clamp-2">Jerawat dengan nanah di ujungnya,<br>Tampak putih kekuningan.</p>
                    <a href="https://www.siloamhospitals.com/en/informasi-siloam/artikel/jenis-jenis-jerawat" target="_blank" class="text-sm text-[#3E3E3E] font-semibold hover:underline block text-right">
                        Selengkapnya...
                    </a>
                </div>
            </div>

            <!-- Nodul -->
            <div class="bg-[#F0BDC8]  p-5 rounded-xl shadow-sm flex gap-4 items-start">
                <img src="{{ asset('images/nodul.png') }}" alt="Nodul" class="w-16 h-16 rounded-full object-cover">
                <div>
                    <h3 class="font-bold text-lg text-[#3E3E3E]">Nodul</h3>
                    <p class="text-sm text-[#A85B5B] mb-2 line-clamp-2">Benjolan besar dan dalam di dalam kulit,<br>Bisa meninggalkan bekas.</p>
                    <a href="https://www.siloamhospitals.com/en/informasi-siloam/artikel/jenis-jenis-jerawat" target="_blank" class="text-sm text-[#3E3E3E] font-semibold hover:underline block text-right">
                        Selengkapnya...
                    </a>
                </div>
            </div>

            <!-- Komedo -->
            <div class="bg-[#F0BDC8]  p-5 rounded-xl shadow-sm flex gap-4 items-start">
                <img src="{{ asset('images/komedo.png') }}" alt="Komedo" class="w-16 h-16 rounded-full object-cover">
                <div>
                    <h3 class="font-bold text-lg text-[#3E3E3E]">Komedo</h3>
                    <p class="text-sm text-[#A85B5B] mb-2 line-clamp-2">Pori-pori tersumbat minyak dan sel kulit mati, Tidak meradang.</p>
                    <a href="https://www.siloamhospitals.com/en/informasi-siloam/artikel/jenis-jenis-jerawat" target="_blank" class="text-sm text-[#3E3E3E] font-semibold hover:underline block text-right">
                        Selengkapnya...
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-[#F0BDC8] px-[12%] py-8 rounded-md">
        <h2 class="text-2xl font-bold text-[#3E3E3E] mb-6">Deteksi Pintar</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex items-center gap-2 bg-pink-50 text-[#A85B5B] px-4 py-3 rounded-md shadow-sm">
                <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <span>Deteksi Jerawat Otomatis</span>
            </div>

            <div class="flex items-center gap-2 bg-pink-50 text-[#A85B5B] px-4 py-3 rounded-md shadow-sm">
                <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <span>Dukungan Kamera Langsung</span>
            </div>

            <div class="flex items-center gap-2 bg-pink-50 text-[#A85B5B] px-4 py-3 rounded-md shadow-sm">
                <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <span>Analisis Jenis Jerawat</span>
            </div>

            <div class="flex items-center gap-2 bg-pink-50 text-[#A85B5B] px-4 py-3 rounded-md shadow-sm">
                <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <span>Rekomendasi Perawatan</span>
            </div>
        </div>
    </section>
    <section class="bg-[#FFEFF1] px-6 py-10 text-center rounded-md">
    <h2 class="text-2xl font-bold text-[#3E3E3E] mb-8">Cara Kerja</h2>

    <div class="flex flex-col md:flex-row justify-center items-center gap-16 mb-10">

        <!-- Step 1 -->
        <div class="flex flex-col items-center gap-y-4">
  <div class="bg-[#F0BDC8] p-5 rounded-full flex items-center justify-center">
    <!-- Upload Icon diperbesar -->
    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 scale-150 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M16 10l-4-4m0 0L8 10m4-4v12" />
    </svg>
  </div>
  <p class="text-sm text-[#A85B5B] text-center">Upload foto<br>wajah jelas kamu</p>
</div>

        <!-- Step 2 -->
        <div class="flex flex-col items-center gap-y-4">
            <div class="bg-[#F0BDC8] p-5 rounded-full">
                <!-- Analysis Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 scale-150 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m4 1a3 3 0 0 0 6 0 3 3 0 0 0-6 0Zm3 3v1m0-7v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707" />
                </svg>
            </div>
            <p class="text-sm text-[#A85B5B] text-center">Sistem menganalisis<br>jenis jerawat</p>
        </div>

        <!-- Step 3 -->
        <div class="flex flex-col items-center gap-y-4">
           <div class="bg-[#F0BDC8] p-5 rounded-full flex items-center justify-center">
  <!-- Report Icon -->
  <svg class="w-7 h-7 scale-150 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path fill-rule="evenodd" d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11.5c.07 0 .14-.007.207-.021.095.014.193.021.293.021h2a2 2 0 0 0 2-2V7a1 1 0 0 0-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H7Zm1 3V8h1v1H8Z" clip-rule="evenodd"/>
  </svg>
</div>
            <p class="text-sm text-[#A85B5B] text-center">Hasil rekomendasi<br>perawatan</p>
        </div>

    </div>


    <p class="text-lg font-bold text-[#3E3E3E] mb-4 mt-4">Yuk Mulai Kulit Sehatmu Sekarang</p>
    <a href="{{ route('scan') }}" class="inline-block bg-[#E07A91] hover:bg-pink-600 text-[#3E3E3E] font-semibold px-6 py-2 rounded-xl transition">Scan Wajah Sekarang</a>
</section>


@include('layouts.footer')

</body>

</html>