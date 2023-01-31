const slidebar = document.querySelector(".side_bar");
const textmenu = document.querySelectorAll(".textmenu");
const slidelogo = document.querySelector(".side_logo");
const isikonten = document.querySelector(".isi_konten");
const buttonminus = document.querySelector("#btnminus");
const buttonplus = document.querySelector("#btnplus");
const overlay = document.querySelector(".overlay");
const notification = document.querySelector(".notif_success");
const imagebarang = document.querySelector(".imagedelete");
let jumlahbarang = document.querySelector(".jumlahbarang");

textmenu.forEach((test) => test.classList.add("hide"));

buttonplus.addEventListener("click", function (e) {
    jumlahbarang.value++;
});
buttonminus.addEventListener("click", function (e) {
    if (jumlahbarang.value == 0) {
        jumlahbarang.value = 0;
    } else {
        jumlahbarang.value--;
    }
});

$(document).ready(function () {
    $(document).on("submit", "#updatebarang", function (e) {
        e.preventDefault();
        let formData = new FormData($("#updatebarang")[0]);
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
            url: "/editbarang/update",
            data: formData,
            // dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.stats === 200) {
                    swal({
                        title: imagebarang.innerHTML,
                        html: ` <div class="notif_text text-center">
                        <p>BERHASIL</p>
                        <div class="sub_notif_text">
                            <p>Data berhasil diubah</p>
                        </div>
                    </div>`,
                        confirmButtonText: "Ya",
                        background: "#f4f4f4",
                    }).then((result) => {
                        location.replace("/mengelolabarang");
                    });
                } else if (response.stats === 300 || response.stats === 400) {
                    const errormessage = response.error;
                    const objectmessages = Object.keys(errormessage);

                    if (!errormessage.hasOwnProperty("jumlahbarang")) {
                        document.querySelector(
                            ".errormessage-jumlahbarang"
                        ).innerHTML = "";
                        document.querySelector(
                            ".errormessage-jumlahbarang"
                        ).style.display = "none";
                    }
                    if (!errormessage.hasOwnProperty("hargabarang")) {
                        document.querySelector(
                            ".errormessage-hargabarang"
                        ).innerHTML = "";
                        document.querySelector(
                            ".errormessage-hargabarang"
                        ).style.display = "none";
                    }

                    if (response.stats === 300) {
                        document.querySelector(
                            ".errormessage-fotobarang"
                        ).innerHTML = "";
                        document.querySelector(
                            ".errormessage-fotobarang"
                        ).style.display = "none";

                        for (let e = 0; e < objectmessages.length; e++) {
                            document.querySelector(
                                `.errormessage-${objectmessages[e]}`
                            ).innerHTML = `<p>${
                                errormessage[objectmessages[e]]
                            }</p>`;
                            document.querySelector(
                                `.errormessage-${objectmessages[e]}`
                            ).style.display = "block";
                        }
                    } else if (response.stats === 400) {
                        for (let e = 0; e < objectmessages.length; e++) {
                            document.querySelector(
                                `.errormessage-${objectmessages[e]}`
                            ).innerHTML = `<p>${
                                errormessage[objectmessages[e]]
                            }</p>`;
                            document.querySelector(
                                `.errormessage-${objectmessages[e]}`
                            ).style.display = "block";
                        }
                        document.querySelector(
                            ".errormessage-fotobarang"
                        ).innerHTML = response.fotobarang;
                        document.querySelector(
                            ".errormessage-fotobarang"
                        ).style.display = "block";
                    }
                }
            },
        });
    });
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
