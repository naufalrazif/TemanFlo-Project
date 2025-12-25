<template>
  <div class="min-h-screen bg-[#FBF5F1] flex flex-col items-center py-10 px-6 md:px-20">

      <Navbar />

    <!-- Judul -->
    <h1 class="text-4xl text-[#000000] font-[Rochester] mt-20 mb-10 text-center">
      Ordering Guide
    </h1>

    <!-- Konten utama -->
    <div class="flex flex-col md:flex-row gap-10 w-full max-w-6xl mx-auto">

      <!-- Kolom kiri (gambar) -->
      <div class="flex flex-col pt-6 gap-10 w-full md:w-[450px]">

        <!-- Gambar 1 -->
        <div class="w-full h-56 sm:h-72 md:h-[300px] bg-[#f8eee8] rounded-2xl shadow-md overflow-hidden">
          <img 
            src="/assets/bunga.jpg" 
            alt="Bunga" 
            class="w-full h-full object-cover object-center rounded-2xl shadow-md"
          />
        </div>

        <!-- Gambar 2 -->
        <div class="w-full h-56 sm:h-72 md:h-[300px] bg-[#f8eee8] rounded-2xl shadow-md overflow-hidden">
          <img 
            src="/assets/boneka2.jpg" 
            alt="Boneka" 
            class="w-full h-full object-cover object-center rounded-2xl shadow-md"
          />
        </div>

      </div>

      <!-- Kolom kanan (card putih isi langkah-langkah) -->
      <div class="bg-white rounded-2xl shadow-lg p-6 md:p-10 w-full md:w-1/2 text-[#3b2a29] leading-relaxed">
        <ol class="list-decimal list-inside space-y-5">
          <li>
            <span class="font-semibold">Buat Buket Custom Sesuai Keinginanmu</span><br />
            Ingin buket yang benar-benar unik? Kamu bisa merangkai sendiri! Pilih jenis bunga, jumlah tangkai,
            dan gaya bungkus sesuai selera. Cek
            <a href="/katalog" class="text-[#d27f6d] underline">daftar harga</a> yuk!
          </li>

          <li>
            <span class="font-semibold">Lihat Koleksi Buket Kami</span><br />
            Kalau kamu tertarik dengan koleksi yang sudah tersedia, cukup klik buket yang kamu suka untuk
            melihat detailnya. Jika sudah siap memesan, tekan tombol “Tambah ke Keranjang” dan lanjutkan ke
            Checkout.
          </li>

          <li>
            <span class="font-semibold">Isi Informasi Pengirim & Penerima</span><br />
            Lengkapi pesananmu dengan data pengirim dan penerima. Pastikan kamu memesan minimal 1 minggu sebelum
            tanggal pengiriman agar pesananmu bisa kami siapkan dengan sempurna.
          </li>

          <li>
            <span class="font-semibold">Konfirmasi Pembayaran</span><br />
            Setelah melakukan pembayaran ke rekening kami, klik “Konfirmasi Pembayaran” di bagian atas halaman.
            Masukkan nomor pesanan dan detail pembayaran untuk menyelesaikan proses verifikasi.
          </li>

          <li>
            <span class="font-semibold">Pesanan Selesai!</span><br />
            Pesanan selesai! Sekarang tinggal tunggu buket indahmu dikirim ke alamat yang sudah kamu tentukan.
            Terima kasih sudah mempercayakan momen spesialmu bersama Ratu Florist.
          </li>
        </ol>
      </div>
    </div>

    <!-- Footer -->
    <section class="max-w-3xl mx-auto space-y-8 px-4 pb-10">
      <h1 class="text-center font-[Rochester] text-4xl mt-5">
        <a href="/" class="text-inherit no-underline hover:text-[#53776c] transition">
          Ratu Florist Klaten
        </a>
      </h1>
    </section>

  </div>
</template>

<script setup>
import Navbar from "@/components/Navbar.vue";
</script>
