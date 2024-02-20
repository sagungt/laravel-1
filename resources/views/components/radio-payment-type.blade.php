<div>
    @foreach($list as $l)
        <div class="flex items-center mb-4">
            <input
                id="radio-{{ $loop->iteration }}"
                type="radio"
                value="{{ $l->getAttribute('id') }}"
                name="{{ $model }}"
                wire:model="{{ $model }}"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
            >
            <label for="radio-{{ $loop->iteration }}" class="ms-2 text-sm font-medium text-gray-900">{{ $l->getAttribute('name') }}</label>
        </div>
    @endforeach
    @error($model) <span class="text-sm text-red-600 space-y-1 mt-2">{{ $message }}</span> @enderror
</div>
