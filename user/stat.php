<?php
$click_count = 0;
$original_url = "";
$short_code = "";
$original_url_length = 0;
$short_link_length = 0;

if (isset($_GET['short'])) {
    $short_code = $_GET['short'];

    // Fetch the original URL and click count
    $stmt = $conn->prepare("SELECT original_url, clicks FROM short_urls WHERE short_code = ?");
    $stmt->bind_param("s", $short_code);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($original_url, $click_count);
        $stmt->fetch();

        // Set variables
        $original_url_length = strlen($original_url);
        $short_link_length = strlen("http://localhost/phpshort/$short_code");
    }

    $stmt->close();
}

?>

<!-- Display Stats Card -->
<div class="flex justify-center items-center min-h-screen">
    <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-4 text-center">Short Link Stats</h2>

        <div class="border-b border-gray-600 pb-4 mb-4">
            <p class="text-gray-400 text-sm">Original URL:</p>
            <p class="text-lg font-medium truncate max-w-full"><?php echo $original_url ? $original_url : "Not Found"; ?></p>
        </div>

        <div class="border-b border-gray-600 pb-4 mb-4">
            <p class="text-gray-400 text-sm">Shortened URL:</p>
            <p class="text-lg font-medium">
                <a href="http://localhost/phpshort/<?php echo $short_code; ?>" class="text-blue-400" target="_blank">
                    http://localhost/phpshort/<?php echo $short_code; ?>
                </a>
            </p>
        </div>

        <div class="border-b border-gray-600 pb-4 mb-4">
            <p class="text-gray-400 text-sm">Shortened Message:</p>
            <p class="text-lg font-medium">
                <?php 
                
                if($original_url_length > $short_link_length){
                    echo "Shorten link is larger than original link";
                } else {
                    echo "Original link is shortened than short link!";
                }

                ?>
            </p>
        </div>

        <div class="border-b border-gray-600 pb-4 mb-4">
            <p class="text-gray-400 text-sm">Click Count:</p>
            <p class="text-lg font-medium"><?php echo $click_count; ?></p>
        </div>

        <div class="flex justify-between text-lg">
            <p>Original Length: <span class="font-bold"><?php echo $original_url_length; ?></span></p>
            <p>Short Length: <span class="font-bold"><?php echo $short_link_length ?></span></p>
        </div>
    </div>
</div>