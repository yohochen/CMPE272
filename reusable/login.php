<?php

    extract($_POST);

    if(!chop($id) || !$psw){
        invalidInput();
        die();
    }

    // for the simplicity, we are only checking if the user is logging in as VarnishAdmin
    // and we are NOT checking password, for the purpose of the demo homework.

    if(isset($_POST["submit"])) {
        if($_POST['id'] === 'admin' || $_POST['id'] === '272'){
            $_SESSION["id"] = $_POST['id'];
            header("Location: ../contacts.php?v=".$_SESSION["id"]);
            exit;
        }
        else{
            accessDenied();
        }
    }



    function accessDenied(){
        print("<title> Access Denied </title>
            <strong>Your UserID and password are incorrect!</strong>" );
    }



    function invalidInput(){
        print("<title> Access Denied </title>
                <strong>Please fill in all form fields!</strong>" );
    }
?>
