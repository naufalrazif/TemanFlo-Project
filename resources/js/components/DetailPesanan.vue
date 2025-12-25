<template>
    <dialog 
        ref="dialogRef" 
        class="rounded-lg w-[650px] p-0 overflow-hidden shadow-xl backdrop:bg-black/40"
    >
        <!-- HEADER -->
        <div class="flex justify-between items-center px-6 py-4 border-b">
            <h2 class="text-xl font-semibold">Detail Pesanan</h2>
            <button @click="close" class="text-2xl leading-none hover:text-gray-500">×</button>
        </div>

        <!-- CONTENT -->
        <div class="px-10 py-6 text-sm">
            <div class="grid grid-cols-[150px_1fr] gap-y-4 gap-x-4">

                <p>Customer</p>
                <p>: {{ pesanan?.nama }}</p>

                <p>Email</p>
                <p>: {{ pesanan?.email }}</p>

                <p>No. Telp</p>
                <p>: {{ pesanan?.no_telp }}</p>

                <p>Produk</p>
                <div class="flex flex-col">
                    <div
                        v-for="p in (pesanan?.produks || [])"
                        :key="p.id"
                        class="flex gap-2"
                    >
                        <span class="font-medium">{{ p.nama }}</span>
                        <span>-</span>
                        <span class="text-gray-600">
                            {{
                                pesanan?.detail_pesanans?.find(d => d.produk_id === p.id)?.jumlah || 0
                            }}
                        </span>
                    </div>
                </div>

                <p>Tanggal Pesanan</p>
                <p>: {{ pesanan?.tanggal_pesanan }}</p>

                <p>Total Harga</p>
                <p>:
                    {{
                        pesanan?.detail_pesanans?.reduce(
                            (sum, d)=> sum + d.jumlah * d.subtotal,
                            0
                        ) || 0
                    }}
                </p>

                <p>Size</p>
                <p>: {{ pesanan?.size ?? '-' }}</p>

                <p>Tema</p>
                <p>: {{ pesanan?.tema ?? '-' }}</p>

                <p>Deskripsi</p>
                <p class="leading-5">
                    <span class="whitespace-pre-line">
                        : {{ pesanan?.deskripsi }}
                    </span>
                </p>

                <p>Status</p>
                <div>
                    <select v-model="localStatus" class="border rounded-md px-3 py-1 w-40">
                        <option value="dalam proses">dalam proses</option>
                        <option value="selesai">selesai</option>
                        <option value="batal">batal</option>
                    </select>
                </div>

            </div>
        </div>

        <!-- FOOTER -->
        <div class="px-10 py-4 flex justify-end bg-gray-50 border-t">
            <button 
                class="bg-[#6c7c6b] text-white px-6 py-2 rounded-md hover:bg-[#5b6a59]"
                @click="saveStatus"
            >
                Simpan
            </button>
        </div>
    </dialog>
</template>

<script setup>
import { ref, watch, computed } from "vue";

const props = defineProps({
    pesanan: Object,
    show: Boolean
});

const emit = defineEmits(["close", "update-status"]);

const dialogRef = ref(null);
const localStatus = ref("Pending");

// Sync status ketika dialog dibuka
watch(
    () => props.show,
    (val) => {
        if (val) {
            dialogRef.value?.showModal();
            localStatus.value = props.pesanan?.status || "Pending";
        } else {
            dialogRef.value?.close();
        }
    }
);

// Kirim status ke parent untuk di-update
function saveStatus() {
    emit("update-status", {
        id: props.pesanan.id,
        status: localStatus.value
    });
    close();
}

function close() {
    dialogRef.value?.close();
    emit("close");
}
</script>

<style scoped>
dialog {
    inset: 50% auto auto 50%;
    transform: translate(-50%, -50%);
}
</style>