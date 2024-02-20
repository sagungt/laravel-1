<div class="flex flex-col divide-y gap-5">
    <div class="flex gap-4">
        @foreach($counts as $c)
            @canany($c['can'])
                <div class="w-72 bg-blue-50 border border-blue-600 rounded-bl-xl rounded-tr-xl">
                    <div class="flex px-5 py-4 items-center justify-between">
                        <div class="text-gray-900">
                            <h1 class="text-4xl text-gray-900 font-bold">{{ $c['total'] }}</h1>
                            <h1 class="pt-3 text-xl text-gray-900 font-medium">{{ $c['label'] }}</h1>
                        </div>
                    </div>
                    <div class="bg-blue-200 border-t border-blue-600 rounded-bl-xl hover:bg-blue-300">
                        <a href="{{ $c['route'] }}" class="flex items-center space-x-4 justify-center py-2 px-5">
                            <span class="text-gray-600 font-semibold">Info Lanjut</span>
                            <svg width="6" height="11" viewBox="0 0 6 11" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M0.292787 10.2074C0.105316 10.0199 0 9.76557 0 9.50041C0 9.23524 0.105316 8.98094 0.292787 8.79341L3.58579 5.50041L0.292787 2.20741C0.110629 2.0188 0.00983372 1.7662 0.0121121 1.50401C0.0143906 1.24181 0.11956 0.990997 0.304968 0.805589C0.490376 0.620181 0.741189 0.515012 1.00339 0.512733C1.26558 0.510455 1.51818 0.611249 1.70679 0.793408L5.70679 4.79341C5.89426 4.98094 5.99957 5.23524 5.99957 5.50041C5.99957 5.76557 5.89426 6.01988 5.70679 6.20741L1.70679 10.2074C1.51926 10.3949 1.26495 10.5002 0.999786 10.5002C0.734622 10.5002 0.480314 10.3949 0.292787 10.2074Z"
                                      fill="#374151" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endcanany
        @endforeach
    </div>

    @can(['admin'])
        <div class="pt-10 pb-5">
            <a href="{{ route('mahasiswa.create') }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2 transition-all">+ Tambah Mahasiswa</a>
        </div>
    @endcan

    @can(['admin'])
        <div class="flex flex-col gap-4 pt-5">
            <h2>Pendaftar Baru</h2>
            <x-table>
                <x-slot:header>
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </x-slot:header>
                <x-slot:body>
                    @forelse($applicant as $a)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $a->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $a->email }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('payment.detail', ['mahasiswa' => $a->id, 'payment' => $a->registrationPayment()?->id]) }}" class="px-2 py-1 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">detail</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b">
                            <th scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap" colspan="3">
                                No Data
                            </th>
                        </tr>
                    @endforelse
                </x-slot:body>
            </x-table>
            <div>
                {{ $applicant->links() }}
            </div>
        </div>
    @endcan

    @can(['admin'])
        <div class="flex flex-col gap-4 pt-5">
            <h2>Daftar Calon Mahasiswa</h2>
            <x-table>
                <x-slot:header>
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </x-slot:header>
                <x-slot:body>
                    @forelse($preMember as $p)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $p->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $p->email }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="#" class="px-2 py-1 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">detail</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b">
                            <th scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap" colspan="3">
                                No Data
                            </th>
                        </tr>
                    @endforelse
                </x-slot:body>
            </x-table>
            <div>
                {{ $preMember->links() }}
            </div>
        </div>
    @endcan
</div>
