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
    this.classList.remove("active");
    textmenu.forEach((test) => test.classList.remove("hide"));
    slidelogo.classList.remove("hidden");
    isikonten.classList.add("tambah");
    // console.log(isikonten.style.width);
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

butonexpand.addEventListener("click", function (e) {
    if (!expanded.style.rotate) {
        count = 0;
        expanded.style.rotate = "90deg";
        // console.log(ItemList.classList);
        ItemList.classList.remove("item_list_hidden");
        ItemList.classList.add("item_list");
        content.style.height = "1200px";
    } else if ((expanded.style.rotate = "90deg")) {
        count = 1;
        expanded.style.rotate = "";
        ItemList.classList.remove("item_list");
        ItemList.classList.add("item_list_hidden");
        content.style.height = "780px";
    }
});

if (document.querySelector(".tanda").innerHTML == "4") {
    document.querySelector(".menu_mnglola").style.backgroundColor = "#D7CAA0";
    document.querySelector("#mnglolaBrg").style.fontWeight = "700";
}

butondelete.addEventListener("click", function (e) {
    var p = e.parentNode.parentNode;
    console.log(p);
    p.parentNode.removeChild(p);
});

var req = new XMLHttpRequest();

req.open("GET", "/ajaxData", true);
req.send();

req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
        var obj = JSON.parse(req.responseText);
        console.log(obj);
    }
};
