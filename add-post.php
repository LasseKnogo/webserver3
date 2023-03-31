<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webserverprogrammering";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM guestbook";

$name = $_POST["name"];
$email = $_POST["email"];
$homepage = $_POST["homepage"];
$comment = $_POST["comment"];
$sql = "INSERT INTO Guestbook (name, email, homepage, comment, time) VALUES ('$name', '$email', '$homepage', '$comment', now())";
$conn->query($sql);

header("location: form.php");


?>