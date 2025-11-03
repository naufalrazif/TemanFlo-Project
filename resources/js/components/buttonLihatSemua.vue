<template>
  <button
    class="font-2xl text-white px-6 py-3 rounded-xl bg-[#53776c] hover:bg-[#31463f] transition"
    @click="navigate"
  >
    Lihat Semua Produk
  </button>
</template>

<script setup>
import { router } from '@inertiajs/vue3'

const navigate = () => {
  router.visit('/produk')
}
</script>