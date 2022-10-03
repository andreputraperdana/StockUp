const buttonLearnMore = document.querySelector(".btn--text");
const section1 = document.querySelector("#section1");
const body = document.querySelector(".body_c");
// console.log(buttonLearnMore);
// console.log(section1);
// console.log(body);

buttonLearnMore.addEventListener("click", function (e) {
    e.preventDefault();
    section1.scrollIntoView({ behavior: "smooth" });
});

const revealSection = function (entries, observer) {
    const [entry] = entries;
    console.log(entry);
    // console.log(entry.target.classList.add("hidden"));
    if (!entry.isIntersecting) {
        entry.target.classList.add("hidden");
    } else if (entry.isIntersecting) {
        entry.target.classList.remove("hidden");
    }
};
const sectionObserve = new IntersectionObserver(revealSection, {
    root: null,
    threshold: 0.4,
});

sectionObserve.observe(body);
