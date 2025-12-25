<template>
  <button
    class="font-2xl text-white px-6 py-3 rounded-xl bg-[#5B7263] hover:bg-[#31463f] transition"
    @click="navigate"
  >
    Lihat Semua Produk
  </button>
</template>

<script setup>
import { router } from '@inertiajs/vue3'

const props = defineProps({
  to: {
    type: String,
    required: true
  }
})

const navigate = () => {
  router.visit(props.to)
}
</script>
