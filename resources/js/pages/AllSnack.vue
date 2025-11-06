<template>
  <div class="flex min-h-screen bg-[#FBF5F1] font-poppins">
    <!-- Sidebar -->
    <Side />

    <!-- Konten utama -->
    <div class="flex-1 p-10 overflow-y-auto">
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
import Side from "@/components/Side.vue";

const products = [
  {
    name: "Buket mix Pink",
    price: "Rp 35.000",
    image: "/assets/bouquet-pink.jpg",
  },
  {
    name: "Buket Silverqueen",
    price: "Rp 35.000",
    image: "/assets/bouquet-tosca.jpg",
  },
  {
    name: "Buket Mix Pocky",
    price: "Rp 35.000",
    image: "/assets/bouquet-merah.jpg",
  },
  {
    name: "Buket Mix Black",
    price: "Rp 35.000",
    image: "/assets/bouquet-hitam.jpg",
  },
  {
    name: "Buket Mix Ungu",
    price: "Rp 35.000",
    image: "/assets/bouquet-putih.jpg",
  },
  {
    name: "Buket Serba Biru",
    price: "Rp 35.000",
    image: "/assets/bouquet-biru.jpg",
  },
];
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