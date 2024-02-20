@props([
    'model' => ''
])

<div>
    <label for="payment" class="block mb-2 text-sm font-medium text-gray-900">Pembayaran</label>
    <select wire:model="{{ $model }}" id="payment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option selected>Pilih pembayaran</option>
        @foreach($list as $l)
            <option value="{{ $l->id }}">{{ $l->name }}</option>
        @endforeach
    </select>
</div>
