<template>
  <AppLayout>
    <!-- Background utama -->
    <div
      class="min-h-screen bg-[#F9F4F1] font-[Poppins] transition-all duration-300"
      :class="{ 'blur-sm': modal !== null }"
    >
      <!-- Header Section -->
      <div class="bg-[#E6C7C0] h-[150px] px-10 py-8 flex justify-between items-start">
        <div class="flex items-center justify-center mb-8">
          <ButtonBack @click="back" />
        </div>

        <h1 class="text-2xl font-semibold text-gray-900 flex-1 ml-6">
          Dashboard Admin
        </h1>

        <DropdownSort @select="handleSort" />
      </div>

      <!-- Action Button -->
      <div class="px-10 py-6">
        <button
          @click="openTambahProduk"
          class="flex items-center gap-2 bg-[#5B7263] text-white font-medium px-4 py-2 rounded-md hover:bg-[#4d6155] transition"
        >
          <i class="fa-solid fa-plus"></i>
          Tambah Produk
        </button>
      </div>

      <!-- Table Section -->
      <div class="px-10">
        <div class="overflow-x-auto">
          <table class="min-w-full border-collapse border border-gray-200">
            <thead>
              <tr class="bg-[#5B7263] text-white">
                <th class="py-3 px-4 text-left font-semibold">Foto</th>
                <th class="py-3 px-4 text-left font-semibold">Nama</th>
                <th class="py-3 px-4 text-left font-semibold">Jenis</th>
                <th class="py-3 px-4 text-left font-semibold">Tema</th>
                <th class="py-3 px-4 text-left font-semibold">Harga</th>
                <th class="py-3 px-4 text-left font-semibold">Edit</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(item, index) in products"
                :key="index"
                class="border bg-gray-50"
              >
                <td class="py-3 px-4">
                <img :src="item.foto_url" class="w-16" /></td>
                <td class="py-3 px-4">{{ item.nama }}</td>
                <td class="py-3 px-4">{{ item.jenis_buket }}</td>
                <td class="py-3 px-4">{{ item.tema }}</td>
                <td class="py-3 px-4">{{ item.harga }}</td>
                <td class="py-3 px-4">
                  <div class="flex items-center gap-3">
                    <button
                      @click="openEditProduk(item)"
                      class="flex items-center gap-1 text-[#4B5E55] hover:text-[#2f3e36] font-semibold transition"
                    >
                      <i class="fa-solid fa-pen-to-square"></i>
                      Edit
                    </button>
                    <button
                      @click="hapusProduk(item)"
                      class="flex items-center gap-1 text-red-500 hover:text-red-700 font-semibold transition"
                    >
                      <i class="fa-solid fa-trash"></i>
                      Hapus
                    </button>

                  </div>
                </td>
              </tr>
              <tr v-if="products.length === 0">
                <td colspan="6" class="text-center text-gray-500 py-6">
                  Belum ada produk ditambahkan.
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        </div>
      </div>

    <!-- Modal Tambah Produk -->
    <div
      v-if="modal === 'TambahProduk'"
      class="fixed inset-0 z-[9999] flex items-center justify-center"
    >
      <!-- lapisan hitam transparan -->
      <div
        class="absolute inset-0 bg-black/40"
        @click="closeModal"
      ></div>

      <!-- konten modal -->
      <div class="relative z-50">
        <TambahProduk @close="closeModal" />
      </div>
    </div>

    <!-- Modal Edit Produk -->
    <div
      v-if="modal === 'EditProduk'"
      class="fixed inset-0 z-[9999] flex items-center justify-center"
    >
      <!-- lapisan hitam transparan -->
      <div
        class="absolute inset-0 bg-black/40"
        @click="closeModal"
      ></div>

      <!-- konten modal -->
      <div class="relative z-50">
        <Edit @close="closeModal" :product="selectedProduct" />
      </div>
    </div>

    <!-- Modal Hapus Produk -->
<div
  v-if="modal === 'HapusProduk'"
  class="fixed inset-0 z-[9999] flex items-center justify-center"
>
  <!-- backdrop -->
  <div
    class="absolute inset-0 bg-black/40"
    @click="closeModal"
  ></div>

  <!-- konten modal -->
  <div class="relative z-50 bg-white p-6 rounded-xl shadow-xl w-[350px]">
    <h2 class="text-lg font-bold mb-4 text-red-600">Hapus Produk</h2>

    <p class="text-gray-700">
      Yakin ingin menghapus produk
      <b>{{ selectedProduct?.nama }}</b> ?
    </p>

    <div class="flex justify-end gap-3 mt-6">
      <button
        @click="closeModal"
        class="px-4 py-2 bg-gray-300 rounded-md"
      >
        Batal
      </button>

      <button
        @click="konfirmasiHapus"
        class="px-4 py-2 bg-red-600 text-white rounded-md"
      >
        Hapus
      </button>
    </div>
  </div>
</div>

  </AppLayout>
</template>

<script setup>
import AppLayout from '@/layouts/AppLayout.vue'
import DropdownSort from '@/components/Dropdown.vue'
import ButtonBack from '@/components/buttonBack.vue'
import TambahProduk from '@/pages/TambahProduk.vue'
import Edit from '@/pages/Edit.vue'
import { router } from '@inertiajs/vue3'

import { ref } from 'vue'

const modal = ref(null)
const selectedProduct = ref(null)

const props = defineProps({
  produks: Array, // ← DATA DARI LARAVEL
})

const products = ref(props.produks) // ← TAMPILKAN DI TABEL

const openTambahProduk = () => {
  modal.value = 'TambahProduk'
}

const openEditProduk = (item) => {
  selectedProduct.value = item
  modal.value = 'EditProduk'
}

const closeModal = () => {
  modal.value = null
}

const handleSort = (value) => {
  console.log('Urut berdasarkan:', value)
}

const hapusProduk = (item) => {
  selectedProduct.value = item
  modal.value = 'HapusProduk'
}

const konfirmasiHapus = () => {
  router.delete(`/produk/${selectedProduct.value.id}`, {
    onSuccess: () => {
      // update UI tanpa reload halaman penuh
      products.value = products.value.filter(
        (p) => p.id !== selectedProduct.value.id
      )
      closeModal()
    },
    onError: () => {
      alert('Gagal menghapus produk.')
    }
  })
}
</script>

<style scoped>
@import "@fortawesome/fontawesome-free/css/all.min.css";
</style>
