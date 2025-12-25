<template>
    <div class="absolute top-0 left-0 w-full z-20">
        <Navbar />
    </div>
  <div class="min-h-screen bg-[#f4efe9]">
    
    <!-- Header Section -->
    <div class="bg-[#e3c6be] px-12 py-10">
      <h1 class="text-3xl font-semibold text-gray-800">Dashboard Admin</h1>
    </div>

    <!-- Cards Section -->
    <div class="grid grid-cols-4 gap-6 px-12 -mt-10">
      <div class="bg-[#eac5b7] p-6 shadow-md rounded-lg">
        <p class="text-gray-700">Total Income</p>
        <p class="text-2xl font-bold mt-3">Rp{{ totalIncome }}</p>
      </div>

      <div class="bg-[#eac5b7] p-6 shadow-md rounded-lg">
        <p class="text-gray-700">Total Order</p>
        <p class="text-2xl font-bold mt-3">230</p>
      </div>

      <div class="bg-[#eac5b7] p-6 shadow-md rounded-lg">
        <p class="text-gray-700">Total Sales</p>
        <p class="text-2xl font-bold mt-3">200</p>
      </div>

      <div class="bg-[#eac5b7] p-6 shadow-md rounded-lg">
        <p class="text-gray-700">Total Produk</p>
        <p class="text-2xl font-bold mt-3">30</p>
      </div>
    </div>

    <!-- Filter & Button -->
    <div class="flex justify-between items-center px-12 mt-10">
      <p class="bg-[#6c7c6b] text-white px-4 py-2 rounded-md text-sm">
        30 days : 06 Mei 25 - 06 Jun 25
      </p>

      <button 
      @click ="goToProduk"
      class="flex items-center gap-2 bg-[#6c7c6b] text-white px-5 py-2 rounded-md hover:bg-[#596a58] transition">
        <span>👁️</span> Lihat Produk
      </button>
    </div>

    <!-- Table -->
    <div class="px-12 mt-6">
      <table class="w-full border-collapse shadow-sm">
        <thead>
          <tr class="bg-[#4d6651] text-white text-left">
            <th class="py-3 px-4">Nama Customer</th>
            <th class="py-3 px-4">Nama Produk</th>
            <th class="py-3 px-4">Tanggal</th>
            <th class="py-3 px-4">Jenis Barang</th>
            <th class="py-3 px-4">Harga</th>
            <th class="py-3 px-4">Detail</th>
          </tr>
        </thead>

        <tbody>
          <tr  v-for="p in pesanans"
            :key="p.id"
            class="bg-white border-b">
            <td class="py-3 px-4">{{ p.nama }}</td>
            <td class="py-3 px-4">{{p.produks.map(produk => produk.nama).join(', ')}}</td>
            <td class="py-3 px-4">{{ p.tanggal_pesanan }}</td>
            <td class="py-3 px-4">Default</td>
            <td class="py-3 px-4">{{p.detail_pesanans.reduce((sum, d)=> sum + d.jumlah * d.subtotal, 0)}}</td>
            <td class="py-3 px-4">
               <button 
                  class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 text-sm"
                  @click="openDetail(p)"
              >
                  Detail
              </button>
              <span>

              </span>
            </td>
          </tr>

          <tr class="bg-white border-b h-12"></tr>
          <tr class="bg-white border-b h-12"></tr>
          <tr class="bg-white border-b h-12"></tr>
        </tbody>
      </table>
      <DetailPesanan 
          :pesanan="selected" 
          :show="showDialog" 
          @close="closeDialog" 
          @update-status="(s) => updateStatus(s.id, s.status)"
      />

    </div>

  </div>
</template>

<script setup>
import { ref, computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import { router } from '@inertiajs/vue3';
import Navbar from "@/components/Navbar.vue";
import DetailPesanan from "@/components/DetailPesanan.vue";

const props = usePage().props;

// Data pesanan dari controller
const pesanans = props.pesanans ?? [];

const selected = ref(null);
const showDialog = ref(false);

function openDetail(p) {
    selected.value = p;
    showDialog.value = true;
}

function closeDialog() {
    showDialog.value = false;
}

function updateStatus(id, status) {
    router.put(`/admin/pesanan/${id}/status`, { status });
}
// Total Harga Semua Pesanan
const totalIncome = computed(() =>
  pesanans.reduce((acc, p) => {
    return acc + p.detail_pesanans.reduce((sum, detail) => {
      return sum + detail.subtotal * detail.jumlah;
    }, 0);
  }, 0)
);

// Total jumlah item terjual
const totalItem = computed(() =>
  pesanans.reduce((acc, p) => {
    return (
      acc +
      p.produks.reduce((total, item) => total + item.pivot.jumlah, 0)
    );
  }, 0)
);

//
const processedPesanans = computed(() =>
  pesanans.map(p => ({
    ...p,
    totalHarga: p.detail_pesanans.reduce(
      (sum, detail) => sum + detail.subtotal * detail.jumlah,
      0
    )
  }))
);

const goToProduk = () => {
  router.visit('/produk')
};
</script>

<style scoped>
/* (Optional) Custom styling here if needed */
</style>