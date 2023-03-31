<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webserverprogrammering";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!<br>";

$login_success = false;
$full_name = "";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		if($row["userId"] == $_POST["username"] &&
					$row["passwd"] == $_POST["password"]) {
			$login_success = true;
			$full_name = $row["firstname"] . " " .
					$row["lastname"];
                    echo "id: " . $row["id"]. " - Namn: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                    } 
	}
} else {
    echo "Log in failed";

}

$conn->close();
if($login_success=true) {
    session_start();
    $_SESSION["username"] = $_POST["username"];
}
echo "<a href='inlamning5.html'>Back</a><br>";
header("location: inlamning5.html");
?>



