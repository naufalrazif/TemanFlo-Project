<template>
  <div class="mb-10">
    <Navbar />
  </div>

  <footer class="bg-[#FBF5F1] text-black py-12 w-full">

    <div class="max-w-6xl mx-auto px-6 md:px-12 mt-10 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

      <!-- Kiri: Info -->
      <div>
        <h1 class="font-semibold text-2xl mb-2">About Us</h1>

        <p class="text-base text-justify text-black mb-4 leading-relaxed">
          Didirikan di tengah kota Klaten, Ratu Florist lahir dari cinta terhadap keindahan bunga dan keinginan untuk menghadirkan kebahagiaan lewat setiap rangkaian. Kami percaya bahwa setiap bunga memiliki kisah, dan setiap pelanggan punya cerita yang ingin disampaikan.
          Dengan pengalaman dan dedikasi dalam seni merangkai bunga, kami terus berinovasi menghadirkan berbagai jenis buket, mulai dari buket bunga klasik, buket snack yang kreatif, hingga buket boneka yang manis dan menggemaskan.
          Melalui layanan custom bouquet, kami memberi kebebasan penuh bagi pelanggan untuk menciptakan rangkaian impian mereka sendiri. Karena bagi kami, keindahan sejati bukan hanya dari bunga yang segar, tapi dari perasaan tulus di balik setiap rangkaian.
        </p>

        <h3 class="font-semibold text-2xl mb-1">Location :</h3>
        <p class="text-base mb-6">
          Kerten RT 02 RW 03, Kepanjen, Delanggu, Klaten.
        </p>

        <div class="flex flex-wrap gap-3 mt-6 mb-6">
          <a href="/guide" 
             class="bg-[#5B7263] text-white font-semibold px-4 py-1 rounded-full shadow hover:bg-[#697c6f] transition">
            Guide
          </a>

          <a href="/TnC" 
             class="bg-[#5B7263] text-white font-semibold px-4 py-1 rounded-full shadow hover:bg-[#697c6f] transition">
            Term & Condition
          </a>
        </div>
      </div>

      <!-- Kanan: Gambar -->
      <div class="flex justify-center md:justify-end">
        <img
          src="@/assets/footer.jpg"
          alt="Footer Flower"
          class="w-52 sm:w-64 md:w-80 lg:w-96 rounded-2xl object-cover shadow-md"
        />
      </div>
    </div>

    <!-- Social Media Icons -->
    <div class="max-w-6xl mx-auto px-6 mt-12">
      <h3 class="text-center font-semibold text-xl mb-6">Let's Connect With Us</h3>

      <div class="flex justify-center gap-5 flex-wrap">

       <!-- Instagram -->
    <a href="https://instagram.com/ratuflorist_klaten" target="_blank"
       class="w-14 h-14 bg-[#5B7263] rounded-xl flex items-center justify-center shadow-md
              transition hover:scale-105 hover:bg-[#31463f]">
      <svg xmlns="http://www.w3.org/2000/svg"
           class="w-7 h-7 stroke-white fill-none"
           viewBox="0 0 24 24" stroke-width="2">
        <rect x="3" y="3" width="18" height="18" rx="5"/>
        <circle cx="12" cy="12" r="4"/>
        <circle cx="17" cy="7" r="1.2"/>
      </svg>
    </a>


        <!-- WhatsApp (OUTLINE VERSION) -->
  <a href="https://wa.me/6285601225167" target="_blank"
     class="w-14 h-14 bg-[#5B7263] rounded-xl flex items-center justify-center shadow-md
            transition hover:scale-105 hover:bg-[#31463f]">
    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-7 h-7 stroke-white fill-none"
         viewBox="0 0 24 24" stroke-width="2">
      <path d="M20 11.5a8 8 0 10-14.7 4.6L4 21l4-1.1A8 8 0 0020 11.5z"/>
      <path d="M8.5 9.5c1 3 3 4.5 5.5 5.5"/>
    </svg>
  </a>

          <!-- TikTok (OUTLINE CLEAN VERSION) -->
  <a href="https://www.tiktok.com/@ratuflorist_klaten?is_from_webapp=1&sender_device=pc" target="_blank"
     class="w-14 h-14 bg-[#5B7263] rounded-xl flex items-center justify-center shadow-md
            transition hover:scale-105 hover:bg-[#31463f]">
    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-7 h-7 stroke-white fill-none"
         viewBox="0 0 24 24" stroke-width="2">
      <path d="M12 3v12a4 4 0 11-4-4"/>
      <path d="M12 3c1.5 2.5 3.5 4 6 4"/>
    </svg>
  </a>
        <!-- Google Maps (OUTLINE VERSION) -->
  <a href="https://maps.app.goo.gl/xxxx" target="_blank"
     class="w-14 h-14 bg-[#5B7263] rounded-xl flex items-center justify-center shadow-md
            transition hover:scale-105 hover:bg-[#31463f]">
    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-7 h-7 stroke-white fill-none"
         viewBox="0 0 24 24" stroke-width="2">
      <path d="M12 21s7-8.6 7-13a7 7 0 10-14 0c0 4.4 7 13 7 13z"/>
      <circle cx="12" cy="9" r="2.5"/>
    </svg>
  </a>

      </div>
    </div>

    <!-- Nama Brand -->
    <div class="mt-10 text-center">
      <h1 class="font-[Rochester] text-4xl mt-3">
        <a href="/" class="hover:text-[#697c6f] transition">Ratu Florist Klaten</a>
      </h1>
    </div>
  </footer>
</template>

<script setup>
import Navbar from "@/components/Navbar.vue";
</script>

<style scoped>
.icon-box {
  @apply w-14 h-14 bg-[#5B7263] rounded-xl flex items-center justify-center transition shadow-md hover:scale-105;
}

.icon-svg {
  @apply w-7 h-7 stroke-[#2f2f2f] stroke-[2];
}
</style>
