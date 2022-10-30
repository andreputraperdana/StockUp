const slidebar = document.querySelector(".side_bar");
const textmenu = document.querySelectorAll(".textmenu");
const slidelogo = document.querySelector(".side_logo");
const d = new Date().toLocaleString();
const isikonten = document.querySelector(".isi_konten");
textmenu.forEach((test) => test.classList.add("hide"));
const listallUser = document.querySelector(".listall");
// var popupkadaluarsa = document.querySelector("#myPopup-Kadaluarsa");
// var popuphabis = document.querySelector("#myPopup");
// var popuppengeluaran = document.querySelector("#myPopup-PengeluaranPerHari");
var span = document.querySelectorAll(".close");

let popupbarang = document.querySelectorAll(
    ".popUpBarang .kotak_info1 .keterangan .inputtext"
);

// console.log(document.querySelector(`#myPopup-BarangHabis`));
let popupbutton = document.querySelectorAll(".popUpBarang");
for (let l = 0; l < popupbarang.length; l++) {
    popupbutton[l].addEventListener("click", function (e) {
        let hasil12 = popupbarang[l].innerHTML;
        document.querySelector(`#myPopup-${hasil12}`).style.display = "block";
        // console.log(document.querySelector(`#myPopup-${hasil12}`).style);
    });
}
slidebar.addEventListener("mouseover", function (e) {
    // console.log(this.classList);
    this.classList.remove("active");
    textmenu.forEach((test) => test.classList.remove("hide"));
    slidelogo.classList.remove("hidden");
    isikonten.classList.add("tambah");
    // console.log(isikonten.style.width);
    isikonten.style.width = "75%";
});

if (!document.getElementById("waktuskrg")) {
} else {
    document.getElementById("waktuskrg").innerHTML = d;
}

slidebar.addEventListener("mouseout", function (e) {
    // console.log(this.classList);
    this.classList.add("active");
    textmenu.forEach((test) => test.classList.add("hide"));
    slidelogo.classList.add("hidden");
    isikonten.classList.remove("tambah");
    isikonten.style.width = "90%";
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
        }
    }
});

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
