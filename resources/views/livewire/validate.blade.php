<div class="px-1 py-4">
    @if (session('error'))
        <div class="flex justify-between p-2 border border-red-300 rounded-lg bg-red-100 text-red-900" x-data x-ref="message">
                <span>
                    {{ session('error') }}
                </span>
            <button @click="$refs.message?.remove()">&times;</button>
        </div>
    @endif
    <div class="flex flex-col gap-4">
        <h1 class="text-lg font-semibold">Cek Status Pendaftaran</h1>
        <x-input model="email" type="email" label="Email" placeholder="Email" required />
        <button type="button" wire:click="check" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center transition-all" @click="$dispatch('show-modal')">Cek Status</button>
    </div>

    @if(!is_null($payment))
        <div x-data x-ref="modal" class="overflow-y-auto overflow-x-hidden absolute top-1/2 left-1/2 z-50 justify-center items-center w-full -translate-x-1/2 -translate-y-1/2">
            <div class="relative p-4 w-full max-w-[90%] max-h-full mx-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Detail Status Pembayaran
                        </h3>
                        <button @click="$refs.modal?.remove()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <x-invoice :payment="$payment" />
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
