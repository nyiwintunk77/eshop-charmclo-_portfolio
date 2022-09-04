<?php
    session_start();

    if(isset($_POST['register'])){
        $_SESSION['fName'] = $_POST['first-name'];
        $_SESSION['lName'] = $_POST['last-name'];
        $_SESSION['lang-first-name'] = $_POST['lang-first-name'];
        $_SESSION['lang-last-name'] = $_POST['lang-last-name'];
        $_SESSION['postal-code'] = $_POST['postal-code'];
        $_SESSION['city'] = $_POST['city'];
        $_SESSION['town'] = $_POST['town'];
        $_SESSION['location'] = $_POST['location'];
        $_SESSION['building'] = $_POST['building'];
        $_SESSION['delivery-date'] = $_POST['deli-date'];
        $_SESSION['delivery-time'] = $_POST['deli-time'];
        $_SESSION['phone'] = $_POST['phone'];
        $_SESSION['fax'] = $_POST['fax'];

        echo $_SESSION['fName'] . " " . $_SESSION['lName'];
        header("Location: reg_payment.php");
    }
?>