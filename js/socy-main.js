window.addEventListener("scroll", menuMess)

function menuMess(){
      var topMenu = document.getElementById("top-menu")
      if (window.scrollY > 64)  {
        topMenu.style.marginTop = "0px"
        console.log('>64')
      }
      if (window.scrollY < 64 ) {
        topMenu.style.marginTop = topMenu.clientHeight + "px"
        console.log('less than 64')
      }
}


jQuery(document).ready(function($) {
  menuMess()
});