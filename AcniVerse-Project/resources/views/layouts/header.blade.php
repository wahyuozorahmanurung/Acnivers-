<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AcneScan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">

  <!-- Header -->
  <header class="bg-[#E07A91] text-gray-800 h-20 relative">
    <div class="max-w-7xl mx-auto px-4 h-full flex justify-between items-center">
      
      <!-- Logo + Text -->
      <div class="flex items-center space-x-0.5 text-2xl font-bold gap-2.5">
        <button class="hidden max-[700px]:inline-block" type="button" onclick="showMenu()"><svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>menu</title><path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" /></svg></button>
        <img src="images/logo-acne.png" alt="Logo AcneScan" class="h-14 w-14 object-contain" />
        <span>AcniVerse</span>
      </div>

      <!-- Navigation as buttons inside forms -->
      <div id="menu-item" class="flex gap-2.5 text-lg font-medium max-[700px]:hidden max-[700px]:absolute max-[700px]:top-[80px] max-[700px]:bg-white max-[700px]:flex-col max-[700px]:left-0 max-[700px]:right-0 max-[700px]:shadow-md max-[700px]:p-3">
        <a href="{{ route('homepage') }}" rel="nofollow" class="hover:text-black px-3 py-1 text-[#3e3e3e]">Beranda</a>
        <a href="#jenis-jerawat" rel="nofollow" class="bg-pink-200 px-3 py-1 rounded-lg text-[#3E3E3E]">Jenis Jerawat</a>
        <a href="{{ route('scan') }}" rel="nofollow" class="hover:text-black px-3 py-1 text-[#3E3E3E]">Deteksi</a>
      </div>
    </div>
  </header>

</body>
</html>
