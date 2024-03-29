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
// console.log(errormessagenotif[0].innerHTML);

let count = 0;
$(document).ready(function () {
    $(document).on("submit", "#submitform", function (e) {
        e.preventDefault();

        let hasil = new FormData($("#submitform")[0]);
        hasil.append("roleid", $("#btn_simpan").val());
        // var hasil = {
        //     email: $(".email").val(),
        //     password: $(".password").val(),
        //     nama: $(".nama").val(),
        //     kategori: $(".kategori").val(),
        //     nomortelp: $(".nomortelp").val(),
        //     roleid: $("#btn_simpan").val(),
        //     fotoprofil: $(".fotoprofil").val(),
        // };

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
            // dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
                if (response.stats === 200) {
                    overlay.classList.remove("hidden");
                    notification_success.classList.remove("hidden");
                } else if (response.stats === 300 || response.stats === 400) {
                    const errormessage = response.error;
                    // text_error.innerHTML = "";
                    // console.log(errormessage[nomortelp]);
                    // for (var hasil in errormessage) {
                    //     console.log(hasil + ":" + errormessage[hasil]);
                    // }
                    const objectmessage = Object.keys(errormessage);

                    if (!errormessage.hasOwnProperty("email")) {
                        document.querySelector(
                            ".errormessage-email"
                        ).innerHTML = "";
                        document.querySelector(
                            ".errormessage-email"
                        ).style.display = "none";
                        document.querySelector(".error-email").style.display =
                            "none";
                    }
                    if (!errormessage.hasOwnProperty("password")) {
                        document.querySelector(
                            ".errormessage-password"
                        ).innerHTML = "";
                        document.querySelector(
                            ".errormessage-password"
                        ).style.display = "none";
                        document.querySelector(
                            ".error-password"
                        ).style.display = "none";
                    }
                    if (!errormessage.hasOwnProperty("nama")) {
                        document.querySelector(".errormessage-nama").innerHTML =
                            "";
                        document.querySelector(
                            ".errormessage-nama"
                        ).style.display = "none";
                        document.querySelector(".error-nama").style.display =
                            "none";
                    }
                    if (!errormessage.hasOwnProperty("kategori")) {
                        document.querySelector(
                            ".errormessage-kategori"
                        ).innerHTML = "";
                        document.querySelector(
                            ".errormessage-kategori"
                        ).style.display = "none";
                        document.querySelector(
                            ".error-kategori"
                        ).style.display = "none";
                    }
                    if (!errormessage.hasOwnProperty("nomortelepon")) {
                        document.querySelector(
                            ".errormessage-nomortelepon"
                        ).innerHTML = "";
                        document.querySelector(
                            ".errormessage-nomortelepon"
                        ).style.display = "none";
                        document.querySelector(
                            ".error-nomortelepon"
                        ).style.display = "none";
                    }

                    if (response.stats === 300) {
                        document.querySelector(
                            ".errormessage-fotoprofil"
                        ).innerHTML = "";
                        document.querySelector(
                            `.errormessage-fotoprofil`
                        ).style.display = "none";
                        document.querySelector(
                            `.error-fotoprofil`
                        ).style.display = "none";

                        for (let e = 0; e < objectmessage.length; e++) {
                            document.querySelector(
                                `.errormessage-${objectmessage[e]}`
                            ).innerHTML = `<p>${
                                errormessage[objectmessage[e]]
                            }</p>`;
                            document.querySelector(
                                `.errormessage-${objectmessage[e]}`
                            ).style.display = "block";
                            document.querySelector(
                                `.error-${objectmessage[e]}`
                            ).style.display = "block";
                        }
                    } else if (response.stats === 400) {
                        for (let k = 0; k < objectmessage.length - 1; k++) {
                            console.log(objectmessage[k]);
                            // console.log(errormessage[objectmessage[k]]);
                            // console.log(
                            //     document.querySelector(
                            //         `.errormessage-${objectmessage[k]}`
                            //     )
                            // );
                            document.querySelector(
                                `.errormessage-${objectmessage[k]}`
                            ).innerHTML = `<p>${
                                errormessage[objectmessage[k]]
                            }</p>`;
                            document.querySelector(
                                `.errormessage-${objectmessage[k]}`
                            ).style.display = "block";
                            document.querySelector(
                                `.error-${objectmessage[k]}`
                            ).style.display = "block";
                        }
                        document.querySelector(
                            ".errormessage-fotoprofil"
                        ).innerHTML = `<p>${response.fotoprofil}</p>`;
                        document.querySelector(
                            `.errormessage-fotoprofil`
                        ).style.display = "block";
                        document.querySelector(
                            `.error-fotoprofil`
                        ).style.display = "block";
                    }
                    // Object.keys(errormessage).forEach(
                    //     (test) =>
                    //     // (text_error.innerHTML +=
                    //     //     "<span>*" +
                    //     //     errormessage[test] +
                    //     //     "</span>" +
                    //     //     "<br>")
                    // );
                }
            },
        });
    });
});

// if (notification_gagal.classList.contains === "hidden") {
// } else {
//     window.addEventListener("click", function (e) {
//         overlay.classList.add("hidden");
//         notification_gagal.classList.add("hidden");
//     });
// }

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
