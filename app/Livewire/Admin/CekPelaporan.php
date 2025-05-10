<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class CekPelaporan extends Component
{
    public function render()
    {
        return view('livewire.admin.cek-pelaporan')
            ->layout('layouts.guest');
    }
}
