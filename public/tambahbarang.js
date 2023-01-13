const textmenu = document.querySelectorAll(".textmenu");
const slidelogo = document.querySelector(".side_logo");
const isikonten = document.querySelector(".isi_konten");
textmenu.forEach((test) => test.classList.add("hide"));
const slidebar = document.querySelector(".side_bar");
const buttonBarangBaru = document.querySelector("#btnBarangBaru");
const buttonBarangExist = document.querySelector("#btnBarangExisting");
const inputTambahBarang = document.querySelector(".input_content_tambahbarang");
const inputJenisBarang = document.querySelector(".input_content_jenisbarang");
const inputJumlahBarang = document.querySelector(".input_content_jumlahbarang");
const judulTambahBarang = document.querySelector(".judul_content_tambahbarang");
const overlay = document.querySelector(".overlay");
const notification = document.querySelector(".notif_success");
const judulTambahBarangExist = document.querySelector(
    ".judul_content_tambahbarangexist"
);
const BarangBaruContent = document.querySelector(".barangBaru");
const BarangExistingContent = document.querySelector(".barangExisting");

const inputTanggalKadaluarsa = document.querySelector(
    ".input_content_tanggalkadaluarsa"
);
const inputFoto = document.querySelector(".input_content_fotobarang");
const inputbarangbaru = document.querySelector(".input_namabarang");
const inputbarangeksisting = document.querySelector(
    ".input_namabarangeksisting"
);

slidebar.addEventListener("mouseover", function (e) {
    // console.log(this.classList);
    this.style.width = "250px";
    textmenu.forEach((test) => test.classList.remove("hide"));
    slidelogo.classList.remove("hidden");
    isikonten.classList.add("tambah");
    isikonten.style.width = "75%";
    document.querySelector(".menu_tmbhbrg").classList.remove("actives");
});

slidebar.addEventListener("mouseout", function (e) {
    // console.log(this.classList);
    this.style.width = "80px";
    textmenu.forEach((test) => test.classList.add("hide"));
    slidelogo.classList.add("hidden");
    isikonten.classList.remove("tambah");
    isikonten.style.width = "90%";
    document.querySelector(".menu_tmbhbrg").classList.add("actives");
});

if (buttonBarangBaru) {
    buttonBarangBaru.addEventListener("click", function (e) {
        buttonBarangBaru.style.backgroundColor = "#D7CAA0";
        buttonBarangExist.style.backgroundColor = "#FFFFFF";
        BarangBaruContent.style.display = "block";
        BarangExistingContent.style.display = "none";
    });
}

if (buttonBarangExist) {
    buttonBarangExist.addEventListener("click", function (e) {
        buttonBarangExist.style.backgroundColor = "#D7CAA0";
        buttonBarangBaru.style.backgroundColor = "#FFFFFF";
        BarangBaruContent.style.display = "none";
        BarangExistingContent.style.display = "block";
    });
}

if (document.querySelector(".tanda").innerHTML == "2") {
    document.querySelector(".menu_tmbhbrg").style.backgroundColor = "#D7CAA0";
    document.querySelector("#tmbhBrg").style.fontWeight = "700";
    document.querySelector(".menu_tmbhbrg").classList.add("actives");
}

$(document).ready(function () {
    $(document).on("submit", "#tambahbarangexisting", function (e) {
        e.preventDefault();
        let formData = new FormData($("#tambahbarangexisting")[0]);
        // overlay.classList.remove("hidden");
        // notification.classList.remove("hidden");
        // console.log(hasil);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        console.log(formData);
        $.ajax({
            type: "POST",
            url: "/tambahbarang",
            data: formData,
            // dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {
                // console.log(response.stats);
                if (response.stats === 200) {
                    overlay.classList.remove("hidden");
                    notification.classList.remove("hidden");
                } else if (response.stats === 100) {
                    const errormessage = response.error;
                    console.log(errormessage);
                    const objectmessages = Object.keys(errormessage);
                    if (!errormessage.hasOwnProperty("namabarangeksisting")) {
                        document.querySelector(
                            ".errormessage-namabarangeksisting"
                        ).innerHTML = "";
                        document.querySelector(
                            ".errormessage-namabarangeksisting"
                        ).style.display = "none";
                        // document.querySelector(".error-namabarang").style.display =
                        //     "none";
                    }
                    if (!errormessage.hasOwnProperty("jumlahbarang")) {
                        document.querySelector(
                            ".errormessage-jumlahbarang-1"
                        ).innerHTML = "";
                        document.querySelector(
                            ".errormessage-jumlahbarang-1"
                        ).style.display = "none";
                    }
                    if (!errormessage.hasOwnProperty("hargabarang")) {
                        document.querySelector(
                            ".errormessage-hargabarang-1"
                        ).innerHTML = "";
                        document.querySelector(
                            ".errormessage-hargabarang-1"
                        ).style.display = "none";
                    }
                    for (let e = 0; e < objectmessages.length; e++) {
                        document.querySelector(
                            `.errormessage-${objectmessages[e]}-1`
                        ).innerHTML = `<p>${
                            errormessage[objectmessages[e]]
                        }</p>`;
                        document.querySelector(
                            `.errormessage-${objectmessages[e]}-1`
                        ).style.display = "block";
                    }
                }
            },
        });
    });
});

$(document).ready(function () {
    $(document).on("submit", "#tambahbarang", function (e) {
        e.preventDefault();
        let formData = new FormData($("#tambahbarang")[0]);
        // overlay.classList.remove("hidden");
        // notification.classList.remove("hidden");
        // console.log(hasil);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        console.log(formData);
        $.ajax({
            type: "POST",
            url: "/tambahbarang",
            data: formData,
            // dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
                // // console.log(response.stats);
                if (response.stats === 200) {
                    overlay.classList.remove("hidden");
                    notification.classList.remove("hidden");
                } else if (response.stats === 300 || response.stats === 400) {
                    const errormessage = response.error;
                    console.log(errormessage);
                    // text_error.innerHTML = "";
                    // console.log(errormessage[nomortelp]);
                    // for (var hasil in errormessage) {
                    //     console.log(hasil + ":" + errormessage[hasil]);
                    // }
                    const objectmessage = Object.keys(errormessage);

                    if (!errormessage.hasOwnProperty("namabarang")) {
                        document.querySelector(
                            ".errormessage-namabarang"
                        ).innerHTML = "";
                        document.querySelector(
                            ".errormessage-namabarang"
                        ).style.display = "none";
                        // document.querySelector(".error-namabarang").style.display =
                        //     "none";
                    }
                    if (!errormessage.hasOwnProperty("jenisbarang")) {
                        document.querySelector(
                            ".errormessage-jenisbarang"
                        ).innerHTML = "";
                        document.querySelector(
                            ".errormessage-jenisbarang"
                        ).style.display = "none";
                        // document.querySelector(
                        //     ".error-jenisbarang"
                        // ).style.display = "none";
                    }
                    if (document.querySelector("#penanda").value == 1) {
                        if (!errormessage.hasOwnProperty("jumlahbarang")) {
                            document.querySelector(
                                ".errormessage-jumlahbarang"
                            ).innerHTML = "";
                            document.querySelector(
                                ".errormessage-jumlahbarang"
                            ).style.display = "none";
                            // document.querySelector(".error-jumlahbarang").style.display =
                            //     "none";
                        }
                    }
                    if (!errormessage.hasOwnProperty("hargabarang")) {
                        document.querySelector(
                            ".errormessage-hargabarang"
                        ).innerHTML = "";
                        document.querySelector(
                            ".errormessage-hargabarang"
                        ).style.display = "none";
                        // document.querySelector(
                        //     ".error-hargabarang"
                        // ).style.display = "none";
                    }

                    if (response.stats === 300) {
                        document.querySelector(
                            ".errormessage-fotobarang"
                        ).innerHTML = "";
                        document.querySelector(
                            `.errormessage-fotobarang`
                        ).style.display = "none";
                        // document.querySelector(
                        //     `.error-fotobarang`
                        // ).style.display = "none";

                        for (let e = 0; e < objectmessage.length; e++) {
                            console.log(objectmessage[e]);
                            document.querySelector(
                                `.errormessage-${objectmessage[e]}`
                            ).innerHTML = `<p>${
                                errormessage[objectmessage[e]]
                            }</p>`;
                            document.querySelector(
                                `.errormessage-${objectmessage[e]}`
                            ).style.display = "block";
                            // document.querySelector(
                            //     `.error-${objectmessage[e]}`
                            // ).style.display = "block";
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
                            // document.querySelector(
                            //     `.error-${objectmessage[k]}`
                            // ).style.display = "block";
                        }
                        document.querySelector(
                            ".errormessage-fotobarang"
                        ).innerHTML = `<p>${response.fotobarang}</p>`;
                        document.querySelector(
                            `.errormessage-fotobarang`
                        ).style.display = "block";
                        // document.querySelector(
                        //     `.error-fotoprofil`
                        // ).style.display = "block";
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
