//Dark theme 
var icon= document.getElementById("iconn");
icon.onclick = function () {
   document.body.classList.toggle("dark-mode");
   if  (document.body.classList.contains('dark-mode')){
       icon.src="images/sun.png"
   }else{
     icon.src="images/moon.png"}

}
//hamburger toggler 

 const navToggler = document.querySelector(".nav-toggler");
 navToggler.addEventListener("click", navToggle);

 function navToggle() {
    navToggler.classList.toggle("active");
    const nav = document.querySelector(".nav");
    nav.classList.toggle("open");
    if(nav.classList.contains("open")){
    	nav.style.maxHeight = nav.scrollHeight + "px";
    }
    else{
    	nav.removeAttribute("style");
    }
 } 