<template>
  <div class="min-h-screen w-64 bg-[#5E756F] text-white flex flex-col justify-between py-6 font-poppins">
    <!-- Bagian atas -->
    <div>
      <div class="flex items-center justify-center mb-8">
        <ButtonBack @click="back" />
      </div>

      <h2 class="text-center font-[Rochester] text-3xl mb-6">Jenis Buket</h2>

      <ul class="flex flex-col space-y-2 px-4">
        <li>
          <a
            href="/allbunga"
            :class="isActive('/allbunga') ? 'bg-[#73615F]' : 'hover:bg-[#73615F]'"
            class="w-full text-left px-4 py-2 rounded-md font-medium block"
          >
            Buket Bunga
          </a>
        </li>
        <li>
          <a
            href="/allsnack"
            :class="isActive('/allsnack') ? 'bg-[#73615F]' : 'hover:bg-[#73615F]'"
            class="w-full text-left px-4 py-2 rounded-md font-medium block"
          >
            Buket Snack
          </a>
        </li>
        <li>
          <a
            href="/allboneka"
            :class="isActive('/allboneka') ? 'bg-[#73615F]' : 'hover:bg-[#73615F]'"
            class="w-full text-left px-4 py-2 rounded-md font-medium block"
          >
            Buket Boneka
          </a>
        </li>
        <li>
          <a
            href="/custom"
            :class="isActive('/custom') ? 'bg-[#73615F]' : 'hover:bg-[#73615F]'"
            class="w-full text-left px-4 py-2 rounded-md font-medium block"
          >
            Custom Buket
          </a>
        </li>
      </ul>
    </div>

    <!-- Footer links -->
    <div class="px-4 space-y-2 text-sm">
      <a href="/footer" class="block hover:underline">About Us</a>
      <a href="/guide" class="block hover:underline">Guide</a>
      <a href="/TnC" class="block hover:underline">Term & Condition</a>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import ButtonBack from "@/components/buttonBack.vue";

// Ambil path saat ini
const currentPath = ref(window.location.pathname)

// Fungsi cek apakah path aktif
const isActive = (path) => {
  return currentPath.value === path
}

// Update saat halaman berubah (opsional, tapi bagus untuk SPA manual)
onMounted(() => {
  // Jika pakai SPA tanpa full reload, ini bisa di-skip
  // Tapi jika tiap klik reload halaman, ini sudah cukup
})
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&family=Playfair+Display:wght@600&display=swap');

a {
  color: inherit;
  text-decoration: none;
}
</style>