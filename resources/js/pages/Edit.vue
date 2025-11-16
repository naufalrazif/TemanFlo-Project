<template>
  <div
    class="bg-[#F3D5C0] rounded-xl shadow-lg w-[550px] max-w-[90%] mx-auto p-8 relative z-60"
  >
    <!-- Tombol X -->
    <button
      @click="$emit('close')"
      class="absolute top-5 right-6 text-black text-2xl font-light hover:text-gray-700"
    >
      ×
    </button>

    <h2 class="text-lg font-semibold mb-6 border-b border-gray-300 pb-3">
      Edit Produk
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
         <option value="buket_bunga">Buket Bunga</option>
          <option value="buket_snack">Buket Snack</option>
          <option value="buket_boneka">Buket Boneka</option>
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
          <option value="wedding">Wedding</option>
          <option value="birthday">Ulang Tahun</option>
          <option value="graduation">Graduation</option>
        </select>
      </div>

      <!-- Size -->
      <!-- <div class="flex items-center gap-6">
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
      </div> -->

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
      <div class="flex justify-end mt-6 gap-3">
        <button
          type="button"
          @click="$emit('close')"
          class="bg-white text-gray-800 border border-gray-300 px-5 py-2 rounded-lg hover:bg-gray-100 transition"
        >
          Batal
        </button>

        <button
          type="submit"
          class="bg-[#5B7263] text-white px-5 py-2 rounded-lg hover:bg-[#4a5e53] transition"
        >
          Edit
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref, defineEmits } from 'vue'
import { router } from '@inertiajs/vue3'

const emit = defineEmits(['save', 'close'])

const props = defineProps({
  product: {
    type: Object,
    default: () => ({}),
  },
})


const produk = ref({
  id: props.product.id ?? null,
  nama: props.product.nama ?? '',
  jenis: props.product.jenis_buket ?? '',
  tema: props.product.tema ?? '',
  harga: props.product.harga ?? '',
  deskripsi: props.product.deskripsi ?? '',
  foto: null,
})



const handleFile = (e) => {
  produk.value.foto = e.target.files[0]
}

const submitForm = () => {
  const formData = new FormData()
  formData.append('nama', produk.value.nama)
  formData.append('jenis_buket', produk.value.jenis)
  formData.append('tema', produk.value.tema)
  formData.append('harga', produk.value.harga)
  formData.append('deskripsi', produk.value.deskripsi)

  if (produk.value.foto) {
    formData.append('foto', produk.value.foto)
  }

  if (produk.value.id) {
    // EDIT MODE
    router.put(`/produk/${produk.value.id}`, formData)
  } else {
    // CREATE MODE
    router.post('/produk', formData)
  }

  emit('close')
}



const closeModal = () => {
  router.visit('/lihat', { preserveState: true })
}
</script>
