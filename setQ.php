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
		<h2>Set Music Concert Quota</h2>
		<p>Where you can retroactively change the concert quota</p>

        <form name="set" method="post" action="setQV.php" onsubmit="return validateForm()">
        <label for="event_id">Event ID:</label>
        <input type="text" id="event_id" name="event_id" required><br><br>

        <label for="event_quota">Event Quota:</label>
        <input type="number" id="event_quota" name="event_quota" min="1" required><br><br>

        <input type="submit" value="Set Quota">
        </form>

        <script>
        function validateForm() {
        if ((document.set.event_id.value == "") ||(document.set.event_quota.value == "")) {
            alert("All fields must be filled out");
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