function filterVoucher(e) {
    const id = e.getAttribute("data-id");
    const kategori = document.querySelector(`#kategori-${id}`).value;
    console.log(`data-id:${id}`);

    console.log(kategori);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "GET",
        url: `/voucher/filterVoucher/${kategori}`,
        success: function (response) {
            $("#voucher-grid").html("");
            response.vouchers.forEach(function (item) {
                $("#voucher-grid").append(
                    `<div class="bg-white shadow rounded overflow-hidden">
                        <img src="/img/${item.foto}" alt="Voucher" class="w-full h-40 object-cover" />
                        <div class="p-4 flex flex-col">
                            <p class="text-gray-700 font-medium mb-2">${item.nama}</p>
                            <div class="flex justify-between py-3">
                                <p class="text-sm text-gray-500 mb-4">${item.kategori}</p>
                                <button class="bg-blue-500 px-3 text-white rounded hover:bg-blue-600" data-id="${item.id}" onClick="addClaim(this)">Claim</button>
                            </div>
                        </div>
                    </div>`
                );
            });
        },
        error: function (error) {
            console.error("Error:", error);
        },
    });
}
