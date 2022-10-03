const slidebar = document.querySelector(".side_bar");
const textmenu = document.querySelectorAll(".textmenu");
const slidelogo = document.querySelector(".side_logo");
const d = new Date().toLocaleString();
const isikonten = document.querySelector(".isi_konten");
textmenu.forEach((test) => test.classList.add("hide"));
const listallUser = document.querySelector(".listall");

// textmenu.forEach((test) => (test.innerHTML);
// textmenu.forEach((test) => console.log(test.innerHTML.length));
slidebar.addEventListener("mouseover", function (e) {
    // console.log(this.classList);
    this.classList.remove("active");
    textmenu.forEach((test) => test.classList.remove("hide"));
    slidelogo.classList.remove("hidden");
    isikonten.classList.add("tambah");
    // console.log(isikonten.style.width);
    isikonten.style.width = "75%";
});

if (!document.getElementById("waktuskrg")) {
} else {
    document.getElementById("waktuskrg").innerHTML = d;
}

slidebar.addEventListener("mouseout", function (e) {
    // console.log(this.classList);
    this.classList.add("active");
    textmenu.forEach((test) => test.classList.add("hide"));
    slidelogo.classList.add("hidden");
    isikonten.classList.remove("tambah");
    isikonten.style.width = "90%";
});

// setInterval(() => {
//     let xhr = new XMLHttpRequest();
//     xhr.open("GET", "/listalluser", true);
//     xhr.onload = () => {
//         if (xhr.readyState === XMLHttpRequest.DONE) {
//             let data = xhr.response;
//             listallUser.innerHTML = data;
//         }
//     };
//     xhr.send();
// }, 1000);
// console.log("test");
