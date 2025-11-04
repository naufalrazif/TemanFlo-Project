<template>
  <div class="font-[Poppins] bg-[#fff8f6] text-[#3a3a3a]">
    <!-- Hero Section -->
    <section
      class="relative bg-cover bg-center h-[650px] flex flex-col justify-center items-center text-white"
      :style="{ backgroundImage: `url(${bgHome})` }"
    >
      <<div class="absolute inset-0 bg-black bg-opacity-30"></div>
      <div class="relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-[Rochester] font-bold mb-7">Welcome to Ratu Florist</h1>
        <p class="text-lg md:text-xl font-light">Wujudkan setiap moment istimewa dengan rangkaian bunga indah penuh makna.</p>
        <p class="text-lg md:text-xl font-bold">Pesan sekarang dan kirimkan kebahagiaan untuk orang tersayang!</p>
      </div>
    </section>

    <!-- Bouquet Category Section -->
    <section class="py-16 bg-[#fce1d7] h-[720px] text-center">
      <h2 class="text-3xl font-[Rochester] font-semibold mb-8">Buket Bunga</h2>
      <p class="text-xl font-light px-5 mb-5">
        Keindahan sejati ada pada detail. Kami menghadirkan rangkaian buket bunga dengan sentuhan seni dan keanggunan alami, 
        dirancang untuk memperindah setiap perayaan hidupmu. Baik untuk hadiah ulang tahun, ucapan terima kasih, maupun perayaan istimewa.
      </p>

      <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto px-6">
        <!-- filter sesuai jenis_buket -->
        <div
          v-for="(item, index) in produks.filter(p => p.jenis_buket === 'buket_bunga')"
          :key="item.id"
          class="bg-white rounded-xl shadow-md hover:shadow-lg p-4"
        >
          <!-- pastikan foto_url ada di controller/model -->
          <img
            :src="item.foto_url"
            alt="buket"
            class="rounded-md w-full h-56 object-cover mb-4"
          />
          <h3 class="text-lg font-bold mb-2">{{ item.nama }}</h3>
          <p class="text-sm text-gray-600 mb-3">Rp {{ item.harga.toLocaleString('id-ID') }}</p>
        </div>
      </div>

      <!-- Tombol Reusable -->
    <div class="w-full flex justify-center mt-15">
      <ButtonLihatSemua @click="lihatSemuaProduk" />
      </div>
    </section>

    <!-- Buket Snack -->
    <section class="py-16 h-[720px] bg-white text-center">
      <h2 class="text-3xl font-[Rochester] font-semibold mb-8">Buket Snack</h2>
      <p class="text-xl font-light px-5 mb-5">Ratu Florist menghadirkan inovasi unik dalam bentuk buket snack, kombinasi sempurna antara kelezatan dan keindahan. Dengan desain kreatif dan bahan premium, setiap buket kami siap menjadikan setiap momen istimewa terasa lebih berwarna dan berkesan.</p>
      <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto px-6">
        <div
          v-for="(item, index) in produks.filter(p => p.jenis_buket === 'buket_snack')"
          :key="item.id"
          class="bg-white rounded-xl shadow-md hover:shadow-lg p-4"
        >
          <!-- pastikan foto_url ada di controller/model -->
          <img
            :src="item.foto_url"
            alt="buket"
            class="rounded-md w-full h-56 object-cover mb-4"
          />
          <h3 class="text-lg font-bold mb-2">{{ item.nama }}</h3>
          <p class="text-sm text-gray-600 mb-3">Rp {{ item.harga.toLocaleString('id-ID') }}</p>
        </div>
      </div>
      <!-- Tombol Reusable -->
    <div class="w-full flex justify-center mt-15">
      <ButtonLihatSemua @click="lihatSemuaProduk" />
      </div>
    </section>

    <!-- Buket Uang -->
    <section class="py-16 bg-[#fce1d7] h-[720px] text-center">
      <h2 class="text-3xl font-[Rochester] font-semibold mb-8">Buket Boneka</h2>
      <p class="text-xl font-light px-5 mb-5">Buket boneka bukan sekadar hadiah, tapi bentuk perhatian yang lembut dan penuh kasih. Setiap boneka kecil di dalamnya membawa pesan kehangatan, rasa sayang, dan kebahagiaan yang tulus. Kami merangkainya dengan cinta, agar setiap orang yang menerimanya bisa merasakan keindahan dan ketulusan dari hati ke hati.</p>
      <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto px-6">
        <div
          v-for="(item, index) in produks.filter(p => p.jenis_buket === 'buket_boneka')"
          :key="item.id"
          class="bg-white rounded-xl shadow-md hover:shadow-lg p-4"
        >
          <!-- pastikan foto_url ada di controller/model -->
          <img
            :src="item.foto_url"
            alt="buket"
            class="rounded-md w-full h-56 object-cover mb-4"
          />
          <h3 class="text-lg font-bold mb-2">{{ item.nama }}</h3>
          <p class="text-sm text-gray-600 mb-3">Rp {{ item.harga.toLocaleString('id-ID') }}</p>
        </div>
      </div>
      <!-- Tombol Reusable -->
    <div class="w-full flex justify-center mt-15">
      <ButtonLihatSemua @click="lihatSemuaProduk" />
      </div>
    </section>

    <!-- Custom Buket -->
    <section class="py-16 bg-white h-[700px] text-center">
      <h2 class="text-3xl font-[Rochester] font-semibold mb-8">Custom Buket</h2>
      <p class="text-xl font-light px-5 mb-5">Layanan custom bouquet kami memberi kamu kebebasan penuh untuk membuat rangkaian bunga sesuai keinginan dan momen spesialmu. Pilih sendiri jenis bunga, warna, hingga gaya wrapping yang kamu suka dan biarkan tim kami merangkainya dengan sepenuh hati.</p>
      <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto px-6">
        <div
          v-for="(item, index) in customBuket"
          :key="index"
          class="bg-[#fefefe] rounded-xl shadow-md hover:shadow-lg p-4"
        >
          <img
          :src="item.foto_url"
          alt="buket"
          class="rounded-md w-full h-56 object-cover mb-4"
        />
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
</template>

<script setup lang="ts">
import bgHome from "@/assets/bgHome.jpg";
import ButtonLihatSemua from "@/components/buttonLihatSemua.vue";

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

const props = defineProps({
  produks: Array as () => Produk[]
})

</script>
