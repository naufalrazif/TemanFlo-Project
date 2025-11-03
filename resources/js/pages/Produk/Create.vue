<script setup lang="ts">
import { ref } from "vue";
import { useForm, } from '@inertiajs/vue3'
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Textarea } from "@/components/ui/textarea";
import { Button } from "@/components/ui/button";
import { Select, SelectTrigger, SelectValue, SelectContent, SelectItem } from "@/components/ui/select";

const form = useForm({
  nama: "",
  jenis_buket: "",
  tema: "",
  harga: "",
  deskripsi: "",
  foto: null as File | null,
});

const handleSubmit = () => {
  form.post('/produk', {
    forceFormData: true, // Penting untuk file upload
    onSuccess: () => {
      form.reset(); // Reset form setelah sukses
    },
    onError: (errors) => {
      console.log('Errors:', errors);
    }
  });
}

const handleFileChange = (event: Event) => {
  const target = event.target as HTMLInputElement;
  if (target.files && target.files[0]) {
    form.foto = target.files[0];
  }
}

</script>

<template>
  <div class="bg-[#f3cbb7] p-6 rounded-xl space-y-4">
    <h2 class="text-lg font-semibold">Tambah Produk</h2>

    <div class="flex items-center gap-4">
      <Label for="nama" class="w-1/3 text-right">Nama</Label>
      <Input id="nama" v-model="form.nama"  class="flex-1 bg-white" />
    </div>
    <div class="text-sm text-red-600 text-right" v-if="form.errors.nama">{{ form.errors.nama }}</div>

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
    <div class="text-sm text-red-600 text-right" v-if="form.errors.jenis_buket">{{ form.errors.jenis_buket }}</div>

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
    <div class="text-sm text-red-600 text-right" v-if="form.errors.tema">{{ form.errors.tema }}</div>

    <div class="flex items-center gap-4">
      <Label for="nama" class="w-1/3 text-right">Harga</Label>
      <Input id="nama" type="number" v-model="form.harga" class="flex-1 bg-white" />
    </div>
    <div class="text-sm text-red-600 text-right" v-if="form.errors.harga">{{ form.errors.harga }}</div>

    <div  class="flex items-center gap-4">
      <Label for="deskripsi" class="w-1/3 text-right">Deskripsi</Label>
      <Textarea id="deskripsi" v-model="form.deskripsi"  class="flex-1 bg-white"  />
    </div>
    <div class="text-sm text-red-600 text-right" v-if="form.errors.deskripsi">{{ form.errors.deskripsi }}</div>

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
    <div class="text-sm text-red-600 text-right" v-if="form.errors.foto">{{ form.errors.foto }}</div>

    <div class="flex justify-end">
      <Button class="bg-[#5c7b66] hover:bg-[#4e6958] text-white"  @click="handleSubmit">
        Submit
      </Button>
    </div>
  </div>
</template>
