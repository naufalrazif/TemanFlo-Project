<!--<script setup lang="ts">
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import type { BreadcrumbItemType } from '@/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <slot />
    </AppLayout>
</template>-->

<template>
  <div class="relative">
    <!-- Halaman utama -->
    <slot />

    <!-- Modal -->
    <div
      v-if="modalComponent"
      class="fixed inset-0 bg-black/30 flex justify-center items-center z-50"
    >
      <component :is="modalComponent" @close="closeModal" class="z-60" />
    </div>
  </div>
</template>

<script setup>
import { computed, defineAsyncComponent } from 'vue'
import { usePage, router } from '@inertiajs/vue3'

const page = usePage()
const modalName = computed(() => page.props.modal || null)

const modalComponent = computed(() => {
  if (!modalName.value) return null
  try {
    // 🧠 PENTING: gunakan path relatif sesuai struktur kamu
    return defineAsyncComponent(() =>
      import(`@/pages/${modalName.value}.vue`)
    )
  } catch (e) {
    console.error('Gagal load modal:', e)
    return null
  }
})

const closeModal = () => {
  router.visit('/lihat', { preserveState: true })
}
</script>

