<?php
require '../../classes/dbh.class.php';
require '../../classes/contact.class.php';

$contact = new Contact();
$id = $_GET['id'];
$contact->setId($id);

if (isset($_POST['edit'])){
    $contact->setName($_POST['name']);
    $contact->setEmail($_POST['email']);
    $contact->setPhone($_POST['phone']);
    $contact->setAddress($_POST['address']);

    $contact->update();
    echo '<script>alert("updated!");document.location.href="index.php";</script>';
}
$record = $contact->fetchOneContact();
$val = $record[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../asset/style.css" />
    <link rel="icon" href="https://brandeps.com/icon-download/C/Contacts-icon-vector-02.svg">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>edit contact | Contacts manager</title>
</head>

<body class="flex justify-center items-center h-screen bg-slate-300">
<main class="">
    <div class="shadow bg-slate-200 p-5">
        <form class="px-6 pb-4 space-y-3 lg:px-8 sm:pb-6 xl:pb-8" action="" method="post">
            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                Update contact
            </h3>
            <div class="flex flex-col">
                <label for="name">name</label>
                <input type="text" id="name" name="name" class="form-input" value="<?=$val->name?>" required/>
            </div>
            <div class="flex-col flex">
                <label for="phone">phone</label>
                <input type="tel" id="phone" name="phone" class="form-input" value="<?=$val->phone?>" required/>
            </div>
            <div class="flex flex-col">
                <label for="email">email</label>
                <input type="email" id="email" name="email" class="form-input" value="<?=$val->email?>" required/>
            </div>
            <div class="flex flex-col">
                <label for="address">Address</label>
                <textarea name="address" id="address" class="form-input" ><?=$val->address?></textarea>
            </div>
            <div class="flex justify-end">
                <button type="button" class="text-gray-900 bg-gray-100 hover:bg-gray-200 hover:text-gray-900 rounded text-sm px-3 mr-3 dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">cancel</button>
                <input type="submit" name="edit" value="edit" class="bg-blue-500 hover:bg-blue-700 rounded font-bold py-1 px-3 form-input" />
            </div>
        </form>
    </div>
</main>
</body>

</html>