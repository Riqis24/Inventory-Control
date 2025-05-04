$(document).ready(function () {
    $("#custTable").DataTable({
        responsive: true,
        autoWidth: true,
        pageLength: 10,
        scrollY: "350px",
    });
});

// Menambahkan event listener untuk tombol addRow
document.getElementById("addRow").addEventListener("click", function () {
    // Ambil data satuan dari tombol menggunakan atribut data-satuans
    var satuans = JSON.parse(this.getAttribute("data-satuans"));

    // Membuat elemen row baru
    const row = document.createElement("div");
    row.classList.add("cust-row");

    // Menambahkan HTML untuk input produk
    row.innerHTML = `
        <div class="row mt-2">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control form-control-sm" name="names[]"
                                            required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" name="addresss[]"
                                            required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control form-control-sm" name="phones[]"
                                            required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control form-control-sm" value="0"
                                            name="outstandings[]" required>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button"
                                            class="btn btn-danger btn-sm rounded removeRow">❌</button>
                                    </div>
                                </div>
    `;

    // Menambahkan row baru ke dalam container
    document.getElementById("dynamicCustsInputs").appendChild(row);

    // Menambahkan event listener untuk tombol hapus (❌)
    row.querySelector(".removeRow").addEventListener("click", function () {
        row.remove();
    });
});

// Fungsi untuk menggenerate opsi satuan
function satuanOptions(satuans) {
    return satuans
        .map(function (satuan) {
            return `<option value="${satuan.id}">${satuan.name}</option>`;
        })
        .join("");
}
// remove baris
document.addEventListener("click", function (e) {
    if (e.target && e.target.classList.contains("removeRow")) {
        e.preventDefault();
        e.target.closest(".product-row").remove();
    }
});
