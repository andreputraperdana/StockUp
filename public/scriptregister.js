const buttonUMKM = document.querySelector("#btnUmkm");
const buttonPemasok = document.querySelector("#btnPemasok");
const overlay = document.querySelector(".overlay");
const simpan = document.querySelector("#btn_simpan");
const notification_success = document.querySelector(".notif_success");
const notification_gagal = document.querySelector(".notif_gagal");
const text_error = document.querySelector(".texterror");
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
                if (response.stats === 200) {
                    overlay.classList.remove("hidden");
                    notification_success.classList.remove("hidden");
                } else if (response.stats === 300) {
                    const errormessage = response.error;
                    text_error.innerHTML = "";
                    // console.log(errormessage[nomortelp]);
                    // for (var hasil in errormessage) {
                    //     console.log(hasil + ":" + errormessage[hasil]);
                    // }

                    Object.keys(errormessage).forEach(
                        (test) =>
                            (text_error.innerHTML +=
                                "<span>*" +
                                errormessage[test] +
                                "</span>" +
                                "<br>")
                    );

                    overlay.classList.remove("hidden");
                    notification_gagal.classList.remove("hidden");
                }
            },
        });
    });
});

if (notification_gagal.classList.contains === "hidden") {
} else {
    window.addEventListener("click", function (e) {
        overlay.classList.add("hidden");
        notification_gagal.classList.add("hidden");
    });
}

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
