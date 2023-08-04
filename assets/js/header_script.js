/* Header JS Code */

var menu = document.querySelector('#menu-btn');
var navbar = document.querySelector('.navbar');
var header = document.querySelector('.header');

menu.onclick = () =>{
    menu.classList.toggle('fa-xmark');
    navbar.classList.toggle('active');
}
window.onscroll = () =>{
    menu.classList.remove('fa-xmark');
    navbar.classList.remove('active');
    if(window.scrollY > 0){
        header.classList.toggle('active');
    }else{
        header.classList.remove('active');
    }
}

