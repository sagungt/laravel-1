<?php

namespace App\Livewire;

use App\Models\Payment;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
class Validate extends Component
{
    #[Rule(['required', 'email', 'exists:users,email'])]
    public string $email;
    public ?Payment $payment = null;
    protected ?User $user = null;

    public function check(): void
    {
        $this->validate();

        $this->user = User::query()->where('email', $this->email)->first();
        $this->payment = $this->user->registrationPayment();
        if (is_null($this->payment)) {
            session()->flash('error', 'Pembayaran tidak ditemukan');
        }
    }

    #[Title('Cek Status')]
    public function render()
    {
        return view('livewire.validate');
    }
}
