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
const overlay = document.querySelector(".overlay");
const notification = document.querySelector(".notif_success");
const judulTambahBarangExist = document.querySelector(
    ".judul_content_tambahbarangexist"
);

const inputTanggalKadaluarsa = document.querySelector(
    ".input_content_tanggalkadaluarsa"
);
const inputFoto = document.querySelector(".input_content_fotobarang");

slidebar.addEventListener("mouseover", function (e) {
    // console.log(this.classList);
    this.classList.remove("active");
    textmenu.forEach((test) => test.classList.remove("hide"));
    slidelogo.classList.remove("hidden");
    isikonten.classList.add("tambah");
    isikonten.style.width = "75%";
});

slidebar.addEventListener("mouseout", function (e) {
    // console.log(this.classList);
    this.classList.add("active");
    textmenu.forEach((test) => test.classList.add("hide"));
    slidelogo.classList.add("hidden");
    isikonten.classList.remove("tambah");
    isikonten.style.width = "90%";
});

buttonBarangBaru.addEventListener("click", function (e) {
    buttonBarangBaru.style.backgroundColor = "#D7CAA0";
    buttonBarangExist.style.backgroundColor = "#FFFFFF";
    inputTambahBarang.style.display = "block";
    inputJenisBarang.style.display = "block";
    inputJumlahBarang.style.display = "block";
    inputTanggalKadaluarsa.style.display = "block";
    inputFoto.style.display = "block";
    judulTambahBarang.style.display = "block";
    judulTambahBarangExist.style.display = "none";
});

buttonBarangExist.addEventListener("click", function (e) {
    buttonBarangExist.style.backgroundColor = "#D7CAA0";
    buttonBarangBaru.style.backgroundColor = "#FFFFFF";
    inputJenisBarang.style.display = "none";
    inputFoto.style.display = "none";
    judulTambahBarang.style.display = "none";
    judulTambahBarangExist.style.display = "block";
});

if (document.querySelector(".tanda").innerHTML == "2") {
    document.querySelector(".menu_tmbhbrg").style.backgroundColor = "#D7CAA0";
    document.querySelector("#tmbhBrg").style.fontWeight = "700";
}

$(document).ready(function () {
    $(document).on("click", "#btn_simpan", function (e) {
        e.preventDefault();

        var hasil = {
            namabarang: $(".namabarang").val(),
            jenisbarang: $(".kategori").val(),
            jumlahbarang: $(".jumlahbarang").val(),
            tanggalkadaluarsa: $(".tanggalkadaluarsa").val(),
            fotobarang: $(".fotobarang").val(),
        };

        // console.log(hasil);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "POST",
            url: "/tambahbarang",
            data: hasil,
            dataType: "json",
            success: function (response) {
                if (response.stats) {
                    overlay.classList.remove("hidden");
                    notification.classList.remove("hidden");
                }
            },
        });
    });
});
