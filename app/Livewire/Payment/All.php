<?php

namespace App\Livewire\Payment;

use App\Models\Payment;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.admin')]
class All extends Component
{
    use WithPagination;

    public ?User $user = null;

    public function mount(User $mahasiswa): void
    {
        $this->user = $mahasiswa;
    }

    #[Title('Daftar Pembayaran')]
    public function render()
    {
        $payments = Payment::query()
            ->with(['paymentList', 'user', 'paymentList.paymentType', 'paymentMethod'])
            ->where('user_id', $this->user->getAttribute('id'))
            ->paginate(10);
        return view('livewire.payment.all')->with(compact('payments'));
    }
}
