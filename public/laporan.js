const textmenu = document.querySelectorAll(".textmenu");
const slidelogo = document.querySelector(".side_logo");
const isikonten = document.querySelector(".isi_konten");
textmenu.forEach((test) => test.classList.add("hide"));
const slidebar = document.querySelector(".side_bar");
const buttonBarangBaru = document.querySelector("#btnBarangBaru");
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
    previewlaporan.addEventListener("click", function (e) {
        isilaporankadaluarsa.style.display = "none";
        isilaporanbaranghabis.style.display = "none";
        isilaporankeluarmasukbarang.style.display = "none";
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
                    isilaporankadaluarsa.style.display = "block";
                } else if (response.jenislaporan === "Barang akan habis") {
                    judullaporan.innerHTML = `<h4>${response.jenislaporan}</h4>`;
                    periodelaporan.innerHTML = `<p>Periode: ${response.periodeawal} / ${response.periodeakhir}</p>`;
                    for (let c = 0; c < response.laporanbarang.length; c++) {
                        contentlaporanbaranghabis.innerHTML += `<tr class="">
                        <td class="pt-4 pb-4">${response.laporanbarang[c].id}</td>
                        <td class="text-center pt-4 pb-4">${response.laporanbarang[c].nama}</td>
                        <td class="text-center pt-4 pb-4">${response.laporanbarang[c].jumlah}</td>
                        </tr>`;
                    }
                    isilaporanbaranghabis.style.display = "block";
                } else if (response.jenislaporan === "Persediaan stok barang") {
                    console.log("test3");
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
                            if (
                                response.laporanbarang[d].barangmasukid ===
                                response.laporanbarang[d - 1].barangmasukid
                            ) {
                                // stockakhir -=
                                //     response.laporanbarang[d].barangkeluar;
                                contentlaporankeluarmasukbarang.innerHTML += `<tr class="">
                                <td class="pt-4 pb-4"></td>
                                <td class="text-center pt-4 pb-4"></td>
                                <td class="text-center pt-4 pb-4">${stockakhir}</td>
                                <td class="text-center pt-4 pb-4">-</td>
                                <td class="text-center pt-4 pb-4">-</td>
                                <td class="text-center pt-4 pb-4">${
                                    response.laporanbarang[d].barangkeluar
                                }</td>
                                <td class="text-center pt-4 pb-4">${
                                    response.laporanbarang[d]
                                        .tanggalkeluarbarang
                                }</td>
                                <td class="text-center pt-4 pb-4">${(stockakhir -=
                                    response.laporanbarang[d]
                                        .barangkeluar)}</td>
                                </tr>`;
                            } else if (
                                response.laporanbarang[d].id !==
                                    response.laporanbarang[d - 1]
                                        .barangmasukid &&
                                response.laporanbarang[d].barangmasukid !== null
                            ) {
                                let barangkeluarnull;
                                let tanggalbarangkeluar;
                                // stockakhir +=
                                //     response.laporanbarang[d].barangmasuk -
                                //     response.laporanbarang[d].barangkeluar;
                                if (
                                    response.laporanbarang[d].barangkeluar ===
                                    null
                                ) {
                                    barangkeluarnull = "-";
                                } else {
                                    barangkeluarnull =
                                        response.laporanbarang[d].barangkeluar;
                                }

                                if (
                                    response.laporanbarang[d]
                                        .tanggalkeluarbarang === null
                                ) {
                                    tanggalbarangkeluar = "-";
                                } else {
                                    tanggalbarangkeluar =
                                        response.laporanbarang[d]
                                            .tanggalkeluarbarang;
                                }

                                contentlaporankeluarmasukbarang.innerHTML += `<tr class="">
                                <td class="pt-4 pb-4"></td>
                                <td class="text-center pt-4 pb-4"></td>
                                <td class="text-center pt-4 pb-4">${stockakhir}</td>
                                <td class="text-center pt-4 pb-4">${
                                    response.laporanbarang[d].barangmasuk
                                }</td>
                                <td class="text-center pt-4 pb-4">${
                                    response.laporanbarang[d].tanggalmasukbarang
                                }</td>
                                <td class="text-center pt-4 pb-4">${barangkeluarnull}</td>
                                <td class="text-center pt-4 pb-4">${tanggalbarangkeluar}</td>
                                <td class="text-center pt-4 pb-4">${(stockakhir +=
                                    response.laporanbarang[d].barangmasuk -
                                    response.laporanbarang[d]
                                        .barangkeluar)}</td>
                                </tr>`;
                            } else if (
                                response.laporanbarang[d].barangmasuk === null
                            ) {
                                // stockakhir -=
                                //     response.laporanbarang[d].barangkeluar;
                                contentlaporankeluarmasukbarang.innerHTML += `<tr class="">
                                <td class="pt-4 pb-4"></td>
                                <td class="text-center pt-4 pb-4"></td>
                                <td class="text-center pt-4 pb-4">${stockakhir}</td>
                                <td class="text-center pt-4 pb-4">-</td>
                                <td class="text-center pt-4 pb-4">-</td>
                                <td class="text-center pt-4 pb-4">${
                                    response.laporanbarang[d].barangkeluar
                                }</td>
                                <td class="text-center pt-4 pb-4">${
                                    response.laporanbarang[d]
                                        .tanggalkeluarbarang
                                }</td>
                                <td class="text-center pt-4 pb-4">${(stockakhir -=
                                    response.laporanbarang[d]
                                        .barangkeluar)}</td>
                                </tr>`;
                            }
                            tempidbarang = response.laporanbarang[d].id;
                        } else if (
                            response.laporanbarang[d].id != tempidbarang
                        ) {
                            stockakhir = 0;
                            stockakhir =
                                response.laporanbarang[d].Stockfinalawal +
                                response.laporanbarang[d].barangmasuk -
                                response.laporanbarang[d].barangkeluar;
                            contentlaporankeluarmasukbarang.innerHTML += `<tr class="">
                            <td class="pt-4 pb-4">${response.laporanbarang[d].id}</td>
                            <td class="text-center pt-4 pb-4">${response.laporanbarang[d].nama}</td>
                            <td class="text-center pt-4 pb-4">${response.laporanbarang[d].Stockfinalawal}</td>
                            <td class="text-center pt-4 pb-4">${response.laporanbarang[d].barangmasuk}</td>
                            <td class="text-center pt-4 pb-4">${response.laporanbarang[d].tanggalmasukbarang}</td>
                            <td class="text-center pt-4 pb-4">${response.laporanbarang[d].barangkeluar}</td>
                            <td class="text-center pt-4 pb-4">${response.laporanbarang[d].tanggalkeluarbarang}</td>
                            <td class="text-center pt-4 pb-4">${stockakhir}</td>
                            </tr>`;

                            tempidbarang = response.laporanbarang[d].id;
                        }
                    }
                    isilaporankeluarmasukbarang.style.display = "block";
                    // console.log(response.laporanbarang);
                }
            },
        });
    });
});
