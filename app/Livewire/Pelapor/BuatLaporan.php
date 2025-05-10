<?php

namespace App\Livewire\Pelapor;

use App\Models\Klasifikasi;
use App\Models\Laporan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Features\SupportAttributes\AttributeCollection;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BuatLaporan extends Component
{
    use WithFileUploads;

    public ?array $items = [];

    public function render()
    {
        $data = view('livewire.pelapor.buat-laporan');
        if (auth()->check()) {
            $data->layout('layouts.app');
        } else {
            $data->layout('layouts.guest');
        }
        return $data;
    }

    public function store()
    {
        $data = $this->validate([
            'items.label' => 'required',
            'items.email' => 'required',
            'items.deskripsi' => 'required',
//            'items.klasifikasi.*' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $klasifikasi = Klasifikasi::findOrFail(last($data['items']['klasifikasi']));
            $path = 'laporan/' . collect(explode(' ', $klasifikasi->parent->nama))
                    ->map(fn($word) => strtoupper($word[0]))
                    ->join('') . '/' . date('Ymd');
            Laporan::create([
                'no_laporan' => Laporan::generateNoLaporan($klasifikasi),
                'bukti' => $this->items['bukti']?->store($path, env('FILESYSTEM_DRIVER')),
                'label' => $data['items']['label'],
                'deskripsi' => $data['items']['deskripsi'],
                'klasifikasi_id' => $klasifikasi->id,
                'user_id' => auth()->id(),
                'email' => $data['items']['email'],
            ]);
            DB::commit();
            $this->dispatch('show', [
                'type' => 'success',
                'message' => 'Laporan berhasil dibuat',
            ])->to('livewire-toast');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatch('show', [
                'type' => 'error',
                'message' => 'Gagal membuat laporan, silahkan coba lagi',
            ])->to('livewire-toast');
        }
    }
}
