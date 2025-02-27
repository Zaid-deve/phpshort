<?php
$user_id = $_SESSION['user_id'];
$success_message = "";

// Handle link deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    $stmt = $conn->prepare("DELETE FROM short_urls WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $delete_id, $user_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $success_message = "Link deleted successfully!";
    } else {
        $success_message = "Failed to delete the link.";
    }

}

// Fetch all URLs for the logged-in user
$stmt = $conn->prepare("SELECT id, original_url, short_code, clicks, created_at FROM short_urls WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shortened Links</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white p-8">

    <h2 class="text-3xl font-bold mb-6">Your Shortened Links</h2>

    <?php if ($success_message): ?>
        <div class="bg-green-600 text-white px-4 py-2 mb-4 rounded">
            <?php echo $success_message; ?>
        </div>
    <?php endif; ?>

    <table class="min-w-full bg-gray-800 border border-gray-700 rounded-lg text-white">
        <thead>
            <tr class="text-left bg-gray-700">
                <th class="p-3">#</th>
                <th class="p-3">Short URL</th>
                <th class="p-3">Original URL</th>
                <th class="p-3">Clicks</th>
                <th class="p-3">Created</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $count = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='border-b border-gray-700'>";
                    echo "<td class='p-3'>{$count}</td>";
                    echo "<td class='p-3'><a href='http://localhost/phpshort/{$row['short_code']}' class='text-blue-400' target='_blank'>http://localhost/phpshort/{$row['short_code']}</a></td>";
                    echo "<td class='p-3 truncate max-w-xs'>{$row['original_url']}</td>";
                    echo "<td class='p-3'>{$row['clicks']}</td>";
                    echo "<td class='p-3'>{$row['created_at']}</td>";
                    echo "<td class='p-3 flex gap-2'>
                            <a href='?page=2&short={$row['short_code']}' class='bg-blue-600 text-white px-3 py-1 rounded'>View Stats</a>
                            <form method='POST' class='inline'>
                                <input type='hidden' name='delete_id' value='{$row['id']}'>
                                <button type='submit' class='bg-red-600 text-white px-3 py-1 rounded'>Delete</button>
                            </form>
                          </td>";
                    echo "</tr>";
                    $count++;
                }
            } else {
                echo "<tr><td colspan='6' class='p-3 text-center text-gray-400'>No links found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
