<?php
session_start();
if (isset($_SESSION['username'])){

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../asset/style.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
</head>



<body class="flex flex-col h-screen">
    <header class="bg-slate-800 flex justify-between">
        <h1 class="text-white font-medium text-3xl">Contacts list</h1>
        <div class="p-5">
            <ul>
                <li><a href="#" class="text-blue-300"><?php echo $_SESSION['username'];?></a></li>
                <li><a href="./contacts/" class="text-blue-300">Contacts</a></li>
                <li> <a href="../includes/logout.inc.php" class="text-blue-300">logout</a></li>
            </ul>
        </div>
    </header>
    <main class="flex-grow bg-slate-300">
        <div class="">Welcome, user</div>
        <div>
            <h2>Your Profile</h2>
            <hr />
            <p>username: <span><?php echo $_SESSION['username'];?></span></p>
            <hr />
            <p>Signup date: <span><?php echo $_SESSION['signup_date'];?></span></p>
            <hr />
            <p>Last login: <span><?php echo $_SESSION['last_login'];?></span></p>
        </div>
    </main>
</body>


</html>
<?php
}
?>