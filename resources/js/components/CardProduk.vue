<script setup lang="ts">
import { router } from '@inertiajs/vue3'

interface Produk {
  id: number;
  nama: string;
  jenis_buket: string;
  tema: string;
  harga: number;
  deskripsi: string;
  foto: string;
  foto_url?: string;
}

const props = defineProps<{
  produks: Produk[];
  jenis: string; // ✅ Perbaiki dari "String" jadi "string"
}>()

const goToDetail = (id: number) => {
  router.visit(`/buket/${id}`);
};
</script>

<template>
  <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto px-6">
    <div
      v-for="item in produks.filter(p => p.jenis_buket === jenis)"
      :key="item.id"
      class="bg-white rounded-xl shadow-md hover:shadow-lg p-4 cursor-pointer"
      @click="goToDetail(item.id)"
    >
      <img
        :src="item.foto_url || '/images/placeholder.jpg'"
        alt="Buket"
        class="rounded-md w-full h-56 object-cover mb-4"
      />
      <h3 class="text-lg font-bold mb-2">{{ item.nama }}</h3>
      <p class="text-sm text-gray-600 mb-3">
        Rp {{ Number(item.harga).toLocaleString('id-ID', { maximumFractionDigits: 0 }) }}
      </p>
    </div>
  </div>
</template>