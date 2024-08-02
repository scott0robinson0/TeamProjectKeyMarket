$(document).ready(function() {
    $("#Register_form > form").submit(function(event) { //This ajax request is for creating an account
        event.preventDefault(); //stop page from reloading
        let $error = $("#alertBox");
        //Get data
        let data = { name: "", cleanPass: "" ,email:"",phone:0000000000};
        data.name = event.target[0].value;
        data.cleanPass = cleanPasswords(event.target[1].value, event.target[2].value);
        data.email = event.target[3].value
        data.phone = event.target[4].value
        if (data.cleanPass) {
            //Create request
            let request = new XMLHttpRequest();
            request.open("POST", "register_account_API.php");
            request.setRequestHeader("Content-Type", "application/json");
            request.onreadystatechange = function() {
                if (this.readyState === XMLHttpRequest.DONE) {
                    if (this.status === 200) {

                        ShowAlert($error, "Account has been Created! You will be redirected to the log in page in 3 seconds!", "success") //This is if request was OK, data in the database
                        setTimeout(function(){
                            window.location.href = "login.php";
                    },3000);
                    } else if (this.status === 406) {
                        if (this.responseText.includes("Duplicate") && this.responseText.includes("username")) { //For duplcate usernames
                            ShowAlert($error, "This Username is already taken!", "error");
                            setTimeout(function(){
                                var element = document.getElementById("oldID");
                                element.className = "alert alert-success d-none";
                                element.style = "none";
                        },5000);

                        } else {//This will display every other error that has not been accounted for normally quite bad
                            console.log(loginRequest);
                            ShowAlert($error, this.responseText, "error"); //For other Errors
                            setTimeout(function(){
                                var element = document.getElementById("oldID");
                                element.className = "alert alert-success d-none";
                                element.style = "none";
                        },5000);
                        }
                    }
                }
            }
            request.send(JSON.stringify(data)); // this will covert the data into JSON notaion and send it to Create Account.php

        }
    })

    $("#login_form > form").submit(function(event) { //this Ajax request if for Logining in
        let $error = $("#alertBox");
        event.preventDefault(); //stop page from reloading
        // preping the data
        let data = { name: "", pass: "" };
        //getting the data from the form
        data.name = event.target[0].value;
        data.pass = event.target[1].value;
        let loginRequest = new XMLHttpRequest();
        loginRequest.open("POST", "login_API.php");
        loginRequest.setRequestHeader("Content-Type", "application/json");
        loginRequest.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 200) {//This is if the user has logged in successfully
                    ShowAlert($error, "Log in successful! You will be redirected to the home page in 3 seconds!", "success"); //This is if request was OK, data in the database
                    setTimeout(function(){
                        window.location.replace = "index.php";
                },3000);
                } else if (this.status === 401) {//this is if the username or password is wrong and does not log in the user
                    ShowAlert($error, "Username And password is inccorect!", "error");
                    setTimeout(function(){
                        var element = document.getElementById("oldID");
                        element.className = "alert alert-success d-none";
                        element.style = "none";
                },5000);
                    
                } else {//This will display every other error that has not been accounted for normally quite bad
                    ShowAlert($error, this.responseText, "error");
                    setTimeout(function(){
                        var element = document.getElementById("oldID");
                        element.className = "alert alert-success d-none";
                        element.style = "none";
                },5000);
                }
            }
        }
        loginRequest.send(JSON.stringify(data));


    })
    $("#key_form > form").submit(function(event) { //this Ajax request if for getting the info to submit a key
        let $error = $("#alertBox");
        var element = document.getElementById("oldID");
        event.preventDefault(); //stop page from reloading
        //preping the data
        let data = { title: "", platform: "",price:"",key:"" };
        //getting the data from the form
        data.title = event.target[0].value;
        data.platform = event.target[1].value;
        data.price = event.target[2].value;
        data.key = event.target[3].value;
        let loginRequest = new XMLHttpRequest();
        loginRequest.open("POST", "key_upload_API.php");
        loginRequest.setRequestHeader("Content-Type", "application/json");
        loginRequest.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 200) {
                    ShowAlert($error, "Key has been successfully added!", "success"); //This is if request was OK, data in the database
                    setTimeout(function(){
                        element.className = "alert alert-success d-none";
                        element.style = "none";
                },5000);
                    
                } else {//This will display every other error that has not been accounted for normally quite bad
                    ShowAlert($error, this.responseText, "error");
                    setTimeout(function(){
                        element.className = "alert alert-success d-none";
                        element.style = "none";
                },5000);
                }
            }
        }
        loginRequest.send(JSON.stringify(data));


    })

    $("#edit_form > form").submit(function(event) { //This ajax request is for creating an account
        event.preventDefault(); //stop page from reloading
        let $error = $("#alertBox");
        //Get data
        let data = { name: "NULL", cleanPass: "NULL" ,email:"NULL",phone:"0000000000"};
        data.name = event.target[0].value;
        data.cleanPass = cleanPasswords(event.target[3].value, event.target[4].value);
        data.email = event.target[1].value
        data.phone = event.target[2].value
        if (data.cleanPass) {
            //Create request
            let request = new XMLHttpRequest();
            var element = document.getElementById("oldID");
            request.open("POST", "edit_account_API.php");
            request.setRequestHeader("Content-Type", "application/json");
            request.onreadystatechange = function() {
                if (this.readyState === XMLHttpRequest.DONE) {
                    if (this.status === 200) {

                        ShowAlert($error, "Account details have been updated!!", "success") //This is if request was OK, data in the database
                        setTimeout(function(){
                            element.className = "alert alert-success d-none";
                            element.style = "none";
                    },3000);
                    } else if (this.status === 406) {
                        if (this.responseText.includes("Duplicate") && this.responseText.includes("username")) { //For duplcate usernames
                            ShowAlert($error, "This Username is already taken!", "error");
                            setTimeout(function(){
                                
                                element.className = "alert alert-success d-none";
                                element.style = "none";
                        },5000);

                        } else {//This will display every other error that has not been accounted for normally quite bad
                            console.log(loginRequest);
                            ShowAlert($error, this.responseText, "error"); //For other Errors
                            setTimeout(function(){
                                var element = document.getElementById("oldID");
                                element.className = "alert alert-success d-none";
                                element.style = "none";
                        },5000);
                        }
                    }
                }
            }
            request.send(JSON.stringify(data)); // this will covert the data into JSON notaion and send it to Create Account.php

        }
    })
    
});