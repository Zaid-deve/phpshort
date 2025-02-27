<!-- Main page, PHP shorting application -->

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

<body class="h-screen w-screen">

    <!-- PHP SHORT BODY -->
    <div class="py-5">
        <?php require_once "./includes/header.php"; ?>
    </div>
    <div class="container w-full h-auto flex items-center justify-center p-6 mx-auto text-white">
        <div class="max-w-xl w-full">
            <form method="POST" action="#" class="space-y-3 text-center">
                <div class="text-[5rem]"><i class="fas fa-link"></i> </div>
                <h3 class="text-4xl font-bold flex items-center justify-center gap-2">
                    Welcome to PHP Shorting
                </h3>
                <p>Make your URLs look simple and easily shareable</p>
                <hr>

                <!-- Input with icon -->
                <div class="relative mt-5">
                    <i class="fas fa-link absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                    <input type="text" name="url" placeholder="Enter your URL"
                        class="w-full py-4 px-12 bg-white rounded focus:bg-gray-100 border-0 outline-0 rounded-full text-black font-semibold" id="url">
                </div>

                <!-- Error message -->
                <div class="text-red-600 text-center hidden items-center justify-start gap-2 err-div">
                    <i class="fas fa-exclamation-circle"></i> <span id="error-message"></span>
                </div>

                <!-- Success message -->
                <div class="text-green-600 text-center hidden items-center justify-start gap-2 success-div">
                    <i class="fas fa-check-circle"></i> <span id="success-message"></span>
                </div>

                <button type="submit" id="shorten-btn" class="w-full bg-purple-500 text-white py-4 px-6 rounded-full hover:bg-purple-600 font-bold cursor-pointer flex items-center justify-center gap-2">
                    Short My URL <i class="fa-solid fa-arrow-down-short-wide"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Main index.js file for calling short API -->
    <script src="./assets/js/index.js"></script>

</body>

</html>