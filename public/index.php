<?php
include './classes/dbh.class.php';

$test = new Dbh();
$test->connect();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./asset/style.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contacts Manager</title>
</head>

<body class="flex flex-col h-screen">
    <header class="bg-slate-800 flex justify-around">
        <h1 class="text-white font-medium text-3xl">Contacts list</h1>
    </header>
    <main class="bg-gray-300 flex-grow flex justify-center items-center flex-col" style="text-align: center">
        <span class="font-medium text-2xl">Welcome to the best simple contacts manager</span>
        <p>
            <a href="./signup.php" class="text-blue-700">sign up</a> to
            start creating your contacts list
        </p>
        <p>
            Already have an account?
            <a href="./login.php" class="text-blue-700">login here</a>
        </p>
    </main>

</body>

</html>