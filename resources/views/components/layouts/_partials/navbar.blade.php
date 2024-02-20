<nav class="w-full flex fixed top-0 z-40 px-10 py-5 shadow-lg justify-between items-center bg-blue-900">
    <a href="{{ route('dashboard') }}">
        <div class="flex space-x-5 items-center">
            <img src="{{ asset('storage/img/binadarma.png')}}" alt="Logo Bina Darma" width="150px">
        </div>
    </a>
    <div class="text-lg hover:bg-blue-800 px-4 py-1 rounded-full">
        <h1 class="text-white">Selamat Pagi,
            <span class="text-gray-200 font-bold">{{ auth()->user()->getAttribute('name') }}</span>
        </h1>
    </div>
</nav>
