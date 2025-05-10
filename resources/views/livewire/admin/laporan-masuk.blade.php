<div>
    <div class="bg-white rounded-lg overflow-hidden dark:bg-dark-eval-1 shadow relative">
        <div class="flex items-center gap-2  px-3 py-3 bg-gray-50 text-right dark:bg-dark-eval-2">
            <h2 class="text-xl text-left font-semibold flex-grow">
                Daftar Laporan Masuk
            </h2>
        </div>
        <div class="py-3 px-3">
            <div>

                <x-default-input label="Pencarian" name="q"/>
            </div>
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-nowrap rounded overflow-hidden"
                       wire:loading.class.delay="opacity-50">
                    <thead class="bg-secondary text-gray-100 font-bold">
                    <tr class="text-left font-bold bg-red-700">
                        <td class="px-3 py-2 text-sm">#</td>
                        <td class="px-3 py-2 text-sm">Label</td>
                        <td class="px-3 py-2 text-sm">Klasifikasi</td>
                        <td class="px-3 py-2 text-sm">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($datas as $results)
                        <tr class="hover:bg-red-300 dark:hover:text-gray-900 dark:hover:bg-dark-eval-2 {{ ($loop->even ) ? "bg-red-100 dark:bg-dark-eval-3" : ""}}">
                            <td class="px-3 py-2 text-sm">{{ $loop->iteration + $results->firstItem() - 1 }}</td>
                            <td class="px-3 py-2 text-sm">
                                {{ $results->label }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-sm text-gray-500 py-3 px-3 bg-gray-200">
                                Tidak ada data
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
