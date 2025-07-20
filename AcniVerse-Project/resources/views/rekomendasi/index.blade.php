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

  <!-- Main Content -->
  <main class="max-w-4xl mx-auto mt-10 px-4 text-center">
    <h2 class="text-2xl font-bold text-[#A85B5B] mb-2">Hasil Analisis Wajah Anda</h2>
    <p class="text-[#A85B5B] mb-6">Gambar yang dianalisis :</p>

    <!-- Gambar -->
    <div class="flex justify-center mb-8">
      <img src="https://rhtms-fastapi-model.hf.space{{ $result['result_image'] }}" alt="Wajah" class="rounded-lg shadow-md w-80 h-auto" loading="lazy">
    </div>

    <!-- Ringkasan & Rekomendasi -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 justify-center mb-10">
      <!-- Ringkasan -->
      <div class="bg-white rounded-xl shadow p-6 text-left">
        <div class="flex items-center gap-2 mb-4">
          <svg class="w-6 h-6 text-[#A85B5B]" fill="currentColor" viewBox="0 0 24 24">
            <path d="M10.83 5a3.001 3.001 0 0 0-5.66 0H4a1 1 0 1 0 0 2h1.17a3.001 3.001 0 0 0 5.66 0H20a1 1 0 1 0 0-2h-9.17ZM4 11h9.17a3.001 3.001 0 0 1 5.66 0H20a1 1 0 1 1 0 2h-1.17a3.001 3.001 0 0 1-5.66 0H4a1 1 0 1 1 0-2Zm1.17 6H4a1 1 0 1 0 0 2h1.17a3.001 3.001 0 0 0 5.66 0H20a1 1 0 1 0 0-2h-9.17a3.001 3.001 0 0 0-5.66 0Z"/>
          </svg>
          <h3 class="text-[#A85B5B] font-semibold">Ringkasan Analisis</h3>
        </div>
        <ul class="text-sm text-[#3E3E3E] space-y-2">
          @foreach ($result['detections'] as $data)
          <li><strong>Jenis jerawat:</strong> {{ $data['label'] }} </li>
          @endforeach
        </ul>
      </div>

      <!-- Rekomendasi -->
      <div class="bg-white rounded-xl shadow p-6 text-left">
        <div class="flex items-center gap-2 mb-4">
          <svg class="w-6 h-6 text-[#A85B5B]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linejoin="round"
              d="M12.1429 11v9m0-9c-2.50543-.7107-3.19099-1.39543-6.13657-1.34968-.48057.00746-.86348.38718-.86348.84968v7.2884c0 .4824.41455.8682.91584.8617 2.77491-.0362 3.45995.6561 6.08421 1.3499m0-9c2.5053-.7107 3.1067-1.39542 6.0523-1.34968.4806.00746.9477.38718.9477.84968v7.2884c0 .4824-.4988.8682-1 .8617-2.775-.0362-3.3758.6561-6 1.3499m2-14c0 1.10457-.8955 2-2 2-1.1046 0-2-.89543-2-2s.8954-2 2-2c1.1045 0 2 .89543 2 2Z" />
          </svg>
          <h3 class="text-[#A85B5B] font-semibold">Rekomendasi Perawatan</h3>
        </div>
        @foreach ($result['recommendations'] as $rekomendasi => $items)
            <h4 class="font-semibold mb-1.5">{{ $rekomendasi }}</h3>
            <ul class="text-sm text-[#3E3E3E] list-disc list-inside space-y-2">
              @foreach ($items as $item)
                <li>{{ $item }}</li>
              @endforeach
            </ul>
        @endforeach
      </div>
    </div>

    <!-- Peringatan -->
    <div class="bg-yellow-50 border border-yellow-300 py-4 px-6 rounded-md text-center text-sm text-yellow-800 mb-10">
      ⚠ Aplikasi ini tidak menggantikan diagnosis dokter. Hasil analisis hanya sebagai gambaran awal.
      <br class="hidden sm:block" />
      Konsultasikan ke profesional untuk penanganan lebih lanjut.
    </div>
  </main>

@include('layouts.footer')


</body>
</html>