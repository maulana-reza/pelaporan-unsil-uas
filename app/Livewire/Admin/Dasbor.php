<?php

namespace App\Livewire\Admin;

use App\Models\Laporan;
use Livewire\Component;

class Dasbor extends Component
{
    public ?array $datas = [];

    public function mount()
    {
        $this->datas = [
            [
                'icon' => 'heroicon-o-document-text',
                'label' => 'Jumlah Laporan Masuk',
                'value' => Laporan::all()->count(),
            ],
            [
                'icon' => 'heroicon-o-document-text',
                'label' => 'Jumlah Laporan Ditindak Lanjuti',
                'value' => 0,
            ],
            [
                'icon' => 'heroicon-o-document-text',
                'label' => 'Jumlah Laporan Kena Sanksi',
                'value' => 0,
            ]
        ];

    }

    public function render()
    {
        return view('livewire.admin.dasbor');
    }
}
