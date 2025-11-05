<script setup lang="ts">
import buttonBack from "./components/buttonBack.vue";

// Import gambar
import bucket from "@/assets/bucket.jpg";
import bucket1 from "@/assets/bucket1.jpg";
import bucket2 from "@/assets/bucket2.jpg";

// Biar di template bisa dipakai
const bunga = bucket;
const bunga1 = bucket1;
const bunga2 = bucket2;
</script>

<template>
  <div class="min-h-screen font-[Poppins] flex flex-col md:flex-row bg-white">

    <!-- KIRI - FORM -->
    <div class="w-full md:w1/2 bg-[#e6bbaa] p-8 relative">

      <buttonBack class="mb-6" />

      <h2 class="text-lg font-semibold mb-2">Contact Information</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-6">
        <input type="email" placeholder="email" class="input" />
        <input type="number" placeholder="phone number" class="input" />
        <input type="text" placeholder="first name" class="input" />
        <input type="text" placeholder="last name" class="input" />
      </div>

      <h2 class="text-lg font-semibold mb-2">Alamat</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-6">
        <input type="text" placeholder="Kota / Kecamatan" class="input" />
        <input type="text" placeholder="Kode Pos" class="input" />
        <input type="text" placeholder="Detail Alamat (jalan, no. rumah)" class="input md:col-span-2" />
      </div>

      <h2 class="text-lg font-semibold mb-2">Payment</h2>
      <div class="flex flex-col bg-white border border-black rounded-xl overflow-hidden">
        <label class="payment-option">
          <input type="radio" name="bank" checked /> BRI
        </label>
        <label class="payment-option border-t border-black">
          <input type="radio" name="bank" /> BCA
        </label>
        <label class="payment-option border-t border-black">
          <input type="radio" name="bank" /> Mandiri
        </label>
      </div>

      <button class="w-full mt-8 text-white py-3 rounded-xl bg-[#53776c] hover:bg-[#31463f] transition">
        Bayar Sekarang
      </button>

    </div>

    <!-- KANAN - RINCIAN -->
    <div class="w-full md:w2/2 bg-white p-8 border-l border-black flex flex-col">

      <table class="w-full text-sm mb-6">
        <thead class="border-b border-black pb-2">
          <tr class="text-left">
            <th>Produk</th>
            <th class="text-right">Jumlah</th>
          </tr>
        </thead>
      </table>

      <div class="space-y-4 mb-6">
        <!-- ITEM 1 -->
        <div class="flex justify-between items-center">
          <div class="flex items-center gap-3">
            <img :src="bunga" class="w-16 h-16 rounded-md object-cover" />
            <div>
              <p>Buket Bunga</p>
              <p class="text-sm text-gray-600">RP. 70.000</p>
            </div>
          </div>
          <span>1</span>
        </div>

        <!-- ITEM 2 -->
        <div class="flex justify-between items-center">
          <div class="flex items-center gap-3">
            <img :src="bunga1" class="w-16 h-16 rounded-md object-cover" />
            <div>
              <p>Buket Bunga</p>
              <p class="text-sm text-gray-600">RP. 70.000</p>
            </div>
          </div>
          <span>1</span>
        </div>

        <!-- ITEM 3 -->
        <div class="flex justify-between items-center">
          <div class="flex items-center gap-3">
            <img :src="bunga2" class="w-16 h-16 rounded-md object-cover" />
            <div>
              <p>Buket Bunga</p>
              <p class="text-sm text-gray-600">RP. 70.000</p>
            </div>
          </div>
          <span>1</span>
        </div>
      </div>

      <div class="mt-auto space-y-1 text-base">
        <div class="flex justify-between">
          <span>Sub Total : 3 Item</span>
          <span>Rp 210.000</span>
        </div>
        <div class="flex justify-between">
          <span>Shipping</span>
          <span>Rp 10.000</span>
        </div>
        <div class="flex justify-between font-semibold border-t pt-4">
          <span>Total</span>
          <span>Rp 230.000</span>
        </div>
      </div>

    </div>

  </div>
</template>

<style scoped lang="postcss">
.input {
  @apply w-full px-4 py-2 border border-black bg-white rounded-xl focus:outline-none;
}

.payment-option {
  @apply flex items-center gap-2 px-4 py-3 text-base cursor-pointer;
}
</style>
