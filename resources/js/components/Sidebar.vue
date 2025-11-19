<template>
  <div class="fixed top-0 left-0 min-h-screen w-64 bg-[#5E756F] text-white flex flex-col justify-between py-6 font-poppins">

    <!-- Bagian atas -->
    <div>
      <!-- Tombol back -->
      <div class="flex items-center justify-left ml-5 mb-8">
        <ButtonBack @click="back" />
      </div>

      <!-- Judul -->
      <h2 class="text-center font-[Rochester] text-3xl font-playfair mb-6">
        Jenis Buket
      </h2>

      <!-- Menu utama -->
      <ul class="flex flex-col space-y-2 px-4">

        <!-- Buket Bunga -->
        <li>
          <button
            :class="[
              'w-full text-left px-4 py-2 rounded-md transition font-medium',
             currentPath === '/allbunga'
                ? 'bg-[#8A6E68]'
                : 'hover:bg-[#8A6E68]'
            ]"
          >
            <a href="/allbunga">Buket Bunga</a>
          </button>
        </li>

        <!-- Buket Snack -->
        <li>
          <button
            :class="[
              'w-full text-left px-4 py-2 rounded-md transition',
              currentPath === '/allsnack'
                ? 'bg-[#8A6E68]'
                : 'hover:bg-[#8A6E68]'
            ]"
          >
            <a href="/allsnack">Buket Snack</a>
          </button>
        </li>

        <!-- Buket Boneka -->
        <li>
          <button
            :class="[
              'w-full text-left px-4 py-2 rounded-md transition',
              currentPath === '/allboneka'
                ? 'bg-[#8A6E68]'
                : 'hover:bg-[#8A6E68]'
            ]"
          >
            <a href="/allboneka">Buket Boneka</a>
          </button>
        </li>

        <!-- Custom Buket -->
        <li>
          <button
            :class="[
              'w-full text-left px-4 py-2 rounded-md transition',
              currentPath === '/allcustom'
                ? 'bg-[#8A6E68]'
                : 'hover:bg-[#8A6E68]'
            ]"
          >
           <a href="/allcustom">Custom Buket</a>
          </button>
        </li>

      </ul>
    </div>

    <!-- Bagian bawah -->
    <div class="px-4 space-y-2 text-sm">
      <p><a href="/footer" class="hover:underline cursor-pointer">About Us</a></p>
      <p><a href="/guide" class="hover:underline cursor-pointer">Guide</a></p>
      <p><a href="/TnC" class="hover:underline cursor-pointer">Term & Condition</a></p>
    </div>

  </div>
</template>

<script setup>
import { useRoute } from "vue-router";
import ButtonBack from "@/components/buttonBack.vue";
const currentPath = window.location.pathname;


//const $route = useRoute();
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&family=Playfair+Display:wght@600&display=swap');
</style>
