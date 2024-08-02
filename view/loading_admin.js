// add an event listener for the 'load' event
$(document).ready(function() {
window.addEventListener('load', function() {

    // create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // set up the callback function to handle the response
    xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        // handle the response from the PHP script
        var response = this.responseText;
        console.log(this.responseText);
        if(response == 1){
            document.getElementById("admins").style.display = "inline";
        }
        else{
            document.getElementById("admins").style.display ="none";
        }
      }
    };
    // open the connection and send the request to the PHP script
    xhr.open('GET', 'is_admin_API.php', true);
    xhr.send();
    });
});