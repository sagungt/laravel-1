<?php

namespace App\View\Components;

use App\Models\PaymentMethod;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class RadioPaymentMethod extends Component
{
    private ?Collection $paymentMethods = null;
    public string $model;
    /**
     * Create a new component instance.
     */
    public function __construct(string $model)
    {
        $this->model = $model;
        $this->paymentMethods = PaymentMethod::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio-payment-method')->with(['list' => $this->paymentMethods]);
    }
}
