"use strict";
window.addEventListener("load", LoadFunction);

function LoadFunction() {
  var toggler = document.getElementsByClassName("box");
  var i;

  for (i = 0; i < toggler.length; i++) {
      toggler[i].addEventListener("click", function() {
      this.parentElement.querySelector(".nested").classList.toggle("active");
      this.classList.toggle("check-box");
    });
  }
}

function rmdir(event, path) {
    event.preventDefault();
    // Create an XMLHttpRequest object
    const http = new XMLHttpRequest();

    // Define a callback function
    var params = `path=${path}`;
    http.open('POST', 'rmdir.php', true);

    //Send the proper header information along with the request
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            alert(http.responseText);
        }
    }
    http.send(params);
}
