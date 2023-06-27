<?php
  session_start();

// Database connection parameters
$servername = "localhost";
$login = "root";
$password = "";
$dbname = "music";


$username = $_POST['username'];
$pass = $_POST['password'];

// Create connection
$conn = mysqli_connect($servername, $login, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to retrieve data from the students table
$sql = "SELECT * FROM users WHERE username='$username' AND password='$pass'";
$result = mysqli_query($conn, $sql);

$admin = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='".md5($pass)."'");

$role = mysqli_fetch_assoc($result);
$roleA = mysqli_fetch_assoc($admin);

//user login check
if ((mysqli_num_rows($result) > 0) && ($role["role"] == 2)) {
    // redirect to main page
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role["role"];
    header("Location:main.php");
}
//admin login check
else if((mysqli_num_rows($admin) > 0) && ($roleA["role"] == 1)){
    // redirect to admin main page
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $roleA["role"];
    header("Location:mainA.php");
}
else{
    // un-authorized access
    echo "<h2> Invalid username or password!</h2>";
    echo "<h3><a href='login.php'>Try again</a></h3>";

}

mysqli_close($conn);

?>