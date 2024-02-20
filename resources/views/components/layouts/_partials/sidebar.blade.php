<aside class="h-full w-20% px-11 fixed top-0 z-30 bg-white border border-gray-300">
    <div class="flex flex-col items-start mt-28 justify-center">
        @foreach([
            [
                'route' => 'dashboard',
                'name' => 'Dashboard',
                'can' => ['admin', 'applicant', 'member']
            ],
            [
                'route' => 'mahasiswa.index',
                'name' => 'Mahasiswa',
                'can' => ['admin']
            ],
            [
                'route' => auth()->user()->isAdmin() ? 'payment.index' : 'payment.all',
                'name' => 'Payment',
                'can' => ['admin', 'member', 'applicant', 'pre-member']
            ],
            [
                'route' => 'profile.edit',
                'name' => 'Profile',
                'can' => ['admin', 'member', 'applicant', 'pre-member']
            ],
        ] as $route)
            @canany($route['can'])
                <a href="{{ route($route['route'], auth()->user()->isAdmin() ? [] : ['mahasiswa' => auth()->id()]) }}" class="pl-3 pr-7 py-2 flex-1 space-x-5 group w-full rounded-bl-lg rounded-tr-lg hover:bg-blue-200  hover:rounded-bl-lg hover:rounded-tr-lg">
                    <span class="text-gray-900 text-base font-bold group-hover:text-black w-full">{{ $route['name'] }}</span>
                </a>
            @endcanany
        @endforeach
        <form action="{{ route('logout') }}" method="post">
            @csrf
            @method('POST')
            <button type="submit" class="pl-3 pr-7 py-2 space-x-5 group hover:bg-blue-200  hover:rounded-bl-lg hover:rounded-tr-lg">
                <span class="text-gray-900 text-base font-bold group-hover:text-black">Log Out</span>
            </button>
        </form>
    </div>
</aside>
