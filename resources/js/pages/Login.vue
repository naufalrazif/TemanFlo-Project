<template>
  <div
    class="min-h-screen flex items-center justify-center bg-cover bg-center font-[Poppins]"
    :style="{ backgroundImage: `url(${bgLogin})` }"
  >
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
      <form @submit.prevent="submitLogin" class="space-y-5">
        <div class="text-left">
          <label class="block mb-1 font-medium">Email</label>
          <input
            v-model="form.email"
            type="email"
            required
            class="w-full rounded-full px-4 py-2 bg-white text-gray-900 placeholder-gray-400 shadow-sm focus:ring-2 focus:ring-[#F3D6D0] focus:outline-none"
          />
        </div>

        <div class="text-left">
          <label class="block mb-1 font-medium">Password</label>
          <input
            v-model="form.password"
            type="password"
            required
           class="w-full rounded-full px-4 py-2 bg-white text-gray-900 placeholder-gray-400 shadow-sm focus:ring-2 focus:ring-[#F3D6D0] focus:outline-none"
          />
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
          <button
            type="submit"
            class="w-1/2 bg-[#EBCECA] hover:bg-pink-300 text-black font-semibold py-2 rounded-full transition-transform duration-200 hover:scale-105"
          >
            Log in
          </button>
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

<script setup>
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";
import bgLogin from "@/../assets/bgLogin.jpg";

const form = reactive({
  email: "",
  password: "",
  remember: false,
});

function submitLogin() {
  router.post("/login", form);
}
</script>
