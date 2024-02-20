<div class="max-w-4xl mx-auto rounded-lg border p-5 flex flex-col gap-5">
    <h1 class="text-xl font-bold">Tambah Mahasiswa Baru</h1>

    <div class="flex flex-col gap-4">
        <x-input model="form.name" label="Nama" placeholder="Nama" required />
        <x-input model="form.email" type="email" label="Email" placeholder="Email" required />
        <x-input model="form.nim" label="NIM" placeholder="NIM" required />
{{--        <x-input model="form.password" type="password" label="Password" placeholder="Password" required />--}}
{{--        <x-input model="form.password_confirmation" type="password" label="Password Confirmation" placeholder="Password Confirmation" required />--}}
        <x-input model="form.address" type="textarea" label="Alamat" placeholder="Alamat" required />
        <x-input model="form.phone" label="Phone" placeholder="Phone" required />

        <div class="self-end">
            <button wire:click="store" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center me-2 mb-2 transition-all">Tambah</button>
        </div>
    </div>
</div>
