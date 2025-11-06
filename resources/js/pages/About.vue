<template>
  <footer class="bg-[#6B5B58] text-white py-12 w-full h-200 font-[Poppins]">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
      <!-- Kiri: Info -->
      <div>
        <h1 class="font-semibold text-2xl mb-2">About Us</h1>
        <p class="text-base text-justify text-[#f2f2f2] mb-4 leading-relaxed">
          Didirikan di tengah kota Klaten, Ratu Florist lahir dari cinta terhadap keindahan bunga dan keinginan untuk menghadirkan kebahagiaan lewat setiap rangkaian. Kami percaya bahwa setiap bunga memiliki kisah, dan setiap pelanggan punya cerita yang ingin disampaikan.
          Dengan pengalaman dan dedikasi dalam seni merangkai bunga, kami terus berinovasi menghadirkan berbagai jenis buket, mulai dari buket bunga klasik, buket snack yang kreatif, hingga buket boneka yang manis dan menggemaskan.
          Melalui layanan custom bouquet, kami memberi kebebasan penuh bagi pelanggan untuk menciptakan rangkaian impian mereka sendiri. Karena bagi kami, keindahan sejati bukan hanya dari bunga yang segar, tapi dari perasaan tulus di balik setiap rangkaian.
        </p>

        <h3 class="font-semibold text-2xl mb-1">Our Social Media</h3>
        <p class="text-base mb-4">
          WhatsApp : <br />
          Instagram :@ratuflorist_klaten
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
          src="/assets/about.jpeg"
          alt="Footer Flower"
          class="w-80 h-100 object-cover rounded-2xl"
        />
      </div>
    </div>

    <!-- Bawah: Payment + Nama -->
    <div class="mt-20 text-center">
     <h1 class="text-center font-[Rochester] text-4xl mt-5">
  <a href="/home" class="text-inherit no-underline hover:text-[#697c6f] transition">
    Ratu Florist Klaten
  </a>
</h1>
    </div>
  </footer>
</template>

<script setup>
//import Home from '@/pages/Home.vue';
</script>