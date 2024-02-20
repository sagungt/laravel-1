<?php

namespace App\Livewire\Mahasiswa;

use App\Enums\UserType;
use App\Livewire\Forms\CreateMahasiswa;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.admin')]
class Create extends Component
{
    public CreateMahasiswa $form;

    public function store(): void
    {
        $this->form->store();

        redirect()->route('mahasiswa.index')->with('success', 'Data berhasil ditambahkan');
    }

    #[Title('Tambah Mahasiswa')]
    public function render()
    {
        return view('livewire.mahasiswa.create');
    }
}
