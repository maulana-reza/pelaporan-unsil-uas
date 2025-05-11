<?php

namespace App\Livewire\BidangTerkait;

use App\Models\Laporan;
use Livewire\Component;
use Livewire\WithPagination;

class Tindakan extends Component
{
    use WithPagination;

    public ?string $q = null;
    public ?Laporan $detail = null;
    public ?int $modal = null;
    public ?array $items = [];

    public function render()
    {
        $datas = Laporan::when($this->q, function ($query) {
            $query->whereBlind('no_laporan', 'no_laporan_index', $this->q)
                ->orWhereBlind('label', 'label_index', $this->q);
        })
            ->latest()
            ->paginate(10);
        return view('livewire.bidang-terkait.tindakan')
            ->with(compact('datas'));
    }
    public function show($id)
    {
        $this->modal = $id;
        $this->detail = Laporan::find($id);
        $this->items['bukti'] = $this->detail->bukti;
    }
}
