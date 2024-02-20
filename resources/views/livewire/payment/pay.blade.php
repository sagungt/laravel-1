<div>
    <div class="max-w-4xl mx-auto bg-white shadow rounded p-4 flex flex-col gap-4">
        <x-stepper :step="$step" />
        <div class="flex flex-col gap-4">
            @switch($step)
                @case(0)
                    <h2 class="text-lg font-semibold">Pilih Jenis Pembayaran</h2>
                    <x-radio-payment-type model="form.type" />
                    @break

                @case(1)
                    <h2 class="text-lg font-semibold">Pilih Metode Pembayaran</h2>
                    <x-radio-payment-method model="form.method" />
                    @break

                @case(2)
                    <h2 class="text-lg font-semibold">Detail Pembayaran</h2>
                    <x-invoice :payment="$payment" :payment-list="[$paymentList]" />
                    @break

                @case(3)
                    <h2 class="text-lg font-semibold">Pembayaran Berhasil Dibuat</h2>
                    <div class="self-center text-center space-y-4">
                        <span class="text-2xl font-semibold">
                            Berhasil
                        </span>
                        <svg class="mb-7 mx-auto" width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M26.8549 9.42101C30.8431 9.10258 34.6292 7.53392 37.6739 4.93841C41.1128 2.00947 45.4824 0.400879 49.9995 0.400879C54.5167 0.400879 58.8862 2.00947 62.3251 4.93841C65.3699 7.53392 69.1559 9.10258 73.1441 9.42101C77.648 9.78096 81.8764 11.7334 85.0713 14.9283C88.2662 18.1231 90.2186 22.3515 90.5785 26.8554C90.8947 30.842 92.4633 34.6302 95.0611 37.6744C97.9901 41.1133 99.5986 45.4829 99.5986 50C99.5986 54.5172 97.9901 58.8867 95.0611 62.3256C92.4656 65.3704 90.8969 69.1564 90.5785 73.1446C90.2186 77.6485 88.2662 81.8769 85.0713 85.0718C81.8764 88.2666 77.648 90.2191 73.1441 90.579C69.1559 90.8974 65.3699 92.4661 62.3251 95.0616C58.8862 97.9905 54.5167 99.5991 49.9995 99.5991C45.4824 99.5991 41.1128 97.9905 37.6739 95.0616C34.6292 92.4661 30.8431 90.8974 26.8549 90.579C22.351 90.2191 18.1226 88.2666 14.9278 85.0718C11.7329 81.8769 9.78047 77.6485 9.42052 73.1446C9.1021 69.1564 7.53343 65.3704 4.93792 62.3256C2.00899 58.8867 0.400391 54.5172 0.400391 50C0.400391 45.4829 2.00899 41.1133 4.93792 37.6744C7.53343 34.6297 9.1021 30.8436 9.42052 26.8554C9.78047 22.3515 11.7329 18.1231 14.9278 14.9283C18.1226 11.7334 22.351 9.78096 26.8549 9.42101ZM72.9829 41.9834C74.1123 40.8141 74.7372 39.2479 74.7231 37.6223C74.709 35.9967 74.0569 34.4417 72.9074 33.2921C71.7579 32.1426 70.2028 31.4906 68.5772 31.4764C66.9516 31.4623 65.3855 32.0872 64.2161 33.2166L43.7995 53.6332L35.7829 45.6166C34.6136 44.4872 33.0475 43.8623 31.4218 43.8764C29.7962 43.8906 28.2412 44.5426 27.0916 45.6921C25.9421 46.8417 25.2901 48.3967 25.2759 50.0223C25.2618 51.6479 25.8867 53.2141 27.0161 54.3834L39.4161 66.7834C40.5788 67.9457 42.1555 68.5987 43.7995 68.5987C45.4435 68.5987 47.0203 67.9457 48.1829 66.7834L72.9829 41.9834Z" fill="#3F83F8"/>
                        </svg>
                        <div class="flex gap-5">
                            <a href="{{ route('payment.all', ['mahasiswa' => auth()->id()]) }}" @class(["text-blue-600 border-2 border-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center transition-all disabled:!bg-gray-300"])>Kembali</a>
                            <a href="{{ route('payment.detail', ['mahasiswa' => auth()->id(), 'payment' => $this->payment->getAttribute('id')]) }}" @class(["text-white bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center transition-all disabled:!bg-gray-300"])>Lihat Detail</a>
                        </div>
                    </div>
                    @break

                @default
            @endswitch
        </div>
        <div @class(["flex justify-between mx-5", "hidden" => $step === 3])>
            <button type="button" @disabled($step === 0) wire:click="prev" class="text-white bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center transition-all disabled:!bg-gray-300">Prev</button>
            <button type="button" wire:click="next" @class(["text-white bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center transition-all disabled:!bg-gray-300", "hidden" => !($step >= 0 && $step < 2)])>Next</button>
            <button type="button" @disabled($step === 3) wire:click="confirm" @class(["text-white bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center transition-all disabled:!bg-gray-300", "hidden" => ($step >= 0 && $step < 2)])>Selesai</button>
        </div>
    </div>
</div>
