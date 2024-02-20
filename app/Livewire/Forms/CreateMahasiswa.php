<?php

namespace App\Livewire\Forms;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateMahasiswa extends Form
{
    #[Validate('required')]
    public string $name;

    #[Validate(['required', 'email', 'unique:users,email'])]
    public string $email;

//    #[Validate(['required', 'confirmed', 'min:8'])]
//    public string $password;
//
//    public string $password_confirmation;

    #[Validate(['required', 'unique:users,nim'])]
    public string $nim;

    #[Validate('required')]
    public ?string $address;

    #[Validate('required')]
    public ?string $phone;

    public int $userId;

    public function store(): void
    {
        $this->validate();

        User::query()->create([...$this->all(), 'type' => UserType::APPLICANT, 'password' => bcrypt('password')]);
    }

    public function setForm(User $user): void
    {
        $this->userId = $user->getAttribute('id');
        $this->name = $user->getAttribute('name');
        $this->email = $user->getAttribute('email');
        $this->nim = $user->getAttribute('nim');
        $this->address = $user->getAttribute('address');
        $this->phone = $user->getAttribute('phone');
    }
}
