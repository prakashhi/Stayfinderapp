document.querySelector("#hambtn").addEventListener("click", () => {
    document.querySelector(".left").style.left = "0%";

})
document.querySelector(".closebtn").addEventListener('click', () => {
    document.querySelector(".left").style.left = "-100%";
})