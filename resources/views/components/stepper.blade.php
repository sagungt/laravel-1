@props([
    'step' => 0
])

<ol class="flex items-center w-full text-sm font-medium text-center text-gray-500 sm:text-base">
    <li
        @class([
            "flex md:w-full items-center sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10",
            "text-blue-600" => $step >= 0
        ])
    >
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
            @if($step > 0)
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
            @else
                <span class="me-2">1</span>
            @endif
            Jenis <span class="hidden sm:inline-flex sm:ms-2">Pembayaran</span>
        </span>
    </li>
    <li
        @class([
            "flex md:w-full items-center sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10",
            "text-blue-600" => $step >= 1
        ])
    >
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
            @if($step > 1)
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
            @else
                <span class="me-2">2</span>
            @endif
            Metode <span class="hidden sm:inline-flex sm:ms-2">Pembayaran</span>
        </span>
    </li>
    <li
        @class([
            "flex items-center mr-5",
            "text-blue-600" => $step >= 2
        ])
    >
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
            @if($step > 2)
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
            @else
                <span class="me-2">3</span>
            @endif
            Konfirmasi
        </span>
    </li>
</ol>
