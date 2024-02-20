@props([
    'model' => '',
    'type' => 'text',
    'label' => '',
    'required' => true,
    'placeholder' => '',
])

@php($id = str()->random(10))

<div>
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    @if($type === 'textarea')
        <textarea id="{{ $id }}" rows="4" wire:model="{{ $model }}" @required($required) class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="{{ $placeholder }}"></textarea>
    @else
        <input type="{{ $type }}" id="{{ $id }}" wire:model="{{ $model }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="{{ $placeholder }}" @required($required) />
    @endif
    @error($model) <span class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</span> @enderror
</div>
