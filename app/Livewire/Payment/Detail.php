<?php

namespace App\Livewire\Payment;

use App\Enums\PaymentStatus;
use App\Enums\UserType;
use App\Models\Payment;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.admin')]
class Detail extends Component
{
    public User $mahasiswa;
    public ?Payment $payment;

    public function markAsPaid(): void
    {
        $this->payment?->update([
            'status' => PaymentStatus::PAID,
            'payment_date' => now(),
        ]);
        $data = match ($this->payment->paymentList->first()->getAttribute('payment_type_id')) {
            1 => ['type' => UserType::PRE_MEMBER],
            default => ['type' => UserType::MEMBER, 'is_enrolled' => true]
        };
        $this->mahasiswa?->update($data);
    }

    #[Title('Detail Pembayaran')]
    public function render()
    {
        return view('livewire.payment.detail');
    }
}
