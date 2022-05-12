<?php
require '../../classes/dbh.class.php';
require '../../classes/contact.class.php';
session_start();

if (!isset($_SESSION['username'])){
    header('location: ../index.php');
}else{

// getting the data from database
$data = new Contact();
$contacts = $data->fetchData($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../asset/style.css" />
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My contacts</title>
</head>

<body class="flex flex-col h-screen">
    <header class="bg-slate-800 flex justify-between items-center px-10">
        <h1 class="text-amber-300 font-medium text-3xl">Contacts Manager</h1>
        <div>
            <ul>
                <li><a href="../" class="text-blue-300">Profile</a></li>
                <li><a href="./contacts/" class="text-blue-300">Contacts</a></li>
                <li><a href="../../includes/logout.inc.php" class="text-blue-300">logout</a></li>
            </ul>
        </div>
    </header>
    <main class="flex-grow bg-slate-300">
        <div class="lg:container mx-auto">
        <div class="flex justify-between px-5 py-3">
            <div class="text-3xl text-blue-700"> My contacts</div>
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">
                add contact
            </button>
        </div>
        <div>
            <?php
            if (!$contacts){
                echo '<p class="text-red-700">you have no contacs yet</p>';
            } else {
            ?>
            <!-- contacts table -->
            <div class="max-w-full overflow-x-auto px-3">
                <table class="border-b table-auto w-full  m-auto md:w-3/4 bg-gray-100 text-lg text-left text-gray-900">
                    <thead>
                        <tr>
                            <th class="border-r">Name</th>
                            <th class="border-r">Email</th>
                            <th class="border-r">Phone</th>
                            <th class="border-r">Address</th>
                            <th class="border-r">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($contacts as $value){?>

                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                            <td class="border-r"><?=$value->name?></td>
                            <td class="border-r"><?=$value->email?></td>
                            <td class="border-r"><?=$value->phone?></td>
                            <td class="border-r"><?=$value->address?></td>
                            <td class="border-r">
                                <button onclick="document.location.href='edit-contact.php?id=<?=$value->id?>'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button onclick="confirmDelete(<?=$value->id?>)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
                <?php }?>
        </div>
        <!-- add contact modal -->
        <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex justify-end p-2">
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <form class="px-6 pb-4 space-y-3 lg:px-8 sm:pb-6 xl:pb-8" action="./add-contact.php" method="post">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            add a new contact
                        </h3>
                        <div class="flex flex-col">
                            <label for="name">name</label>
                            <input type="text" id="name" name="name" class="form-input" placeholder="contact name" required/>
                        </div>
                        <div class="flex-col flex">
                            <label for="phone">phone</label>
                            <input type="tel" id="phone" name="phone" class="form-input" placeholder="contact phone" required/>
                        </div>
                        <div class="flex flex-col">
                            <label for="email">email</label>
                            <input type="email" id="email" name="email" class="form-input" placeholder="contact email" required/>
                        </div>
                        <div class="flex flex-col">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" class="form-input" placeholder="contact address"></textarea>
                        </div>
<!--                        user id for saving to the database-->
                        <input type="hidden" name="user_fk" value="<?=$_SESSION['id']?>">
                        <div class="flex justify-end">
                            <button type="button" class="text-gray-900 bg-gray-100 hover:bg-gray-200 hover:text-gray-900 rounded text-sm px-3 mr-3 dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">cancel</button>
                            <input type="submit" name="add" class="bg-blue-500 hover:bg-blue-700 rounded font-bold py-1 px-3 form-input" />
                        </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
    </main>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script>
        // The function below will start the confirmation dialog
        function confirmDelete(id) {
            let confirmAction = confirm("Are you sure to delete this contact?");
            if (confirmAction) {
                document.location.href=`delete-contact.php?id=${id}`;
            } else {
                alert("Action canceled");
            }
        }
    </script>
</body>

</html>
<?php } ?>