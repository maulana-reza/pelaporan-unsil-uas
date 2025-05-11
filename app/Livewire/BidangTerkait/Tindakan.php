<?php

namespace App\Livewire\BidangTerkait;

use App\Models\Laporan;
use Livewire\Component;
use Livewire\WithPagination;

class Tindakan extends Component
{
    use WithPagination;
    public function render()
    {
//        $datas = Laporan::where()
        return view('livewire.bidang-terkait.tindakan');
    }
}
