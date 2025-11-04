<script setup lang="ts">
import buttonBack from '@/components/buttonBack.vue';

</script>

<template>
  <div class="relative min-h-screen font-[Poppins]">

    <!-- Background Kanan Full -->
    <div class="hidden md:block absolute top-0 right-0 w-1/3 h-full bg-white z-0"></div>
    
    <!-- Konten Utama -->
    <div class="relative z-10 flex flex-col md:flex-row gap-6 p-4">

      <!-- Form Kiri -->
      <div class="md:w-2/3 bg-[#f1d1c2] p-6 shadow-md">
        
        <!-- Tombol kembali -->
        <div class="mb-4">
            <ButtonBack/>
        </div> 

        <h2 class="text-xl font-semibold mb-4">Contact Information</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
          <input type="email" placeholder="Email" class="input" />
          <input type="number" placeholder="Phone Number" class="input" />
          <input type="text" placeholder="First Name" class="input" />
          <input type="text" placeholder="Last Name" class="input" />
        </div>

        <h2 class="text-xl font-semibold mb-4">Alamat</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
          <input type="text" placeholder="Kota / Kecamatan" class="input" />
          <input type="number" placeholder="Kode Pos" class="input" />
          <input type="text" placeholder="Detail Alamat (jalan, no. rumah)" class="input md:col-span-2" />
        </div>

        <h2 class="text-xl font-semibold mb-4">Payment</h2>
        <div class="flex flex-col gap-2 mb-6">
          <label><input type="radio" name="bank" value="BRI" checked /> BRI</label>
          <label><input type="radio" name="bank" value="BCA" /> BCA</label>
          <label><input type="radio" name="bank" value="Mandiri" /> Mandiri</label>
        </div>

        <button class="font-2xl text-white px-6 py-2 rounded-xl bg-[#53776c] hover:bg-[#31463f] transition">
          Bayar Sekarang
        </button>
      </div>

      <!-- Rincian Kanan -->
      <div class="md:w-1/3 p-6 shadow-md bg-white">
        <h2 class="text-xl font-semibold mb-4">Rincian Custom</h2>
        <p class="flex justify-between text-base mb-6 border-t pt-4">
          Buket skripsi, ukuran sedang, dengan hiasan pita kecil warna pink digunakan untuk hadiah sempro,
          digunakan minggu depan, buketnya berunsur warna cream dan pink.
        </p>

        <div class="space-y-2 text-base">
          <div class="flex justify-between font-normal">
            <span>Uang Muka</span>
            <span>Rp 50.000</span>
          </div>
          <div class="flex justify-between font-normal">
            <span>Shipping</span>
            <span>Rp 10.000</span>
          </div>
          <div class="flex justify-between border-t pt-4 font-semibold">
            <span>Total</span>
            <span>Rp 60.000</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="postcss">
.input {
  @apply w-full px-4 py-2 mb-2 border border-[#000000] bg-[#ffffff] rounded-xl focus:outline-none;
}
</style>