var body
var httpRequest

$(document).ready(function() {

    body = document.getElementById("body")

    if (window.XMLHttpRequest) {

        httpRequest = new XMLHttpRequest()

    } else if (window.ActiveXObject) {

        httpRequest = new ActiveXObject("Microsoft.XMLHTTP")

    }

    httpRequest.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            body.innerText = "fuck off Neeraj"

        }

    }

    httpRequest.open("GET", "hello.txt", true)
    httpRequest.send()

})