function ShowAlert($object, $msg, $type) {
    switch ($type) {
        case "error":
            $object.removeClass("alert alert-danger ");
            $object.removeClass("alert alert-success ");
            $object.addClass("alert alert-danger ");
            $object.removeClass("d-none").html($msg);
            $object.style.display = "block";
            break;
        case "success":
            $object.removeClass("alert alert-danger  d-none");
            $object.removeClass("alert alert-success  d-none");
            $object.addClass("alert alert-success ");
            $object.removeClass("d-none").html($msg);
            $object.style.display = "block";
            break;
        default:
            $object.removeClass("alert alert-danger ");
            $object.removeClass("alert alert-success ");
            $object.addClass("alert alert-danger ");
            $object.removeClass("d-none").html($msg);
            $object.style.display = "block";
            break;

    }

}

function cleanPasswords($pass1, $pass2) {
    let $error = $("#alertBox");
    if ($pass1 !== $pass2) {
        ShowAlert($error, "Passwords do not match!", "error")
        return false;
    } else {
        return $pass1
    }
}


function isUserLogin($user) {
    var login_btn = document.getElementById("login_btn");
    var account_btn = document.getElementById("account_btn");
    if ($user == "NULL" || $user == undefined) {
        login_btn.style.display = "block";
        account_btn.style.display = "none";
    } else {
        login_btn.style.display = "none";
        account_btn.style.display = "block";

    }

}
