<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./asset/style.css" />
    <link rel="stylesheet" href="./asset/validate.css">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Contacts manager</title>
    <script src="./asset/js/validate.js" defer></script>
</head>

<body class="flex flex-col h-screen">
<header class="bg-slate-800 text-center py-3">
    <h1 class="text-amber-300 font-medium text-3xl">Contacts list</h1>
</header>
<main class="flex-grow flex justify-center items-center md:grid grid-cols-2 bg-slate-500">
    <div class=" flex justify-center items-center">
        <div class="rounded-xl shadow-md bg-blue-50 p-7">
            <h1 class="font-bold text-2xl mb-3">Log in to your account</h1>
            <form action="./includes/login.inc.php" method="post" id="form" onsubmit="return validateLogin()">
                <div class="input-control">
                    <label for="username">username</label>
                    <br />
                    <input type="text" id="username" name="username" class="form-input" placeholder="username" />
                    <div class="error"></div>
                </div>
                <div class="input-control">
                    <label for="password">password</label>
                    <br />
                    <input type="password" id="password" name="password" class="form-input" placeholder="password" />
                    <div class="error"></div>
                </div>
                <input type="submit" id="login" name="login" class="mt-3 form-input bg-blue-500 hover:bg-blue-700 rounded font-bold py-1 px-3 w-full" />
            </form>
            <p class="mt-3">
                Don't have an account?
                <a href="./signup.php" class="ml-3 text-blue-700">Create one</a>
            </p>
        </div>
    </div>
    <div class="hidden md:flex items-center justify-center ">
        <img class="w-3/5" src="asset/imgs/people.svg">
    </div>
</main>

</body>

</html>


