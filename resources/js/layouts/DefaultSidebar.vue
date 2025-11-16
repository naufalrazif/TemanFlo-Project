<!-- src/layouts/DefaultWithSidebar.vue -->
<template>
  <div class="flex min-h-screen">
    <!-- Sidebar di kiri, tidak scroll -->
    <Side />
    
    <!-- Konten utama, bisa di-scroll -->
    <main class="flex-1 overflow-y-auto bg-white">
      <slot />
    </main>
  </div>
</template>

<script setup>
import Side from '@/components/Side.vue'  // ← sesuaikan path kalau beda
</script>