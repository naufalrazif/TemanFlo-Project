<script setup>
import GuestLayout from '@/layouts/GuestLayout.vue';
import InputError from '@/components/InputError.vue';
import InputLabel from '@/components/InputLabel.vue';
import PrimaryButton from '@/components/PrimaryButton.vue';
import TextInput from '@/components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import bgLogin from "@/assets/bgLogin.jpg";

const form = useForm({
    nama: '',
    email: '',
    no_telp: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <div
    class="min-h-screen flex items-center justify-center bg-cover bg-center font-[Poppins]"
    :style="{ backgroundImage: `url(${bgLogin})` }"
  >
    <!-- Card -->
     <div>
    <img src="/assets/logo2.png" alt="logo" class="absolute top-10 left-1/2 transform -translate-x-1/2 w-auto h-40" />

  </div>
    <div
      class="bg-[#5D776C]/75 backdrop-blur-sm rounded-[25px] p-10 w-[400px] text-white text-center shadow-2xl mt-20"
    >


      <!-- Title -->
      <h1 class="text-3xl font-semibold mb-1">SIGN UP</h1>
      <p class="text-sm font-semibold">Welcome to Ratu Florist!</p>
      <p class="text-xs text-gray-200 mb-6">
        Temukan pilihan buket cantik untuk setiap momen spesialmu.
      </p>

      <!-- Form -->
      <form @submit.prevent="submit" class="space-y-4 text-left">
        <div>
          <label class="block text-sm mb-1 font-medium">Nama</label>
          <input
            id="nama"
            type="text"
            class="w-full rounded-full px-4 py-2 bg-white text-gray-900 placeholder-gray-400 shadow-sm focus:ring-2 focus:ring-[#F3D6D0] focus:outline-none"
            v-model="form.nama"
            required
            autofocus
            autocomplete="nama"
          />
            <InputError class="mt-2" :message="form.errors.nama" />

        </div>

        <div>
          <label class="block text-sm mb-1 font-medium">Email</label>
          <input
            id="email"
            type="email"
            class="w-full rounded-full px-4 py-2 bg-white text-gray-900 placeholder-gray-400 shadow-sm focus:ring-2 focus:ring-[#F3D6D0] focus:outline-none"
            v-model="form.email"
            required
            autocomplete="username"
          />

          <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div>
          <label class="block text-sm mb-1 font-medium">No.Telepon</label>
          <input
            id="no_telp"
            type="text"
            class="w-full rounded-full px-4 py-2 bg-white text-gray-900 placeholder-gray-400 shadow-sm focus:ring-2 focus:ring-[#F3D6D0] focus:outline-none"
            v-model="form.no_telp"
            required
            autocomplete="username"
          />
        <InputError class="mt-2" :message="form.errors.email" />

        </div>

        <div>
          <label class="block text-sm mb-1 font-medium">Password</label>
          <input
            id="password"
            type="password"
            class="w-full rounded-full px-4 py-2 bg-white text-gray-900 placeholder-gray-400 shadow-sm focus:ring-2 focus:ring-[#F3D6D0] focus:outline-none"
            v-model="form.password"
            required
            autocomplete="new-password"
          />
        <InputError class="mt-2" :message="form.errors.password" />

        </div>

        <div>
          <label class="block text-sm mb-1 font-medium">Confirm Password</label>
          <input
            id="password_confirmation"
            type="password"
            class="w-full rounded-full px-4 py-2 bg-white text-gray-900 placeholder-gray-400 shadow-sm focus:ring-2 focus:ring-[#F3D6D0] focus:outline-none"
            v-model="form.password_confirmation"
            required
            autocomplete="new-password"
          />
        <InputError class="mt-2" :message="form.errors.password" />

        </div>
        
    <button
        class="w-1/2 mx-auto block bg-[#F3D6D0] text-black text-center font-semibold py-2 rounded-full hover:bg-[#F0C7BE] transition"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
    >
    Sign Up
    </button>
    </form>

      <p class="text-xs mt-6 text-gray-200 text-center">
        Do you have an account?
        <a href="/login" class="font-bold text-white hover:underline ml-1">LOGIN</a>
      </p>
    </div>
  </div>
    
</template>
