<?php

namespace App\Livewire\Admin;

use App\Models\Laporan;
use Livewire\Component;

class CekPelaporan extends Component
{
    public ?string $search = null;
    public function showData()
    {
        Laporan::where('no_laporan', $this->search)
            ->with(['mahasiswa', 'klasifikasi'])
            ->get();

    }
    public function mount()
    {

    }
    public function render()
    {
        return view('livewire.admin.cek-pelaporan')
            ->layout('layouts.guest');
    }
}
