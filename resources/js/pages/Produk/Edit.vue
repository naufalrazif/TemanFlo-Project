<script setup lang="ts">
import { useForm, router } from '@inertiajs/vue3'
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Textarea } from "@/components/ui/textarea";
import { Button } from "@/components/ui/button";
import { Select, SelectTrigger, SelectValue, SelectContent, SelectItem } from "@/components/ui/select";


interface Produk {
  id: number;
  nama: string;
  jenis_buket: string;
  tema: string;
  harga: number;
  deskripsi: string;
  foto: string;
}

const props = defineProps<{ produk: Produk }>();

console.log(props.produk);

const form = useForm({
  nama: props.produk.nama,
  jenis_buket: props.produk.jenis_buket,
  tema: props.produk.tema,
  harga: props.produk.harga,
  deskripsi: props.produk.deskripsi,
  foto: null as File | null,
})

const handleSubmit = () => {
  router.put(`/produk/${props.produk.id}`, form.data(), {
    forceFormData: true,
    onSuccess: () => form.reset('foto'),
  });
};

const handleFileChange = (event: Event) => {
  const target = event.target as HTMLInputElement;
  if (target.files && target.files[0]) {
    form.foto = target.files[0];
  }
}

</script>

<template>
    <form @submit.prevent="handleSubmit">
    <div class="bg-[#f3cbb7] p-6 rounded-xl space-y-4">
    <h2 class="text-lg font-semibold">Tambah Produk</h2>

    <div class="flex items-center gap-4">
      <Label for="nama" class="w-1/3 text-right">Nama</Label>
      <Input id="nama" v-model="form.nama"  class="flex-1 bg-white" />
    </div>
    

    <div class="flex items-center gap-4">
      <Label for="category" class="w-1/3 text-right">Kategori</Label>
      <Select v-model="form.jenis_buket">
        <SelectTrigger class="flex-1 bg-white">
          <SelectValue />
        </SelectTrigger>
        <SelectContent>
          <SelectItem value="buket_bunga">Buket Bunga</SelectItem>
          <SelectItem value="buket_snack">Buket Snack</SelectItem>
          <SelectItem value="buket_boneka">Buket Boneka</SelectItem>
          <SelectItem value="buket_uang">Buket Uang</SelectItem>
        </SelectContent>
      </Select>
    </div>

    <div class="flex items-center gap-4">
      <Label for="category" class="w-1/3 text-right">Tema</Label>
      <Select v-model="form.tema">
        <SelectTrigger class="flex-1 bg-white">
          <SelectValue />
        </SelectTrigger>
        <SelectContent>
          <SelectItem value="birthday">Birthday</SelectItem>
          <SelectItem value="graduation">Graduation</SelectItem>
          <SelectItem value="wedding">Wedding</SelectItem>
        </SelectContent>
      </Select>
    </div>

    <div class="flex items-center gap-4">
      <Label for="nama" class="w-1/3 text-right">Harga</Label>
      <Input id="nama" type="number" v-model="form.harga" class="flex-1 bg-white" />
    </div>

    <div  class="flex items-center gap-4">
      <Label for="deskripsi" class="w-1/3 text-right">Deskripsi</Label>
      <Textarea id="deskripsi" v-model="form.deskripsi"  class="flex-1 bg-white"  />
    </div>

    <div class="flex items-center gap-4">
      <Label for="foto" class="w-1/3 text-right">Foto</Label>
      <Input 
        id="foto" 
        type="file" 
        class="flex-1 bg-white" 
        accept="image/*" 
       @change="handleFileChange"
      />
  
    </div>

    <div class="flex justify-end">
      <Button type="submit" class="bg-[#5c7b66] hover:bg-[#4e6958] text-white"  >
        Submit
      </Button>
    </div>
  </div>
  </form>   
</template>