<?php
session_start();
if (!isset($_SESSION['username'])){
    header('location: ../index.php');
}else{

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
    <main class="flex-grow bg-slate-300 flex justify-center items-center">
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-md">
            <div class="md:flex">
                <div class="w-full p-2 py-10">
                    <div class="flex justify-center">
                        <div class="relative">
                            <img src="https://www.shareicon.net/data/512x512/2017/03/14/881194_users_512x512.png" class="rounded-full" width="80">
                            <span class="absolute border-white border-4 h-5 w-5 top-12 left-16 bg-green-700 rounded-full"></span>
                        </div>
                    </div>
                    <div class="flex flex-col text-center mt-3 mb-4">
                        <span class="text-2xl font-medium"><?=$_SESSION['username']?></span>
                    </div>
                    <p class="px-16 text-center font-bold">Signup date: <span class="font-light text-md text-gray-800"><?php echo $_SESSION['signup_date'];?></span>
                    <br />Last login: <span class="font-light text-md text-gray-800"><?php echo $_SESSION['last_login'];?></span></p>
                    <div class="px-14 mt-5">
                        <button class="h-12 bg-blue-700 w-full text-white text-md rounded hover:shadow hover:bg-blue-800 mb-2" onclick="window.location.href='./contacts/'">My Contacts</button>
                        <button class="h-12 bg-gray-200 w-full text-black text-md rounded hover:shadow hover:bg-gray-300 " onclick="window.location.href='../includes/logout.inc.php'">Log out</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<?php
}
?>