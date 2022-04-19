<?php
include '../../classes/dbh.class.php';
include '../../classes/contact.class.php';

if (isset($_POST['add']))
{
    //Grabbing the data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $user_fk = $_POST['user_fk'];

    // Instantiate SignupCtl Class
    $user = new Contact();
    $user->setName($name);
    $user->setPhone($phone);
    $user->setEmail($email);
    $user->setAddress($address);
    $user->setUserFK($user_fk);
    // running error handlers and user sign up
    $user->addContact();
    // redirecting to login page
    header('location: ./index.php?error=none');
}