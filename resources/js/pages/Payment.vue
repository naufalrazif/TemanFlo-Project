<template>
  <div class="min-h-screen bg-gray-100 flex items-center justify-center py-10">
    <!-- Container utama -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden grid grid-cols-1 md:grid-cols-2 w-full max-w-5xl">

      <!-- ================= LEFT ================= -->
      <div class="bg-[#e6bbaa] p-4 flex flex-col gap-4">
        <h2 class="text-lg font-semibold">Contact Information</h2>

        <input v-model="form.email" type="text" placeholder="Email" class="input" />
        <input v-model="form.no_telp" type="text" placeholder="Phone number" class="input" />

        <div class="flex gap-3">
          <input v-model="form.first_name" type="text" placeholder="First name" class="input w-full" />
          <input v-model="form.last_name" type="text" placeholder="Last name" class="input w-full" />
        </div>

        <h2 class="text-lg font-semibold mt-3">Alamat</h2>
        <input v-model="form.kota" type="text" placeholder="Kota / Kecamatan" class="input" />
        <input v-model="form.kode_pos" type="text" placeholder="Kode Pos" class="input" />
        <input v-model="form.detail_alamat" type="text" placeholder="Detail Alamat" class="input" />

        <h2 class="text-lg font-semibold mt-3">Catatan Ucapan</h2>
        <textarea
          v-model="form.catatan"
          placeholder="Pesan untuk penerima"
          class="input h-20 resize-none"
        ></textarea>

        <button
          @click="bayar"
          class="bg-[#577a63] text-white rounded-lg py-3 mt-5 hover:opacity-90"
        >
          Bayar Sekarang
        </button>
      </div>

      <!-- ================= RIGHT ================= -->
      <div class="bg-white p-8 border-l">
        <h2 class="font-semibold mb-4">Ringkasan Pesanan</h2>

        <!-- PRODUK -->
        <div v-if="items.length" class="space-y-4">
          <div
            v-for="item in items"
            :key="item.id"
            class="flex justify-between items-center"
          >
            <div class="flex gap-3 items-center">
              <img
                :src="item.produk.foto_url ?? '/src/assets/noimage.jpg'"
                class="w-16 h-16 rounded object-cover"
              />
              <div>
                <p class="font-medium">{{ item.produk.nama }}</p>
                <p class="text-sm">Rp {{ formatNumber(item.produk.harga) }}</p>
              </div>
            </div>
            <p>x{{ item.jumlah }}</p>
          </div>
        </div>

        <div v-else class="text-center text-gray-500 mt-10">
          Keranjang kosong 😔
        </div>

        <!-- RINGKASAN -->
        <div v-if="items.length" class="border-t mt-6 pt-4 text-sm space-y-3">
          <!-- SUBTOTAL -->
          <div class="flex justify-between">
            <p>Subtotal ({{ totalItems }} item)</p>
            <p>Rp {{ formatNumber(totalPrice) }}</p>
          </div>

          <!-- ONGKIR -->
          <div class="bg-gray-50 border rounded-xl p-4 space-y-3">
            <p class="font-semibold">Opsi Pengiriman</p>

            <!-- SOLO RAYA -->
            <label class="flex justify-between items-center cursor-pointer">
              <div class="flex items-center gap-2">
                <input
                  type="radio"
                  value="0"
                  v-model="shippingCost"
                  :disabled="!isSoloRaya"
                />
                <span>Gratis Ongkir (Solo Raya)</span>
              </div>
              <span class="text-green-600 font-semibold">Rp 0</span>
            </label>

            <!-- LUAR SOLO RAYA -->
            <template v-if="!isSoloRaya">
              <label class="flex justify-between items-center cursor-pointer">
                <div class="flex items-center gap-2">
                  <input type="radio" value="5000" v-model="shippingCost" />
                  <span>Hemat (7 Hari)</span>
                </div>
                <span>Rp 5.000</span>
              </label>

              <label class="flex justify-between items-center cursor-pointer">
                <div class="flex items-center gap-2">
                  <input type="radio" value="10000" v-model="shippingCost" />
                  <span>Standar (3 Hari)</span>
                </div>
                <span>Rp 10.000</span>
              </label>

              <label class="flex justify-between items-center cursor-pointer">
                <div class="flex items-center gap-2">
                  <input type="radio" value="15000" v-model="shippingCost" />
                  <span>Express (1 Hari)</span>
                </div>
                <span>Rp 15.000</span>
              </label>
            </template>
          </div>

          <!-- TOTAL -->
          <div class="flex justify-between text-lg font-bold pt-2">
            <p>Total</p>
            <p>Rp {{ formatNumber(grandTotal) }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed, reactive, ref, watch } from "vue";
import { router } from "@inertiajs/vue3";

/* ================= FORM ================= */
const form = reactive({
  email: "",
  no_telp: "",
  first_name: "",
  last_name: "",
  kota: "",
  kode_pos: "",
  detail_alamat: "",
  catatan: "",
});

/* ================= PROPS ================= */
const props = defineProps({
  items: { type: Array, default: () => [] },
});

/* ================= SOLO RAYA ================= */
const soloRayaList = [
  "solo",
  "surakarta",
  "sukoharjo",
  "karanganyar",
  "boyolali",
  "klaten",
  "wonogiri",
  "sragen",
];

const isSoloRaya = computed(() =>
  soloRayaList.some(k => form.kota.toLowerCase().includes(k))
);

/* ================= ONGKIR ================= */
const shippingCost = ref(10000);

watch(isSoloRaya, (val) => {
  shippingCost.value = val ? 0 : 10000;
});

/* ================= CART ================= */
const totalPrice = computed(() =>
  props.items.reduce((t, i) => t + i.produk.harga * i.jumlah, 0)
);

const totalItems = computed(() =>
  props.items.reduce((t, i) => t + i.jumlah, 0)
);

const grandTotal = computed(() =>
  totalPrice.value + Number(shippingCost.value)
);

/* ================= ACTION ================= */
function bayar() {
  const alamat = `${form.detail_alamat}, ${form.kota}, ${form.kode_pos}`;
  const nama = `${form.first_name} ${form.last_name}`;

  router.post(route("pesanan.token"), {
    nama,
    email: form.email,
    no_telp: form.no_telp,
    alamat,
    ongkir: shippingCost.value,
    total: grandTotal.value,
  });
}

function formatNumber(num) {
  return num.toLocaleString("id-ID");
}
</script>

<style scoped>
.input {
  @apply w-full bg-white rounded-lg px-3 py-2 border border-gray-400;
}
</style>
