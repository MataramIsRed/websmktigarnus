let x = document.getElementById("login");
let y = document.getElementById("registrasi");
function log(){
    x.classList.add("btn-light");
    x.classList.remove("btn-outline-light");
    x.classList.add("text-dark");
    y.classList.remove("btn-light");
    y.classList.add("btn-outline-light");
    y.classList.remove("text-dark");

}

function reg(){
    y.classList.add("btn-light");
    y.classList.remove("btn-outline-light");
    y.classList.add("text-dark");
    x.classList.remove("btn-light");
    x.classList.add("btn-outline-light");
    x.classList.remove("text-dark");
}