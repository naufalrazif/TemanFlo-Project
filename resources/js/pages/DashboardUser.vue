<template>
    <div class="absolute top-0 left-0 w-full z-20">
        <Navbar />
    </div>
  <div class="min-h-screen bg-[#f4efe9]">
    
    <!-- Header Section -->
    <div class="bg-[#e3c6be] px-12 py-10">
      <h1 class="text-3xl font-semibold text-gray-800">Dashboard User</h1>
    </div>

    <!-- Cards Section -->
    

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
            <th class="py-3 px-4">Status</th>
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
              <span class="bg-yellow-200 text-yellow-800 px-3 py-1 rounded-md text-sm">
                {{ p.status }}
              </span>
              <span>

              </span>
            </td>
          </tr>

          <tr class="bg-white border-b h-12"></tr>
          <tr class="bg-white border-b h-12"></tr>
          <tr class="bg-white border-b h-12"></tr>
        </tbody>
      </table>
    </div>

  </div>
</template>

<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import { router } from '@inertiajs/vue3';
import Navbar from "@/components/Navbar.vue";

const props = usePage().props;

// Data pesanan dari controller
const pesanans = props.pesanans ?? [];

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