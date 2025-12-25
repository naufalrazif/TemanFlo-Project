<template>
  <div class="min-h-screen bg-[#f9f5f3] text-[#2d2d2d]">

    <!-- Header -->
    <header class="flex items-center justify-between px-6 md:px-10 py-4 border-b bg-white">
      <img src="/src/assets/logo.jpg" alt="Logo" class="h-12 md:h-14" />

      <!-- Navbar (disembunyikan di mobile) -->
     <Navbar />

      <!-- Icons -->
      <div class="flex items-center gap-4 text-xl">
        <i class="ri-shopping-cart-line cursor-pointer"></i>
        <i class="ri-user-3-line cursor-pointer"></i>
      </div>
    </header>

    <!-- Title -->
    <h1 class="ml-10 mt-5 text-4xl py-6 font-[Rochester]">Keranjang Saya</h1>

    <!-- Header grid -->
    <div class="hidden md:grid grid-cols-4 px-6 md:px-12 py-3 border-y text-sm font-medium">
      <p>Produk</p>
      <p>Harga Satuan</p>
      <p>Jumlah</p>
      <p>Harga Total</p>
    </div>

    <!-- Cart items -->
    <div class="px-6 md:px-12 py-6 space-y-6">

      <div
        v-for="(item, index) in cart"
        :key="index"
        class="grid grid-cols-1 md:grid-cols-4 items-start gap-4 border-b pb-4"
      >
        <!-- Produk -->
        <div class="flex items-center gap-4">
          <img :src="item.img" class="w-20 h-20 rounded object-cover" />
          <div>
            <p class="font-semibold">{{ item.name }}</p>
            <p class="text-sm">{{ item.type }}</p>
            <p class="text-sm">{{ item.size }}</p>
          </div>
        </div>

        <!-- Harga -->
        <p class="font-medium md:flex md:items-center">{{ formatNumber(item.price) }}</p>

        <!-- Quantity -->
        <div class="flex flex-col gap-2">
          <div class="flex items-center gap-3">
            <button
              @click="ubahJumlah(item, item.qty - 1)"
              :disabled="item.qty <= 1"
              class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300 disabled:opacity-50"
            >
              -
            </button>

            <span class="text-lg">{{ item.qty }}</span>

            <button
              @click="ubahJumlah(item, item.qty + 1)"
              class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300"
            >
              +
            </button>
          </div>

          <button
            @click="hapusItem(item.id)"
            class="text-red-600 text-sm underline hover:text-red-800"
          >
            Hapus
          </button>
        </div>

        <!-- Total -->
        <p class="font-medium md:flex md:items-center">
          Rp{{ formatNumber(item.price * item.qty) }}
        </p>
      </div>

    </div>

    <!-- Footer -->
    <div class="border-t mt-8 px-6 md:px-12 py-8 flex flex-col md:flex-row justify-end items-end md:items-center gap-4 text-lg font-medium">
      <p>
        Total Belanja :
        <span class="font-semibold">Rp{{ formatNumber(totalPrice) }}</span>
      </p>

      <button
        class="bg-[#6b8573] text-white px-8 py-3 rounded-lg hover:bg-[#587261] transition"
        @click="checkout"
      >
        CHECKOUT
      </button>
    </div>

  </div>
</template>

<script setup>
import Navbar from "@/components/Navbar.vue";
import { computed } from "vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
  keranjang: Object,
});

const cart = computed(() => {
  if (!props.keranjang || !props.keranjang.item_keranjang) return [];
  return props.keranjang.item_keranjang.map((item) => ({
    id: item.id,
    name: item.produk.nama,
    type: item.produk.tema,
    size: item.produk.jenis_buket,
    price: item.produk.harga,
    qty: item.jumlah,
    img: item.produk.foto_url ? item.produk.foto_url : "/src/assets/noimage.jpg",
  }));
});

const totalPrice = computed(() =>
  cart.value.reduce((t, item) => t + item.price * item.qty, 0)
);

function formatNumber(num) {
  return num.toLocaleString("id-ID");
}

function ubahJumlah(item, jumlahBaru) {
  router.put(
    route("keranjang.update"),
    { jumlah: jumlahBaru, item_id: item.id },
    { preserveScroll: true, preserveState: true }
  );
}

function hapusItem(id) {
  if (confirm("Yakin ingin menghapus item ini?")) {
    router.delete(route("keranjang.delete", id), {
      preserveScroll: true,
      preserveState: true,
    });
  }
}

function checkout() {
  router.get(route("checkout"));
}
</script>
