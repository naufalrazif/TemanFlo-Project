<template>
  <div class="min-h-screen bg-[#f4efe9]">
    
    <!-- Header Section -->
    <div class="bg-[#e3c6be] px-12 py-10">
      <h1 class="text-3xl font-semibold text-gray-800">Dashboard Admin</h1>
    </div>

    <!-- Cards Section -->
    <div class="grid grid-cols-4 gap-6 px-12 -mt-10">
      <div class="bg-[#eac5b7] p-6 shadow-md rounded-lg">
        <p class="text-gray-700">Total Income</p>
        <p class="text-2xl font-bold mt-3">Rp1.000.000,00</p>
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

      <button class="flex items-center gap-2 bg-[#6c7c6b] text-white px-5 py-2 rounded-md hover:bg-[#596a58] transition">
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
            <th class="py-3 px-4">Status</th>
          </tr>
        </thead>

        <tbody>
          <tr class="bg-white border-b">
            <td class="py-3 px-4">Budi</td>
            <td class="py-3 px-4">Buket Bunga</td>
            <td class="py-3 px-4">08 Oktober 2025</td>
            <td class="py-3 px-4">Default</td>
            <td class="py-3 px-4">45.000</td>
            <td class="py-3 px-4">
              <span class="bg-yellow-200 text-yellow-800 px-3 py-1 rounded-md text-sm">
                Pending
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
// Data nanti bisa dihubungkan API / props
</script>

<style scoped>
/* (Optional) Custom styling here if needed */
</style>