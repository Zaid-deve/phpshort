<?php
// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_email = "";
$user_name = "";

// Fetch user details
$stmt = $conn->prepare("SELECT uname, uemail FROM users WHERE uid = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($user_name, $user_email);
$stmt->fetch();
$stmt->close();

// Handle account deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_account'])) {
    $delete_stmt = $conn->prepare("DELETE FROM users WHERE uid = ?");
    $delete_stmt->bind_param("i", $user_id);
    $delete_stmt->execute();
    $delete_stmt->close();
    
    echo "<script>location.replace('logout.php')</script>";
    exit();
}

$conn->close();
?>

<!-- Account Details Page -->
<div class="flex justify-center items-center min-h-screen">
    <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-4 text-center">Account Details</h2>

        <div class="mb-4">
            <label class="block text-gray-400 text-sm mb-1">Name</label>
            <input type="text" value="<?php echo htmlspecialchars($user_name); ?>" class="w-full bg-gray-700 text-white p-2 rounded" readonly>
        </div>

        <div class="mb-4">
            <label class="block text-gray-400 text-sm mb-1">Email</label>
            <input type="email" value="<?php echo htmlspecialchars($user_email); ?>" class="w-full bg-gray-700 text-white p-2 rounded" readonly>
        </div>

        <!-- Delete Account Button -->
        <form method="POST">
            <button type="submit" name="delete_account" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Delete Account
            </button>
        </form>
    </div>
</div>
