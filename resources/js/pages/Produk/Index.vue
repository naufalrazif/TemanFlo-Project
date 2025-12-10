//index
<script setup lang="ts">
import Create from './Create.vue';
import Edit from './Edit.vue';
import { router } from '@inertiajs/vue3';
import { Button } from "@/components/ui/button";
import ButtonBack from '@/components/ButtonBack.vue';
import DropdownSort from '@/components/Dropdown.vue';
import Navbar from "@/components/Navbar.vue";
import { Dialog, DialogTrigger, DialogContent } from '@/components/ui/dialog';
import { ref } from 'vue';

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
});

const handleDelete = (id: number) => {
  if (confirm('Apakah anda yakin untuk menghapus produk ini?')) {
    router.delete(`/produk/${id}`);
  }
};

const back = () => {
  window.history.back();
};

// --- Control dialog edit ---
const editDialogOpen = ref(false);
const currentProduk = ref<Produk | null>(null);

const openEditDialog = (produk: Produk) => {
  currentProduk.value = produk;
  editDialogOpen.value = true;
};

const closeEditDialog = () => {
  editDialogOpen.value = false;
  currentProduk.value = null;
};
</script>

<template>
  <div class="min-h-screen bg-[#F9F4F1] font-[Poppins]">
    <!-- Header Section -->
    <div class="bg-[#F9F4F1] h-[50px] px-10 py-8 flex justify-between items-start">
      <Navbar />
      <div class="flex items-center justify-center mb-8">
        <ButtonBack @click="back" />
      </div>
      <DropdownSort />
    </div>

    <!-- ✅ Section Dashboard - Diperbaiki: Judul dan tombol sejajar, ditambah dropdown tanggal -->
    <div class="px-10 py-6">
      <div class="flex justify-between items-center mb-6">
        <!-- Judul Dashboard Admin -->
        <h1 class="text-2xl font-semibold text-gray-900">Dashboard Admin</h1>

        <!-- Group Tombol Tambah Produk dan Dropdown Tanggal -->
        <div class="flex items-center gap-4">
          <!-- Dropdown Tanggal -->
          <select class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#5B7263]">
            <option value="">Semua Tanggal</option>
            <option value="today">Hari Ini</option>
            <option value="this_week">Minggu Ini</option>
            <option value="this_month">Bulan Ini</option>
            <option value="last_month">Bulan Lalu</option>
          </select>

          <!-- Tombol Tambah Produk -->
          <Dialog>
            <DialogTrigger>
              <Button class="flex items-center gap-2 bg-[#5B7263] text-white font-medium px-4 py-2 rounded-md hover:bg-[#4d6155] transition">
                Tambah Produk
              </Button>
            </DialogTrigger>
            <DialogContent class="bg-[#f3cbb7] p-6 rounded-xl border-none max-w-2xl">
              <Create />
            </DialogContent>
          </Dialog>
        </div>
      </div>

      <!-- Table Section - Diperbaiki: Garis hitam di semua sel -->
      <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300">
          <thead>
            <tr class="bg-[#5B7263] text-white">
              <th class="py-3 px-4 text-left font-semibold border-r border-gray-400">Nama</th>
              <th class="py-3 px-4 text-left font-semibold border-r border-gray-400">Jenis Produk</th>
              <th class="py-3 px-4 text-left font-semibold border-r border-gray-400">Tema</th>
              <th class="py-3 px-4 text-left font-semibold border-r border-gray-400">Harga</th>
              <th class="py-3 px-4 text-left font-semibold border-r border-gray-400">Foto</th>
              <th class="py-3 px-4 text-left font-semibold">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="produk in props.produks"
              :key="produk.id"
              class="border-b border-gray-300 hover:bg-gray-50"
            >
              <td class="py-3 px-4 border-r border-gray-300">{{ produk.nama }}</td>
              <td class="py-3 px-4 border-r border-gray-300">{{ produk.jenis_buket }}</td>
              <td class="py-3 px-4 border-r border-gray-300">{{ produk.tema }}</td>
              <td class="py-3 px-4 border-r border-gray-300">Rp {{ Number(produk.harga).toLocaleString('id-ID') }}</td>
              <td class="py-3 px-4 border-r border-gray-300">
                <img
                  v-if="produk.foto_url"
                  :src="produk.foto_url"
                  alt="Foto Produk"
                  class="w-16 h-16 object-cover rounded-md"
                />
              </td>
              <td class="py-3 px-4">
                <div class="flex items-center gap-3">
                  <Button
                    class="bg-blue-600 hover:bg-blue-700 text-white"
                    @click="openEditDialog(produk)"
                  >
                    Edit
                  </Button>

                  <Button 
                    class="bg-red-600 hover:bg-red-700 text-white"
                    @click="handleDelete(produk.id)"
                  >
                    Hapus 
                  </Button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Modal Edit -->
    <div v-if="editDialogOpen" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
      <Edit
        v-if="currentProduk"
        :key="currentProduk.id"
        :produk="currentProduk"
        @close="closeEditDialog"
      />
    </div>
  </div>
</template>