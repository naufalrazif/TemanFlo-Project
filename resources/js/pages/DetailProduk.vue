<template>
  <div class="bg-white min-h-screen px-6 py-10 font-[Poppins] text-[#000000]">
    
    <!-- Tombol kembali -->
    <div class="mb-6">
        <ButtonBack />
    </div>  

    <!--judul-->
    <div class="flex-1">
        <h1 class="text-4xl font-semibold mb-2">{{produk.nama}}</h1>
        <p class="text-2xl font-light mb-4">Rp {{ produk.harga.toLocaleString('id-ID') }}</p>
        <hr class="my-4 border-t border-black" />
    </div>

    <!-- Produk Utama -->
    <div class="flex flex-col md:flex-row gap-10 items-start mb-12">
      <!-- Gambar -->
      <img 
      :src="produk.foto_url" 
      alt="foto produk lah" 
      class="w-[350px] h-[450px]"/>

      <!-- Detail -->
      <div class="flex-1">
        <p class="text-xl font-semibold mb-2">Deskripsi</p>
        <p class="flex justify-between text-xl font-light mb-4 w-[546] h-[209]">
        {{ produk.deskripsi }}
        </p>

        <div class="mb-4">
          <p class="text-xl font-semibold mb-2">Tema:</p>
          <p class="flex justify-between text-xl font-light mb-4 w-[546] h-[209]">{{produk.tema}}</p>
        </div>

        <div class="mb-6">
          <p class="text-xl font-semibold mb-2">Ukuran:</p>
          <p class="flex justify-between text-xl font-light mb-4 w-[546] h-[209]"></p>
        </div>

        <!-- Jumlah & Keranjang -->
         <div class="flex flex-wrap gap-5">
                <div class="flex items-center rounded-xl px-4 py-2 w-fit bg-[#ebceca]">
                    <button @click="decreaseQty" class="text-xl font-bold px-2">−</button>
                    <span class="text-lg font-medium px-4">{{ qty }}</span>
                    <button @click="increaseQty" class="text-xl font-bold px-2">+</button>
                </div>

                <button
                    class="font-2xl text-white px-6 py-2 rounded-xl bg-[#53776c] hover:bg-[#31463f] transition"
                    @click="addToCart"
                    >
                    Masukkan Keranjang
                </button>
            </div>
            </div>
        </div>

    <!-- Buket Bunga Lainnya -->
    <div>
      <h2 class="text-2xl font-semibold mb-4 text-center">Buket Bunga Lainnya</h2>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
        <div v-for="item in otherBouquets" :key="item.nama" class="border rounded-xl p-4 shadow-sm">
          <img :src="item.gambar" :alt="item.nama" class="w-[350px] h-[450px] object-cover rounded mb-2" />
          <p class="font-semibold text-xl text-center">{{ item.nama }}</p>
          <p class="font-light text-lg text-center">{{ item.harga }}</p>
        </div>
      </div>

      <div class="text-center">
        <ButtonLihatSemua />
      </div>
        
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
import ButtonLihatSemua from '@/components/buttonLihatSemua.vue'
import ButtonBack from '@/components/ButtonBack.vue'

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

const props = defineProps<{ produk: Produk }>()

const qty = ref(1)

const increaseQty = () => {
  qty.value++
}

const decreaseQty = () => {
  if (qty.value > 1) qty.value--
}

const addToCart = () => {
  alert(`Produk ditambahkan ke keranjang sebanyak ${qty.value} item.`)
}


const otherBouquets = [
  {
    nama: 'Buket Mawar',
    harga: 'Rp. 35.000',
    gambar: '/images/1.jpg',
  },
  {
    nama: 'Buket Lilly',
    harga: 'Rp. 55.000',
    gambar: '/images/2.jpg',
  },
  {
    nama: 'Buket Jasmine',
    harga: 'Rp. 35.000',
    gambar: '/images/3.jpg',
  },
]
</script>