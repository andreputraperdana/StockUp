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
const btnTerapkan = document.querySelector("#btn_terapkan");

btnTerapkan.addEventListener("click", function(e){
    const hargaRendah = document.querySelector("#hargaRendah").checked;
    const hargaTinggi = document.querySelector("#hargaTinggi").checked;
    const range1 = document.getElementsByName("minHarga")[0].value;
    const range2 = document.getElementsByName("maxHarga")[0].value;
    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('jenis');
    var jenis = null;
    // console.log(myParam);
    if(window.location.href.split('/').length > 4){
        jenis = window.location.href.split('/')[5].startsWith('?') ? myParam : window.location.href.split('/')[5].replaceAll("%20", " ") ;
    }
    console.log(jenis);
    window.location.href = `/toko/filterharga/?hargaRendah=${hargaRendah}&hargaTinggi=${hargaTinggi}&minHarga=${range1}&maxHarga=${range2}&jenis=${jenis}`;
    console.log(hargaRendah, hargaTinggi);
})

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

const urlParams = new URLSearchParams(window.location.search);
const myParam = urlParams.get('jenis');
var lokasi = null;
// console.log(myParam);
if(window.location.href.split('/').length > 4){
    lokasi = window.location.href.split('/')[5].startsWith('?') ? myParam : window.location.href.split('/')[5].replaceAll("%20", ".") ;
}
// const lokasi = window.location.href;
// if(lokasi){
    const kategori_a = document.querySelector(`a.${lokasi}`);
    const kategori_p = document.querySelector(`p.${lokasi}`);
    kategori_a.style.color = "#D7CAA0";
    kategori_p.style.color = "#D7CAA0";
    
    console.log(kategori_a, kategori_p);
// }