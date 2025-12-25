<template>
  <header class="fixed top-0 left-0 w-full z-40 bg-[#E6C7C0]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
      
      <!-- Logo -->
      <div class="flex items-center space-x-2 py-2 ml-5">
        <img src="@/assets/logo.png" alt="Ratu Florist" class="h-20 w-auto" />
      </div>
    
      <!-- Navigation -->
      <nav class="hidden md:flex space-x-8 text-base font-medium text-black">
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

      <!-- Icons -->
      <div class="flex items-center space-x-4 mr-5">
        <!-- Cart Icon -->
        <a
          href="/keranjang"
          aria-label="Cart"
          class="flex items-center justify-center w-10 h-10 text-black hover:text-gray-200 transition"
        >
          <Cart />
        </a>

        <!-- Profile Icon with Dropdown -->
        <div class="relative">
          <button
            aria-label="Account"
            @click="showDropdown = !showDropdown"
            class="flex items-center justify-center w-10 h-10 text-black hover:text-gray-200 transition"
          >
            <Profile />
          </button>

          <!-- Dropdown -->
          <div
            v-if="showDropdown"
            class="absolute right-0 mt-2 w-40 bg-black shadow-lg rounded-lg p-2 z-50 text-white"
          >
            <!-- Jika user belum login -->
            <template v-if="!page.props.auth.user">
              <a :href="route('login')" class="block px-3 py-2 hover:bg-gray-100 rounded">
                Login
              </a>
              <a :href="route('register')" class="block px-3 py-2 hover:bg-gray-100 rounded">
                Register
              </a>
            </template>

            <!-- Jika user sudah login -->
            <template v-else>
              <button
                @click="logout"
                class="w-full text-left px-3 py-2 hover:bg-gray-100 rounded"
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
import Profile from "@/components/LogoProfile2.vue"
import Cart from "@/components/LogoKeranjang2.vue"
import { router, usePage } from "@inertiajs/vue3"

const showDropdown = ref(false)
const page = usePage()

function logout() {
  router.post(route("logout"))
}
</script>