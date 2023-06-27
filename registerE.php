<!DOCTYPE html>
<html>
<head>
	<title>Event Registration</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        session_start();

        if(isset($_SESSION["username"]))
        {
    ?>
	<div class="header">
		<h1>Event Registration Form</h1>
	</div>
	<div class="content">
		<p>Welcome, [username]!</p>
		<p>Please select an event to register:</p>
		<form action="insertE.php" method="post">
			<label for="eventID">Event:</label>
			<select id="eventID" name="eventID" required>
				<option value="">Select an event</option>
				<?php
				// Connect to the database
				$host = "localhost";
				$user = "root";
				$password = "";
				$dbname = "music";

				$conn = mysqli_connect($host, $user, $password, $dbname);

				// Check connection
				if (!$conn) {
				    die("Connection failed: " . mysqli_connect_error());
				}

				// Fetch events from database
				$sql = "SELECT * FROM event";
				$result = mysqli_query($conn, $sql);

				// Display event options
				if (mysqli_num_rows($result) > 0) {
				    while($row = mysqli_fetch_assoc($result)) {
				        echo '<option value="' . $row["eventID"] . '">' . $row["name"] . '</option>';
				    }
				} else {
				    echo "No events found.";
				}

				// Close database connection
				mysqli_close($conn);
				?>
			</select>
			<br><br>
			<input type="submit" value="Register">
		</form>
		<br><br>
	</div>
    <?php
        }
        else{
            echo "No Session exist or session has expired. Please log in again.";
            echo "<h3><a href='login.php'>Try again</a></h3>";
        }
    ?>
</body>
</html>

