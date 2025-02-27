<?php

$redirect = './login.php';
require_once "../api/db.php";
require_once "../includes/config.php";
require_once "../includes/validator.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Short With PHP</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/index.css">

    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>


<body class="relative bg-yellow-50 overflow-hidden max-h-screen">

    <!-- User dashboard -->

    <aside class="fixed inset-y-0 left-0 bg-white shadow-md max-h-screen w-60">
        <div class="flex flex-col justify-between h-full">
            <div class="flex-grow">
                <div class="px-4 py-6 text-center border-b">
                    <h1 class="text-xl font-bold leading-none"><span class="text-yellow-700">Php Link Shortner</span> App</h1>
                </div>
                <div class="p-4">
                    <ul class="space-y-1">
                        <li>
                            <a href="?page=0" class="flex items-center bg-yellow-200 rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="text-lg mr-4" viewBox="0 0 16 16">
                                    <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                </svg>My Links
                            </a>
                        </li>
                        <li>
                            <a href="?page=1" class="flex bg-white hover:bg-yellow-50 rounded-xl font-bold text-sm text-gray-900 py-3 px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="text-lg mr-4" viewBox="0 0 16 16">
                                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z" />
                                </svg>My Account
                            </a>
                        </li>
                        <li>
                            <a href="../index.php" class="flex bg-white hover:bg-yellow-50 rounded-xl font-bold text-sm text-gray-900 py-3 px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="text-lg mr-4" viewBox="0 0 16 16">
                                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z" />
                                </svg>Create new link
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="p-4">
                <a href="./logout.php" class="inline-flex items-center justify-center h-9 px-4 rounded-xl bg-gray-900 text-gray-300 hover:text-white text-sm font-semibold transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="" viewBox="0 0 16 16">
                        <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg>
                </a> <span class="font-bold text-sm ml-2">Logout</span>
            </div>
        </div>
    </aside>

    <main class="ml-60 pt-16 max-h-screen overflow-auto">
        <div class="px-6 py-8">
            <?php

            $page = isset($_GET['page']) ? $_GET['page'] : null;
            if (!$page || $page == 0) {
                require_once "./links.php";
            }

            if ($page == 1) {
                require_once "./account.php";
            }

            if ($page == 2) {
                require_once "./stat.php";
            }
            ?>
        </div>
    </main>
</body>


</html>