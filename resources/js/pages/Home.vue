<template>
  <div class="font-[Poppins] bg-[#ffffff] text-[#000000]">
   
    <!-- Hero Section -->
    <section
      class="relative bg-[url('/assets/bgHome.jpg')] bg-cover bg-center min-h-screen flex flex-col justify-center items-center text-white">
      <div class="absolute inset-0 bg-black/40 z-0"></div>  
      <div class="absolute top-0 left-0 w-full z-20">
        <Navbar2 />
      </div>
      <div class="relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-[Rochester] font-bold px-4 mb-7">Welcome to Ratu Florist</h1>
        <p class="text-lg md:text-xl font-light">Wujudkan setiap moment istimewa dengan rangkaian bunga indah penuh makna.</p>
        <p class="text-lg md:text-xl font-bold">Pesan sekarang dan kirimkan kebahagiaan untuk orang tersayang!</p>
        <a href="/custom-order" class="inline-block px-6 py-2 bg-[#53776c] hover:bg-[#31463f] transition text-white font-2xl rounded-xl mt-20">
          Buat Pesanan Custom
        </a>
      </div>
    </section>

    <!-- Bouquet Category Section -->
    <section class="py-16 bg-[#fce1d7] h-[720px] text-center">
      <h2 class="text-3xl font-[Rochester] font-semibold mb-5">Buket Bunga</h2>
      <p class="text-xl font-light px-7 mb-8 max-w-6xl mx-auto">Keindahan sejati ada pada detail. Kami menghadirkan rangkaian buket bunga dengan sentuhan seni dan keanggunan alami, dirancang untuk memperindah setiap perayaan hidupmu. Baik untuk hadiah ulang tahun, ucapan terima kasih, maupun perayaan istimewa.</p>
      <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto px-6">
        <div
          v-for="(item, index) in bouquetRangkaian"
          :key="index"
          class="bg-white rounded-xl shadow-md hover:shadow-lg p-4"
        >
          <img :src="item.image" alt="buket" class="rounded-md w-full h-56 object-cover mb-4" />
          <h3 class="text-lg font-bold mb-2">{{ item.name }}</h3>
          <p class="text-sm mb-3">{{ item.desc }}</p>
        </div>
      </div>
      <!-- Tombol Reusable -->
      <div class="w-full flex justify-center mt-15">
        <ButtonLihatSemua @click="lihatSemuaProduk" />
      </div>
    </section>

    <!-- Buket Snack -->
    <section class="py-16 h-[720px] bg-white text-center">
      <h2 class="text-3xl font-[Rochester] font-semibold mb-5">Buket Snack</h2>
      <p class="text-xl font-light px-7 mb-8 max-w-6xl mx-auto">Ratu Florist menghadirkan inovasi unik dalam bentuk buket snack, kombinasi sempurna antara kelezatan dan keindahan. Dengan desain kreatif dan bahan premium, setiap buket kami siap menjadikan setiap momen istimewa terasa lebih berwarna dan berkesan.</p>
      <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto px-6">
        <div
          v-for="(item, index) in bouquetSnack"
          :key="index"
          class="bg-[#fefefe] rounded-xl shadow-md hover:shadow-lg p-4"
        >
          <img :src="item.image" alt="buket" class="rounded-md w-full h-56 object-cover mb-4" />
          <h3 class="text-lg font-bold mb-2">{{ item.name }}</h3>
          <p class="text-sm mb-3">{{ item.desc }}</p>
        </div>
      </div>
      <!-- Tombol Reusable -->
      <div class="w-full flex justify-center mt-15">
        <ButtonLihatSemua @click="lihatSemuaProduk" />
      </div>
    </section>

    <!-- Buket Boneka -->
    <section class="py-16 bg-[#fce1d7] h-[720px] text-center">
      <h2 class="text-3xl font-[Rochester] font-semibold mb-5">Buket Boneka</h2>
      <p class="text-xl font-light px-7 mb-8 max-w-6xl mx-auto">Buket boneka bukan sekadar hadiah, tapi bentuk perhatian yang lembut dan penuh kasih. Setiap boneka kecil di dalamnya membawa pesan kehangatan, rasa sayang, dan kebahagiaan yang tulus. Kami merangkainya dengan cinta, agar setiap orang yang menerimanya bisa merasakan keindahan dan ketulusan dari hati ke hati.</p>
      <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto px-6">
        <div
          v-for="(item, index) in bouquetUang"
          :key="index"
          class="bg-white rounded-xl shadow-md hover:shadow-lg p-4"
        >
          <img :src="item.image" alt="buket" class="rounded-md w-full h-56 object-cover mb-4" />
          <h3 class="text-lg font-bold mb-2">{{ item.name }}</h3>
          <p class="text-sm mb-3">{{ item.desc }}</p>
        </div>
      </div>
      <!-- Tombol Reusable -->
      <div class="w-full flex justify-center mt-15">
        <ButtonLihatSemua @click="lihatSemuaProduk" />
      </div>
    </section>

    <!-- Custom Buket -->
    <section class="py-16 bg-white h-[700px] text-center">
      <h2 class="text-3xl font-[Rochester] font-semibold mb-5">Custom Buket</h2>
      <p class="text-xl font-light px-7 mb-8 max-w-6xl mx-auto">Layanan custom bouquet kami memberikan kebebasan penuh untuk membuat rangkaian bunga sesuai keinginan dan momen spesialmu. Pilih sendiri jenis buket, warna, hingga gaya wrapping yang kamu suka dan biarkan tim kami merangkainya dengan sepenuh hati.</p>
      <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto px-6">
        <div
          v-for="(item, index) in customBuket"
          :key="index"
          class="bg-[#fefefe] rounded-xl shadow-md hover:shadow-lg p-4"
        >
          <img :src="item.image" alt="buket" class="rounded-md w-full h-56 object-cover mb-4" />
          <h3 class="text-lg font-bold mb-2">{{ item.name }}</h3>
          <p class="text-sm mb-3">{{ item.desc }}</p>
        </div>
      </div>
      <!-- Tombol Reusable -->
      <div class="w-full flex justify-center mt-15">
        <ButtonLihatSemua @click="lihatSemuaProduk" />
      </div>
    </section>
  </div>
  <About />
</template>

<script setup>
//import bgLHome from "../assets/bgHome.jpg";
import ButtonLihatSemua from "@/components/buttonLihatSemua.vue";
import About from "@/pages/About.vue";
import Navbar2 from '@/components/Navbar2.vue';
const bouquetRangkaian = [
  { name: "Buket Mawar Merah", desc: "Rp 35.000,00" },
  { name: "Buket Putih", desc: "Rp 40.000,00 " },
  { name: "Buket Merah Muda", desc: "Rp 45.000,00"},
];

const bouquetSnack = [
  { name: "Snack Choco", desc: "Rp 30.000,00"},
  { name: "Snack Mix", desc: "Rp 35.000,00"},
  { name: "Snack Premium", desc: "Rp 40.000,00"},
];

const bouquetUang = [
  { name: "Boneka panda", desc: "Rp 30.000,00" },
  { name: "Boneka Wisuda", desc: "Rp 35.000,00"},
  { name: "Boneka Beruang", desc: "Rp 30.000,00" },
];

const customBuket = [
  { name: "Custom Elegan", desc: "Sesuai keinginanmu."},
  { name: "Custom Coklat", desc: "Manis dan romantis." },
  { name: "Custom Snack", desc: "Unik dan seru." },
];
</script>
