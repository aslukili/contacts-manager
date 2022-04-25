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
    <header class="bg-slate-800 flex justify-between items-center px-10">
        <h1 class="text-amber-300 font-medium text-3xl">Contacts Manager</h1>
        <div>
            <a class="text-amber-300 px-3" href="login.php">login</a>
            <a class="text-gray-900 bg-amber-100 border-2 border-amber-300 rounded py-1 px-3" href="signup.php">Sign up</a>
        </div>
    </header>
    <main class="flex-grow text-center flex justify-center items-center flex-col bg-contacts bg-no-repeat bg-cover bg-center" >
        <div class="text-white p-5 bg-gray-900/50 shadow rounded-lg">
            <span class="font-medium text-2xl">Welcome to the best contacts manager</span>
            <p>
                <a href="./signup.php" class="text-amber-300">sign up</a> to start creating your contacts list
            </p>
            <p>
                Already have an account?
                <a href="./login.php" class="text-amber-300">login here</a>
            </p>
            <button class="bg-amber-200 text-gray-900 font-bold rounded px-10 py-3 border-amber-300 border-2 mt-7" onclick="document.location.href='signup.php'">get started</button>
        </div>
    </main>
</body>
</html>