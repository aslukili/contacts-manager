<?php
include '../classes/dbh.class.php';
include '../classes/user.class.php';

if (isset($_POST['signup']))
{
    //Grabbing the data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Instantiate SignupCtl Class
    $user = new User($username, $password, );

    // running error handlers and user sign up
    $user->signupUser();
    // redirecting to login page
    header('location: ../login.php?error=none');
}