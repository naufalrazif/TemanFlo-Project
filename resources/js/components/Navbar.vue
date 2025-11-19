<template>
  <header class="fixed top-0 left-0 w-full z-40 bg-[#416b60]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
      
      <!-- Logo -->
      <div class="flex items-center space-x-2 py-4 ml-5">
        <img src= "@/assets/logo2.png" alt="Rania Flower Kitchen" class="h-20 w-auto " />
      </div>
    
      <!-- Navigation -->
       <nav class="hidden md:flex space-x-8 text-base font-medium">
        <a href="/" class="hover:font-semibold">Home</a>
        <a href ="/allbunga" class="hover:font-semibold">Katalog</a>
        <a href="/about" class="hover:font-semibold">About Us</a>
      </nav>

      <!-- Icons -->
      <div class="flex items-center space-x-4 mr-5 ">
        <a
          href="/keranjang"
          aria-label="Cart"
        >
          <Cart />
        </a>
        <div class="relative">
        <button aria-label="Account" @click="showDropdown = !showDropdown" >

          <Profile />
        </button>

         <!-- Dropdown -->
        <div
          v-if="showDropdown"
          class="absolute right-0 mt-2 w-40 bg-white shadow-lg rounded-lg p-2 z-50 text-black"
        >
          <!-- Jika user belum login -->
          <template v-if="!page.props.auth.user">
            <a :href="route('login')" class="block px-3 py-2 hover:bg-gray-100">
              Login
            </a>
            <a :href="route('register')" class="block px-3 py-2 hover:bg-gray-100">
              Register
            </a>
          </template>

          <!-- Jika user sudah login -->
          <template v-else>
            <button
              @click="logout"
              class="w-full text-left px-3 py-2 hover:bg-gray-100"
            >
              Logout
            </button>
          </template>
        </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref } from "vue"

import Profile from "@/components/LogoProfile.vue"
import Cart from "@/components/LogoKeranjang.vue"
import { router, usePage } from "@inertiajs/vue3"

const showDropdown = ref(false);
const page = usePage();

function logout() {
    router.post(route("logout"));
}


</script>