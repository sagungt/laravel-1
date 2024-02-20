<?php

namespace App\Livewire\Mahasiswa;

use App\Livewire\Forms\CreateMahasiswa;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.admin')]
class Update extends Component
{
    public CreateMahasiswa $form;

    public function mount(User $mahasiswa): void
    {
        $this->form->setForm($mahasiswa);
    }

    public function save(): void
    {
        $userId = $this->form->getPropertyValue('userId');
        $this->form->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($userId)],
            'nim' => ['required', 'string', Rule::unique(User::class)->ignore($userId)],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ]);
        $update = User::query()->find($userId)->update($this->form->only(['name', 'email', 'nim', 'address', 'phone']));
        if ($update) {
            redirect()->route('mahasiswa.index')->with('success', 'Data berhasil di update');
            return;
        }
        session()->flash('error', 'Gagal untuk update data');
    }

    #[Title('Update Mahasiswa')]
    public function render()
    {
        return view('livewire.mahasiswa.update');
    }
}
