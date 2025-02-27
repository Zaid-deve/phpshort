<div class="container mx-auto">
    <div class="flex items-center justify-between">
        <a href="/phpshort"><img src="/phpshort/assets/images/PHP-logo.svg.png" alt="#" height="35" width="60"></a>
        <div>
            <a href="/phpshort" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Create short</a>
            <?php

            if(!session_id())session_start();

            if (!isset($_SESSION['user_id'])) { ?>
                <a href="/phpshort/user/login.php" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a>
                <a href="./user/signup.php" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Get started</a>
            <?php  } else { ?>
                <a href="/phpshort/user/dashboard.php" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">My Dashboard</a>
            <?php }

            ?>
        </div>
    </div>
</div>