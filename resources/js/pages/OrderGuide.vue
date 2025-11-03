<template>
  <div class="min-h-screen bg-[#f8cfc1] flex flex-col items-center py-10 px-6 md:px-20">
    <!-- Judul -->
    <h1 class="text-4xl text-[#3b2a29] font-[Rochester] mb-10 text-center">Ordering Guide</h1>

    <!-- Konten utama -->
    <div class="flex flex-col md:flex-row justify-between gap-10 w-full max-w-6xl">
      <!-- Kolom kiri (placeholder gambar) -->
      <div class="flex flex-col gap-6 w-full md:w-1/2">
        <div class="w-full h-[300px] bg-[#f3bfae] rounded-2xl shadow-md"></div>
        <div class="w-full h-[300px] bg-[#f3bfae] rounded-2xl shadow-md"></div>
      </div>

      <!-- Kolom kanan (card putih isi langkah-langkah) -->
      <div class="bg-white rounded-2xl shadow-lg p-8 md:p-10 w-full md:w-1/2 text-[#3b2a29] leading-relaxed">
        <ol class="list-decimal list-inside space-y-5">
          <li>
            <span class="font-semibold">Buat Buket Custom Sesuai Keinginanmu</span><br />
            Ingin buket yang benar-benar unik? Kamu bisa merangkai sendiri! Pilih jenis bunga, jumlah tangkai,
            dan gaya bungkus sesuai selera. Cek
            <a href="#" class="text-[#d27f6d] underline">daftar harga</a> yuk!
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
    <footer class="mt-12 text-[#3b2a29] font-serif text-xl text-center">
      Ratu Florist Klaten
    </footer>
  </div>
</template>

<script setup>
// Tidak perlu script tambahan
</script>
