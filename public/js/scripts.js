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


var chatbox = document.getElementById('fb-customer-chat');
                chatbox.setAttribute("page_id", "PAGE-ID");
                chatbox.setAttribute("attribution", "biz_inbox");
                

               
                window.fbAsyncInit = function() {
                    FB.init({
                    xfbml            : true,
                    version          : 'API-VERSION'
                    });
                };

                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                    js.fjs = 'https://graph.facebook.com/v14.0/me/messenger_profile?access_token=<PAGE_ACCESS_TOKEN>'
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));












AOS.init();
