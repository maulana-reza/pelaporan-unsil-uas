<div class="w-full {{auth()->check() ? '':'min-h-screen'}} p-0 m-0 ">
    <div class="{{auth()->check() ? '':'min-h-screen px-3'}} flex flex-col justify-center items-center">
        <div class="bg-white shadow {{auth()->check() ? '':'md:w-[40em] '}}  w-full py-5 px-5">
            <div class="text-black my-5 border-b py-5">
                <div class="flex justify-center">
                    <a href="/" class="flex  gap-3">
                        <x-application-logo class="w-[4em] h-[4em]"/>
                        <span class="text-2xl font-mono whitespace-pre ">BUAT LAPORAN</span>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 justify-content-end items-end">
                {!! \App\Helpers\Form::generateSelectOptions($items,App\Models\Klasifikasi::get()) !!}
                <x-default-input class="flex-grow" type="email" name="items.email" label="Email"/>
                <x-default-input class="flex-grow" type="text" name="items.label" label="Judul Laporan"/>
                <x-default-input class="flex-grow" type="textarea" name="items.desc" label="Deskripsi Laporan"/>
                <x-default-input type="file" name="items.bukti" label="Bukti Laporan" :items="$items"/>
            </div>
            <div class="text-right py-4">
                <x-button wire:click="store" class="uppercase py-2.5">
                    BUAT LAPORAN
                </x-button>
            </div>
        </div>
    </div>
    @if(!auth()->check())
        <div class="absolute bottom-0 left-0 right-0 text-white">
            <x-footer/>
        </div>
    @endif
</div>
