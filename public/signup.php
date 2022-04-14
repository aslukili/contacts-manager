<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./asset/style.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Contacts manager</title>
</head>

<body class="flex flex-col h-screen">
    <header class="bg-slate-800 flex justify-between">
        <h1 class="text-white font-medium text-3xl">Contacts list</h1>
        <a href="login.php" class="text-blue-300">login</a>
    </header>
    <main class="flex-grow items-center justify-center bg-slate-300 flex">
        <div class="shadow bg-slate-200 p-5">
            <h1 class="font-bold mb-3">Login to get started</h1>
            <form action="">
                <div>
                    <label for="username">username</label>
                    <br />
                    <input type="text" id="username" class="form-input" placeholder="username" />
                </div>
                <div class="mt-3">
                    <label for="password">password</label>
                    <br />
                    <input type="password" id="password" class="form-input" placeholder="username" />
                </div>
                <div class="mt-3">
                    <label for="password">password verify</label>
                    <br />
                    <input type="password" id="password" class="form-input" placeholder="verify password" />
                </div>

                <input type="submit" class="mt-3 bg-blue-500 hover:bg-blue-700 rounded font-bold py-1 px-3 w-full" />
            </form>
            <p class="mt-3">
                Already have an account?
                <a href="./login.php" class="ml-3 text-blue-700">login here</a>
            </p>
        </div>
    </main>
</body>

</html>