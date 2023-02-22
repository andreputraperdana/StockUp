const textmenu = document.querySelectorAll(".textmenu");
const slidelogo = document.querySelector(".side_logo");
const isikonten = document.querySelector(".isi_konten");
textmenu.forEach((test) => test.classList.add("hide"));
const slidebar = document.querySelector(".side_bar");
const buttonBarangBaru = document.querySelector("#btnBarangBaru");
const buttonDownload = document.querySelector("#btn_download");
const buttonBarangExist = document.querySelector("#btnBarangExisting");
const inputTambahBarang = document.querySelector(".input_content_tambahbarang");
const inputJenisBarang = document.querySelector(".input_content_jenisbarang");
const inputJumlahBarang = document.querySelector(".input_content_jumlahbarang");
const judulTambahBarang = document.querySelector(".judul_content_tambahbarang");
const judulTambahBarangExist = document.querySelector(
    ".judul_content_tambahbarangexist"
);

const previewlaporan = document.querySelector(".btn_preview");

const inputTanggalKadaluarsa = document.querySelector(
    ".input_content_tanggalkadaluarsa"
);
const inputFoto = document.querySelector(".input_content_fotobarang");
const jenislaporan = document.querySelector(".jenislaporan");
const judullaporan = document.querySelector(".judul_2");
const periodelaporan = document.querySelector(".judul_3");
const isilaporankadaluarsa = document.querySelector(
    ".isi_laporanbarangkadaluarsa"
);
const contentlaporankadaluarsa = document.querySelector(
    ".content_laporanbarangkadaluarsa"
);

const isilaporanbaranghabis = document.querySelector(".isi_laporanbaranghabis");
const contentlaporanbaranghabis = document.querySelector(
    ".content_laporanbaranghabis"
);

const isilaporanpersediaanstockbarang = document.querySelector(
    ".isi_laporanpersediaanstockbarang"
);
const contentlaporanpersediaanstockbarang = document.querySelector(
    ".content_laporanpersediaanstockbarang"
);

const isilaporankeluarmasukbarang = document.querySelector(
    ".isi_laporankeluarmasukbarang"
);
const contentlaporankeluarmasukbarang = document.querySelector(
    ".content_laporankeluarmasukbarang"
);
slidebar.addEventListener("mouseover", function (e) {
    // console.log(this.classList);
    this.style.width = "250px";
    textmenu.forEach((test) => test.classList.remove("hide"));
    slidelogo.classList.remove("hidden");
    isikonten.classList.add("tambah");
    isikonten.style.width = "75%";
    document.querySelector(".menu_lprn").classList.remove("actives");
});

slidebar.addEventListener("mouseout", function (e) {
    // console.log(this.classList);
    this.style.width = "80px";
    textmenu.forEach((test) => test.classList.add("hide"));
    slidelogo.classList.add("hidden");
    isikonten.classList.remove("tambah");
    isikonten.style.width = "90%";
    document.querySelector(".menu_lprn").classList.add("actives");
});

if (document.querySelector(".tanda").innerHTML == "3") {
    document.querySelector(".menu_lprn").style.backgroundColor = "#D7CAA0";
    document.querySelector("#lprn").style.fontWeight = "700";
    document.querySelector(".menu_lprn").classList.add("actives");
}

$(document).ready(function () {
    buttonDownload.addEventListener("click", function (e) {
        var head = document.querySelectorAll(".table_head");

        var hasil = {
            jenislaporan: $(".jenislaporan").val(),
            input_tanggalawal: $(".input_tanggalawal").val(),
            input_tanggalakhir: $(".input_tanggalakhir").val(),
        };

        // var table_head = {
        //     "Barang akan kadaluarsa": ['ID Barang', 'Tanggal Masuk Barang', 'Nama Barang', "Tanggal Kadaluarsa", 'Jumlah Barang']
        // }

        // td = "";
        // table_head[hasil.jenislaporan].map((el) => {
        //     td+=`<td>${el}</td>`;
        // })

        // console.log(head);
        // head.append(td);

        window.location.href = `/laporan/cetak_pdf/?jenis_laporan=${hasil.jenislaporan}&start=${hasil.input_tanggalawal}&end=${hasil.input_tanggalakhir}`;
    });

    previewlaporan.addEventListener("click", function (e) {
        if (isilaporankadaluarsa.classList.contains("d-flex")) {
            isilaporankadaluarsa.classList.remove("d-flex");
            isilaporankadaluarsa.classList.remove("justify-content-center");
            isilaporankadaluarsa.style.display = "none";
        }
        if (isilaporanbaranghabis.classList.contains("d-flex")) {
            isilaporanbaranghabis.classList.remove("d-flex");
            isilaporanbaranghabis.classList.remove("justify-content-center");
            isilaporanbaranghabis.style.display = "none";
        }
        if (isilaporankeluarmasukbarang.classList.contains("d-flex")) {
            isilaporankeluarmasukbarang.classList.remove("d-flex");
            isilaporankeluarmasukbarang.classList.remove(
                "justify-content-center"
            );
            isilaporankeluarmasukbarang.style.display = "none";
        }
        if (isilaporanpersediaanstockbarang.classList.contains("d-flex")) {
            isilaporanpersediaanstockbarang.classList.remove("d-flex");
            isilaporanpersediaanstockbarang.classList.remove(
                "justify-content-center"
            );
            isilaporanpersediaanstockbarang.style.display = "none";
        }

        e.preventDefault();

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

        var hasil = {
            jenislaporan: $(".jenislaporan").val(),
            input_tanggalawal: $(".input_tanggalawal").val(),
            input_tanggalakhir: $(".input_tanggalakhir").val(),
        };

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": CSRF_TOKEN,
            },
        });

        $.ajax({
            type: "POST",
            url: "/laporanbarang",
            data: hasil,
            dataType: "json",
            success: function (response) {
                contentlaporankadaluarsa.innerHTML = "";
                contentlaporanbaranghabis.innerHTML = "";
                contentlaporankeluarmasukbarang.innerHTML = "";
                contentlaporanpersediaanstockbarang.innerHTML = "";
                if (response.jenislaporan === "Barang akan kadaluarsa") {
                    judullaporan.innerHTML = `<h4>${response.jenislaporan}</h4>`;
                    periodelaporan.innerHTML = `<p>Periode: ${response.periodeawal} / ${response.periodeakhir}</p>`;
                    for (let b = 0; b < response.laporanbarang.length; b++) {
                        contentlaporankadaluarsa.innerHTML += `<tr class="">
                            <td class="pt-4 pb-4">${response.laporanbarang[b].id}</td>
                            <td class="text-center pt-4 pb-4">${response.laporanbarang[b].TanggalMasukBarang}</td>
                            <td class="text-center pt-4 pb-4">${response.laporanbarang[b].nama}</td>
                            <td class="text-center pt-4 pb-4">${response.laporanbarang[b].tanggal_kadaluarsa}</td>
                            <td class="text-center pt-4 pb-4">${response.laporanbarang[b].jumlah}</td>
                            </tr>`;
                    }
                    isilaporankadaluarsa.classList.add("d-flex");
                    isilaporankadaluarsa.classList.add(
                        "justify-content-center"
                    );
                    isilaporankadaluarsa.style.display = "block";
                    // window.location.href = `/laporan/cetak_pdf/${hasil.jenislaporan}/${hasil.input_tanggalawal}/${hasil.input_tanggalakhir}`;
                } else if (response.jenislaporan === "Barang akan habis") {
                    judullaporan.innerHTML = `<h4>${response.jenislaporan}</h4>`;
                    periodelaporan.innerHTML = `<p>Periode: ${response.periodeawal} / ${response.periodeakhir}</p>`;
                    for (let c = 0; c < response.laporanbarang.length; c++) {
                        contentlaporanbaranghabis.innerHTML += `<tr class="">
                            <td class="pt-4 pb-4">${response.laporanbarang[c].id}</td>
                            <td class="text-center pt-4 pb-4">${response.laporanbarang[c].nama}</td>
                            <td class="text-center pt-4 pb-4">${response.laporanbarang[c].total}</td>
                            </tr>`;
                    }
                    isilaporanbaranghabis.classList.add("d-flex");
                    isilaporanbaranghabis.classList.add(
                        "justify-content-center"
                    );
                    isilaporanbaranghabis.style.display = "block";
                } else if (response.jenislaporan === "Persediaan stok barang") {
                    judullaporan.innerHTML = `<h4>${response.jenislaporan}</h4>`;
                    periodelaporan.innerHTML = `<p>Periode: ${response.periodeawal} / ${response.periodeakhir}</p>`;

                    for (let e = 0; e < response.stockbarang.length; e++) {
                        if (response.stockbarang[e].StockMasuk === null) {
                            response.stockbarang[e].StockMasuk = "-";
                            contentlaporanpersediaanstockbarang.innerHTML += `<tr class="">
                            <td class="pt-4 pb-4">${response.stockbarang[e].id}</td>
                            <td class="text-center pt-4 pb-4">${response.stockbarang[e].nama}</td>
                            <td class="text-center pt-4 pb-4">${response.stockbarang[e].StockMasuk}</td>
                            <td class="text-center pt-4 pb-4">${response.stockbarang[e].StockKeluar}</td>
                            <td class="text-center pt-4 pb-4">0</td>
                            </tr>`;
                        }
                        if (response.stockbarang[e].StockKeluar === null) {
                            response.stockbarang[e].StockKeluar = "-";
                            contentlaporanpersediaanstockbarang.innerHTML += `<tr class="">
                            <td class="pt-4 pb-4">${
                                response.stockbarang[e].id
                            }</td>
                            <td class="text-center pt-4 pb-4">${
                                response.stockbarang[e].nama
                            }</td>
                            <td class="text-center pt-4 pb-4">${
                                response.stockbarang[e].StockMasuk
                            }</td>
                            <td class="text-center pt-4 pb-4">${
                                response.stockbarang[e].StockKeluar
                            }</td>
                            <td class="text-center pt-4 pb-4">${
                                response.stockbarang[e].StockMasuk - 0
                            }</td>
                            </tr>`;
                        } else {
                            contentlaporanpersediaanstockbarang.innerHTML += `<tr class="">
                            <td class="pt-4 pb-4">${
                                response.stockbarang[e].id
                            }</td>
                            <td class="text-center pt-4 pb-4">${
                                response.stockbarang[e].nama
                            }</td>
                            <td class="text-center pt-4 pb-4">${
                                response.stockbarang[e].StockMasuk
                            }</td>
                            <td class="text-center pt-4 pb-4">${
                                response.stockbarang[e].StockKeluar
                            }</td>
                            <td class="text-center pt-4 pb-4">${
                                response.stockbarang[e].StockMasuk -
                                response.stockbarang[e].StockKeluar
                            }</td>
                            </tr>`;
                        }
                    }
                    isilaporanpersediaanstockbarang.classList.add("d-flex");
                    isilaporanpersediaanstockbarang.classList.add(
                        "justify-content-center"
                    );
                    isilaporanpersediaanstockbarang.style.display = "block";
                } else if (response.jenislaporan === "Keluar masuk barang") {
                    judullaporan.innerHTML = `<h4>${response.jenislaporan}</h4>`;
                    periodelaporan.innerHTML = `<p>Periode: ${response.periodeawal} / ${response.periodeakhir}</p>`;
                    let tempidbarang = 0;
                    // console.log(response.laporanbarang[0].id);
                    // console.log(tempidbarang);
                    // if (response.laporanbarang[0].id === tempidbarang) {
                    //     console.log("test");
                    // } else if (response.laporanbarang[0].id != tempidbarang) {
                    //     console.log("test2");
                    // }
                    let stockakhir = 0;
                    console.log(response.laporanbarang);
                    for (let d = 0; d < response.laporanbarang.length; d++) {
                        if (response.laporanbarang[d].id === tempidbarang) {
                            // stockakhir -=
                            //     response.laporanbarang[d].barangkeluar;
                            // stockakhir -=
                            //     response.laporanbarang[d].barangkeluar;

                            if (
                                response.laporanbarang[d].barangmasukid ==
                                response.laporanbarang[d - 1].barangmasukid
                            ) {
                                response.laporanbarang[d].barangmasuk = 0;
                                response.laporanbarang[d].tanggalmasukbarang =
                                    "-";
                                contentlaporankeluarmasukbarang.innerHTML += `<tr class="">
                                    <td class="pt-4 pb-4"></td>
                                    <td class="text-center pt-4 pb-4"></td>
                                    <td class="text-center pt-4 pb-4">${stockakhir}</td>
                                    <td class="text-center pt-4 pb-4">-</td>
                                    <td class="text-center pt-4 pb-4">${
                                        response.laporanbarang[d].barangmasuk
                                    }</td>
                                    <td class="text-center pt-4 pb-4">${
                                        response.laporanbarang[d]
                                            .tanggalmasukbarang
                                    }</td>
                                    <td class="text-center pt-4 pb-4">00${
                                        response.laporanbarang[d].id
                                    }-00${
                                    response.laporanbarang[d].barangmasukid
                                }</td>
                                    <td class="text-center pt-4 pb-4">${
                                        response.laporanbarang[d].barangkeluar
                                    }</td>
                                    <td class="text-center pt-4 pb-4">${
                                        response.laporanbarang[d]
                                            .tanggalkeluarbarang
                                    }</td>
                                    <td class="text-center pt-4 pb-4">${(stockakhir +=
                                        response.laporanbarang[d].barangmasuk -
                                        response.laporanbarang[d]
                                            .barangkeluar)}</td>
                                    </tr>`;
                            } else if (
                                response.laporanbarang[d].barangmasuk === null
                            ) {
                                response.laporanbarang[d].barangmasuk = 0;
                                response.laporanbarang[d].tanggalmasukbarang =
                                    "-";
                                contentlaporankeluarmasukbarang.innerHTML += `<tr class="">
                                    <td class="pt-4 pb-4"></td>
                                    <td class="text-center pt-4 pb-4"></td>
                                    <td class="text-center pt-4 pb-4">${stockakhir}</td>
                                    <td class="text-center pt-4 pb-4">-</td>
                                    <td class="text-center pt-4 pb-4">${
                                        response.laporanbarang[d].barangmasuk
                                    }</td>
                                    <td class="text-center pt-4 pb-4">${
                                        response.laporanbarang[d]
                                            .tanggalmasukbarang
                                    }</td>
                                    <td class="text-center pt-4 pb-4">00${
                                        response.laporanbarang[d].id
                                    }-00${
                                    response.laporanbarang[d].barangmasukid
                                }</td>
                                    <td class="text-center pt-4 pb-4">${
                                        response.laporanbarang[d].barangkeluar
                                    }</td>
                                    <td class="text-center pt-4 pb-4">${
                                        response.laporanbarang[d]
                                            .tanggalkeluarbarang
                                    }</td>
                                    <td class="text-center pt-4 pb-4">${(stockakhir +=
                                        response.laporanbarang[d].barangmasuk -
                                        response.laporanbarang[d]
                                            .barangkeluar)}</td>
                                    </tr>`;
                            } else if (
                                response.laporanbarang[d].barangkeluar == null
                            ) {
                                response.laporanbarang[d].barangkeluar = 0;
                                response.laporanbarang[d].tanggalkeluarbarang =
                                    "-";
                                contentlaporankeluarmasukbarang.innerHTML += `<tr class="">
                                    <td class="pt-4 pb-4"></td>
                                    <td class="text-center pt-4 pb-4"></td>
                                    <td class="text-center pt-4 pb-4">${stockakhir}</td>
                                    <td class="text-center pt-4 pb-4">00${
                                        response.laporanbarang[d].id
                                    }-00${
                                    response.laporanbarang[d].barangmasukid
                                }</td>
                                    <td class="text-center pt-4 pb-4">${
                                        response.laporanbarang[d].barangmasuk
                                    }</td>
                                    <td class="text-center pt-4 pb-4">${
                                        response.laporanbarang[d]
                                            .tanggalmasukbarang
                                    }</td>
                                    <td class="text-center pt-4 pb-4">-</td>
                                    <td class="text-center pt-4 pb-4">${
                                        response.laporanbarang[d].barangkeluar
                                    }</td>
                                    <td class="text-center pt-4 pb-4">${
                                        response.laporanbarang[d]
                                            .tanggalkeluarbarang
                                    }</td>
                                    <td class="text-center pt-4 pb-4">${(stockakhir +=
                                        response.laporanbarang[d].barangmasuk -
                                        response.laporanbarang[d]
                                            .barangkeluar)}</td>
                                    </tr>`;
                            } else {
                                contentlaporankeluarmasukbarang.innerHTML += `<tr class="">
                                        <td class="pt-4 pb-4"></td>
                                        <td class="text-center pt-4 pb-4"></td>
                                        <td class="text-center pt-4 pb-4">${stockakhir}</td>
                                        <td class="text-center pt-4 pb-4">00${
                                            response.laporanbarang[d].id
                                        }-00${
                                    response.laporanbarang[d].barangmasukid
                                }</td>
                                        <td class="text-center pt-4 pb-4">${
                                            response.laporanbarang[d]
                                                .barangmasuk
                                        }</td>
                                        <td class="text-center pt-4 pb-4">${
                                            response.laporanbarang[d]
                                                .tanggalmasukbarang
                                        }</td>
                                        <td class="text-center pt-4 pb-4">00${
                                            response.laporanbarang[d].id
                                        }-00${
                                    response.laporanbarang[d].barangmasukid
                                }</td>
                                        <td class="text-center pt-4 pb-4">${
                                            response.laporanbarang[d]
                                                .barangkeluar
                                        }</td>
                                        <td class="text-center pt-4 pb-4">${
                                            response.laporanbarang[d]
                                                .tanggalkeluarbarang
                                        }</td>
                                        <td class="text-center pt-4 pb-4">${(stockakhir +=
                                            response.laporanbarang[d]
                                                .barangmasuk -
                                            response.laporanbarang[d]
                                                .barangkeluar)}</td>
                                        </tr>`;
                            }
                            tempidbarang = response.laporanbarang[d].id;
                        } else if (
                            response.laporanbarang[d].id !== tempidbarang
                        ) {
                            stockakhir = 0;
                            stockakhir =
                                response.laporanbarang[d].Stockfinalawal +
                                response.laporanbarang[d].barangmasuk -
                                response.laporanbarang[d].barangkeluar;

                            if (
                                response.laporanbarang[d].barangkeluar == null
                            ) {
                                response.laporanbarang[d].barangkeluar = 0;
                                response.laporanbarang[d].tanggalkeluarbarang =
                                    "-";
                                contentlaporankeluarmasukbarang.innerHTML += `<tr class="">
                                <td class="pt-4 pb-4">${response.laporanbarang[d].id}</td>
                                <td class="text-center pt-4 pb-4">${response.laporanbarang[d].nama}</td>
                                <td class="text-center pt-4 pb-4">${response.laporanbarang[d].Stockfinalawal}</td>
                                <td class="text-center pt-4 pb-4">00${response.laporanbarang[d].id}-00${response.laporanbarang[d].barangmasukid}</td>
                                <td class="text-center pt-4 pb-4">${response.laporanbarang[d].barangmasuk}</td>
                                <td class="text-center pt-4 pb-4">${response.laporanbarang[d].tanggalmasukbarang}</td>
                                <td class="text-center pt-4 pb-4">-</td>
                                <td class="text-center pt-4 pb-4">${response.laporanbarang[d].barangkeluar}</td>
                                <td class="text-center pt-4 pb-4">${response.laporanbarang[d].tanggalkeluarbarang}</td>
                                <td class="text-center pt-4 pb-4">${stockakhir}</td>
                                </tr>`;
                            } else {
                                contentlaporankeluarmasukbarang.innerHTML += `<tr class="">
                                <td class="pt-4 pb-4">${response.laporanbarang[d].id}</td>
                                <td class="text-center pt-4 pb-4">${response.laporanbarang[d].nama}</td>
                                <td class="text-center pt-4 pb-4">${response.laporanbarang[d].Stockfinalawal}</td>
                                <td class="text-center pt-4 pb-4">00${response.laporanbarang[d].id}-00${response.laporanbarang[d].barangmasukid}</td>
                                <td class="text-center pt-4 pb-4">${response.laporanbarang[d].barangmasuk}</td>
                                <td class="text-center pt-4 pb-4">${response.laporanbarang[d].tanggalmasukbarang}</td>
                                <td class="text-center pt-4 pb-4">00${response.laporanbarang[d].id}-00${response.laporanbarang[d].barangmasukid}</td>
                                <td class="text-center pt-4 pb-4">${response.laporanbarang[d].barangkeluar}</td>
                                <td class="text-center pt-4 pb-4">${response.laporanbarang[d].tanggalkeluarbarang}</td>
                                <td class="text-center pt-4 pb-4">${stockakhir}</td>
                                </tr>`;
                            }

                            tempidbarang = response.laporanbarang[d].id;
                        }
                    }
                    isilaporankeluarmasukbarang.classList.add("d-flex");
                    isilaporankeluarmasukbarang.classList.add(
                        "justify-content-center"
                    );
                    isilaporankeluarmasukbarang.style.display = "block";
                    // console.log(response.laporanbarang);
                }
            },
        });
    });
});
