<div class="w-full min-h-screen p-0 m-0 ">
    <div class="min-h-screen flex flex-col justify-center items-center px-3">
        <div class="grid grid-cols-1 gap-2 md:w-[40em] w-full">
            <div class="bg-white shadow py-5 px-5 ">
                <div class="text-black my-5 border-b py-5">
                    <div class="flex justify-center">
                        <a href="/" class="flex  gap-3">
                            <x-application-logo class="w-[4em] h-[4em]"/>
                            <span class="text-2xl font-mono whitespace-pre ">{{env('APP_NAME')}}</span>
                        </a>
                    </div>
                    <div class="text-left my-4">
                        <a href="{{route('buat-laporan')}}">
                            <x-button class="w-full">
                                BUAT LAPORAN
                            </x-button>
                        </a>
                    </div>
                </div>

                <div class="flex gap-2 justify-content-end items-end">
                    <x-default-input class="flex-grow" type="search" name="items.search" label="Cek Laporan Kamu"/>
                    <div class="text-right py-4">
                        <x-button wire:click="search" class="uppercase py-2.5">
                            Cek
                        </x-button>
                    </div>
                </div>
            </div>
            <div class="bg-white py-3">
                <div class="text-black my-5 border-b py-5">
                    <div class="flex justify-center">
                        <a href="/" class="flex  gap-3">
                            <x-application-logo class="w-[4em] h-[4em]"/>
                            <span class="text-2xl font-mono whitespace-pre ">DETAIL LAPORAN</span>
                        </a>
                    </div>
                </div>
                <div class="max-w-md mx-auto pb-10">
                    <ol class="relative border-l border-red-600">
                        <!-- Step 1 -->
                        <li class="mb-10 ml-6">
      <span
          class="absolute -left-3 flex h-6 w-6 items-center justify-center rounded-full bg-red-600 ring-8 ring-white">
        <svg class="h-3 w-3 text-white" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd"
                d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 10-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"
                clip-rule="evenodd"/>
        </svg>
      </span>
                            <h3 class="font-medium leading-tight">Bidang Akademik</h3>
                            <p class="text-sm text-gray-500">Melakukan plagiarisme dalam tugas akhir.</p>
                            <p class="text-sm text-gray-400">Sanksi: Skorsing selama 1 semester.</p>
                        </li>

                        <!-- Step 2 -->
                        <li class="mb-10 ml-6">
      <span
          class="absolute -left-3 flex h-6 w-6 items-center justify-center rounded-full border-2 border-red-600 bg-white ring-8 ring-white">
        <span class="h-2 w-2 rounded-full bg-red-600"></span>
      </span>
                            <h3 class="font-medium text-red-600 leading-tight">Bidang Keuangan</h3>
                            <p class="text-sm text-gray-500">Menunggak pembayaran UKT tanpa alasan jelas.</p>
                            <p class="text-sm text-gray-400">Sanksi: Penangguhan registrasi semester berikutnya.</p>
                        </li>

                        <!-- Step 3 -->
                        <li class="mb-10 ml-6">
                        <span
                            class="absolute -left-3 flex h-6 w-6 items-center justify-center rounded-full bg-white border-2 border-gray-300 ring-8 ring-white"></span>
                            <h3 class="font-medium text-gray-500 leading-tight">Bidang Kemahasiswaan</h3>
                            <p class="text-sm text-gray-500">Melakukan kekerasan fisik saat kegiatan organisasi.</p>
                            <p class="text-sm text-gray-400">Sanksi: Pencabutan hak mengikuti organisasi selama 1
                                tahun.</p>
                        </li>

                        <!-- Step 4 -->
                        <li class="mb-10 ml-6">
                        <span
                            class="absolute -left-3 flex h-6 w-6 items-center justify-center rounded-full bg-white border-2 border-gray-300 ring-8 ring-white"></span>
                            <h3 class="font-medium text-gray-500 leading-tight">Bidang Sarana & Prasarana</h3>
                            <p class="text-sm text-gray-500">Merusak fasilitas ruang kelas secara sengaja.</p>
                            <p class="text-sm text-gray-400">Sanksi: Ganti rugi sesuai nilai kerusakan.</p>
                        </li>

                        <!-- Step 5 -->
                        <li class="ml-6">
                        <span
                            class="absolute -left-3 flex h-6 w-6 items-center justify-center rounded-full bg-white border-2 border-gray-300 ring-8 ring-white"></span>
                            <h3 class="font-medium text-gray-500 leading-tight">Bidang Kedisiplinan</h3>
                            <p class="text-sm text-gray-500">Tidak hadir tanpa izin selama lebih dari 10 hari.</p>
                            <p class="text-sm text-gray-400">Sanksi: Surat peringatan dan pembinaan khusus.</p>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 text-white">
        <x-footer/>
    </div>
</div>
