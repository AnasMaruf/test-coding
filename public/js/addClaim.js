$(document).ready(function () {
    fetchAllVoucher();
});

function fetchAllVoucher() {
    $.ajax({
        type: "GET",
        url: "/voucher/fetchAllVouchers",
        dataType: "json",
        success: function (response) {
            $("#voucher-grid").html("");
            $.each(response.vouchers, function (index, item) {
                // Loop through comments for the course
                $("#voucher-grid").append(
                    '<div class="bg-white shadow rounded overflow-hidden">\
                        <img src="img/' +
                        item.foto +
                        '"alt="Voucher"class="w-full h-40 object-cover"/>\
                        <div class="p-4 flex flex-col">\
                        <p class="text-gray-700 font-medium mb-2">\
                        ' +
                        item.nama +
                        ' </p>\
                        <div class="flex justify-between py-3">\
                        <p class="text-sm text-gray-500 mb-4">\
                            ' +
                        item.kategori +
                        '\
                        </p>\
                        <button class="bg-blue-500 px-3 text-white rounded hover:bg-blue-600" data-id="' +
                        item.id +
                        '" onClick="addClaim(this)">\
                        Claim\
                        </button>\
                        </div>\
                        </div>\
                    </div>'
                );
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error fetching comments:", jqXHR.responseText);
        },
    });
}
function addClaim(e) {
    const id = e.getAttribute("data-id");
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST",
        url: "/voucher/claim/" + id,
        processData: false,
        contentType: false,
        success: function (response) {
            fetchAllVoucher();
        },
        error: function (response) {},
    });
}
