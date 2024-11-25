@extends('layout.historyLayouts.historyLayout') @section('content')
<main class="p-6 w-3/4">
    <h2 class="text-2xl font-bold mb-6">All History</h2>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
        >
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
                <tr>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody id="tableHistory">
                @foreach ($voucherClaims as $claim) @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
