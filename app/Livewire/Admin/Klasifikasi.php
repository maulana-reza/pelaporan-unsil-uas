<?php

namespace App\Livewire\Admin;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Klasifikasi extends Component
{
    use WithPagination;

    public $listeners = [
        'refresh' => '$refresh'
    ];
    public ?string $q = null;
    public ?array $items = [];
    public ?bool $modal = null;
    public ?string $edit = null;

    public function query(): Builder
    {
        return \App\Models\Klasifikasi::query()
            ->when($this->q, function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->q . '%');
                });
            })
            ->latest();
    }

    public function openEdit($id)
    {
        $this->edit = $id;
        $this->modal = $id;
        $klasifikasi = \App\Models\Klasifikasi::findOrFail($id);
        $this->items = [
            'nama' => $klasifikasi->nama,
            'parent_id' => $klasifikasi->parent_id,
        ];
    }

    public function openCreate()
    {
        $this->modal = true;
    }

    public function store()
    {
        $this->validate([
            'items.nama' => 'required',
        ]);
        if ($this->edit) {
            \App\Models\Klasifikasi::findOrFail($this->edit)
                ->update([
                    'nama' => $this->items['nama'],
                    'parent_id' => isset($this->items['parent_id']) ? $this->items['parent_id'] : null,
                ]);
        } else {
            \App\Models\Klasifikasi::create([
                'nama' => $this->items['nama'],
                'parent_id' => isset($this->items['parent_id']) ? $this->items['parent_id'] : null,
            ]);
        }
        $this->dispatch('show', [
            'type' => 'success',
            'message' => 'Berhasil diupdate'
        ])->to('livewire-toast');
        $this->dispatch('refresh');
        $this->modal = null;
        $this->edit = null;
    }

    public function render()
    {
        $datas = $this->query()->paginate(10);
        return view('livewire.admin.klasifikasi')
            ->with([
                'datas' => $datas,
            ]);
    }
}
