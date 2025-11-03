<template>
  <div class="min-h-screen bg-gray-100 flex items-center justify-center py-10">
    <!-- Container utama -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden grid grid-cols-1 md:grid-cols-2 w-full max-w-5xl">

      <!-- LEFT -->
      <div class="bg-[#e6bbaa] p-8 flex flex-col gap-4">
        <h2 class="text-lg font-semibold">Contact Information</h2>
        <input type="text" placeholder="Email" class="input" />
        <input type="text" placeholder="Phone number" class="input" />

        <div class="flex gap-3">
          <input type="text" placeholder="First name" class="input w-full" />
          <input type="text" placeholder="Last name" class="input w-full" />
        </div>

        <h2 class="text-lg font-semibold mt-3">Alamat</h2>
        <input type="text" placeholder="Kota / Kecamatan" class="input" />
        <input type="text" placeholder="Kode Pos" class="input" />
        <input type="text" placeholder="Detail Alamat (jalan, no. rumah)" class="input" />

        <h2 class="text-lg font-semibold mt-3">Payment</h2>
        <div class="space-y-2">
          <label class="flex items-center gap-2">
            <input type="radio" name="pay" class="accent-black" checked /> BRI
          </label>
          <label class="flex items-center gap-2">
            <input type="radio" name="pay" class="accent-black" /> BCA
          </label>
          <label class="flex items-center gap-2">
            <input type="radio" name="pay" class="accent-black" /> Mandiri
          </label>
        </div>

        <button class="bg-[#577a63] text-white rounded-lg py-3 mt-5 hover:opacity-90">
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
        <div v-if="cart.length > 0" class="mt-4 space-y-4">
          <div
            v-for="(item, index) in cart"
            :key="index"
            class="flex justify-between items-center"
          >
            <div class="flex items-center gap-3">
              <img :src="item.img" class="w-20 h-20 rounded object-cover" />
              <div>
                <p class="font-medium">{{ item.name }}</p>
                <p class="text-sm">Rp {{ formatNumber(item.price) }}</p>
              </div>
            </div>
            <p>{{ item.qty }}</p>
          </div>
        </div>

        <!-- Kalau cart kosong -->
        <div v-else class="text-center text-gray-500 mt-10">
          Keranjang kosong 😔
        </div>

        <!-- Ringkasan -->
        <div class="border-t mt-6 pt-4 text-sm space-y-1" v-if="cart.length > 0">
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

<script>
export default {
  name: "CheckoutPage",
  data() {
    return {
      cart: [], // ambil dari localStorage
    };
  },
  computed: {
    totalPrice() {
      return this.cart.reduce((total, item) => total + item.price * item.qty, 0);
    },
    totalItems() {
      return this.cart.reduce((total, item) => total + item.qty, 0);
    },
  },
  mounted() {
    const savedCart = localStorage.getItem("cart");
    if (savedCart) {
      this.cart = JSON.parse(savedCart);
    } else {
      // kalau cart kosong, redirect ke cart
      this.$router.push("/cart");
    }
  },
  methods: {
    formatNumber(num) {
      return num.toLocaleString("id-ID");
    },
  },
};
</script>

<style scoped>
.input {
  @apply w-full bg-white rounded-lg px-3 py-2 border border-gray-400;
}
</style>
