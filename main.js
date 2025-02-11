// onclcik of links to hide the nav 
let nav =document.querySelector('.navbar');
let navbar =document.querySelectorAll('.nav-link');

let navCollapse=document.querySelector('.navbar-collapse.collapse');

navbar.forEach(function (a){
  a.addEventListener("click",function(){
    navCollapse.classList.remove("show");
  })

  
})