<?php
include '../../classes/dbh.class.php';
include '../../classes/contact.class.php';

$contact = new Contact();

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $contact->setId($id);
    $contact->delete();
    echo '<script>document.location.href="index.php";</script>';
}
?>