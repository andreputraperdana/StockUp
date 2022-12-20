const akun = document.querySelector(".pengaturan_akun_kiri");
const profile = document.querySelector(".pengaturan_profil_kiri");
const sosialmedia = document.querySelector(".pengaturan_platform_kiri")
const daftarakun = document.querySelector(".daftar_akun_kanan");
const daftarprofile = document.querySelector(".daftar_profil_kanan");
const daftarsosialmedia = document.querySelector(".daftar_platform_kanan");
const buttonlanjut = document.querySelector("#btn_lanjut");
const buttonkembali = document.querySelector("#btn_kembali");
const buttonakun = document.querySelector(".btn1");
const buttonprofile = document.querySelector(".btn2");
const buttonplatform = document.querySelector(".btn3");
const title = document.querySelector(".titles");
const buttonlanjut2 = document.querySelector(".button__lanjut");
const buttonkembali2 = document.querySelector(".button__kembali");

const slidebar = document.querySelector(".side_bar");
const textmenu = document.querySelectorAll(".textmenu");
const slidelogo = document.querySelector(".side_logo");
const isikonten = document.querySelector(".isi_konten");

textmenu.forEach((test) => test.classList.add("hide"));

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

// console.log(buttonlanjut2.classList);
buttonkembali2.classList.remove("d-flex");
buttonkembali2.style.display = "none";

const menu = ["Akun", "Profil", "Platform Sosial"];
// console.log(akun.style);
buttonlanjut.addEventListener("click", function (e) {
    // console.log(title.innerHTML);

    // menu.map((el) => {
    //     console.log(el);
        if(title.innerHTML === "Akun") {
            console.log("harusnya masuk sini");
            profile.style.display = "block";
            akun.style.display = "none";
            sosialmedia.style.display = "none";
            daftarakun.style.display = "none";
            daftarprofile.style.display = "block";
            daftarsosialmedia.style.display = "none";
            buttonprofile.style.backgroundColor = "#D7CAA0";
            buttonakun.style.backgroundColor = "#F4F4F4";
            buttonplatform.style.backgroundColor = "#F4F4F4";   
            title.innerHTML = "Profil";
            buttonlanjut2.classList.add("d-flex");
            buttonlanjut2.style.display = "block";
            buttonkembali2.classList.add("d-flex");
            buttonkembali2.style.display = "block";
            return;
        }
        if(title.innerHTML === "Profil") {
            profile.style.display = "none";
            akun.style.display = "none";
            sosialmedia.style.display = "block"; 
            daftarakun.style.display = "none";
            daftarprofile.style.display = "none";
            daftarsosialmedia.style.display = "block";
            buttonprofile.style.backgroundColor = "#F4F4F4";
            buttonakun.style.backgroundColor = "#F4F4F4";
            buttonplatform.style.backgroundColor = "#D7CAA0";
            title.innerHTML = "Platform Sosial";
            buttonlanjut2.classList.remove("d-flex");
            buttonlanjut2.style.display = "none";
            buttonkembali2.classList.add("d-flex");
            buttonkembali2.style.display = "block";
            return;
        }
    // })
   
});

buttonkembali.addEventListener("click", function (e) {
    if(title.innerHTML === "Platform Sosial") {
        profile.style.display = "block";
        akun.style.display = "none";
        sosialmedia.style.display = "none";
        daftarakun.style.display = "none";
        daftarprofile.style.display = "block";
        daftarsosialmedia.style.display = "none";
        buttonprofile.style.backgroundColor = "#D7CAA0";
        buttonakun.style.backgroundColor = "#F4F4F4";
        buttonplatform.style.backgroundColor = "#F4F4F4";
        title.innerHTML = "Profil";
        buttonlanjut2.classList.add("d-flex");
        buttonlanjut2.style.display = "none";
        buttonkembali2.classList.add("d-flex");
        buttonkembali2.style.display = "block";
        return;
    }
    if(title.innerHTML === "Profil") {
        profile.style.display = "none";
        akun.style.display = "block";
        sosialmedia.style.display = "none";
        daftarakun.style.display = "block";
        daftarprofile.style.display = "none";
        daftarsosialmedia.style.display = "none";
        buttonprofile.style.backgroundColor = "#F4F4F4";
        buttonakun.style.backgroundColor = "#D7CAA0";
        buttonplatform.style.backgroundColor = "#F4F4F4";
        title.innerHTML = "Akun";
        buttonlanjut2.classList.add("d-flex");
        buttonlanjut2.style.display = "block";
        buttonkembali2.classList.remove("d-flex");
        buttonkembali2.style.display = "none";
        return;
    }
});
