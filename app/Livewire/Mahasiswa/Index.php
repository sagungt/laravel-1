<?php

namespace App\Livewire\Mahasiswa;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.admin')]
class Index extends Component
{
    use WithPagination;

    public function mount(): void
    {
    }

    public function delete(int $id): void
    {
        User::query()->find($id)?->delete($id);
    }
    #[Title('Daftar Mahasiswa')]
    public function render()
    {
        $mahasiswa = User::member()->paginate(10);
        return view('livewire.mahasiswa.index')->with(compact('mahasiswa'));
    }
}
