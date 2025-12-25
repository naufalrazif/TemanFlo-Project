<template>
  <div class="bg-white min-h-screen px-6 py-10 text-[#000000]">
    <Navbar />

    <!-- Judul -->
    <div class="flex-1 mt-20">
      <h1 class="text-4xl font-semibold mb-2">{{ produk.nama }}</h1>
      <p class="text-2xl font-light mb-4">Rp {{ produk.harga.toLocaleString('id-ID') }}</p>
      <hr class="my-4 border-t border-black" />
    </div>

    <!-- Produk Utama -->
    <div class="flex flex-col md:flex-row gap-10 items-start mb-12">
      <!-- Gambar -->
      <img 
        :src="produk.foto_url || '/images/placeholder.jpg'" 
        alt="Foto produk" 
        class="w-[350px] h-[450px] object-cover rounded-lg shadow"
      />

      <!-- Detail -->
      <div class="flex-1 max-w-2xl">
        <div class="mb-6">
          <p class="text-xl font-semibold mb-2">Deskripsi</p>
          <p class="text-lg font-light">{{ produk.deskripsi || 'Tidak ada deskripsi' }}</p>
        </div>

        <div class="mb-6">
          <p class="text-xl font-semibold mb-2">Tema</p>
          <p class="text-lg font-light capitalize">
            {{ formatTema(produk.tema) || '–' }}
          </p>
        </div>

        <!-- ✅ Ukuran (Size) -->
        <div class="mb-6">
          <p class="text-xl font-semibold mb-2">Ukuran</p>
          <p class="text-lg font-light">
            {{ produk.size || 'Belum ditentukan' }}
          </p>
        </div>

        <!-- Jumlah & Keranjang -->
        <div class="flex flex-wrap gap-5 items-center">
          <div class="flex items-center rounded-xl px-4 py-2 w-fit bg-[#ebceca]">
            <button @click="decreaseQty" class="text-xl font-bold px-2">−</button>
            <span class="text-lg font-medium px-4">{{ qty }}</span>
            <button @click="increaseQty" class="text-xl font-bold px-2">+</button>
          </div>

          <button
            class="text-xl font-semibold text-white px-6 py-2 rounded-xl bg-[#53776c] hover:bg-[#31463f] transition"
            @click="addToCart"
          >
            Masukkan Keranjang
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
import Navbar from "@/components/Navbar.vue"

interface Produk {
  id: number;
  nama: string;
  jenis_buket: string;
  tema: string;
  harga: number;
  deskripsi: string;
  size?: string; // ← tambahkan ini!
  foto?: string;
  foto_url?: string;
}

const props = defineProps<{ produk: Produk }>()

const qty = ref(1)

const increaseQty = () => {
  qty.value++
}

const decreaseQty = () => {
  if (qty.value > 1) qty.value--
}

const addToCart = () => {
  router.post('/keranjang/tambah', {
    produk_id: props.produk.id,
    jumlah: qty.value,
  }, {
    onSuccess: () => {
      router.visit('/keranjang')
    },
    onError: (errors) => {
      console.error(errors)
      alert('Gagal menambahkan produk ke keranjang.')
    }
  })
}

// Helper: format tema jadi lebih user-friendly
const formatTema = (tema: string | null): string => {
  if (!tema) return ''
  const map: Record<string, string> = {
    wedding: 'Pernikahan',
    birthday: 'Ulang Tahun',
    graduation: 'Wisuda'
  }
  return map[tema] || tema
}
</script>