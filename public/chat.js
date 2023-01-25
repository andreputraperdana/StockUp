const slidebar = document.querySelector(".side_bar");
const textmenu = document.querySelectorAll(".textmenu");
const slidelogo = document.querySelector(".side_logo");
const isikonten = document.querySelector(".isi_konten");
let umkmid = document.querySelector(".UMKMID").innerHTML;
let pemasokid = document.querySelector(".PemasokID").innerHTML;
textmenu.forEach((test) => test.classList.add("hide"));
const contentchat = document.querySelector(".content-chat");
const contentmessage = document.getElementById("message");
const pesanMasuk = document.querySelector(".pesanAllMasuk");
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

$(document).ready(function () {
    $(document).on("submit", "#submitmessage", function (e) {
        e.preventDefault();

        let hasil = new FormData($("#submitmessage")[0]);

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        console.log(hasil);

        $.ajax({
            type: "POST",
            url: "/sendmessage",
            data: hasil,
            // dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {
                response.stats;
                contentmessage.value = "";
            },
        });
    });
});

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open(
        "GET",
        "/allmessages?umkm=" + umkmid + "&pemasok=" + pemasokid,
        true
    );
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            let data = xhr.response;
            contentchat.innerHTML = data;
        }
    };
    xhr.send();
}, 1000);

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
