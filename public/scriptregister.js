const buttonUMKM = document.querySelector("#btnUmkm");
const buttonPemasok = document.querySelector("#btnPemasok");
const overlay = document.querySelector(".overlay");
const simpan = document.querySelector("#btn_simpan");
const notification = document.querySelector(".notif_success");
//     buttonUMKM.style.background = "yellow";
//     console.log(buttonUMKM.style.background);
// });

$(document).ready(function () {
    $(document).on("click", "#btn_simpan", function (e) {
        e.preventDefault();

        var hasil = {
            email: $(".email").val(),
            password: $(".password").val(),
            nama: $(".nama").val(),
            kategori: $(".kategori").val(),
            nomortelp: $(".nomortelp").val(),
            roleid: $("#btn_simpan").val(),
        };

        // console.log(hasil);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "POST",
            url: "/daftar",
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

buttonUMKM.addEventListener("click", function (e) {
    buttonUMKM.style.backgroundColor = "#d7caa0";
    buttonPemasok.style.backgroundColor = "#F4F4F4";
    simpan.value = "1";
});

buttonPemasok.addEventListener("click", function (e) {
    buttonPemasok.style.backgroundColor = "#d7caa0";
    buttonUMKM.style.backgroundColor = "#F4F4F4";
    simpan.value = "2";
});
// });

// simpan.addEventListener("click", function (e) {
//     overlay.classList.remove("hidden");
//     notification.classList.remove("hidden");
// });

// overlay.addEventListener("click", function (e) {
//     this.classList.add("hidden");
//     notification.classList.add("hidden");
// });
