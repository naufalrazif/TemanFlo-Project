<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import bgLogin from "@/assets/bgRegist.jpg";
import logo from "@/assets/logo2.png"; 
import { onMounted, ref } from 'vue';

const props = defineProps({
    captchaKey: String
});

const form = useForm({
    name: '',
    email: '',
    no_telp: '',
    password: '',
    password_confirmation: '',
    'g-recaptcha-response': ''
});

const isRecaptchaLoaded = ref(false);
let recaptchaWidgetId = null;


const loadRecaptcha = () => {
    if (typeof grecaptcha === 'undefined') {

        const script = document.createElement('script');
        script.src = "https://www.google.com/recaptcha/api.js?onload=onRecaptchaLoad&render=explicit";
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);

    
        window.onRecaptchaLoad = () => {
            isRecaptchaLoaded.value = true;

            setTimeout(() => {
                const el = document.querySelector('#recaptcha-box');
                if (el) {
                    recaptchaWidgetId = grecaptcha.render(el, {
                        sitekey: props.captchaKey
                    });
                }
            }, 150);
        };

    } else {
        isRecaptchaLoaded.value = true;
    }
};


const submit = () => {
    if (!isRecaptchaLoaded.value) {
        alert("reCAPTCHA sedang dimuat, tunggu sebentar...");
        return;
    }

    const response = grecaptcha.getResponse(recaptchaWidgetId);

    if (!response) {
        alert("Silakan verifikasi bahwa Anda bukan robot!");
        return;
    }

    form['g-recaptcha-response'] = response;

    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
        onError: () => {
            grecaptcha.reset(recaptchaWidgetId);
        }
    });
};

onMounted(() => {
    loadRecaptcha();
});
</script>

<template>
    <div
        class="min-h-screen flex items-center justify-center bg-cover bg-center"
        :style="{ backgroundImage: `url(${bgLogin})` }"
    >
    
        <div class="bg-[#5D776C]/75 backdrop-md rounded-[20px] p-6 w-[360px] text-white text-center shadow-lg">


            <h1 class="text-2xl font-semibold mb-1">SIGN UP</h1>
            <p class="text-xs font-semibold mb-2">Welcome to Ratu Florist!</p>
            <p class="text-[10px] text-gray-200 mb-6">
                Temukan pilihan buket cantik untuk setiap momen spesialmu.
            </p>

            <form @submit.prevent="submit" class="space-y-3 text-left">

                <!-- Nama -->
                <div>
                    <label class="block text-xs mb-1 font-medium">Nama</label>
                    <input
                        id="name"
                        type="text"
                        class="w-full rounded-full px-3 py-1.5 bg-white text-gray-900 placeholder-gray-400 shadow-sm text-sm"
                        v-model="form.name"
                        required
                    />
                    <InputError class="mt-1" :message="form.errors.name" />
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-xs mb-1 font-medium">Email</label>
                    <input
                        id="email"
                        type="email"
                        class="w-full rounded-full px-3 py-1.5 bg-white text-gray-900 shadow-sm text-sm"
                        v-model="form.email"
                        required
                    />
                    <InputError class="mt-1" :message="form.errors.email" />
                </div>

                <!-- No Telepon -->
                <div>
                    <label class="block text-xs mb-1 font-medium">No.Telepon</label>
                    <input
                        id="no_telp"
                        type="text"
                        class="w-full rounded-full px-3 py-1.5 bg-white text-gray-900 shadow-sm text-sm"
                        v-model="form.no_telp"
                        required
                    />
                    <InputError class="mt-1" :message="form.errors.no_telp" />
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-xs mb-1 font-medium">Password</label>
                    <input
                        id="password"
                        type="password"
                        class="w-full rounded-full px-3 py-1.5 bg-white text-gray-900 shadow-sm text-sm"
                        v-model="form.password"
                        required
                    />
                    <InputError class="mt-1" :message="form.errors.password" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-xs mb-1 font-medium">Confirm Password</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        class="w-full rounded-full px-3 py-1.5 bg-white text-gray-900 shadow-sm text-sm"
                        v-model="form.password_confirmation"
                        required
                    />
                    <InputError class="mt-1" :message="form.errors.password_confirmation" />
                </div>

                <!-- RECAPTCHA -->
                <div class="mt-3">
                    <div id="recaptcha-box" class="mx-auto"></div>

                    <div v-if="!isRecaptchaLoaded" class="text-gray-300 text-xs text-center py-2">
                        Loading reCAPTCHA...
                    </div>

                    <InputError class="mt-1" :message="form.errors['g-recaptcha-response']" />
                </div>

                <!-- Tombol Sign Up - Soft Pink -->
                 <div class="flex justify-center mt-6">
                <button
                    class="w-1/2 block bg-[#F3D6D0] text-black font-semibold py-2 rounded-full transition-transform duration-200 hover:scale-105"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Sign Up
                </button>
                </div>
            </form>

            <!-- Link Login -->
            <p class="text-[10px] mt-4 text-gray-200 text-center">
                Do you have an account?
                <a href="/login" class="font-bold text-white hover:underline ml-1">LOGIN</a>
            </p>
        </div>
    </div>
</template>