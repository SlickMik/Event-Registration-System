<?php
session_start();


$servername = "localhost";
$login = "root";
$password = "";
$dbname = "music";


$conn = mysqli_connect($servername, $login, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_SESSION['username'];
$sql = "SELECT password FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
$current_password = $row['password'];

if ($_POST['current_password'] !== $current_password) {
    echo "Current password is incorrect. Please try again.";
} else {
    if ($_POST['new_password'] !== $_POST['confirm_password']) {
        echo "New password and confirm password fields do not match. Please try again.";
    } else {
        $new_password = $_POST['new_password'];
        $sql = "UPDATE users SET password='$new_password' WHERE username='$username'";

        if (mysqli_query($conn, $sql)) {
            echo "Password changed successfully!";
            echo "<h3><a href='profile.php'>Return to profile page</a></h3>";
        } else {
            echo "Error: " . mysqli_error($conn);
            echo "<h3><a href='profile.php'>Return to profile page</a></h3>";
        }
    }
}

mysqli_close($conn);
?>
