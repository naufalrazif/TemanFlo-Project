<template>
  <div class="min-h-screen bg-[#f1d1c2] font-[Poppins] text-[#000000] px-6 py-10">
    <div>
      <navbar1 />
    </div>
    <!-- Judul -->
    <h1 class="text-center font-[Rochester] text-4xl mt-5 mb-6">Terms & Condition</h1>

    <!-- Section -->
    <section class="max-w-3xl mx-auto space-y-8">
      <div>
        <h2 class="font-bold uppercase text-base mb-2">PEMBAYARAN (TRANSAKSI AMAN)</h2>
        <p class="flex justify-between text-base font-light mb-4 w-[546] h-[887]">
        Semua pembayaran online dilakukan melalui payment gateway resmi kami. 
        Pelanggan menyetujui bahwa akun miliknya akan didebet sesuai jumlah total pesanan saat pemesanan dilakukan. 
        Kami menerima pembayaran melalui Visa, Mastercard, JCB, dan AMEX. Untuk melanjutkan pembayaran, 
        pelanggan diminta memasukkan nomor kartu, tanggal kedaluwarsa, serta kode keamanan (CVV), 
        kemudian memvalidasi data tersebut.
        </p>
        <p class="flex justify-between text-base font-light mb-4 w-[546] h-[887]">
        Transaksi dilakukan secara real-time melalui sistem pembayaran aman. 
        Pihak bank akan memastikan kartu valid dan belum diblokir sebelum mengonfirmasi transaksi. 
        Setelah pembayaran berhasil divalidasi oleh pihak bank, pesanan akan diterima oleh Ratu Florist, 
        dan pelanggan akan menerima konfirmasi pesanan melalui email.
        </p>
        <p class="flex justify-between text-base font-light mb-4 w-[546] h-[887]">
        Ratu Florist tidak bertanggung jawab atas penyalahgunaan kartu oleh pihak lain.
        Apabila pembayaran ditolak oleh pihak bank, pesanan otomatis dibatalkan dan 
        pelanggan akan diberi tahu melalui email. Seluruh produk tetap menjadi milik 
        Ratu Florist hingga pembayaran diterima sepenuhnya.
        </p>
        <hr class="my-2 border-t border-black" />
      </div>

      <div>
        <h2 class="font-bold uppercase text-base mb-2">KONFIRMASI & PENERIMAAN PESANAN</h2>
        <p class="flex justify-between text-base font-light mb-2 w-[546] h-[887]">
            Proses pemesanan di website kami meliputi:
            <ol class="list-decimal pl-6 mb-4">
                <li>Pilih produk dan tambahkan ke keranjang</li>
                <li>Periksa isi keranjang</li>
                <li>Isi data diri dan informasi pengiriman</li>
                <li>Tentukan tanggal & waktu pengiriman atau pengambilan</li>
                <li>Tambahkan catatan dan pilih metode pembayaran</li>
                <li>Konfirmasi pesanan</li>
                <li>Lakukan pembayaran</li>
            </ol>
        </p>
        <p class="flex justify-between text-base font-light mb-4 w-[546] h-[887]">
            Pelanggan dapat meninjau seluruh detail pesanan dan total harga sebelum mengonfirmasi. 
            Setelah pembayaran diterima, pesanan tidak dapat diubah atau dibatalkan. 
            Kontrak pemesanan dianggap sah setelah Ratu Florist mengirimkan email konfirmasi bahwa 
            pembayaran telah diterima.
        </p>
        <p class="flex justify-between text-base font-light mb-4 w-[546] h-[887]">
            Kami berhak membatalkan pesanan apabila terdapat permasalahan pembayaran sebelumnya 
            atau potensi penyalahgunaan. Segala data yang diberikan pelanggan merupakan tanggung jawab 
            pribadi. Kesalahan pengisian data (seperti alamat atau nomor penerima) bukan tanggung jawab 
            Ratu Florist. Jika produk yang dipilih tidak tersedia, kami akan menghubungi pelanggan untuk 
            menawarkan produk pengganti atau pengembalian dana penuh.
        </p>
        <hr class="my-2 border-t border-black" />
      </div>

      <div>
        <h2 class="font-bold uppercase text-base mb-2">KETERSEDIAAN PRODUK</h2>
        <p class="flex justify-between text-base font-light mb-4 w-[546] h-[887]">
            Ratu Florist berhak mengubah daftar produk atau penawaran tanpa pemberitahuan sebelumnya. 
            Beberapa produk memiliki masa berlaku tertentu yang tercantum pada halaman produk. 
            Jika setelah pemesanan ternyata produk tidak tersedia, kami akan menginformasikannya secepat 
            mungkin melalui email atau telepon.
        </p>
        <p class="flex justify-between text-base font-light mb-2 w-[546] h-[887]">
            Pelanggan dapat memilih untuk:
            <ul class="list-disc pl-6 mb-4">
                <li>Mengganti dengan produk lain, atau</li>
                <li>Mendapatkan pengembalian dana penuh.</li>
            </ul>
        </p>
        <p class="flex justify-between text-base font-light mb-4 w-[546] h-[887]">
            Kami tidak mengenakan penalti atas pembatalan akibat ketidaktersediaan produk.
        </p>
        <hr class="my-2 border-t border-black" />
      </div>

      <div>
        <h2 class="font-bold uppercase text-base mb-2">PENGEMBALIAN / PEMBATALAN / PERUBAHAN PESANAN</h2>
        <p>
            <ul class="list-disc pl-6 mb-4">
                <li>Tidak ada pengembalian dana atau pembatalan setelah pembayaran dilakukan.</li>
                <li>Jika terdapat masalah pada pesanan, kami akan memberikan kredit toko (store credit) sebagai kompensasi.</li>
                <li>Perubahan pesanan tidak dapat dilakukan dalam waktu 48 jam sebelum pengiriman.</li>
                <li>Semua perubahan hanya dapat dilakukan melalui telepon atau WhatsApp resmi Ratu Florist.</li>
            </ul>
        </p>
        <hr class="my-2 border-t border-black" />
      </div>

      <div>
        <h2 class="font-bold uppercase text-base mb-2">MUSIM RAMAI (PEAK SEASONS)</h2>
        <p class="flex justify-between text-base font-light mb-4 w-[546] h-[887]">
            Selama periode padat seperti Ramadhan, Natal, dan Tahun Baru Imlek, jumlah pengiriman 
            kami dibatasi demi menjaga kualitas layanan. Kami menyarankan pelanggan untuk melakukan 
            pemesanan lebih awal agar pesanan dapat kami proses tepat waktu.
        </p>
        <hr class="my-2 border-t border-black" />
      </div>

      <div>
        <h2 class="font-bold uppercase text-base mb-2">KEAMANAN DATA PRIBADI</h2>
        <p class="flex justify-between text-base font-light mb-4 w-[546] h-[887]">
            Ratu Florist berkomitmen menjaga keamanan dan kerahasiaan data pribadi pelanggan. 
            Kami menggunakan firewall, enkripsi SSL, dan perlindungan anti-virus untuk mencegah 
            akses tidak sah. Seluruh informasi pembayaran dienkripsi agar tidak dapat dibaca oleh 
            pihak lain melalui internet.
        </p>
        <p class="flex justify-between text-base font-light mb-4 w-[546] h-[887]">
            Hanya karyawan yang berwenang dan membutuhkan data tersebut untuk pekerjaan operasional 
            yang dapat mengaksesnya. Pelanggaran terhadap kebijakan privasi akan dikenakan tindakan 
            disipliner.
        </p>
        <hr class="my-2 border-t border-black" />
      </div>

      <div>
        <h2 class="font-bold uppercase text-base mb-2">KEBIJAKAN PENGIRIMAN (DELIVERY POLICY)</h2>
        <p class="flex justify-between text-base font-light mb-4 w-[546] h-[887]">
            Ratu Florist berupaya memastikan setiap pesanan tiba tepat waktu dan dalam kondisi 
            terbaik. Jadwal Pengiriman:
            <ul class="list-disc pl-6 mb-4">
                <li>Batch 1: 10.00 – 14.00 WIB</li>
                <li>Batch 2: 14.00 – 17.00 WIB</li>
            </ul>
        </p>
        <p class="flex justify-between text-base font-light w-[546] h-[887]">
            Ketentuan Waktu Pesanan:
        </p>
        <p class="flex justify-between text-base font-light mb-4 w-[546] h-[887]">
            Pesanan yang dilakukan setelah pukul 17.00 akan otomatis dijadwalkan untuk Batch 2 pada 
            hari berikutnya.
        </p>
        <p class="flex justify-between text-base font-light w-[546] h-[887]">
            Catatan Penting: 
        </p>
        <p class="flex justify-between text-base font-light mb-4 w-[546] h-[887]">
            Kurir kami akan menunggu maksimal 15 menit di lokasi pengiriman. Pastikan ada penerima 
            yang siap menerima pesanan di alamat tujuan.
        </p>
        <p class="flex justify-between text-base font-light w-[546] h-[887]">
            Pengambilan Langsung (Pickup): 
        </p>
        <p class="flex justify-between text-base font-light w-[546] h-[887]">
           Pelanggan dapat memilih waktu pengambilan di alamat kami :
        </p>
        <p class="flex justify-between text-base font-light mb-4 w-[546] h-[887]">
           Kerten 02/02, Kepanjen, Delanggu, Klaten
        </p>
        <p class="flex justify-between text-base font-light w-[546] h-[887]">
            Untuk permintaan khusus atau perubahan jadwal, hubungi kami minimal 24 jam sebelumnya. 
            Terima kasih telah mempercayakan momen spesial Anda kepada Ratu Florist. 
        </p>
      </div>

      <div>
        <h1 class="text-center font-[Rochester] text-4xl mt-5">Ratu Florist Klaten</h1>
      </div>

      <!-- Tambahkan section lainnya sesuai kebutuhan -->
    </section>
  </div>
</template>

<script>
  import navbar1 from './components/navbar1.vue';

  export default {
    components: {
      navbar1
    }
  };
</script>