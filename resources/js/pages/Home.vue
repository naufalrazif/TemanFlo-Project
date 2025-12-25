<!-- src/views/Home.vue -->
<template>
  <div class="bg-[#fff8f6] text-[#3a3a3a]">
    <!-- Hero Section -->
    <section
      class="relative bg-cover bg-center min-h-screen flex flex-col justify-center items-center text-white"
      :style="{ backgroundImage: `url(${bgHome})` }"
    >
      <div class="absolute inset-0 bg-black/40 z-0"></div>
      <div class="absolute top-0 left-0 w-full z-20">
        <Navbar />
      </div>
      
      <div class="relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-[Rochester] px-4 mb-7">Welcome to Ratu Florist</h1>
        <p class="text-lg md:text-xl font-light">Wujudkan setiap moment istimewa dengan rangkaian bunga indah penuh makna.</p>
        <p class="text-lg md:text-xl font-bold">Pesan sekarang dan kirimkan kebahagiaan untuk orang tersayang!</p>
        <a href="/custom-order" class="inline-block px-6 py-2 bg-[#5B7263] hover:bg-[#31463f] transition text-white font-2xl rounded-xl mt-20">
          Buat Pesanan Custom
        </a>
      </div>
    </section>

    <!-- Bouquet Category Section -->
    <section class="py-16 bg-[#fce1d7] text-center">
      <h2 class="text-3xl font-[Rochester] font-semibold mb-5">Buket Bunga</h2>
      <p class="text-xl font-light px-7 mb-8 max-w-6xl mx-auto">Keindahan sejati ada pada detail. Kami menghadirkan rangkaian buket bunga dengan sentuhan seni dan keanggunan alami, dirancang untuk memperindah setiap perayaan hidupmu. Baik untuk hadiah ulang tahun, ucapan terima kasih, maupun perayaan istimewa.</p>
       <CardProduk :produks="limitedProduks" jenis="buket_bunga" />
      <div class="w-full flex justify-center mt-16">
        <ButtonLihatSemua to="/katalog" />
      </div>
    </section>

    <!-- Buket Snack -->
    <section class="py-16 bg-white text-center">
      <h2 class="text-3xl font-[Rochester] font-semibold mb-5">Buket Snack</h2>
      <p class="text-xl font-light px-7 mb-8 max-w-6xl mx-auto">Ratu Florist menghadirkan inovasi unik dalam bentuk buket snack, kombinasi sempurna antara kelezatan dan keindahan. Dengan desain kreatif dan bahan premium, setiap buket kami siap menjadikan setiap momen istimewa terasa lebih berwarna dan berkesan.</p>
       <CardProduk :produks="limitedProduks" jenis="buket_snack" />
      <div class="w-full flex justify-center mt-16">
        <ButtonLihatSemua to="/katalog" />
      </div>
    </section>

    <!-- Buket Boneka -->
    <section class="py-16 bg-[#fce1d7] text-center">
      <h2 class="text-3xl font-[Rochester] font-semibold mb-5">Buket Boneka</h2>
      <p class="text-xl font-light px-7 mb-8 max-w-6xl mx-auto">Buket boneka bukan sekadar hadiah, tapi bentuk perhatian yang lembut dan penuh kasih. Setiap boneka kecil di dalamnya membawa pesan kehangatan, rasa sayang, dan kebahagiaan yang tulus. Kami merangkainya dengan cinta, agar setiap orang yang menerimanya bisa merasakan keindahan dan ketulusan dari hati ke hati.</p>
      <CardProduk :produks="limitedProduks" jenis="buket_boneka" />
      <div class="w-full flex justify-center mt-16">
        <ButtonLihatSemua to="/katalog" />
      </div>
    </section>

    <!-- Custom Buket (Preview ONLY di Home) -->
    <section class="py-16 bg-white text-center">
      <h2 class="text-3xl font-[Rochester] font-semibold mb-5">Custom Buket</h2>
      <p class="text-xl font-light px-7 mb-8 max-w-6xl mx-auto">Layanan custom bouquet kami memberikan kebebasan penuh untuk membuat rangkaian bunga sesuai keinginan dan momen spesialmu. Pilih sendiri jenis buket, warna, hingga gaya wrapping yang kamu suka dan biarkan tim kami merangkainya dengan sepenuh hati.</p>
      
      <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto px-6">
        <div
          v-for="(item, index) in CustomBuket"
          :key="index"
          class="bg-[#fefefe] rounded-xl shadow-md hover:shadow-lg p-4"
        >
          <img
            :src="item.foto_url"
            :alt="item.name"
            class="rounded-md w-full h-56 object-cover mb-4"
          />
          <h3 class="text-lg font-bold mb-2">{{ item.name }}</h3>
          <p class="text-sm mb-3">{{ item.desc }}</p>
        </div>
      </div>
      
      <div class="w-full flex justify-center mt-16">
        <ButtonLihatSemua to="/custom-order" />
      </div>
    </section>
  </div>
 <!-- Footer Section -->
<footer class="bg-[#5B7263] text-white py-10 w-full">
  <div class="max-w-6xl mx-auto px-6 sm:px-8 md:px-12 lg:px-16">
    <!-- Grid 2 Kolom -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

      <!-- Kolom Kiri: Logo, Nama, Tagline, Alamat, Kontak -->
      <div class="flex flex-col space-y-4">
        <!-- Logo & Nama (Dibesarkan) -->
        <div class="flex items-center space-x-4">
          <img 
            src="@/assets/logo2.png" 
            alt="Ratu Florist Logo" 
            class="w-20 h-20"
          />
          <div>
            <h3 class="text-2xl font-[Rochester]">Ratu Florist</h3>
            <p class="text-base opacity-85 mt-1">Mewujudkan Keindahan dalam Setiap Momen</p>
          </div>
        </div>

        <!-- Alamat -->
        <p class="text-sm leading-relaxed mt-3">
          Kerten RT 02 RW 03, Kepanjen, Delanggu, Klaten.
        </p>

        <!-- Email & Telepon -->
        <div class="flex flex-col space-y-2 text-base mt-3">
          <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
              <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
            </svg>
            <span>ratuflorist@mail.com</span>
          </div>
          <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
              <path d="M6.62 10.79c1.44 2.83 3.76 5.15 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57 1.62 0 3.12-.6 4.24-1.72a10 10 0 00-17.2-4.78c-.21.35-.3.75-.24 1.02l2.2 2.2z"/>
            </svg>
            <span>085601225167</span>
          </div>
        </div>
      </div>

      <!-- Kolom Kanan: Media Sosial (Vertikal, Rata Kanan) -->
      <div class="flex flex-col justify-center items-end mt-10">
        <h4 class="text-lg font-semibold mb-4 w-full text-right ">Connect With Us</h4>
        <div class="flex flex-col space-y-3 text-sm">
          <!-- Instagram -->
          <a
            href="https://instagram.com/ratuflorist_klaten"
            target="_blank"
            rel="noopener noreferrer"
            class="flex items-center text-md space-x-2 hover:text-[#fce1d7] transition"
            aria-label="Instagram"
          >
            <svg xmlns="http://www.w3.org/2000/svg"
           class="w-5 h-5 stroke-white fill-none"
          viewBox="0 0 24 24"
           stroke-width="2">
          <rect x="3" y="3" width="18" height="18" rx="5"/>
          <circle cx="12" cy="12" r="4"/>
          <circle cx="17" cy="7" r="1.2"/>
        </svg>
            <span class="text-base">@ratuflorist_klaten</span>
          </a>

          <!-- TikTok -->
          <a
            href="https://www.tiktok.com/@ratuflorist_klaten?is_from_webapp=1&sender_device=pc"
            target="_blank"
            rel="noopener noreferrer"
            class="flex items-center space-x-2 text-md hover:text-[#fce1d7] transition"
            aria-label="TikTok"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
              <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.42v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.37-4.83V9.23a6.28 6.28 0 0 0-5.47 6.14c0 3.5 2.75 6.36 6.16 6.36a6.23 6.23 0 0 0 6.16-5.38V9.02a2.92 2.92 0 0 1 2.81-3.33z"/>
            </svg>
            <span class="text-base">@ratuflorist_klaten</span>
          </a>

          <!-- WhatsApp -->
          <a
            href="https://wa.me/6285601225167"
            target="_blank"
            rel="noopener noreferrer"
            class="flex items-center space-x-2 hover:text-[#fce1d7] transition"
            aria-label="WhatsApp"
          >
            <svg xmlns="http://www.w3.org/2000/svg"
         class="w-5 h-5 stroke-white fill-none"
         viewBox="0 0 24 24" stroke-width="2">
      <path d="M20 11.5a8 8 0 10-14.7 4.6L4 21l4-1.1A8 8 0 0020 11.5z"/>
      <path d="M8.5 9.5c1 3 3 4.5 5.5 5.5"/>
    </svg>
            <span class="text-base">085601225167</span>
          </a>
        </div>
      </div>

    </div>

    <!-- Copyright -->
    <div class="mt-8 pt-4 border-t border-white/20 text-xs text-center opacity-80">
      © {{ new Date().getFullYear() }} Ratu Florist. All rights reserved.
    </div>
  </div>
</footer>
</template>

<script setup lang="ts">
import bgHome from "@/assets/bgHome.jpg";
import ButtonLihatSemua from "@/components/buttonLihatSemua.vue";
import Navbar from "@/components/Navbar.vue";
import CardProduk from "@/components/CardProduk.vue";


interface Produk {
  id: number;
  nama: string;
  jenis_buket: string;
  tema: string;
  harga: number;
  deskripsi: string;
  foto: string;
  foto_url?: string;
}

const props = defineProps<{
  produks: Produk[];
}>();

const limitedProduks = [
  ...props.produks.filter(p => p.jenis_buket === "buket_bunga").slice(0, 3),
  ...props.produks.filter(p => p.jenis_buket === "buket_snack").slice(0, 3),
  ...props.produks.filter(p => p.jenis_buket === "buket_boneka").slice(0, 3)
];

//3 Produk Statis - hanya untuk preview di Home
const CustomBuket = [
  {
    name: "Custom Buket Bumbu Dapur",
    desc: "Buket mawar merah premium dengan wrapping elegan, cocok untuk ungkapan cinta.",
    foto_url: "/assets/custom.jpg"
  },
  {
    name: "Buket One Set Khaf Skincare",
    desc: "Gift set skincare lengkap dengan rangkaian bunga segar, hadiah sempurna untuk perawatan diri.",
    foto_url: "/assets/custom2.jpg"
  },
  {
    name: "Buket Uang 5000",
    desc: "Gabungan snack favorit dan bunga cantik, untuk kejutan yang tak terlupakan.",
    foto_url: "/assets/uang3.jpg"
  }
];
</script>