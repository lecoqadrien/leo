function bonjour() {
    alert("I am an alert box!");
  }

var rellax = new Rellax('.rellax');

AOS.init();

const btn = document.getElementById('service');
btn.addEventListener("hover", function(){
  $("#service").addClass("intro");
});


const mainMenu = document.querySelector('ul');
const closeMenu = document.querySelector('.closeMenu');
const openMenu = document.querySelector('.openMenu');




openMenu.addEventListener('click',show);
closeMenu.addEventListener('click',close);

function show(){
    alert("helo")
}
function close(){
    mainMenu.style.top = '-100%';
}


const service = document.getElementById('service');
const trait_service = document.querySelector('.trait_service');













AOS.init();
