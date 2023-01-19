const slidebar = document.querySelector(".side_bar");
const textmenu = document.querySelectorAll(".textmenu .subtextmenu");
const slidelogo = document.querySelector(".side_logo");
const d = new Date().toLocaleString();
const isikonten = document.querySelector(".isi_konten");
textmenu.forEach((test) => test.classList.add("hide"));
const overlay = document.querySelector(".overlay");
const notification = document.querySelector(".notif_success");

const detailnamabarang = document.querySelector(".detailnamabarang");
const rightkategoribarang = document.querySelector(".rightkategoribarang");
const IDBarangData = document.querySelector(".IDBarangData");
const HargaData = document.querySelector(".HargaData");
const JumlahData = document.querySelector(".JumlahData");
const TanggalKadaluarsaData = document.querySelector(".TanggalKadaluarsaData");

// const idbarangall = document.querySelectorAll(".id_barang");
// const tipenotifall = document.querySelectorAll(".tipe_notif");
const isidetailbaranghabis = document.querySelector(".isi_detail_baranghabis");
const bodydetailbarang = document.querySelector(".body_detail_1");
const bodydetailkadaluarsa = document.querySelector(".body_detail_2");
const notifikasisAll = document.querySelector(".AllNotif");

var code = undefined;
function outputchange(ouptut) {
    if (ouptut.value === "Barang Habis") {
        code = 1;
    } else if (ouptut.value === "Barang Kadaluarsa") {
        code = 2;
    } else if (ouptut.value === "Semua Barang") {
        code = 3;
    }
    
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": CSRF_TOKEN,
        },
    });

    fetch_data("", code);

    // function fetch_jenis(code){
        // $.ajax({
        //     type: 'GET',
        //     url: "/notifikasi/fetch_data?code="+code,
        //     success:function(AllBarang){
        //         // console.log(AllBarang);
        //         $('.AllNotif').html(AllBarang);
        //     }
        // })

        // $(document).on('click', '.pagination a', function(e){
        //     e.preventDefault();
        //     var page = $(this).attr('href').split('page=')[1];
        //     fetch_data(page, code);
            
    
        // });
    
        // function fetch_data(page, code){
        //     // console.log(page);
        //     $.ajax({
        //         type: 'GET',
        //         url: "/notifikasi/fetch_data?page="+page+"&code="+code,
        //         success:function(AllBarang){
        //             // console.log(AllBarang);
        //             $('.AllNotif').html(AllBarang);
        //         }
        //     })
        // }
    // }
    // fetch_jenis(code);
    // let title = $(".title_notif p");
    // let desc = $(".desc_notif p");
    // let tanggal = $(".tanggal_notif p");
    // $.ajax({
    //     type: "GET",
    //     url: `/pagination_blade/${code}`,
    //     // data: hasil,
    //     async: true,
    //     dataType: "json",
    //     success: function (res) {
    //         console.log(res);
    //         let result = res.Allbarang.data;
    //         for(let s = 0; s<result.length; s++){
    //             console.log(result[s]);
    //             title.html(result[s].id);
    //             if (res.stats === 200) {
                    
    //             } else if (res.stats === 300) {
                    
    //             }
    //         }
    //         }
    //     },
    // );
}

// $(document).ready(function () {
    
    $(document).on('click', '.pagination a', function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1] ;
        console.log(page);
        fetch_data(page, code);
    });
// });
    function fetch_data(page, code){
        // console.log(page);
        let newCode = code ? code : '3'
        $.ajax({
            type: 'GET',
            url: "/notifikasi/fetch_data?page="+page+"&code="+newCode,
            success:function(AllBarang){
                // console.log(AllBarang);
                $('.AllNotif').html(AllBarang);
            }
        })
    }


   
    // });
// });

function onClickDetailBarang(e){
    console.log(e);
    // const listNotif = document.querySelectorAll("#btn_rekom_notif");
    // console.log("kok ga berubah");
    // console.log(listNotif);
    // for (let i = 0; i < listNotif.length; i++) {
    //     // console.log(listNotif[i]);
    //     listNotif[i].addEventListener("click", function (e) {
    //         console.log("ke klik");
    //         e.preventDefault();
            let button_val = e.value;
            console.log(button_val);

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
            const idbarangall = document.querySelectorAll(".id_barang_"+button_val);
            const tipenotifall = document.querySelectorAll(".tipe_notif_"+button_val);

            console.log(idbarangall);
            var hasil = {
                id_barang: idbarangall[0].value,
                tipe_notif: tipenotifall[0].value,
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
                async: true,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if (response.stats === 200) {
                        $("#foto_barang").attr(
                            "src",
                            "\\public\\image\\" +
                                response.detailbarang.foto_barang
                        );
                        detailnamabarang.innerHTML = `<p style="margin-bottom: -1px;">${response.detailbarang.nama}</p>`;
                        rightkategoribarang.innerHTML = `<p>${response.detailbarang.jenis}</p>`;
                        IDBarangData.innerHTML = `<p>${response.detailbarang.id}</p>`;
                        HargaData.innerHTML = `<p>${response.detailbarang.harga}</p>`;
                        JumlahData.innerHTML = `<p>${response.detailbarang.jumlah}</p>`;
                        TanggalKadaluarsaData.innerHTML = `<p>${response.detailbarang.tanggal_kadaluarsa}</p>`;
                        bodydetailkadaluarsa.style.display = "block";
                        overlay.classList.remove("hidden");
                        notification.classList.remove("hidden");
                    } else if (response.stats === 300) {
                        console.log(response.detailbarang[0].foto_barang);
                        $("#foto_barang").attr(
                            "src",
                            "\\public\\image\\" +
                                response.detailbarang[0].foto_barang
                        );
                        isidetailbaranghabis.innerHTML = "";
                        // console.log(Array(response.detailbarang)[0]);
                        // let res = Array(response.detailbarang);
                        for (let a = 0; a < response.detailbarang.length; a++) {
                            detailnamabarang.innerHTML = `<p style="margin-bottom: -1px;">${response.detailbarang[0].nama}</p>`;
                            rightkategoribarang.innerHTML = `<p>${response.detailbarang[0].jenis}</p>`;
                            isidetailbaranghabis.innerHTML += `<tr class="">
                                <td class="pt-4 pb-4">${response.detailbarang[a].id}</td>
                                <td class="text-center pt-4 pb-4">${response.detailbarang[a].harga}</td>
                                <td class="text-center pt-4 pb-4">${response.detailbarang[a].jumlah}</td>
                                <td class="text-center pt-4 pb-4">${response.detailbarang[a].tanggal_kadaluarsa}</td>
                                </tr>`;
                            bodydetailbarang.style.display = "block";
                            overlay.classList.remove("hidden");
                            notification.classList.remove("hidden");
                        }
                    }
                },
            });
    //     });
    // }
}



// $(document).on('change','.kategori', function (e){



window.addEventListener("click", function (e) {
    const slidebar = document.querySelector(".side_bar");
    const textmenu = document.querySelectorAll(".textmenu .subtextmenu");
    const slidelogo = document.querySelector(".side_logo");
    const d = new Date().toLocaleString();
    const isikonten = document.querySelector(".isi_konten");
    textmenu.forEach((test) => test.classList.add("hide"));
    const overlay = document.querySelector(".overlay");
    const notification = document.querySelector(".notif_success");
    const listNotif = document.querySelectorAll(".button__rekomen");
    if (!overlay.classList[1]) {
        overlay.classList.add("hidden");
        notification.classList.add("hidden");
        bodydetailkadaluarsa.style.display = "none";
        bodydetailbarang.style.display = "none";
    }
});

$("body").on("mouseover", ".side_bar", function (e) {
    const slidebar = document.querySelector(".side_bar");
    const textmenu = document.querySelectorAll(".textmenu .subtextmenu");
    const slidelogo = document.querySelector(".side_logo");
    const d = new Date().toLocaleString();
    const isikonten = document.querySelector(".isi_konten");
    textmenu.forEach((test) => test.classList.add("hide"));
    const overlay = document.querySelector(".overlay");
    const notification = document.querySelector(".notif_success");
    const listNotif = document.querySelectorAll(".button__rekomen");
    // console.log(this.classList);
    this.style.width = "250px";
    textmenu.forEach((test) => test.classList.remove("hide"));
    slidelogo.classList.remove("hidden");
    isikonten.classList.add("tambah");
    // // console.log(isikonten.style.width);
    isikonten.style.width = "75%";
    document.querySelector(".menu_brnd").classList.remove("actives");
});

$("body").on("mouseout", ".side_bar", function (e) {
    const slidebar = document.querySelector(".side_bar");
    const textmenu = document.querySelectorAll(".textmenu .subtextmenu");
    const slidelogo = document.querySelector(".side_logo");
    const d = new Date().toLocaleString();
    const isikonten = document.querySelector(".isi_konten");
    textmenu.forEach((test) => test.classList.add("hide"));
    const overlay = document.querySelector(".overlay");
    const notification = document.querySelector(".notif_success");
    const listNotif = document.querySelectorAll(".button__rekomen");
    // console.log(this.classList);
    this.style.width = "80px";
    textmenu.forEach((test) => test.classList.add("hide"));
    slidelogo.classList.add("hidden");
    isikonten.classList.remove("tambah");
    isikonten.style.width = "90%";
    document.querySelector(".menu_brnd").classList.add("actives");
});
