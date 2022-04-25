<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./asset/style.css" />
    <link rel="stylesheet" href="./asset/validate.css">
    <link rel="icon" href="https://brandeps.com/icon-download/C/Contacts-icon-vector-02.svg">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up | Contacts manager</title>
    <script src="./asset/js/validate.js" defer></script>
</head>

<body class="flex flex-col h-screen">
    <header class="bg-slate-800 text-center">
        <h1 class="text-white font-medium text-3xl">Contacts list</h1>
    </header>
    <main class="flex-grow items-center justify-center bg-slate-300 flex">
        <div class="shadow bg-slate-200 p-5">
            <h1 class="font-bold mb-3">sign up to get started</h1>
            <form action="./includes/signup.inc.php" method="post" id="form" onsubmit="return validateSignup()">
                <div class="input-control">
                    <label for="username">username</label>
                    <br />
                    <input type="text" id="username" name="username" class="form-input" placeholder="username" required/>
                    <div class="error"></div>
                </div>
                <div class="mt-3 input-control">
                    <label for="password">password</label>
                    <br />
                    <input type="password" id="password" name="password" class="form-input" placeholder="password" required/>
                    <div class="error"></div>
                </div>
                <div class="mt-3 input-control">
                    <label for="ver_password">password verify</label>
                    <br />
                    <input type="password" id="ver_password" name="ver_password" class="form-input" placeholder="verify password" required/>
                    <div class="error"></div>
                </div>

                <input type="submit" id="signup" name="signup" class="mt-3 bg-blue-500 hover:bg-blue-700 rounded font-bold py-1 px-3 w-full" />
            </form>
            <p class="mt-3">
                Already have an account?
                <a href="./login.php" class="ml-3 text-blue-700">login here</a>
            </p>
        </div>
    </main>
</body>

</html>