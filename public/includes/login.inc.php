<?php
include '../classes/dbh.class.php';
include '../classes/user.class.php';

if (isset($_POST['login']))
{
    //Grabbing the data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Instantiate SignupCtl Class
    $user = new User($username, $password);

    // running error handlers and user sign up
    $user->loginUser();
    // redirecting to login page
    header('location: ../my/index.php?e=successful%login');
}