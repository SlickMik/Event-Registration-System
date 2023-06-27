<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Home</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
			font-size: 16px;
		}
		
		.sidebar {
			position: fixed;
			top: 0;
			left: 0;
			height: 100%;
			width: 250px;
			background-color: #333;
			color: #fff;
			padding: 20px;
			box-sizing: border-box;
		}
		
		.sidebar h1 {
			font-size: 24px;
			margin-bottom: 20px;
		}
		
		.sidebar a {
			display: block;
			color: #fff;
			text-decoration: none;
			padding: 10px 0;
			border-bottom: 1px solid #fff;
		}
		
		.sidebar a:hover {
			background-color: #555;
		}
		
		.content {
			margin-left: 250px;
			padding: 20px;
			box-sizing: border-box;
		}
		
		.content h2 {
			margin-top: 0;
		}
		
		.content p {
			margin-bottom: 20px;
		}
		
		.icon {
			margin-right: 10px;
		}
	</style>
</head>
<?php
  session_start();

  if((isset($_SESSION["username"])) && ($_SESSION['role'] == 1))
  {
?>
<body>
	<div class="sidebar">
		<h1>Admin Functions</h1>
		<a href="mainA.php"><i class="fas fa-home icon"></i>Home</a>
		<a href="add.php"><i class="fas fa-plus icon"></i>Add Music Concert</a>
		<a href="setQ.php"><i class="fas fa-chart-pie"></i> Set Music Concert Quota</a>
		<a href="view.php"><i class="fas fa-file-alt icon"></i>View Users</a>
		<a href="search.php"><i class="fas fa-users icon"></i>Search Users</a>
		<a href="delete.php"><i class="fas fa-trash-alt"></i> Delete Users</a>
		<a href="logoutA.php"><i class="fas fa-sign-out-alt icon"></i>Logout</a>
	</div>
	<div class="content">
		<h2>Search Registered User</h2>
		<p>Enter the desired user's id or username to see their full credentials </p>
        <p>Or enter their role to see who is a admin or a normal user</p>

        <form name="search" method="post" action="searchV.php" onsubmit="return validateForm()">

        <label for="id">User ID:</label>
        <input type="number" id="id" name="id" ><br><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" ><br><br>

        <label for="role">Role:</label>
        <input type="number" id="role" name="role" ><br><br>

        <input type="submit" value="Search User">
        </form>

        <script>
        function validateForm() {
        if ((document.search.id.value == "") && (document.search.username.value == "") && (document.search.role.value == "")) {
            alert("Atleast one field must be filled out");
            return false;
            }
        }
        </script>

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