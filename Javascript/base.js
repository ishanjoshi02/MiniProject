$(document).ready(function() {
    
    var signUpButton = document.getElementById("signup1")
    var logInButton = document.getElementById("login1")

    logInButton.onclick = function() {
        window.location = "/MiniProject/login.html"
    }

    signUpButton.onclick = function() {
        window.location = "/MiniProject/signup.html" 
    }

})