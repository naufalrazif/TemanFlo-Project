<template>
  <div class="flex min-h-screen bg-[#FBF5F1] font-poppins">
    <!-- Sidebar -->
    <Sidebar />

    <!-- Konten utama -->
    <div class="flex-1 ml-64 p-10 overflow-y-auto">
      <!-- Judul -->
      <h1 class="text-4xl font-[Rochester]  text-gray-800 mb-10">
        All Product Buket Snack
      </h1>

      <!-- Grid produk -->
      <div class="grid grid-cols-3 gap-10">
        <div
          v-for="(product, index) in products"
          :key="index"
          class="flex flex-col items-center text-center"
        >
          <img
            :src="product.image"
            alt="buket"
            class="w-56 h-64 object-cover rounded-xl shadow-md mb-3 transition-transform duration-300 hover:scale-105 hover:shadow-xl"
          />
          <h2 class="text-sm font-semibold text-gray-800">
            {{ product.name }}
          </h2>
          <p class="text-sm text-gray-600">{{ product.price }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import Sidebar from "@/components/Sidebar.vue";

import { usePage } from '@inertiajs/vue3';

// Ambil data dari controller lewat props
const { props } = usePage();
const products = props.products; 
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