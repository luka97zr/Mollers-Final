

document.getElementById('mySidenav').onclick =  function openNav(){
    document.getElementById('nav').style.width="100%";
     document.getElementById('nav_items').style.opacity="1";
     document.getElementById('nav_footer').style.opacity="1";

}
document.getElementById('close').onclick = function closeNav(){
    document.getElementById('nav').style.width="0%";
    document.getElementById('nav_items').style.opacity="0";
    document.getElementById('nav_footer').style.opacity="0";
}


