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
const notifikasisAll = document.querySelector(".AllNotif");

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
                    console.log("test");
                    // if (response.stats === 200) {
                    //     detailnamabarang.innerHTML = `<p style="margin-bottom: -1px;">${response.detailbarang.nama}</p>`;
                    //     rightkategoribarang.innerHTML = `<p>${response.detailbarang.jenis}</p>`;
                    //     IDBarangData.innerHTML = `<p>${response.detailbarang.id}</p>`;
                    //     HargaData.innerHTML = `<p>${response.detailbarang.harga}</p>`;
                    //     JumlahData.innerHTML = `<p>${response.detailbarang.jumlah}</p>`;
                    //     TanggalKadaluarsaData.innerHTML = `<p>${response.detailbarang.tanggal_kadaluarsa}</p>`;
                    //     bodydetailkadaluarsa.style.display = "block";
                    //     overlay.classList.remove("hidden");
                    //     notification.classList.remove("hidden");
                    // } else if (response.stats === 300) {
                    //     isidetailbaranghabis.innerHTML = "";
                    //     for (let a = 0; a < response.detailbarang.length; a++) {
                    //         detailnamabarang.innerHTML = `<p style="margin-bottom: -1px;">${response.detailbarang[0].nama}</p>`;
                    //         rightkategoribarang.innerHTML = `<p>${response.detailbarang[0].jenis}</p>`;
                    //         isidetailbaranghabis.innerHTML += `<tr class="">
                    //         <td class="pt-4 pb-4">${response.detailbarang[a].id}</td>
                    //         <td class="text-center pt-4 pb-4">${response.detailbarang[a].harga}</td>
                    //         <td class="text-center pt-4 pb-4">${response.detailbarang[a].jumlah}</td>
                    //         <td class="text-center pt-4 pb-4">${response.detailbarang[a].tanggal_kadaluarsa}</td>
                    //         </tr>`;
                    //         bodydetailbarang.style.display = "block";
                    //         overlay.classList.remove("hidden");
                    //         notification.classList.remove("hidden");
                    //     }
                    // }
                },
            });
        });
    });
}

// window.addEventListener("click", function (e) {
//     if (!overlay.classList[1]) {
//         overlay.classList.add("hidden");
//         notification.classList.add("hidden");
//         bodydetailkadaluarsa.style.display = "none";
//         bodydetailbarang.style.display = "none";
//     }
// });
