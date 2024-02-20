<div class="max-w-4xl mx-auto rounded-lg border p-5 flex flex-col gap-5">
    @if (session('error'))
        <div class="p-4 border border-red-300 rounded-lg bg-red-100 text-red-900">
            {{ session('error') }}
        </div>
    @endif
    <h1 class="text-xl font-bold">Edit Mahasiswa</h1>

    <div class="flex flex-col gap-4">
        <x-input model="form.name" label="Nama" placeholder="Nama" required />
        <x-input model="form.email" type="email" label="Email" placeholder="Email" required />
        <x-input model="form.nim" label="NIM" placeholder="NIM" required />
        <x-input model="form.address" type="textarea" label="Alamat" placeholder="Alamat" required />
        <x-input model="form.phone" label="Phone" placeholder="Phone" required />

        <div class="self-end">
            <button wire:click="save" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2 transition-all">Update</button>
        </div>
    </div>
</div>
