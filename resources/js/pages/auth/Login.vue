<script setup>
import Checkbox from '@/components/Checkbox.vue';
import GuestLayout from '@/layouts/GuestLayout.vue';
import InputError from '@/components/InputError.vue';
import InputLabel from '@/components/InputLabel.vue';
import PrimaryButton from '@/components/PrimaryButton.vue';
import TextInput from '@/components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
 <div
    class="min-h-screen flex items-center justify-center bg-cover bg-center font-[Poppins]"
    :style="{ backgroundImage: `url(${bgLogin})` }"
  >
    <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
        {{ status }}
    </div>
    <div
      class="bg-[#73615F]/75 rounded-[30px] shadow-lg p-10 w-[420px] text-center text-white"
    >
      <!-- Judul -->
      <h1 class="text-3xl font-bold mb-2 tracking-wide">LOGIN</h1>
      <p class="text-sm mb-6 text-gray-200">
        <strong>Welcome back to Ratu Florist!</strong><br />
        Saatnya temukan buket favoritmu
      </p>

      <!-- Form -->
      <form @submit.prevent="submit">
        <div class="text-left">
          <label class="block mb-1 font-medium" for="email" value="email">Email</label>
          <input
            v-model="form.email"
            type="email"
            required
            autofocus
            id="email"
            autocomplete="username"
            class="w-full rounded-full px-4 py-2 bg-white text-gray-900 placeholder-gray-400 shadow-sm focus:ring-2 focus:ring-[#F3D6D0] focus:outline-none"
          />
          <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div class="text-left">
          <label class="block mb-1 font-medium">Password</label>
          <input
            v-model="form.password"
            type="password"
            id="password"
            required
            autocomplete="current-password"
           class="w-full rounded-full px-4 py-2 bg-white text-gray-900 placeholder-gray-400 shadow-sm focus:ring-2 focus:ring-[#F3D6D0] focus:outline-none"
          />
          <InputError class="mt-2" :message="form.errors.password" />
        </div>

        <!-- Remember me dan Forgot password -->
        <div class="flex justify-between items-center text-sm text-gray-200">
          <label class="flex items-center space-x-1">
            <input
              type="checkbox"
              v-model="form.remember"
              class="rounded-sm focus:ring-0 accent-pink-300"
            />
            <span>Remember me</span>
          </label>
          <a href="#" class="text-pink-100 hover:underline">Forgot password?</a>
        </div>

        <!-- Tombol login -->
        <div class="flex justify-center">
            <PrimaryButton
                class="w-1/2 bg-[#EBCECA] hover:bg-pink-300 text-black font-semibold py-2 rounded-full transition-transform duration-200 hover:scale-105"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
            </PrimaryButton>

        </div>
      </form>

      <!-- Link ke signup -->
      <p class="text-gray-200 text-sm mt-6">
        Don’t have an account?
        <a href="/signup" class="font-bold hover:underline">SIGN UP</a>
      </p>
    </div>
  </div>

</template>
