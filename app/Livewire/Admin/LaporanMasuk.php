<?php

namespace App\Livewire\Admin;

use App\Models\Laporan;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use ParagonIE\CipherSweet\CipherSweet;

class LaporanMasuk extends Component
{
    use WithPagination;

    public ?string $q = null;
    public ?string $detail = null;
    public function detail()
    {

    }

    public function query(): Builder
    {
        return Laporan::when($this->q, function ($query) {
            $query->whereBlind('no_laporan', 'no_laporan_index', $this->q)
                ->orWhereBlind('label', 'label_index', $this->q);
        });
    }

    public function updatedQ()
    {
        $this->resetPage();
    }

    public function render()
    {
        $datas = $this->query()->latest()->paginate(10);
        return view('livewire.admin.laporan-masuk')
            ->with([
                'datas' => $datas,
            ]);
    }
}
