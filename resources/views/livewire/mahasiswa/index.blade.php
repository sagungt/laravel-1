<div>
    <div class="flex flex-col gap-4">
        @if (session('success'))
            <div class="flex justify-between p-4 border border-green-300 rounded-lg bg-green-100 text-green-900" x-data x-ref="message">
                <span>
                    {{ session('success') }}
                </span>
                <button @click="$refs.message?.remove()">&times;</button>
            </div>
        @endif
        <div>
            <a href="{{ route('mahasiswa.create') }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2 transition-all">+ Tambah Baru</a>
        </div>
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
                        NIM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </x-slot:header>
            <x-slot:body>
                @forelse($mahasiswa as $m)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $m?->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $m?->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $m?->nim }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $m?->address ?? '' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $m?->phone ?? '' }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <a href="{{ route('mahasiswa.update', ['mahasiswa' => $m->id]) }}" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">edit</a>
                                <a href="{{ route('payment.all', ['mahasiswa' => $m->id]) }}" class="px-3 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">pembayaran</a>
                                <button type="button" wire:click="delete({{ $m->id }})" class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300">delete</button>
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
            {{ $mahasiswa->links() }}
        </div>
    </div>
</div>
