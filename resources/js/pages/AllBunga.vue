<template>
  <div class="flex min-h-screen bg-[#FBF5F1] font-poppins">
    <!-- Sidebar -->
    <Sidebar />

    <!-- Konten utama -->
    <div class="flex-1 p-10 overflow-y-auto">
      <!-- Judul -->
      <h1 class="text-4xl font-[Rochester]  text-gray-800 mb-10">
        All Product Buket Bunga
      </h1>

      <!-- Grid produk -->
      <div class="grid grid-cols-3 gap-10">
        <div
          v-for ="produk in props.produks" :key="produk.id"
          class="flex flex-col items-center text-center"
        >
                  <img
            v-if="produk.foto_url"
            :src="produk.foto_url"
            alt="Foto Produk"
            class="w-16 h-16 object-cover rounded-md border"
          />
          <h2 class="text-sm font-semibold text-gray-800">
            {{ produk.nama }}
          </h2>
          <p class="text-sm text-gray-600">{{ produk.harga }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Sidebar from "@/components/Sidebar.vue";

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

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&family=Playfair+Display:wght@600&display=swap");

.font-poppins {
  font-family: "Poppins", sans-serif;
}
.font-playfair {
  font-family: "Playfair Display", serif;
}
</style>
