<aside class="bg-gray-200 w-1/4 p-4 order-last">
    <div class="space-y-4">
        <!-- Category Buttons -->
        <div
            class="w-full text-center px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600"
            id="totalClaimed"
        >
            <a
                href="/voucher/history"
                class="text-white rounded hover:bg-gray-600"
            >
                Total Claimed : {{ $voucherClaimed }}
            </a>
        </div>
        @foreach ($categories as $category)
        <div
            class="flex justify-center gap-3 items-center"
            id="categoryClaimVoucher"
        >
            <span class="bg-gray-500 text-white py-2 px-12">{{
                $category->kategori.": ".$category->total
            }}</span>
            <input
                type="hidden"
                id="kategori-{{ $category->id }}"
                name="kategori"
                value="{{ $category->kategori }}"
            />
            <button
                class="flex justify-between items-center px-4 py-2 bg-gray-300 rounded hover:bg-gray-400"
                data-id="{{ $category->id }}"
                onclick="filterVoucherClaim(this)"
            >
                <span>Search</span>
            </button>
        </div>
        @endforeach
        <!-- More Category Buttons -->
        <form action="/logout" method="POST">
            @csrf
            <button
                class="w-full px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600"
            >
                Log Out
            </button>
        </form>
    </div>
</aside>
