//create 
<script setup lang="ts">
import { ref, watch } from "vue";
import { useForm } from '@inertiajs/vue3'
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Textarea } from "@/components/ui/textarea";
import { Button } from "@/components/ui/button";
import { Select, SelectTrigger, SelectValue, SelectContent, SelectItem } from "@/components/ui/select";

const form = useForm({
  nama: "",
  jenis_buket: "",
  tema: "",
  size: "",
  harga: "",
  deskripsi: "",
  foto: null as File | null,
});

const hargaDisplay = ref("");

watch(hargaDisplay, (newValue) => {
  const numeric = newValue.replace(/\D/g, '');
  form.harga = numeric;
  if (numeric) {
    const formatted = new Intl.NumberFormat('id-ID').format(Number(numeric));
    hargaDisplay.value = `Rp ${formatted}`;
  } else {
    hargaDisplay.value = "";
  }
});

watch(() => form.harga, (newHarga) => {
  if (newHarga) {
    const num = Number(newHarga);
    if (!isNaN(num)) {
      hargaDisplay.value = `Rp ${new Intl.NumberFormat('id-ID').format(num)}`;
    }
  }
}, { immediate: true });

const handleSubmit = () => {
  form.post('/produk', {
    forceFormData: true,
    onSuccess: () => {
      window.location.href = '/produk';
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

    <!-- NAMA -->
    <div class="flex items-center gap-4">
      <Label for="nama" class="w-1/3 text-right">Nama</Label>
      <Input id="nama" v-model="form.nama" class="flex-1 bg-white" />
    </div>
    <div class="text-sm text-red-600 text-right" v-if="form.errors.nama">{{ form.errors.nama }}</div>

    <!-- KATEGORI -->
    <div class="flex items-center gap-4">
      <Label for="jenis_buket" class="w-1/3 text-right">Kategori</Label>
      <Select v-model="form.jenis_buket">
        <SelectTrigger class="flex-1 bg-white">
          <SelectValue />
        </SelectTrigger>
        <SelectContent class="bg-white border-gray-300 rounded-md">
          <SelectItem value="buket_bunga">Buket Bunga</SelectItem>
          <SelectItem value="buket_snack">Buket Snack</SelectItem>
          <SelectItem value="buket_boneka">Buket Boneka</SelectItem>
          <SelectItem value="buket_uang">Buket Uang</SelectItem>
        </SelectContent>
      </Select>
    </div>
    <div class="text-sm text-red-600 text-right" v-if="form.errors.jenis_buket">{{ form.errors.jenis_buket }}</div>

    <!-- TEMA -->
    <div class="flex items-center gap-4">
      <Label for="tema" class="w-1/3 text-right">Tema</Label>
      <Select v-model="form.tema">
        <SelectTrigger class="flex-1 bg-white">
          <SelectValue />
        </SelectTrigger>
        <SelectContent class="bg-white border-gray-300 rounded-md">
          <SelectItem value="birthday">Birthday</SelectItem>
          <SelectItem value="graduation">Graduation</SelectItem>
          <SelectItem value="wedding">Wedding</SelectItem>
        </SelectContent>
      </Select>
    </div>
    <div class="text-sm text-red-600 text-right" v-if="form.errors.tema">{{ form.errors.tema }}</div>

    <!-- SIZE -->
    <div class="flex items-center gap-4">
      <Label for="size" class="w-1/3 text-right">Size</Label>
      <Select v-model="form.size">
        <SelectTrigger class="flex-1 bg-white">
          <SelectValue />
        </SelectTrigger>
        <SelectContent class="bg-white border-gray-300 rounded-md">
          <SelectItem value="small">Small</SelectItem>
          <SelectItem value="medium">Medium</SelectItem>
          <SelectItem value="large">Large</SelectItem>
        </SelectContent>
      </Select>
    </div>
    <div class="text-sm text-red-600 text-right" v-if="form.errors.size">{{ form.errors.size }}</div>

    <!-- HARGA (dengan format rupiah) -->
    <div class="flex items-center gap-4">
      <Label for="harga" class="w-1/3 text-right">Harga</Label>
      <Input
        id="harga"
        v-model="hargaDisplay"
        placeholder="Rp 0"
        class="flex-1 bg-white"
        @focus="(e) => e.target.select()"
      />
    </div>
    <div class="text-sm text-red-600 text-right" v-if="form.errors.harga">{{ form.errors.harga }}</div>

    <!-- DESKRIPSI -->
    <div class="flex items-center gap-4">
      <Label for="deskripsi" class="w-1/3 text-right">Deskripsi</Label>
      <Textarea id="deskripsi" v-model="form.deskripsi" class="flex-1 bg-white" />
    </div>
    <div class="text-sm text-red-600 text-right" v-if="form.errors.deskripsi">{{ form.errors.deskripsi }}</div>

    <!-- FOTO -->
    <div class="flex items-center gap-4">
      <Label for="foto" class="w-1/3 text-right">Foto</Label>
      <Input 
        id="foto" 
        type="file" 
        class="flex-1 border-0 bg-transparent text-white file:mr-4 file:py-1 file:px-4 file:rounded-md file:border-0 file:bg-[#7D6962] file:text-white hover:file:bg-[#6d5c55]"
        @change="handleFileChange"
      />
    </div>
    <div class="text-sm text-red-600 text-right" v-if="form.errors.foto">{{ form.errors.foto }}</div>

    <!-- SUBMIT -->
    <div class="flex justify-end">
      <Button class="bg-[#5c7b66] hover:bg-[#4e6958] text-white" @click="handleSubmit">
        Submit
      </Button>
    </div>
  </div>
</template>