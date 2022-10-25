const slidebar = document.querySelector(".side_bar");
const textmenu = document.querySelectorAll(".textmenu");
const slidelogo = document.querySelector(".side_logo");
const d = new Date().toLocaleString();
const isikonten = document.querySelector(".isi_konten");
textmenu.forEach((test) => test.classList.add("hide"));
const listallUser = document.querySelector(".listall");
var popup = document.querySelector("#myPopup");
var divElement = document.querySelector("#popUpBarangHabis");
var span = document.querySelector(".close");
var divElementKadaluarsa = document.querySelector("#popUpBarangKadaluarsa");
var divElementPengeluaran = document.querySelector("#popUpPengeluaran");

// textmenu.forEach((test) => (test.innerHTML);
// textmenu.forEach((test) => console.log(test.innerHTML.length));
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

divElement.addEventListener("click", function () {
    popup.style.display = "block";
});

divElementKadaluarsa.addEventListener("click", function () {
    popup.style.display = "block";
});

divElementPengeluaran.addEventListener("click", function () {
    popup.style.display = "block";
});

// When the user clicks on <span> (x), close the modal
span.addEventListener("click", function () {
    popup.style.display = "none";
});

// When the user clicks anywhere outside of the modal, close it
window.addEventListener("click", function (event) {
    if (event.target == popup) {
        popup.style.display = "none";
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
