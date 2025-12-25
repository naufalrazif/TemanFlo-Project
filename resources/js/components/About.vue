<template>
  <footer class="bg-[#6B5B58] text-white py-12 w-full font-[Poppins]">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
      <!-- Kiri: Info -->
      <div>
        <h1 class="font-semibold text-2xl mb-2">About Us</h1>
        <p class="text-base text-justify text-[#f2f2f2] mb-4 leading-relaxed">
          Didirikan di tengah kota Klaten, Ratu Florist lahir dari cinta terhadap keindahan bunga dan keinginan untuk menghadirkan kebahagiaan lewat setiap rangkaian. Kami percaya bahwa setiap bunga memiliki kisah, dan setiap pelanggan punya cerita yang ingin disampaikan.
          Dengan pengalaman dan dedikasi dalam seni merangkai bunga, kami terus berinovasi menghadirkan berbagai jenis buket, mulai dari buket bunga klasik, buket snack yang kreatif, hingga buket boneka yang manis dan menggemaskan.
          Melalui layanan custom bouquet, kami memberi kebebasan penuh bagi pelanggan untuk menciptakan rangkaian impian mereka sendiri. Karena bagi kami, keindahan sejati bukan hanya dari bunga yang segar, tapi dari perasaan tulus di balik setiap rangkaian.
        </p>

        <h3 class="font-semibold text-2xl mb-1">Location :</h3>
        <p class="text-base mb-6">
          Kerten RT 02 RW 02, Kepanjen, Delanggu, Klaten.
        </p>

        <div class="flex gap-3 mt-10 mb-6">
          <button
            class="bg-[#F2E0DC] text-[#2f2f2f] font-semibold px-4 py-1 rounded-full shadow hover:bg-[#ebd4cf] transition"
          >
          <a href ="/guide"> Guide</a>
          </button>
          <button
            class="bg-[#F2E0DC] text-[#2f2f2f] font-semibold px-4 py-1 rounded-full shadow hover:bg-[#ebd4cf] transition"
          >
           <a href ="/TnC">Term & Condition</a> 
          </button>
        </div>
      </div>

      <!-- Kanan: Gambar -->
      <div class="flex justify-center md:justify-end">
        <img
          src="@/assets/footer.jpg"
          alt="Footer Flower"
          class="w-80 h-100 object-cover rounded-2xl"
        />
      </div>
    </div>

    <!-- Social Media Icons Section -->
    <div class="max-w-6xl mx-auto px-6 mt-12">
      <h3 class="text-center font-semibold text-xl mb-6">Connect With Us</h3>
      <div class="flex justify-center gap-6">
  <div class="flex gap-6">

  <!-- Instagram -->
  <div class="w-14 h-14 bg-[#E8C9C6] rounded-xl flex items-center justify-center">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="w-7 h-7"
         fill="none" stroke="#2f2f2f" stroke-width="2" viewBox="0 0 24 24">
      <rect x="3" y="3" width="18" height="18" rx="5"/>
      <circle cx="12" cy="12" r="4"/>
      <circle cx="17" cy="7" r="1.2"/>
    </svg>
  </div>

  <!-- WhatsApp -->
  <div class="w-14 h-14 bg-[#E8C9C6] rounded-xl flex items-center justify-center">
    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-7 h-7"
         fill="none" stroke="#2f2f2f" stroke-width="2" viewBox="0 0 24 24">
      <path d="M20 11.5a8 8 0 10-14.7 4.6L4 21l4-1.1A8 8 0 0020 11.5z"/>
      <path d="M9 10.5c0 2.5 3 5 4.5 5 .6 0 1.4-.5 1.7-1"/>
    </svg>
  </div>

 <!-- TikTok Outline Icon -->
  <div class="w-14 h-14 bg-[#E8C9C6] rounded-xl flex items-center justify-center">
<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" 
     viewBox="0 0 24 24" fill="none" stroke="#2f2f2f" stroke-width="1.8" 
     stroke-linecap="round" stroke-linejoin="round">
    <path d="M12 3v12.5a3.5 3.5 0 1 1-3.5-3.5h1"/>
    <path d="M12 6a4 4 0 0 0 4 4h1"/>
</svg>
  </div>

  <!-- Maps -->
  <div class="w-14 h-14 bg-[#E8C9C6] rounded-xl flex items-center justify-center">
    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-7 h-7"
         fill="none" stroke="#2f2f2f" stroke-width="2" viewBox="0 0 24 24">
      <path d="M12 2a7 7 0 00-7 7c0 4.4 7 13 7 13s7-8.6 7-13a7 7 0 00-7-7z"/>
      <circle cx="12" cy="9.5" r="2.5"/>
    </svg>
  </div>

</div>
      </div>
    </div>

    <!-- Bawah: Payment + Nama -->
    <div class="mt-10 text-center">
     <h1 class="text-center font-[Rochester] text-4xl mt-5">
  <a href="/home" class="text-inherit no-underline hover:text-[#697c6f] transition">
    Ratu Florist Klaten
  </a>
</h1>
    </div>
  </footer>
</template>

<script setup>
import footer from '@/assets/footer.jpg';
</script>