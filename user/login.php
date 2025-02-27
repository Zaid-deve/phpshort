<?php

session_start();
if (isset($_SESSION['user_id'])) {
    header("Location:./dashboard.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to your account</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/index.css">

    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body class="bg-gray-900 text-white">


    <!-- Login Body -->
    <div class="py-5">
        <?php require_once "../includes/header.php"; ?>
    </div>
    <div class="flex min-h-screen flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="text-[5rem] text-center"><i class="fa-solid fa-xmarks-lines"></i></div>
            <h2 class="mt-2 text-center text-3xl font-bold">Sign in to your account</h2>
        </div>


        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-md bg-white md:px-8 px-6 py-8 rounded-lg shadow-lg text-gray-800">
            <!-- API Error Alert -->
            <div id="api-error" class="hidden bg-red-500 text-white px-5 py-3 rounded-md shadow-lg text-center font-bold mb-4">
                <i class="fas fa-exclamation-circle mr-2"></i> <span id="api-error-message"></span>
            </div>
            <form class="space-y-6" id="login-form">
                <div>
                    <label for="email" class="block text-lg font-medium">Email address</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" autocomplete="email"
                            class="block w-full rounded-md bg-white px-4 py-2 text-lg text-gray-900 border border-gray-300 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 font-semibold">
                        <p class="text-red-500 text-sm mt-1 hidden" id="email-error"></p>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-lg font-medium">Password</label>
                        <a href="#" class="text-indigo-400 hover:text-indigo-300 text-sm">Forgot password?</a>
                    </div>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" autocomplete="current-password"
                            class="block w-full rounded-md bg-white px-4 py-2 text-lg text-gray-900 border border-gray-300 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 font-semibold">
                        <p class="text-red-500 text-sm mt-1 hidden" id="password-error"></p>
                    </div>
                </div>

                <div>
                    <button type="submit" id="login-btn"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-4 py-2 text-lg font-bold text-white shadow-md hover:bg-indigo-500 transition">
                        Sign in
                    </button>
                </div>
            </form>

            <p class="mt-6 text-center text-gray-400">
                Not a member?
                <a href="./signup.php" class="text-indigo-400 hover:text-indigo-300 font-semibold">Create an account for free</a>
            </p>
        </div>
    </div>

    <script src="../assets/js/login.js"></script>

</body>

</html>