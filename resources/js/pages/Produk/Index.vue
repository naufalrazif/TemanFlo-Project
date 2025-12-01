<script setup lang="ts">
import Create from './Create.vue';
import Edit from './Edit.vue';
import {router} from '@inertiajs/vue3';
import { Button } from "@/components/ui/button";
import AppLayout from '@/layouts/AppLayout.vue';
import ButtonBack from '@/components/ButtonBack.vue';
import DropdownSort from '@/components/Dropdown.vue'

import { Dialog ,DialogTrigger ,DialogContent } from '@/components/ui/dialog';
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,} from "@/components/ui/table"

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

const props = defineProps({
  produks: Array as () => Produk[]
})

const handleDelete = (id: number) => {
    if(confirm('Apakah and ayakin untuk mengapus produk ini?')){
        router.delete(`/produk/${id}`);
    }
}

const goToPesanan = () => {
  router.visit('/dashboard-admin')
};


</script>

<template>

    <div class="min-h-screen bg-[#F9F4F1] font-[Poppins]">
      <!-- Header Section -->
      <div class="bg-[#E6C7C0] h-[150px] px-10 py-8 flex justify-between items-start">
        <div class="flex items-center justify-center mb-8">
          <!--<ButtonBack @click="back" /> -->
        </div>

        <h1 class="text-2xl font-semibold text-gray-900 flex-1 ml-6">
          Dashboard Admin
        </h1>

        <!-- <DropdownSort @select="handleSort" />-->
      </div>

      <!-- Action Button -->
      <div class="px-10 py-6 w-full flex justify-between items-center">
        <Dialog>
          <DialogTrigger>
            <Button class="flex items-center gap-2 bg-[#5B7263] text-white font-medium px-4 py-2 rounded-md hover:bg-[#4d6155] transition">
              Tambah Produk
            </Button>
          </DialogTrigger>
          <DialogContent class="bg-[#f3cbb7] p-6 rounded-xl border-none">
            <Create />
          </DialogContent>
        </Dialog>

        <Button
        @click="goToPesanan" 
        class="flex items-center gap-2 bg-[#5B7263] text-white font-medium px-4 py-2 rounded-md hover:bg-[#4d6155] transition">
          Pesanan
        </Button>
      </div>

      <!-- Table Section -->
      <div class="px-10">
        <div class="overflow-x-auto">
          <table class="min-w-full border-collapse border border-gray-200">
            <thead>
              <tr class="bg-[#5B7263] text-white">
                <th class="py-3 px-4 text-left font-semibold">Nama</th>
                <th class="py-3 px-4 text-left font-semibold">Jenis Produk</th>
                <th class="py-3 px-4 text-left font-semibold">Tema</th>
                <th class="py-3 px-4 text-left font-semibold">Harga</th>
                <th class="py-3 px-4 text-left font-semibold">Foto</th>
                <th class="py-3 px-4 text-left font-semibold">Edit</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for ="produk in props.produks" :key="produk.id"
                class="border-b border-gray-200 hover:bg-gray-50"
              >
                <td class="py-3 px-4">{{ produk.nama }}</td>
                <td class="py-3 px-4">{{ produk.jenis_buket }}</td>
                <td class="py-3 px-4">{{ produk.tema }}</td>
                <td class="py-3 px-4">{{ produk.harga }}</td>
                <td class="py-3 px-4">
                  <img
                    v-if="produk.foto_url"
                    :src="produk.foto_url"
                    alt="Foto Produk"
                    class="w-16 h-16 object-cover rounded-md border"
                  />
                </td>
                <td class="py-3 px-4">
                 <div class="flex items-center gap-3">
                  <Dialog>
                    <DialogTrigger>
                        <Button>Edit</Button>
                    </DialogTrigger>
                    <DialogContent class="bg-[#f3cbb7] p-6 rounded-xl border-none">
                        <Edit :key="produk.id" :produk="produk" />

                    </DialogContent>
                  </Dialog>
                  <Button class="bg-red-600 text-white"
                   @click="handleDelete(produk.id)">
                   Hapus 
                  </Button>
                  </div>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
 
    


  
</template>

