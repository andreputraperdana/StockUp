const slidebar = document.querySelector(".side_bar");
const textmenu = document.querySelectorAll(".textmenu");
const slidelogo = document.querySelector(".side_logo");
const d = new Date().toLocaleString();
const isikonten = document.querySelector(".isi_konten");
textmenu.forEach((test) => test.classList.add("hide"));
const butondelete = document.querySelector(".btn__delete1");
let ItemList = document.querySelector("#list_Allitem");
let content = document.querySelector(".content_tambahbarang");
var butonexpand = document.querySelector(".btn__expand");
console.log(butonexpand);
var id = $("#id_header").val();
var size = document.getElementById("size").value;

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

    

if (document.querySelector(".tanda").innerHTML == "4") {
    document.querySelector(".menu_mnglola").style.backgroundColor = "#D7CAA0";
    document.querySelector("#mnglolaBrg").style.fontWeight = "700";
}

butondelete.addEventListener("click", function (e) {
    var p = e.parentNode.parentNode;
    console.log(p);
    p.parentNode.removeChild(p);
});


function myFunction(event) {
    var btnexpand = event;
    var btnexpand2 = document.querySelector("."+btnexpand);
    btnexpand2.addEventListener("click", function (e) {
        var expanded = btnexpand2.getElementsByTagName('img');
        var a = btnexpand2.value;
        console.log(expanded[0]);
        if (!expanded[0].style.rotate) {
                count = 0;
                expanded[0].style.rotate = "90deg";
                // console.log(ItemList.classList);
                ItemList.classList.remove("item_list_hidden");
                ItemList.classList.add("item_list");
                content.style.height = "1200px";
            } else if ((expanded[0].style.rotate = "90deg")) {
                count = 1;
                expanded[0].style.rotate = "";
                ItemList.classList.remove("item_list");
                ItemList.classList.add("item_list_hidden");
                content.style.height = "780px";
            }
    })

}

var req = new XMLHttpRequest();

req.open("GET", "/ajaxData", true);
req.send();

req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
        var obj = JSON.parse(req.responseText);
        var id_header = "";
        var butonexpand = "";
        for(var i = 0; i<size; i++){
            console.log(obj.BarangMasuk[i]);
            butonexpand = document.querySelector(".btn__expand"+obj.BarangMasuk[i].id);
            console.log(butonexpand)
            id_header = document.querySelector("#id_header"+obj.BarangMasuk[i].id);
            console.log(id_header);
            var valButNew = valBut;
            console.log(valButNew);
            // valBut[i].addEventListener("click", function (e) {
            //     var hasil = {
            //         id: id_header,
            //         namabarang: $(".nama_barang").val(),
            //         kuantitas: $(".total_header").val(),
            //     };
        
            //     console.log(hasil);
        
            //     if (!expanded.style.rotate) {
            //         count = 0;
            //         expanded.style.rotate = "90deg";
            //         // console.log(ItemList.classList);
            //         ItemList.classList.remove("item_list_hidden");
            //         ItemList.classList.add("item_list");
            //         content.style.height = "1200px";
            //     } else if ((expanded.style.rotate = "90deg")) {
            //         count = 1;
            //         expanded.style.rotate = "";
            //         ItemList.classList.remove("item_list");
            //         ItemList.classList.add("item_list_hidden");
            //         content.style.height = "780px";
            //     }
            // });
        }
    }
};
