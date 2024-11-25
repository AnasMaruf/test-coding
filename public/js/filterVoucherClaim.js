function filterVoucherClaim(e) {
    const id = e.getAttribute("data-id");
    const kategori = document.querySelector(`#kategori-${id}`).value;
    console.log(`data-id:${id}`);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "GET",
        url: `/voucher/histories/filterVoucherClaim/${kategori}`,
        success: function (response) {
            $("#tableHistory").html("");
            $.each(response.histories, function (index, item) {
                $("#tableHistory").append(
                    '<tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">\
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">\
                        ' +
                        item.voucher.nama +
                        '\
                    </th>\
                    <td class="px-6 py-4">\
                        <button href="#" class="font-medium py-1 px-2 rounded bg-red-600 text-white dark:text-white hover:underline" data-id="' +
                        item.id +
                        '" onClick="deleteHistory(this)">Remove</button>\
                    </td>\
                </tr>'
                );
            });
        },
        error: function (error) {
            console.error("Error:", error);
        },
    });
}
