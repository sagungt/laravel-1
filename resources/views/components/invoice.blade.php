@props([
    'payment' => null,
    'paymentList' => null,
])

<div
    @class([
        "border rounded p-4 flex flex-col text-sm gap-4 relative",
        "before:absolute before:top-1/2 before:left-1/2 before:text-[150px] before:font-semibold before:opacity-10 before:-translate-x-1/2 before:rotate-[-45deg] before:content-['LUNAS']" => $payment?->getAttribute('status') === \App\Enums\PaymentStatus::PAID
    ])
>
    <div class="flex-1 flex justify-between">
        <div class="span">Tgl Cetak : {{ $payment?->getAttribute('generated_date')?->format('d F Y') ?? '-' }}</div>
        <img src="{{ asset('storage/img/binadarma.png')}}" alt="Logo Bina Darma" width="150px">
    </div>

    <div class="flex-1">
        <table>
            <tbody>
                <tr>
                    <td>Kode Bayar</td>
                    <td><span class="ml-5">: <span class="text-lg">{{ $payment?->getAttribute('payment_id') }}</span></span></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td><span class="ml-5">: {{ $payment?->user?->getAttribute('nim') }}</span></td>
                </tr>
                <tr>
                    <td>NAMA</td>
                    <td><span class="ml-5 uppercase">: {{ $payment?->user?->getAttribute('name') }}</span></td>
                </tr>
                <tr>
                    <td>Program Study</td>
                    <td><span class="ml-5">: Teknik Informatika</span></td>
                </tr>
                <tr>
                    <td>Metode Pembayaran</td>
                    <td><span class="ml-5">: {{ $payment?->paymentMethod?->getAttribute('name') }}</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="flex-1">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-700 uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Pembayaran
                        </th>
{{--                        <th scope="col" class="px-6 py-3">--}}
{{--                            Tahun Akademik--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3">--}}
{{--                            Semester--}}
{{--                        </th>--}}
                        <th scope="col" class="px-6 py-3">
                            Nilai Bayar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paymentList ?? $payment?->paymentList ?? [] as $p)
                        <tr class="border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $p?->paymentType?->getAttribute('name') }}
                            </td>
    {{--                        <td class="px-6 py-4">--}}
    {{--                            todo--}}
    {{--                        </td>--}}
    {{--                        <td class="px-6 py-4">--}}
    {{--                            todo--}}
    {{--                        </td>--}}
                            <td class="px-6 py-4">
                                {{ $p?->paymentType?->getAttribute('amount') }}
                            </td>
                            <td class="px-6 py-4">
                                1
                            </td>
                            <td class="px-6 py-4">
                                {{ $p?->paymentType?->getAttribute('amount') }}
                            </td>
                        </tr>
                    @endforeach
                    <tr class="">
                        <td colspan="3"></td>
                        <td class="px-6 py-3">Total (Rp)</td>
                        <td class="px-6 py-3">{{ !is_null($paymentList) ? $paymentList[0]->paymentType?->getAttribute('amount') : $payment?->getAttribute('total') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex-1">
        <p>
            Semua Pembayaran Yang Sudah Di Setor Ke Rekening Bina Darma Tidak Bisa Di Kembalikan Lagi Dengan Alasan Apapun
        </p>
        <span class="font-semibold">Penyetor,</span>
        <div class="my-10"></div>
        <span class="text-lg uppercase">({{ $payment?->user?->getAttribute('name') }})</span>
    </div>

    <div class="flex-1">
        <div class="text-xs ml-10">
            <span>*) catatan :</span>
            <ul class="space-y-1 list-disc list-inside">
                <li>Pembayaran dapat di lakukan di seluruh cabang dan ATM BANK SUMSEL-BABEL.</li>
                <li>Gunakan lembaran ini untuk pembayaran di BANK SUMSEL-BABEL Jika melalui Teller</li>
                <li>
                    Jika Melalui ATM lakukan langkah berikut <br>
                    <ol class="ps-5 mt-2 space-y-1 list-decimal list-inside">
                        <li>Masukan PIN anda --> Lanjut</li>
                        <li>Pilih Transaksi lainnya --> pembayaran dan pembelian --> pilih lainnya --> Pilih Pendidikan</li>
                        {{-- change --}}
                        <li>Masukan kode institusi+kode bayar : 00012018142169001 --> pilih Benar</li>
                        <li>Kemudian akan tampil informasi identitas dan jumlah bayar sebesar Rp. 200.000,00 , selanjutnya pilih Ya</li>
                        <li>Pilih jenis rekening anda dan tunggu sampai proses transaksi selesai.</li>
                        <li>Simpan struk pembayaran sebagai bukti pembayaran.</li>
                    </ol>
                </li>
                <li class="font-bold">Untuk Stop Out Lakukan Pendaftaran Stop Out Di PPM (Pusat Pelayanan Mahasiswa) setelah Pembayaran..!!</li>
            </ul>
        </div>
    </div>
</div>
