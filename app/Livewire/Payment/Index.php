<?php

namespace App\Livewire\Payment;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.admin')]
class Index extends Component
{
    use WithPagination;

    public ?string $status = null;

    public function delete(int $id): void
    {
        Payment::query()->find($id)?->delete();
    }

    public function resetFilter(): void
    {
        $this->status = null;
    }

    #[Title('Payment')]
    public function render()
    {
        $payments = Payment::query()
            ->when(!is_null($this->status), fn (Builder $builder) => $builder->where('status', $this->status))
            ->with(['paymentList', 'user', 'paymentList.paymentType', 'paymentMethod'])
            ->paginate(10);
        return view('livewire.payment.index')->with(compact('payments'));
    }
}
