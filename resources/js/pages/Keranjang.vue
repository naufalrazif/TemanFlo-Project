<template>
  <div class="min-h-screen bg-[#f9f5f3] text-[#2d2d2d]">

    <!-- Header -->
    <header class="flex items-center justify-between px-10 py-5 border-b bg-white">
      <img src="/src/assets/logo.jpg" alt="Logo" class="h-14" />

        <Navbar />

      <div class="flex items-center gap-5 text-xl">
        <i class="ri-shopping-cart-line cursor-pointer"></i>
        <i class="ri-user-3-line cursor-pointer"></i>
      </div>
    </header>

    <!-- Title -->
    <h1 class="text-center text-3xl cart-title py-6">Cart</h1>

    <!-- Header grid -->
    <div class="grid grid-cols-4 px-12 py-3 border-y text-sm font-medium">
      <p>Produk</p>
      <p>Harga Satuan</p>
      <p>Jumlah</p>
      <p>Harga Total</p>
    </div>

    <!-- Cart items -->
    <div class="px-12 py-6 space-y-6">

      <div
        v-for="(item, index) in cart"
        :key="index"
        class="grid grid-cols-4 items-center"
      >
        <div class="flex items-center gap-4">
          <img :src="item.img" class="w-20 h-20 rounded object-cover" />
          <div>
            <p class="font-semibold">{{ item.name }}</p>
            <p class="text-sm">{{ item.type }}</p>
            <p class="text-sm">{{ item.size }}</p>
          </div>
        </div>

        <p class="font-medium">Rp{{ formatNumber(item.price) }}</p>

        <div>
          <div class="flex items-center gap-2">
            <button class="qty-btn" @click="increaseQty(index)">+</button>
            <span>{{ item.qty }}</span>
            <button class="qty-btn" @click="decreaseQty(index)">-</button>
          </div>
          <button class="hapus-btn" @click="removeItem(index)">Hapus</button>
        </div>

        <p class="font-medium">Rp{{ formatNumber(item.price * item.qty) }}</p>
      </div>

    </div>

    <!-- Footer -->
    <div class="border-t mt-8 px-12 py-8 flex justify-end items-center text-lg font-medium">
      <p class="mr-10">
        Total Belanja :
        <span class="font-semibold">Rp{{ formatNumber(totalPrice) }}</span>
      </p>
      <button class="checkout-btn" @click="checkout">CHECKOUT</button>
    </div>

  </div>
</template>

<script setup>
import Navbar from "@/components/Navbar.vue";
import { computed } from "vue";

const props = defineProps({
  keranjang: Object, // dari controller Laravel
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
  cart.value.reduce((total, item) => total + item.price * item.qty, 0)
);

function formatNumber(num) {
  return num.toLocaleString("id-ID");
}

// Sementara belum pakai update/hapus ke backend
function increaseQty(index) {
  cart.value[index].qty++;
}
function decreaseQty(index) {
  if (cart.value[index].qty > 1) cart.value[index].qty--;
}
function removeItem(index) {
  cart.value.splice(index, 1);
}
function checkout() {
  console.log("Checkout data:", cart.value);
}
</script>


<style>
.cart-title {
  font-family: "Playfair Display", serif;
}

.qty-btn {
  @apply px-3 py-1 rounded bg-[#e7c5c5] hover:bg-[#d3b1b1] transition;
}

.hapus-btn {
  @apply text-sm text-red-600 underline mt-1;
}

.checkout-btn {
  @apply bg-[#6b8573] text-white px-8 py-3 rounded-lg hover:bg-[#587261] transition;
}
</style>