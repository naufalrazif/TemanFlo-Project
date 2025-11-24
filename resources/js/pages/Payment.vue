<template>
  <div class="min-h-screen bg-gray-100 flex items-center justify-center py-10">
    <!-- Container utama -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden grid grid-cols-1 md:grid-cols-2 w-full max-w-5xl">

      <!-- LEFT -->
      <div class="bg-[#e6bbaa] p-8 flex flex-col gap-4">
        <h2 class="text-lg font-semibold">Contact Information</h2>
        <input type="text" v-model="form.email" placeholder="Email" class="input" />
        <input type="text" v-model="form.no_telp" placeholder="Phone number" class="input" />

        <div class="flex gap-3">
          <input type="text" v-model="form.first_name" placeholder="First name" class="input w-full" />
          <input type="text" v-model="form.last_name" placeholder="Last name" class="input w-full" />
        </div>

        <h2 class="text-lg font-semibold mt-3">Alamat</h2>
        <input type="text" v-model="form.kota" placeholder="Kota / Kecamatan" class="input" />
        <input type="text" v-model="form.kode_pos" placeholder="Kode Pos" class="input" />
        <input type="text" v-model="form.detail_alamat" placeholder="Detail Alamat (jalan, no. rumah)" class="input" />

        

        <button @click="bayar" class="bg-[#577a63] text-white rounded-lg py-3 mt-5 hover:opacity-90">
          Bayar Sekarang
        </button>
      </div>

      <!-- RIGHT -->
      <div class="bg-white p-8 border-l">
        <table class="w-full text-sm font-semibold text-gray-700">
          <thead>
            <tr>
              <th class="text-left pb-2">Produk</th>
              <th class="text-right pb-2">Jumlah</th>
            </tr>
          </thead>
        </table>

        <!-- Produk dari cart -->
        <div v-if="items && items.length > 0" class="mt-4 space-y-4">
          <div
            v-for="item in items"
            :key="item.id"
            class="flex justify-between items-center"
          >
            <div class="flex items-center gap-3">
            <img :src="item.produk.foto_url ?? '/src/assets/noimage.jpg'" class="w-20 h-20 rounded object-cover" />              <div>
                <p class="font-medium">{{ item.produk.nama }}</p>
                <p class="text-sm">Rp {{ formatNumber(item.produk.harga) }}</p>
              </div>
            </div>
            <p>{{ item.jumlah }}</p>
          </div>
        </div>

        <!-- Kalau cart kosong -->
        <div v-else class="text-center text-gray-500 mt-10">
          Keranjang kosong 😔
        </div>

        <!-- Ringkasan -->
        <div class="border-t mt-6 pt-4 text-sm space-y-1" v-if="items && items.length > 0"
>
          <div class="flex justify-between">
            <p>Sub Total : {{ totalItems }} Item</p>
            <p>Rp {{ formatNumber(totalPrice) }}</p>
          </div>
          <div class="flex justify-between">
            <p>Shipping</p>
            <p>Rp 10.000</p>
          </div>
          <div class="flex justify-between text-lg font-bold mt-2">
            <p>Total</p>
            <p>Rp {{ formatNumber(totalPrice + 10000) }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed, reactive} from "vue";
import { router, usePage } from "@inertiajs/vue3";
import { onMounted } from "vue";

const form = reactive({
  email: "",
  no_telp: "",
  first_name: "",
  last_name: "",
  kota: "",
  kode_pos: "",
  detail_alamat: "",
});

function bayar() {
  const alamatLengkap = 
    `${form.kota}, Kode Pos: ${form.kode_pos}, ${form.detail_alamat}`;

  const nama = `${form.first_name} ${form.last_name}`; // ada spasi

  router.post(route("pesanan.token"), {
    nama: nama,
    email: form.email,
    no_telp: form.no_telp,
    alamat: alamatLengkap,
    metode: "shopeepay",
    total: totalPrice.value + 10000, // total + ongkir
  });
}

onMounted(() => {
  const snapToken = new URLSearchParams(window.location.search).get("snap_token");

  if (snapToken) {
    window.snap.pay(snapToken, {
      onSuccess: (res) => console.log(res),
      onPending: (res) => console.log(res),
      onError: (res) => console.log(res),
    });
  }
});
const props = defineProps({
  items: { type: Array, default: () => [] },
  
});



const totalPrice = computed(() =>
  props.items.reduce((t, i) => t + i.produk.harga * i.jumlah, 0)
);

const totalItems = computed(() =>
  props.items.reduce((t, i) => t + i.jumlah, 0)
);

function formatNumber(num) {
  return num.toLocaleString("id-ID");
}




</script>

<style scoped>
.input {
  @apply w-full bg-white rounded-lg px-3 py-2 border border-gray-400;
}
</style>