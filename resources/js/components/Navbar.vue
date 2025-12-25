<template>
  <header class="fixed top-0 left-0 w-full z-40 bg-[#5B7263]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between py-3">

      <!-- Logo -->
      <div class="flex items-center space-x-2">
        <img src="@/assets/logo2.png" alt="Ratu Florist" class="h-14 w-auto md:h-20" />
      </div>

      <!-- HAMBURGER (MOBILE) -->
      <button
        @click="openMobile = !openMobile"
        class="text-white text-3xl md:hidden"
      >
        ☰
      </button>

      <!-- Desktop Menu -->
      <nav class="hidden md:flex space-x-8 text-lg text-white">
        <a href="/" class="hover:font-semibold transition">Home</a>
        <a href="/katalog" class="hover:font-semibold transition">Katalog</a>
        <a href="/about" class="hover:font-semibold transition">About Us</a>
        <a
          v-if="$page.props.auth.user && $page.props.auth.user.role === 'admin'"
          :href="route('produk.index')"
          class="hover:font-semibold transition"
        >
          Admin
        </a>
      </nav>

      <!-- Icons (Desktop Only) -->
      <div class="hidden md:flex items-center space-x-4">
        <a href="/keranjang" aria-label="Cart" class="w-10 h-10 flex items-center justify-center text-white">
          <Cart />
        </a>

        <!-- Profile Icon -->
        <div class="relative">
          <button
            @click="showDropdown = !showDropdown"
            class="w-10 h-10 flex items-center justify-center text-white"
          >
            <Profile />
          </button>

          <!-- Dropdown (Desktop) -->
          <div
            v-if="showDropdown"
            class="absolute right-0 mt-2 w-40 bg-white shadow-lg rounded-lg p-2 text-black z-50"
          >
            <template v-if="!page.props.auth.user">
              <a :href="route('login')" class="block px-3 py-2 hover:bg-gray-100 rounded">Login</a>
              <a :href="route('register')" class="block px-3 py-2 hover:bg-gray-100 rounded">Register</a>
            </template>

            <template v-else>
              <a class="block px-3 py-2 hover:bg-gray-100 rounded">Pesanan Saya</a>
              <button @click="logout" class="w-full text-left px-3 py-2 hover:bg-gray-100 rounded">Logout</button>
            </template>
          </div>
        </div>
      </div>
    </div>

    <!-- MOBILE MENU -->
    <div
      v-if="openMobile"
      class="md:hidden bg-[#5B7263] text-white px-6 py-4 space-y-4 border-t border-white/20"
    >
      <a href="/" @click="openMobile=false" class="block">Home</a>
      <a href="/katalog" @click="openMobile=false" class="block">Katalog</a>
      <a href="/about" @click="openMobile=false" class="block">About Us</a>

      <!-- Mobile Icons -->
      <div class="flex gap-5 pt-3 border-t border-white/20 pt-4">
        <a href="/keranjang" class="text-2xl">
          <Cart />
        </a>

        <button
          @click="showDropdownMobile = !showDropdownMobile"
          class="text-2xl"
        >
          <Profile />
        </button>
      </div>

      <!-- Mobile Dropdown -->
      <div v-if="showDropdownMobile" class="bg-white text-black rounded-lg p-2 mt-3">
        <template v-if="!page.props.auth.user">
          <a :href="route('login')" class="block px-3 py-2 hover:bg-gray-100 rounded">Login</a>
          <a :href="route('register')" class="block px-3 py-2 hover:bg-gray-100 rounded">Register</a>
        </template>

        <template v-else>
           <a class="block px-3 py-2 hover:bg-gray-100 rounded">Pesanan Saya</a>
          <button @click="logout" class="w-full text-left px-3 py-2 hover:bg-gray-100 rounded">Logout</button>
        </template>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref } from "vue";
import { router, usePage } from "@inertiajs/vue3";
import Profile from "@/components/LogoProfile.vue";
import Cart from "@/components/LogoKeranjang.vue";

const showDropdown = ref(false);
const showDropdownMobile = ref(false);
const openMobile = ref(false);
const page = usePage();

function logout() {
  router.post(route("logout"));
}
</script>
