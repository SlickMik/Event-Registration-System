<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<link rel="stylesheet" href="style.css">
</head>
<?php
    session_start();

    if(isset($_SESSION["username"]))
    {
?>
<body>
	<div class="header">
		<h1>User Profile</h1>
	</div>
	<div class="content">
		<h2>Welcome, [username]!</h2>
		<form action="change_password.php" method="post">
			<h3>Change Password</h3>
			<label for="current_password">Current Password:</label>
			<input type="password" id="current_password" name="current_password" required>
			<br><br>
			<label for="new_password">New Password:</label>
			<input type="password" id="new_password" name="new_password" required>
			<br><br>
			<label for="confirm_password">Confirm Password:</label>
			<input type="password" id="confirm_password" name="confirm_password" required>
			<br><br>
			<input type="submit" value="Save Changes">
		</form>
		<br><br>

	</div>
</body>
<?php
  }
  else{
    echo "No Session exist or session has expired. Please log in again.";
    echo "<h3><a href='login.php'>Try again</a></h3>";
  }
?>
</html>
