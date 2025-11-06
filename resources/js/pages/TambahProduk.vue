<template>
  <div
    class="bg-[#F3D5C0] rounded-xl shadow-lg w-[550px] max-w-[90%] mx-auto p-8 relative z-60"
  >
    <!-- Tombol X -->
    <button @click="$emit('close')" class="absolute top-3 right-3 text-gray-600 hover:text-black text-xl">
      ×
    </button>

    <h2 class="text-lg font-semibold mb-6 border-b border-gray-300 pb-3">
      Tambah Produk
    </h2>

    <form @submit.prevent="submitForm" class="space-y-4">
      <!-- Nama -->
      <div class="flex items-center gap-6">
        <label class="w-24 text-right text-sm font-medium text-gray-800">Nama</label>
        <input
          v-model="produk.nama"
          type="text"
          class="flex-1 rounded-md p-2 border bg-white border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5B7263]"
        />
      </div>

      <!-- Jenis -->
      <div class="flex items-center gap-6">
        <label class="w-24 text-right text-sm font-medium text-gray-800">Jenis</label>
        <select
          v-model="produk.jenis"
          class="flex-1 rounded-md p-2 border bg-white border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5B7263]"
        >
          <option disabled value="">Pilih Jenis</option>
          <option>Buket Bunga</option>
          <option>Buket Snack</option>
          <option>Buket Boneka</option>
        </select>
      </div>

      <!-- Tema -->
      <div class="flex items-center gap-6">
        <label class="w-24 text-right text-sm font-medium text-gray-800">Tema</label>
        <select
          v-model="produk.tema"
          class="flex-1 rounded-md p-2 border bg-white border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5B7263]"
        >
          <option disabled value="">Pilih Tema</option>
          <option>Wedding</option>
          <option>Ulang Tahun</option>
          <option>Graduation</option>
        </select>
      </div>

      <!-- Size -->
      <div class="flex items-center gap-6">
        <label class="w-24 text-right text-sm font-medium text-gray-800">Size</label>
        <select
          v-model="produk.size"
          class="flex-1 rounded-md p-2 border bg-white border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5B7263]"
        >
          <option disabled value="">Pilih Size</option>
          <option>S</option>
          <option>M</option>
          <option>L</option>
        </select>
      </div>

      <!-- Harga -->
      <div class="flex items-center gap-6">
        <label class="w-24 text-right text-sm font-medium text-gray-800">Harga</label>
        <input
          v-model="produk.harga"
          type="number"
          placeholder="Contoh: 50000"
          class="flex-1 rounded-md p-2 border bg-white border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5B7263]"
        />
      </div>

      <!-- Deskripsi -->
      <div class="flex items-start gap-6">
        <label class="w-24 text-right text-sm font-medium text-gray-800 mt-2">Deskripsi</label>
        <textarea
          v-model="produk.deskripsi"
          rows="3"
          class="flex-1 rounded-md p-2 border bg-white border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5B7263]"
        ></textarea>
      </div>

      <!-- Foto -->
      <div class="flex items-center gap-6">
        <label class="w-24 text-right text-sm font-medium text-gray-800">Foto</label>
        <input
          type="file"
          @change="handleFile"
          class="flex-1 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-[#7D6962] file:text-white hover:file:bg-[#6d5c55]"
        />
      </div>

      <!-- Tombol -->
      <div class="flex justify-end mt-6">
        <button
          type="submit"
          class="bg-[#5B7263] text-white px-5 py-2 rounded-lg hover:bg-[#4a5e53] transition"
        >
          Submit
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref, defineEmits } from 'vue'
import { router } from '@inertiajs/vue3'

const emit = defineEmits(['save', 'close'])

const produk = ref({
  nama: '',
  jenis: '',
  tema: '',
  size: '',
  harga: '',
  deskripsi: '',
  foto: null,
})

const handleFile = (e) => {
  produk.value.foto = e.target.files[0]
}

const submitForm = () => {
  if (produk.value.nama && produk.value.harga) {
    emit('save', { ...produk.value })
    produk.value = {
      nama: '',
      jenis: '',
      tema: '',
      size: '',
      harga: '',
      deskripsi: '',
      foto: null,
    }
  }
}

const closeModal = () => {
  router.visit('/lihat', { preserveState: true })
}
</script>