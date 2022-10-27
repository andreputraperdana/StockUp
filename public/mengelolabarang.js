const slidebar = document.querySelector(".side_bar");
const textmenu = document.querySelectorAll(".textmenu");
const slidelogo = document.querySelector(".side_logo");
const d = new Date().toLocaleString();
const isikonten = document.querySelector(".isi_konten");
textmenu.forEach((test) => test.classList.add("hide"));
const butondelete = document.querySelector(".btn__delete");
let ItemList = document.querySelectorAll("#list_Allitem");
let content = document.querySelector(".content_tambahbarang");

slidebar.addEventListener("mouseover", function (e) {
    // console.log(this.classList);
    this.classList.remove("active");
    textmenu.forEach((test) => test.classList.remove("hide"));
    slidelogo.classList.remove("hidden");
    isikonten.classList.add("tambah");
    // console.log(isikonten.style.width);
    isikonten.style.width = "75%";
});

slidebar.addEventListener("mouseout", function (e) {
    // console.log(this.classList);
    this.classList.add("active");
    textmenu.forEach((test) => test.classList.add("hide"));
    slidelogo.classList.add("hidden");
    isikonten.classList.remove("tambah");
    isikonten.style.width = "90%";
});

    

if (document.querySelector(".tanda").innerHTML == "4") {
    document.querySelector(".menu_mnglola").style.backgroundColor = "#D7CAA0";
    document.querySelector("#mnglolaBrg").style.fontWeight = "700";
}

butondelete.addEventListener("click", function (e) {
    var p = e.parentNode.parentNode;
    console.log(p);
    p.parentNode.removeChild(p);
});


// function myFunction(event) {
//     var btnexpand = event;
//     var btnexpand2 = document.querySelector("."+btnexpand);
//     var expanded = btnexpand2.getElementsByTagName('img');
//     var a = btnexpand2.value;
//     var idHeader = document.querySelector("#id_header"+a);
//     var valueIdHeader = idHeader.value;
//     var pageId = {
//         id: valueIdHeader,
//     };
//     console.log(pageId);

//     // $.ajax({
//     //     type: "GET",
//     //     url: "/mengelolabarang/?id_header="+valueIdHeader,
//     //     data: valueIdHeader,
//     //     success: function (response) {
//     //         alert("masuk");
//     //     },
//     // });

//     $.ajax({
//         type: "GET",
//         url: "/mengelolabarang",
//         data: valueIdHeader,
//         dataType: "json",
//         success: function (response) {
//             alert("masuk");
//         },
//     });

//     let ItemLists = document.querySelector("#list_Allitem"+a);
//     console.log(a);
//     console.log(expanded[0]);
//     if (!expanded[0].style.rotate) {
//             count = 0;
//             expanded[0].style.rotate = "90deg";
//             // console.log(ItemList.classList);
//             ItemLists.style.display = "initial";
//             ItemLists.classList.add("item_list");
//             content.style.height = "1200px";
//         } else if ((expanded[0].style.rotate = "90deg")) {
//             count = 1;
//             expanded[0].style.rotate = "";
//             ItemLists.style.display = "none";
//             ItemLists.classList.add("item_list");
//             content.style.height = "780px";
//         }
// }

let additional = document.querySelectorAll(".additionalhtml");
var barangid = document.querySelectorAll(".btn__expand");
console.log(barangid.lastChild);
// let ItemLists = document.querySelector("#list_Allitem");

// console.log(barangid.length);
for (let j = 0; j < barangid.length; j++) {
    barangid[j].addEventListener("click", function (e) {
        let req = new XMLHttpRequest();
        let indexbarang = barangid[j].value;
        let expanded = barangid[j].getElementsByTagName('img');
        req.open("GET", `/listbarang/${indexbarang}`, true);
        req.onload = () => {
            if (req.readyState === XMLHttpRequest.DONE) {
                let data = req.response;
                console.log(data);
                if (!expanded[0].style.rotate) {
                // ItemList[j].classList.remove("item_list_hidden");
                    expanded[0].style.rotate = "90deg";
                    ItemList[j].style.display = "initial";
                    ItemList[j].classList.add("item_list");
                    content.style.height = "1200px";
                    additional[j].innerHTML = data;
                }
                else if (expanded[0].style.rotate = "90deg") {
                    ItemList[j].style.display = "none";
                    ItemList[j].classList.add("item_list");
                    expanded[0].style.rotate = "";
                    content.style.height = "780px";
                }
            }
        };
        req.send();
    });
}

var req = new XMLHttpRequest();

req.open("GET", "/ajaxData", true);
req.send();

req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
        var obj = JSON.parse(req.responseText);
        console.log(obj);
        }
    };
