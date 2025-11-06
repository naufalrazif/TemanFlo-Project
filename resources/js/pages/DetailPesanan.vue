<template>
  <div class="fixed inset-0 bg-black/30 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-xl w-full max-w-2xl p-6 relative">

      <!-- Header -->
      <h1 class="text-[22px] font-semibold">Detail Pesanan</h1>
      <hr class="my-4 border-gray-300" />

      <!-- Content -->
      <div class="text-sm space-y-3 leading-relaxed">

        <div class="flex text-sm">
          <p class="w-32 text-gray-700">Customer</p>
          <p class="flex-1 text-gray-900">: Citra Tri Setyaningrum</p>
        </div>

        <div class="flex text-sm">
          <p class="w-32 text-gray-700">Email</p>
          <p class="flex-1 text-gray-900">: axcbdsndyth@gmail.com</p>
        </div>

        <div class="flex text-sm">
          <p class="w-32 text-gray-700">No.telp</p>
          <p class="flex-1 text-gray-900">: 0889090088776</p>
        </div>

        <div class="flex text-sm">
          <p class="w-32 text-gray-700">Produk</p>
          <p class="flex-1 text-gray-900">: Buket Mawar</p>
        </div>

        <div class="flex text-sm">
          <p class="w-32 text-gray-700">Tanggal Pesanan</p>
          <p class="flex-1 text-gray-900">: 5 Oktober 2025</p>
        </div>

        <div class="flex text-sm">
          <p class="w-32 text-gray-700">Jenis Barang</p>
          <p class="flex-1 text-gray-900">: default</p>
        </div>

        <div class="flex text-sm">
          <p class="w-32 text-gray-700">Size</p>
          <p class="flex-1 text-gray-900">: sedang</p>
        </div>

        <div class="flex text-sm">
          <p class="w-32 text-gray-700">Tema</p>
          <p class="flex-1 text-gray-900">: Birthday</p>
        </div>

        <!-- Deskripsi -->
        <div class="flex items-start">
          <p class="w-32 text-gray-700">Deskripsi</p>
          <p class="flex-1 text-gray-900">
            : Lorem ipsum dolor sit amet consectetur. Ac libero faucibus nisi dignissim vel nibh imperdiet in at.
            Odio porttitor ac tincidunt felis. Tempus libero tellus vitae vulputate mauris pellentesque elit.
          </p>
        </div>

        <!-- Status -->
        <div class="flex items-center">
          <p class="w-32 text-gray-700">Status</p>
          <select v-model="status"
            class="border border-gray-400 rounded-md px-3 py-1 w-36 text-sm appearance-none focus:ring-gray-400 focus:border-gray-400 bg-white">
            <option>Pending</option>
            <option>Diproses</option>
            <option>Selesai</option>
            <option>Dibatalkan</option>
          </select>
        </div>
      </div>

      <!-- Button -->
      <div class="flex justify-end mt-8">
        <button
          @click="submit"
          class="bg-[#5B6F63] hover:bg-[#4a5b53] text-white px-10 py-2 rounded-md transition">
          Selesai
        </button>
      </div>

      <!-- Close -->
      <button @click="close"
        class="absolute top-5 right-5 text-2xl text-gray-700 hover:text-black">
        ×
      </button>

    </div>
  </div>
</template>


<script setup>
import { ref, defineComponent } from "vue";

const status = ref("Pending");

const submit = () => {
  alert("Status pesanan: " + status.value);
};

const close = () => {
  console.log("Closed modal");
};

// Komponen baris detail
const DetailRow = defineComponent({
  props: { label: String, value: String },
  template: `
    <div class="flex items-start text-sm">
      <p class="w-32 text-gray-700">{{ label }}</p>
      <p class="flex-1 text-gray-900">: {{ value }}</p>
    </div>
  `
});
</script>