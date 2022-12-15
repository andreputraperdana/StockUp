const slidebar = document.querySelector(".side_bar");
const textmenu = document.querySelectorAll(".textmenu .subtextmenu");
const slidelogo = document.querySelector(".side_logo");
const d = new Date().toLocaleString();
const isikonten = document.querySelector(".isi_konten");
textmenu.forEach((test) => test.classList.add("hide"));
const overlay = document.querySelector(".overlay");
const notification = document.querySelector(".notif_success");
const listNotif = document.querySelectorAll(".button__rekomen");

const detailnamabarang = document.querySelector(".detailnamabarang");
const rightkategoribarang = document.querySelector(".rightkategoribarang");
const IDBarangData = document.querySelector(".IDBarangData");
const HargaData = document.querySelector(".HargaData");
const JumlahData = document.querySelector(".JumlahData");
const TanggalKadaluarsaData = document.querySelector(".TanggalKadaluarsaData");

const idbarangall = document.querySelectorAll(".id_barang");
const tipenotifall = document.querySelectorAll(".tipe_notif");
const isidetailbaranghabis = document.querySelector(".isi_detail_baranghabis");
const bodydetailbarang = document.querySelector(".body_detail_1");
const bodydetailkadaluarsa = document.querySelector(".body_detail_2");
for (let i = 0; i < listNotif.length; i++) {
    $(document).ready(function () {
        listNotif[i].addEventListener("click", function (e) {
            e.preventDefault();

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

            var hasil = {
                id_barang: idbarangall[i].value,
                tipe_notif: tipenotifall[i].value,
            };

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": CSRF_TOKEN,
                },
            });

            $.ajax({
                type: "POST",
                url: "/detailnotif",
                data: hasil,
                dataType: "json",
                success: function (response) {
                    if (response.stats === 200) {
                        detailnamabarang.innerHTML = `<p style="margin-bottom: -1px;">${response.detailbarang.nama}</p>`;
                        rightkategoribarang.innerHTML = `<p>${response.detailbarang.jenis}</p>`;
                        IDBarangData.innerHTML = `<p>${response.detailbarang.id}</p>`;
                        HargaData.innerHTML = `<p>${response.detailbarang.harga}</p>`;
                        JumlahData.innerHTML = `<p>${response.detailbarang.jumlah}</p>`;
                        TanggalKadaluarsaData.innerHTML = `<p>${response.detailbarang.tanggal_kadaluarsa}</p>`;
                        bodydetailkadaluarsa.style.display = "block";
                        overlay.classList.remove("hidden");
                        notification.classList.remove("hidden");
                    } else if (response.stats === 300) {
                        isidetailbaranghabis.innerHTML = "";
                        for (let a = 0; a < response.detailbarang.length; a++) {
                            detailnamabarang.innerHTML = `<p style="margin-bottom: -1px;">${response.detailbarang[0].nama}</p>`;
                            rightkategoribarang.innerHTML = `<p>${response.detailbarang[0].jenis}</p>`;
                            isidetailbaranghabis.innerHTML += `<tr class="">
                            <td class="pt-4 pb-4">${response.detailbarang[a].id}</td>
                            <td class="text-center pt-4 pb-4">${response.detailbarang[a].harga}</td>
                            <td class="text-center pt-4 pb-4">${response.detailbarang[a].jumlah}</td>
                            <td class="text-center pt-4 pb-4">${response.detailbarang[a].tanggal_kadaluarsa}</td>
                            </tr>`;
                            bodydetailbarang.style.display = "block";
                            overlay.classList.remove("hidden");
                            notification.classList.remove("hidden");
                        }
                    }
                },
            });
        });
    });
}

window.addEventListener("click", function (e) {
    if (!overlay.classList[1]) {
        overlay.classList.add("hidden");
        notification.classList.add("hidden");
        bodydetailkadaluarsa.style.display = "none";
        bodydetailbarang.style.display = "none";
    }
});

slidebar.addEventListener("mouseover", function (e) {
    // console.log(this.classList);
    this.style.width = "250px";
    textmenu.forEach((test) => test.classList.remove("hide"));
    slidelogo.classList.remove("hidden");
    isikonten.classList.add("tambah");
    // // console.log(isikonten.style.width);
    isikonten.style.width = "75%";
    document.querySelector(".menu_brnd").classList.remove("actives");
});

slidebar.addEventListener("mouseout", function (e) {
    // console.log(this.classList);
    this.style.width = "80px";
    textmenu.forEach((test) => test.classList.add("hide"));
    slidelogo.classList.add("hidden");
    isikonten.classList.remove("tambah");
    isikonten.style.width = "90%";
    document.querySelector(".menu_brnd").classList.add("actives");
});
