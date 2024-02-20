<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PaymentForm extends Form
{
    #[Validate(['required', 'numeric', 'exists:payment_methods,id'])]
    public $method;

    #[Validate(['required', 'numeric', 'exists:payment_types,id'])]
    public $type;
}
