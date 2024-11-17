<?php 

require_once 'Session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Session::removeAll();

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    $valid = true;

    if (empty($name)) {
        Session::set('name_error', 'Name is required.');
        $valid = false;
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        Session::set('email_error', 'Enter Valid email.');
        $valid = false;
    }

    if (empty($phone) || !preg_match("/^[0-9]{10}$/", $phone)) {
        Session::set('phone_error', 'Enter valid phne number');
    }

    if ($valid) {
        echo "<div class='alert alert-success'>Form submitted successfully!</div>";
    }else{
        header('location: index.php');
        exit;
    }

}