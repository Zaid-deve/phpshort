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
    <title>Create an account</title>

    <!-- Tailwind CSS -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/index.css">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <!-- Signup Body -->
    <div class="py-5">
        <?php require_once "../includes/header.php"; ?>
    </div>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 text-white">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="text-[4rem] text-center"><i class="fa-regular fa-address-card"></i></div>
            <h2 class="mt-2 text-center text-3xl font-bold">Create an account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-md bg-white md:px-8 px-6 py-8 rounded-lg shadow-lg text-gray-800">
            <!-- API Error Alert -->
            <div id="api-error" class="hidden bg-red-500 text-white px-5 py-3 rounded-md shadow-lg text-center font-bold mb-4">
                <i class="fas fa-exclamation-circle mr-2"></i> <span id="api-error-message"></span>
            </div>

            <form id="signup-form" class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium">Full Name</label>
                    <div class="mt-2">
                        <input type="text" name="name" id="name"
                            class="block w-full rounded-md bg-white px-4 py-2 text-lg text-gray-900 border border-gray-300 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 font-semibold">
                        <p id="name-error" class="text-red-500 text-sm mt-1 hidden"></p>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium">Email Address</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email"
                            class="block w-full rounded-md bg-white px-4 py-2 text-lg text-gray-900 border border-gray-300 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 font-semibold">
                        <p id="email-error" class="text-red-500 text-sm mt-1 hidden"></p>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <div class="mt-2">
                        <input type="password" name="password" id="password"
                            class="block w-full rounded-md bg-white px-4 py-2 text-lg text-gray-900 border border-gray-300 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 font-semibold">
                        <p id="password-error" class="text-red-500 text-sm mt-1 hidden"></p>
                    </div>
                </div>

                <div>
                    <label for="confirm-password" class="block text-sm font-medium">Confirm Password</label>
                    <div class="mt-2">
                        <input type="password" name="confirm-password" id="confirm-password"
                            class="block w-full rounded-md bg-white px-4 py-2 text-lg text-gray-900 border border-gray-300 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 font-semibold">
                        <p id="confirm-password-error" class="text-red-500 text-sm mt-1 hidden"></p>
                    </div>
                </div>

                <div>
                    <button type="submit" id="signup-btn"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-4 py-2 text-lg font-bold text-white shadow-md hover:bg-indigo-500 transition">
                        Sign Up
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Already have an account?
                <a href="./login.php" class="font-semibold text-indigo-600 hover:text-indigo-500">Sign in</a>
            </p>
        </div>
    </div>

    <script src="../assets/js/signup.js"></script>

</body>

</html>