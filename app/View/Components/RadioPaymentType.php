<?php

namespace App\View\Components;

use App\Models\PaymentType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class RadioPaymentType extends Component
{
    public string $model;
    private Collection $paymentTypes;
    /**
     * Create a new component instance.
     */
    public function __construct(string $model)
    {
        $this->model = $model;
        $this->paymentTypes = PaymentType::member()->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio-payment-type')->with(['list' => $this->paymentTypes]);
    }
}
