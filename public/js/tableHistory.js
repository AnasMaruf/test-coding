$(document).ready(function () {
    fetchAllHistory();
    fetchVoucherClaimed();
});

function fetchAllHistory() {
    $.ajax({
        type: "GET",
        url: "/voucher/fetchAllHistories",
        dataType: "json",
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
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error fetching comments:", jqXHR.responseText);
        },
    });
}

function fetchVoucherClaimed() {
    $.ajax({
        type: "GET",
        url: "/voucher/fetchVoucherClaimed",
        dataType: "json",
        success: function (response) {
            console.log("Claimed: " + response);

            $("#totalClaimed").html("");
            $("#categoryClaimVoucher").html("");
            $("#totalClaimed").append(
                '<a href="/voucher/history" class="text-white rounded hover:bg-gray-600">\
                Total Claimed : ' +
                    response.voucherClaimed +
                    "\
                </a>"
            );
            $.each(response.categories, function (index, item) {
                $("#categoryClaimVoucher").append(
                    '<span class="bg-gray-500 text-white py-2 px-12">{{\
                        ' +
                        item.kategori +
                        ":" +
                        item.total +
                        '}}</span>\
                        <input type="hidden" id="kategori-' +
                        item.id +
                        '" name="kategori" value="' +
                        item.kategori +
                        '"/>\
                        <button class="flex justify-between items-center px-4 py-2 bg-gray-300 rounded hover:bg-gray-400" data-id="' +
                        item.id +
                        '" onclick="filterVoucherClaim(this)">\
                        <span>Search</span> </button>'
                );
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error fetching comments:", jqXHR.responseText);
        },
    });
}

function deleteHistory(e) {
    const id = e.getAttribute("data-id");
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "DELETE",
        url: "/voucher/deleteHistory/" + id,
        processData: false,
        contentType: false,
        success: function (response) {
            fetchVoucherClaimed();
            fetchAllHistory();
        },
        error: function (response) {},
    });
}
