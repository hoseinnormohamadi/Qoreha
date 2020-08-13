var mobileMenuBody = document.querySelector(".mobile-menu-body")
var bodyElem = document.querySelector("body ")


document.getElementById("burger-menu-input").addEventListener("change", () => {

    mobileMenuBody.classList.toggle("mobile-menu-body-open");

    if (mobileMenuBody.classList.contains("mobile-menu-body-open")) {
        bodyElem.style.overflow = "hidden "
    } else {
        bodyElem.style.overflow = "visible"
    }
})