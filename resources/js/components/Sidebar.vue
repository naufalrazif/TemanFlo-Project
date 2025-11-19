<template>
  <div class="min-h-screen w-64 bg-[#5E756F] text-white flex flex-col justify-between py-6 font-poppins">
    <!-- Bagian atas -->
    <div>
      <!-- Tombol back -->
      <div class="flex items-center justify-center mb-8">
        <ButtonBack @click="back" />
      </div>

      <!-- Judul -->
      <h2 class="text-center font-[Rochester] text-3xl font-playfair mb-6">Jenis Buket</h2>

      <!-- Menu utama -->
      <ul class="flex flex-col space-y-2 px-4">
        <li>
          <button 
          @click="router.visit('/allbunga')"
          class="w-full text-left px-4 py-2 rounded-md hover:bg-[#8A6E68]">
            Buket Bunga
          </button>
        </li>

        <li>
          <button
            @click="router.visit('/allsnack')"
            class="w-full text-left px-4 py-2 rounded-md hover:bg-[#8A6E68]">
            Buket Snack
          </button>
        </li>

        <li>
          <button 
          @click="router.visit('/allboneka')"
          class="w-full text-left px-4 py-2 rounded-md hover:bg-[#8A6E68]">
            Buket Boneka
          </button>
        </li>

        <li>
          <button 
          @click="router.visit('/allcustom')"
          class="w-full text-left px-4 py-2 rounded-md hover:bg-[#8A6E68]">
            Custom Buket
          </button>
        </li>
      </ul>
    </div>

    <!-- Bagian bawah -->
    <div class="px-4 space-y-2 text-sm">
      <p class="hover:underline cursor-pointer">About Us</p>
      <p class="hover:underline cursor-pointer">Guide</p>
      <p class="hover:underline cursor-pointer">Term & Condition</p>
    </div>
  </div>
</template>

<script setup>
import ButtonBack from "@/components/ButtonBack.vue";
import { router } from "@inertiajs/vue3";
</script>
