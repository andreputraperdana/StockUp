const slidebar = document.querySelector(".side_bar");
const textmenu = document.querySelectorAll(".textmenu");
const slidelogo = document.querySelector(".side_logo");
const d = new Date().toLocaleString();
const isikonten = document.querySelector(".isi_konten");
textmenu.forEach((test) => test.classList.add("hide"));
const butonexpand = document.querySelector(".btn__expand");
const butondelete = document.querySelector(".btn__delete1");
let expanded = document.querySelector(".expanded");
let ItemList = document.querySelector("#list_Allitem");
let content = document.querySelector(".content_tambahbarang");

slidebar.addEventListener("mouseover", function (e) {
    // console.log(this.classList);
    this.style.width = "250px";
    textmenu.forEach((test) => test.classList.remove("hide"));
    slidelogo.classList.remove("hidden");
    isikonten.classList.add("tambah");
    isikonten.style.width = "75%";
    document.querySelector(".menu_tko").classList.remove("actives");
});

slidebar.addEventListener("mouseout", function (e) {
    // console.log(this.classList);
    this.style.width = "80px";
    textmenu.forEach((test) => test.classList.add("hide"));
    slidelogo.classList.add("hidden");
    isikonten.classList.remove("tambah");
    isikonten.style.width = "90%";
    document.querySelector(".menu_tko").classList.add("actives");
});

if (document.querySelector(".tanda").innerHTML == "5") {
    document.querySelector(".menu_tko").style.backgroundColor = "#D7CAA0";
    document.querySelector("#tko").style.fontWeight = "700";
    document.querySelector(".menu_tko").classList.add("actives");
}
