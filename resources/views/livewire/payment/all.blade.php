<div>
    <div class="flex flex-col gap-4">
        <div>
            <a href="{{ route('payment.pay') }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2 transition-all">Buat Pembayaran</a>
        </div>
        <x-table>
            <x-slot:header>
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Jenis Pembayaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Harus Dibayar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Transaksi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </x-slot:header>
            <x-slot:body>
                @forelse($payments as $payment)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $payment?->paymentList?->first()?->paymentType?->getAttribute('name') }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $payment?->getAttribute('total') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $payment?->statusLabel() }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $payment?->getAttribute('payment_date')?->format('d F Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <a href="{{ route('payment.detail', ['mahasiswa' => $payment?->user?->getAttribute('id'), 'payment' => $payment?->getAttribute('id')]) }}" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">detail</a>
                                <button type="button" wire:click="delete({{ $payment?->getAttribute('id') }})" class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300">delete</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b">
                        <th scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap" colspan="5">
                            No Data
                        </th>
                    </tr>
                @endforelse
            </x-slot:body>
        </x-table>
        <div>
            {{ $payments->links() }}
        </div>
    </div>
</div>
