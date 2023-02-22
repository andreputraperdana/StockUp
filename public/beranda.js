const slidebar = document.querySelector(".side_bar");
const textmenu = document.querySelectorAll(".textmenu");
const slidelogo = document.querySelector(".side_logo");
const isikonten = document.querySelector(".isi_konten");
textmenu.forEach((test) => test.classList.add("hide"));
var time = document.getElementById("waktuskrg");
// var popupkadaluarsa = document.querySelector("#myPopup-Kadaluarsa");
// var popuphabis = document.querySelector("#myPopup");
// var popuppengeluaran = document.querySelector("#myPopup-PengeluaranPerHari");
var span = document.querySelectorAll(".close");
const pesanMasuk = document.querySelector(".listall");
document.querySelector(".menu_brnd").classList.add("actives");

let popupbarang = document.querySelectorAll(
    ".popUpBarang .kotak_info1 .keterangan .inputtext"
);

// console.log(document.querySelector(`#myPopup-BarangHabis`));
let popupbutton = document.querySelectorAll(".popUpBarang");
let hasil12 = undefined;
let code = undefined;

// $(document).ready(function () {
//     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

//     $.ajaxSetup({
//         headers: {
//             "X-CSRF-TOKEN": CSRF_TOKEN,
//         },
//     });

//     fetch_data_barang("", code, hasil12);
// });

for (let l = 0; l < popupbarang.length; l++) {
    popupbutton[l].addEventListener("click", function (e) {
        hasil12 = popupbarang[l].innerHTML;
        code = 0;
        if (hasil12 === "BarangHabis") {
            code = 1;
        } else if (hasil12 === "BarangKadaluarsa") {
            code = 2;
        } else if (hasil12 === "Pengeluaran") {
            code = 3;
        }

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": CSRF_TOKEN,
            },
        });

        fetch_data_barang("", code, hasil12);
        document.querySelector(`#myPopup-${hasil12}`).style.display = "block";
        // console.log(document.querySelector(`#myPopup-${hasil12}`).style);
    });
}

$(document).on("click", ".pagination a", function (e) {
    e.preventDefault();
    var page = $(this).attr("href").split("page=")[1];
    // console.log(page);
    fetch_data_barang(page, code, hasil12);
});

function fetch_data_barang(page, code, tipebarang) {
    if (!code) {
        code = 4;
    }
    if (!tipebarang) {
        tipebarang = "AllBarang";
    }
    console.log(page);
    console.log(code);
    console.log(tipebarang);
    $.ajax({
        type: "GET",
        url: "/barang/fetch_data?page=" + page + "&code=" + code,
        success: function (TipeBarang) {
            // console.log(TipeBarang);
            $(`#content${tipebarang}`).html(TipeBarang);
        },
    });
}

// function fetch_data_barangkadaluarsa(page) {
//     console.log(page);
//     $.ajax({
//         type: "GET",
//         url: "/baranghabis/fetch_data?page=" + page,
//         success: function (BarangHabis) {
//             console.log(BarangHabis);
//             $("#contentBarangHabis").html(BarangHabis);
//         },
//     });
// }

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

function refreshTime() {
    const d = new Date().toLocaleString();
    var formattedString = d.replace(", ", " - ");
    time.innerHTML = formattedString;
}

setInterval(refreshTime, 1000);

slidebar.addEventListener("mouseout", function (e) {
    // console.log(this.classList);
    this.style.width = "80px";
    textmenu.forEach((test) => test.classList.add("hide"));
    slidelogo.classList.add("hidden");
    isikonten.classList.remove("tambah");
    isikonten.style.width = "90%";
    document.querySelector(".menu_brnd").classList.add("actives");
});

if (document.querySelector(".tanda").innerHTML == "1") {
    document.querySelector(".menu_brnd").style.backgroundColor = "#D7CAA0";
}

for (let m = 0; m < span.length; m++) {
    span[m].addEventListener("click", function (e) {
        let hasil12 = popupbarang[m].innerHTML;
        document.querySelector(`#myPopup-${hasil12}`).style.display = "none";
        // console.log(document.querySelector(`#myPopup-${hasil12}`).style);
    });
}
// // When the user clicks anywhere outside of the modal, close it
window.addEventListener("click", function (event) {
    for (let a = 0; a < span.length; a++) {
        let hasil13 = popupbarang[a].innerHTML;
        if (event.target == document.querySelector(`#myPopup-${hasil13}`)) {
            document.querySelector(`#myPopup-${hasil13}`).style.display =
                "none";
            code = undefined;
            hasil12 = undefined;
        }
    }
});

setInterval(() => {
    let req = new XMLHttpRequest();
    req.open("GET", "/allpesanmasuk", true);
    req.onload = () => {
        if (req.readyState === XMLHttpRequest.DONE) {
            let data = req.response;
            pesanMasuk.innerHTML = data;
        }
    };
    req.send();
}, 1000);

// $(document).on("click", ".pagination a", function (e) {
//     e.preventDefault();
//     var page = $(this).attr("href").split("page=")[1];
//     console.log(page);
// });

// setInterval(() => {
//     let xhr = new XMLHttpRequest();
//     xhr.open("GET", "/listalluser", true);
//     xhr.onload = () => {
//         if (xhr.readyState === XMLHttpRequest.DONE) {
//             let data = xhr.response;
//             listallUser.innerHTML = data;
//         }
//     };
//     xhr.send();
// }, 1000);
// console.log("test");

// console.log(document.querySelector(".keterangan").innerHTML);
// document.querySelector(".keterangan").innerHTML = "test";
