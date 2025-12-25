<template>
  <Head title="Verifikasi OTP" />
  
  <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          Verifikasi OTP
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
          Kode OTP telah dikirim ke: <strong>{{ email || 'email Anda' }}</strong>
        </p>
      </div>

      <form class="mt-8 space-y-6" @submit.prevent="submit">
        <div v-if="$page.props.flash.success" class="bg-[#EBCECA] border border-[#EBCECA] text-[#765956] px-4 py-3 rounded">
          {{ $page.props.flash.success }}
        </div>

        <div v-if="form.errors.otp_code" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
          {{ form.errors.otp_code }}
        </div>

        <div>
          <label for="otp_code" class="block text-sm font-medium text-gray-700">
            Kode OTP (6 digit)
          </label>
          <input
            id="otp_code"
            v-model="form.otp_code"
            type="text"
            maxlength="6"
            required
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            placeholder="Masukkan 6 digit kode"
            :class="{ 'border-red-500': form.errors.otp_code }"
          />
        </div>

        <input type="hidden" v-model="form.user_id" />

        <div>
          <button
            type="submit"
            :disabled="form.processing"
            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#EBCECA] hover:bg-[#D4B7B2] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50"
          >
            <span v-if="form.processing">Memverifikasi...</span>
            <span v-else>Verifikasi OTP</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/vue3';
const props = defineProps({
  email: String,
  user_id: Number,
});

const form = useForm({
  otp_code: '',
  user_id: props.user_id || null,
});

const submit = () => {
  form.post('/verify-otp', {
    preserveScroll: true,
    onSuccess: () => {
      // Reset form setelah success
      form.reset('otp_code');
      
    }
  });
};
</script>