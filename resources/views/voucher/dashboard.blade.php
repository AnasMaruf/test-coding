@extends("layout.dashboardLayouts.dashboardLayout") @section('content')
<main class="p-6 w-3/4">
    <h2 class="text-2xl font-bold mb-6">Text Title</h2>

    <!-- Voucher Grid -->
    <div
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
        id="voucher-grid"
    >
        <!-- Single Voucher -->
        @foreach($vouchersAktif as $voucher)
        <div class="bg-white shadow rounded overflow-hidden">
            <img
                src="{{ asset('img/'.$voucher->foto) }}"
                alt="Voucher"
                class="w-full h-40 object-cover"
            />
            <div class="p-4 flex flex-col">
                <p class="text-gray-700 font-medium mb-2">
                    {{ $voucher->nama }}
                </p>
                <div class="flex justify-between py-3">
                    <p class="text-sm text-gray-500 mb-4">
                        {{ $voucher->kategori }}
                    </p>
                    <button
                        class="bg-blue-500 px-3 text-white rounded hover:bg-blue-600"
                        data-id="{{ $voucher->id }}"
                        onClick="addClaim(this)"
                    >
                        Claim
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endSection
