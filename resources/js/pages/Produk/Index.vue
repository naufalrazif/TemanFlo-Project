<script setup lang="ts">
import Create from './Create.vue';
import Edit from './Edit.vue';
import {router} from '@inertiajs/vue3';
import { Button } from "@/components/ui/button";

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

</script>

<template>

Tambah Produk
<Dialog>
  <DialogTrigger>
    <Button>Tambah Produk</Button>
  </DialogTrigger>
  <DialogContent class="bg-[#f3cbb7] p-6 rounded-xl border-none">
    <Create />
  </DialogContent>
</Dialog>


<Table>
<TableCaption>A list of your recent invoices.</TableCaption>
<TableHeader>
    <TableRow>
    <TableHead>Nama</TableHead>
    <TableHead>Jenis Produk</TableHead>
    <TableHead>Tema</TableHead>
    <TableHead>Harga</TableHead>
    <TableHead>Foto</TableHead>
    <TableHead>Edit</TableHead>
    </TableRow>
</TableHeader>
<TableBody>
    <TableRow v-for ="produk in props.produks" :key="produk.id">
    <TableCell>{{ produk.nama }}</TableCell>
    <TableCell>{{ produk.jenis_buket }}</TableCell>
    <TableCell>{{ produk.tema }}</TableCell>
    <TableCell>{{ produk.harga }}</TableCell>
    <TableCell>  <img
    v-if="produk.foto_url"
    :src="produk.foto_url"
    alt="Foto Produk"
    class="w-16 h-16 object-cover rounded-md border"
  /></TableCell>
    <TableCell>
        <Dialog>
        <DialogTrigger>
            <Button>Edit</Button>
        </DialogTrigger>
        <DialogContent class="bg-[#f3cbb7] p-6 rounded-xl border-none">
            <Edit :produk="produk" />
        </DialogContent>
        </Dialog>
        <Button class="bg-red-600" @click="handleDelete(produk.id)">Hapus </Button>
    </TableCell>
    </TableRow>
</TableBody>
</Table>

    


  
</template>