<div>
    <div>
        @can(['admin'])
            @if($payment?->getAttribute('status') === \App\Enums\PaymentStatus::UNPAID)
                <button type="button" wire:click="markAsPaid" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2 transition-all">Sudah Dibayar</button>
            @endif
        @endcan
    </div>
    <div>
        <x-invoice :payment="$payment" />
    </div>
</div>
