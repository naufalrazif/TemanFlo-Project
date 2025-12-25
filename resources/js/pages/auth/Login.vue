<script setup>
import Checkbox from '@/components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import bgLogin from "@/assets/BgLogin.jpg";
import logo from "@/assets/logo2.png";
import { ref } from 'vue';

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
    class="min-h-screen flex items-center justify-center bg-cover bg-center px-3 md:px-0"
    :style="{ backgroundImage: `url(${bgLogin})` }"
  >

    <!-- LOGO -->
  <div class="absolute top-40 md:top-8 left-1/2 transform -translate-x-1/2 z-10">
  <img :src="logo" alt="Ratu Florist Logo" class="w-24 md:w-32 mx-auto" />
</div>



    <!-- KOTAK LOGIN -->
    <div
      class="bg-[#ded2d1]/75 rounded-[30px] shadow-lg 
             p-6 md:p-10
             w-full md:w-[420px]
             text-center text-white
             mt-24 md:mt-16"
    >
      <!-- JUDUL -->
      <h1 class="text-2xl md:text-3xl font-bold mb-2 tracking-wide text-black">LOGIN</h1>

      <p class="text-xs md:text-sm mb-6 text-black">
        <strong>Welcome back to Ratu Florist!</strong><br />
        Saatnya temukan buket favoritmu
      </p>

      <!-- FORM -->
      <form @submit.prevent="submit">
        <!-- EMAIL -->
        <div class="text-left">
          <label class="block mb-1 font-medium text-black">Email</label>
          <input
            v-model="form.email"
            type="email"
            required
            autofocus
            autocomplete="username"
            class="w-full rounded-full px-4 py-2 
                   text-sm md:text-base
                   bg-white text-gray-900 placeholder-gray-400 shadow-sm
                   focus:ring-2 focus:ring-[#F3D6D0] focus:outline-none"
            :class="{ 'border-2 border-red-500': form.errors.email && !form.errors.email.includes('belum diverifikasi') }"
          />
          <InputError 
            v-if="form.errors.email && !form.errors.email.includes('belum diverifikasi')" 
            class="mt-2" 
            :message="form.errors.email" 
          />
        </div>

        <!-- PASSWORD -->
        <div class="text-left mt-4">
          <label class="block mb-1 font-medium text-black">Password</label>
          <input
            v-model="form.password"
            type="password"
            required
            autocomplete="current-password"
            class="w-full rounded-full px-4 py-2 
                   text-sm md:text-base
                   bg-white text-gray-900 placeholder-gray-400 shadow-sm
                   focus:ring-2 focus:ring-[#F3D6D0] focus:outline-none"
            :class="{ 'border-2 border-red-500': form.errors.password }"
          />
          <InputError class="mt-2" :message="form.errors.password" />
        </div>

        <!-- REMEMBER & FORGOT -->
        <div class="flex justify-between items-center text-xs md:text-sm text-black mt-4">
          <label class="flex items-center space-x-1">
            <input
              type="checkbox"
              v-model="form.remember"
              class="rounded-sm focus:ring-0 accent-pink-300"
            />
            <span>Remember me</span>
          </label>

          <Link 
            v-if="canResetPassword" 
            :href="route('password.request')" 
            class="text-black hover:underline"
          >
            Forgot password?
          </Link>
        </div>

        <!-- TOMBOL LOGIN -->
        <div class="flex justify-center mt-6">
          <button
            type="submit"
            class="w-full md:w-1/2 bg-[#d16c7c] hover:bg-[#f4b3be]
                   text-black font-semibold py-2 rounded-full 
                   transition-transform duration-200 hover:scale-105"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            <span v-if="form.processing">Logging in...</span>
            <span v-else>Log in</span>
          </button>
        </div>
      </form>

      <!-- SIGN UP -->
      <p class="text-black text-xs md:text-sm mt-6">
        Don't have an account?
        <Link :href="route('register')" class="font-bold hover:underline text-black">
          SIGN UP
        </Link>
      </p>
    </div>
  </div>
</template>
