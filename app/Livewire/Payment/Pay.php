<?php

namespace App\Livewire\Payment;

use App\Livewire\Forms\PaymentForm;
use App\Models\Payment;
use App\Models\PaymentList;
use App\Models\PaymentType;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.admin')]
class Pay extends Component
{
    public int $step = 0;
    public PaymentForm $form;
    public Payment $payment;
    public PaymentType $paymentType;
    public ?PaymentList $paymentList = null;

    public function boot(): void
    {
        $this->payment = new Payment;
        $this->payment->fill([
            'user_id' => auth()->id(),
            'payment_id' => Payment::generateId(),
            'generated_date' => now()
        ]);
    }

    public function next(): void
    {
        $rule = match ($this->step) {
            0 => 'form.type',
            1 => 'form.method',
            default => null,
        };
        if (!is_null($rule)) {
            $this->validateOnly($rule);
        }
        $this->paymentType = PaymentType::find($this->form->getPropertyValue('type'));
        $this->paymentList = new PaymentList;
        $this->paymentList->fill(['payment_type_id' => $this->paymentType->getAttribute('id')]);

        $this->step += 1;
    }

    public function prev(): void
    {
        $this->step -= 1;
    }

    public function confirm(): void
    {
        $this->payment->fill([
            'payment_method_id' => $this->form->getPropertyValue('method'),
            'total' => $this->paymentType->getAttribute('amount'),
        ]);
        $this->payment->save();
        $this->paymentList->fill([
            'payment_type_id' => $this->form->getPropertyValue('type'),
        ]);
        $this->paymentList->payment()->associate($this->payment);
        $this->paymentList->save();
        $this->next();
    }

    #[Title('Buat Pembayaran')]
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.payment.pay');
    }
}
