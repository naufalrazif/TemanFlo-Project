<template>
  <AppLayout>
    <div class="min-h-screen bg-[#F9F4F1] font-[Poppins]">
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
                <th class="py-3 px-4 text-left font-semibold">Nama</th>
                <th class="py-3 px-4 text-left font-semibold">Jenis</th>
                <th class="py-3 px-4 text-left font-semibold">Tema</th>
                <th class="py-3 px-4 text-left font-semibold">Size</th>
                <th class="py-3 px-4 text-left font-semibold">Harga</th>
                <th class="py-3 px-4 text-left font-semibold">Edit</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(item, index) in products"
                :key="index"
                class="border-b border-gray-200 hover:bg-gray-50"
              >
                <td class="py-3 px-4">{{ item.nama }}</td>
                <td class="py-3 px-4">{{ item.jenis }}</td>
                <td class="py-3 px-4">{{ item.tema }}</td>
                <td class="py-3 px-4">{{ item.size }}</td>
                <td class="py-3 px-4">{{ item.harga }}</td>
                <td class="py-3 px-4">
                 <div class="flex items-center gap-3">
                    <!-- Tombol Edit -->
                    <button
                      @click="editProduk(item)"
                      class="flex items-center gap-1 text-[#4B5E55] hover:text-[#2f3e36] font-semibold transition"
                    >
                      <i class="fa-solid fa-pen-to-square"></i>
                      Edit
                    </button>

                    <!-- Tombol Hapus -->
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
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/layouts/AppLayout.vue'
import DropdownSort from '@/components/Dropdown.vue'
import ButtonBack from '@/components/buttonBack.vue'
import EditProduk from '@/pages/Edit.vue' // <-- tambahkan ini
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const products = ref([
{ nama: 'Buket Mawar', jenis: 'Fresh Flower', tema: 'Romantis', size: 'Medium', harga: '150.000' }
])

const openTambahProduk = () => {
  router.visit('/tambah-produk', {
    preserveState: true, 
  })
}

const handleSort = (value) => {
  console.log('Urut berdasarkan:', value)
}

const editProduk = (item) => {
  // kirim data produk yang mau diedit ke halaman edit-produk
  router.visit('/edit-produk', {
    preserveState: true,
    data: item, 
  })
}

const hapusProduk = (item) => {
  if (confirm(`Yakin ingin menghapus produk "${item.nama}"?`)) {
    products.value = products.value.filter(p => p !== item)
  }
}

//const modal = computed(() => page.props.modal)
</script>

<style scoped>
@import "@fortawesome/fontawesome-free/css/all.min.css";
</style>
