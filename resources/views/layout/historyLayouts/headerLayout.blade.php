<header
    class="bg-gray-800 text-white px-6 py-4 flex justify-between items-center"
>
    <div class="flex items-center">
        <img
            src="{{ asset('img/profile.png') }}"
            alt="Logo"
            class="h-8 w-8 mr-3"
        />
        <h4 class="text-xs font-bold">{{ $user }}</h4>
    </div>
    <div>
        <h1 class="text-xl font-bold">Voucher Dashboard</h1>
    </div>
    <a href="/" class="bg-gray-600 px-4 py-2 rounded hover:bg-gray-700">
        Home
    </a>
</header>
