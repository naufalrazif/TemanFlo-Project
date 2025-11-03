<template>
  <div class="relative inline-block text-left">
    <!-- Tombol utama -->
    <button
      @click="toggleDropdown"
      class="flex items-center justify-between w-48 bg-[#5B7263] text-white px-4 py-2 rounded-md focus:outline-none"
    >
      <span>{{ selectedLabel }}</span>
      <svg
        :class="['w-4 h-4 transition-transform duration-200', isOpen ? 'rotate-180' : 'rotate-0']"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M19 9l-7 7-7-7"/>
      </svg>
    </button>

    <!-- Dropdown menu -->
    <div
      v-if="isOpen"
      class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10"
    >
      <ul class="py-1 text-gray-800">
        <li
          v-for="option in options"
          :key="option.value"
          @click="selectOption(option)"
          class="px-4 py-2 hover:bg-[#5B7263] cursor-pointer"
        >
          {{ option.label }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";

const isOpen = ref(false);
const selectedLabel = ref("Urut berdasarkan");

const options = [
  { label: "Jenis", value: "jenis" },
  { label: "Tema", value: "tema" },
  { label: "Size", value: "size" },
];

function toggleDropdown() {
  isOpen.value = !isOpen.value;
}

function selectOption(option) {
  selectedLabel.value = option.label;
  isOpen.value = false;
  // emit ke parent biar bisa dipakai
  emit("select", option.value);
}

const emit = defineEmits(["select"]);
</script>
