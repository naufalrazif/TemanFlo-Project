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
      <form @submit.prevent="handleSubmit" class="space-y-4 text-left">
        <div>
          <label class="block text-sm mb-1 font-medium">Email</label>
          <input
            v-model="form.email"
            type="email"
            required
            class="w-full rounded-full px-4 py-2 bg-white text-gray-900 placeholder-gray-400 shadow-sm focus:ring-2 focus:ring-[#F3D6D0] focus:outline-none"
            placeholder="Masukkan email kamu"
          />
        </div>

        <div>
          <label class="block text-sm mb-1 font-medium">Password</label>
          <input
            v-model="form.password"
            type="password"
            required
            class="w-full rounded-full px-4 py-2 bg-white text-gray-900 placeholder-gray-400 shadow-sm focus:ring-2 focus:ring-[#F3D6D0] focus:outline-none"
            placeholder="Masukkan password"
          />
        </div>

        <div>
          <label class="block text-sm mb-1 font-medium">No.Telepon</label>
          <input
            v-model="form.no_hp"
            type="text"
            required
            class="w-full rounded-full px-4 py-2 bg-white text-gray-900 placeholder-gray-400 shadow-sm focus:ring-2 focus:ring-[#F3D6D0] focus:outline-none"
            placeholder="Masukkan nomor telepon"
          />
        </div>

        <button
  type="submit"
  class="w-1/2 mx-auto block bg-[#F3D6D0] text-black text-center font-semibold py-2 rounded-full hover:bg-[#F0C7BE] transition"
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

<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import bgLogin from "../assets/bgLogin.jpg";
import { useForm } from '@inertiajs/vue3'



const form = useForm({
  email: '',
  password: '',
  no_hp: ''
})

const handleSubmit = () => {
  console.log('Mengirim data:', form)

  form.post('/register', {
    onSuccess: () => {
      console.log('Registrasi berhasil!')
      // redirect manual ke halaman yang kamu mau
      window.location.href = '/home'
    },
    onError: (errors) => {
      console.error('Gagal validasi:', errors)
    }
  })}

</script>

