const slidebar = document.querySelector(".side_bar");
const textmenu = document.querySelectorAll(".textmenu .subtextmenu");
const slidelogo = document.querySelector(".side_logo");
const d = new Date().toLocaleString();
const isikonten = document.querySelector(".isi_konten");
textmenu.forEach((test) => test.classList.add("hide"));
const overlay = document.querySelector(".overlay");
const notification = document.querySelector(".notif_success");
const listNotif = document.querySelectorAll(".button__rekomen");
console.log(listNotif.length);

const idbarangall = document.querySelectorAll(".id_barang");

for (let i = 0; i < listNotif.length; i++) {
    $(document).ready(function () {
        listNotif[i].addEventListener("click", function (e) {
            e.preventDefault();

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

            var hasil = {
                id_barang: idbarangall[i].value,
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
                    if (response.stats) {
                        overlay.classList.remove("hidden");
                        notification.classList.remove("hidden");
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
