const toggler = document.querySelector(".toggler-btn");
toggler.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("collapsed");
});


// onclcik of links to hide the nav 
let nav =document.querySelector('.navbar');
let navbar =document.querySelectorAll('.nav-link');

let navCollapse=document.querySelector('.navbar-collapse.collapse');

navbar.forEach(function (a){
  a.addEventListener("click",function(){
    navCollapse.classList.remove("show");
  })

  
})


document.addEventListener("DOMContentLoaded", function () {
    // Select all links with class 'load-page'
    document.querySelectorAll(".load-page").forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault(); // Stop default navigation
            
            let pageUrl = this.getAttribute("data-page"); // Get page URL

            // Fetch the content via AJAX
            fetch(pageUrl)
                .then(response => response.text()) // Convert response to text
                .then(data => {
                    document.getElementById("content-area").innerHTML = data; // Load content in div
                })
                .catch(error => console.error("Error loading page:", error));
        });
    });
});
