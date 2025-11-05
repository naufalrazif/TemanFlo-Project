<template>
  <div class="min-h-screen bg-[#f2cfc0] py-10 text-[#2b2b2b] font-[Poppins]">
    <div class="max-w-3xl mx-auto px-5 relative">
      <!-- Tombol kembali -->
      <div class="mb-2">
          <buttonBack/>
      </div>  
      
      <!--judul dan desk-->
      <h1 class="text-center font-[Rochester] text-4xl mt-5">Custom Order</h1>
      <div class="flex items-center justify-center">
        <p class="w-[497px] h-[49px] text-center text-base mt-2 mb-10">
          Ingin buket spesial? Tulis kreasimu di bawah ini, kami akan segera menghubungi untuk detail lebih lanjut.
        </p>
      </div>

      <!--form-->
      <form @submit.prevent="submitForm" class="flex flex-col gap-5">
        <div class="flex flex-wrap gap-10">
          <div class="flex-1 max-w-sm">
            <label for="nama" class="block font-semibold mb-2">Nama</label>
            <input
              type="text"
              id="nama"
              v-model="form.nama"
              required
              placeholder="Masukkan nama kamu"
              class="w-full px-4 py-2 rounded-xl border border-[#2b2b2b] bg-[#fffaf8] text-sm focus:outline-none"
            />
          </div>

          <div class="flex-1 max-w-sm">
            <label for="nohp" class="block font-semibold mb-2">No Handphone</label>
            <input
              type="text"
              v-model="form.nohp"
              @input="filterAngka"
              placeholder="Contoh: 081234567890"
              class="w-full px-4 py-2 rounded-xl border border-[#2b2b2b] bg-[#fffaf8] text-sm focus:outline-none"
            />
          </div>
        </div>

        <div>
          <label for="rincian" class="block font-semibold mb-2">Rincian Custom</label>
          <textarea
            id="rincian"
            v-model="form.rincian"
            required
            placeholder="Tulis ide atau detail buket yang kamu inginkan..."
            class="w-full px-4 py-2 rounded-xl border border-[#2b2b2b] bg-[#fffaf8] text-sm min-h-[150px] resize-y focus:outline-none"
          ></textarea>
        </div>

        <div class="max-w-sm">
          <label for="uangmuka" class="block font-semibold mb-2">Uang Muka</label>
          <input
            type="number"
            id="uangmuka"
            v-model="form.uangmuka"
            placeholder="Contoh: 50000"
            class="w-full px-4 py-2 rounded-xl border border-[#2b2b2b] bg-[#fffaf8] text-sm focus:outline-none"
          />
        </div>

        <a
          href="/payment-custom"
          class="self-end inline-block font-2xl text-white px-6 py-2 rounded-xl bg-[#53776c] hover:bg-[#31463f] transition">
          Pesan Sekarang
        </a>
      </form>
    </div>
  </div>
</template>

<script setup>
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";
import buttonBack from "@/components/buttonBack.vue";

const form = reactive({
  nama: "",
  nohp: "",
  rincian: "",
  uangmuka: "",
});

function filterAngka(event) {
  const target = event?.target;
  if (target && 'value' in target) {
    form.nohp = target.value.replace(/[^0-9]/g, '');
  }
}
</script>