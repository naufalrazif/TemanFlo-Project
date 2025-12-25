<template>
  <div class="flex min-h-screen bg-[#FBF5F1]">

    <!-- ======================= -->
    <!-- MOBILE TOPBAR -->
    <!-- ======================= -->
    <div class="md:hidden fixed top-0 left-0 w-full bg-[#5E756F] text-white flex items-center justify-between px-4 py-3 z-50">
      <button @click="mobileOpen = true" class="text-3xl">☰</button>
      <h2 class="text-xl font-[Rochester]">Katalog</h2>
    </div>

    <!-- ======================= -->
    <!-- SIDEBAR -->
    <!-- ======================= -->
    <div
      class="fixed top-0 left-0 min-h-screen w-64 bg-[#5B7263] text-white flex flex-col py-6 z-40
             transform transition-transform duration-300
             md:translate-x-0"
      :class="{ '-translate-x-full': !mobileOpen, 'translate-x-0': mobileOpen }"
    >
      <div class="flex items-center justify-left pl-8">
        <ButtonBack @click="back" />
      </div>

      <div class="pt-8">
        <h2 class="text-center font-[Rochester] text-3xl mb-6">Jenis Buket</h2>

        <!-- Filter -->
        <ul class="flex flex-col space-y-2 px-4">
          <li>
            <button
              @click="fetchProducts(null)"
              class="w-full text-left px-4 py-2 rounded-md hover:bg-[#8A6E68] transition"
              :class="{ 'bg-[#8A6E68]': !selectedCategory }"
            >
              Semua Produk
            </button>
          </li>

          <li v-for="cat in categories" :key="cat.id">
            <button
              @click="fetchProducts(cat.name)"
              class="w-full text-left px-4 py-2 rounded-md hover:bg-[#8A6E68] transition"
              :class="{ 'bg-[#8A6E68]': selectedCategory === cat.name }"
            >
              {{ formatCategoryName(cat.name) }}
            </button>
          </li>
        </ul>
      </div>

      <!-- Footer -->
      <div class="mt-auto px-4 space-y-2 text-base">
        <p><a href="/about" class="hover:underline">About Us</a></p>
        <p><a href="/guide" class="hover:underline">Guide</a></p>
        <p><a href="/TnC" class="hover:underline">Term & Condition</a></p>
      </div>

      <!-- Close Button (Mobile Only) -->
      <button
        @click="mobileOpen = false"
        class="md:hidden absolute top-4 right-4 text-2xl text-white"
      >
        ✕
      </button>
    </div>

    <!-- ======================= -->
    <!-- KONTEN UTAMA -->
    <!-- ======================= -->
    <div class="flex-1 p-6 pt-20 md:pt-10 md:ml-64 transition-all">

      <!-- Judul -->
      <h1 class="text-5xl font-[Rochester] text-gray-800 mb-10">
        {{ selectedCategory ? `All Product ${formatCategoryName(selectedCategory)}` : 'All Product Buket' }}
      </h1>

      <!-- Produk Grid -->
      <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-10">
        <a
          v-for="product in paginatedProducts"
          :key="product.id"
          :href="`/buket/${product.id}`"
          class="flex flex-col items-center text-center"
        >
          <img
            :src="product.image_url || '/images/placeholder.jpg'"
            class="w-32 sm:w-40 md:w-48 h-32 sm:h-40 md:h-48 object-cover rounded-md border mb-3"
            @error="$event.target.src = '/images/placeholder.jpg'"
          />
          <h2 class="text-sm md:text-base font-semibold text-gray-800">
            {{ product.name }}
          </h2>
          <p class="text-sm text-gray-600">
            {{ product.price ? `Rp ${product.price.toLocaleString('id-ID')}` : 'Harga tidak tersedia' }}
          </p>
        </a>
      </div>

      <!-- Pagination -->
      <div v-if="totalPages > 1" class="flex justify-center mt-8 space-x-2">
        <button
          v-for="page in totalPages"
          :key="page"
          @click="currentPage = page"
          class="px-3 py-1 rounded border"
          :class="{
            'bg-rose-100 text-rose-700 border-rose-300': currentPage === page,
            'bg-white text-gray-700 border-gray-300 hover:bg-gray-50': currentPage !== page
          }"
        >
          {{ page }}
        </button>
      </div>

    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'
import ButtonBack from '@/components/ButtonBack.vue'

const mobileOpen = ref(false)

const categories = ref([])
const products = ref([])
const selectedCategory = ref(null)
const currentPage = ref(1)
const itemsPerPage = 9

const fetchCategories = async () => {
  const res = await axios.get('/katalog/categories')
  categories.value = res.data
}

const fetchProducts = async (category = null) => {
  const url = category
    ? `/katalog/products?category=${encodeURIComponent(category)}`
    : '/katalog/products'
  const res = await axios.get(url)

  products.value = res.data
  selectedCategory.value = category
  currentPage.value = 1
  mobileOpen.value = false
}

const paginatedProducts = computed(() => {
  const start = (currentPage.value - 1) * itemsPerPage
  return products.value.slice(start, start + itemsPerPage)
})

const totalPages = computed(() => {
  return Math.ceil(products.value.length / itemsPerPage)
})

onMounted(() => {
  fetchCategories()
  fetchProducts()
})

const formatCategoryName = (name) => {
  return name
    .replace(/_/g, ' ')
    .split(' ')
    .map(w => w.charAt(0).toUpperCase() + w.slice(1))
    .join(' ')
}
</script>

