<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css" />
    <title>Document</title>
</head>
<body>
    <a href="inlamning5.html">Back to homepage</a>
    <br>
    <form action="add-post.php" method="post"> 
        <input type="text" name="name" id="name" placeholder="name">
        <br>
        <br>
        <input type="text" name="email" id="email" placeholder="email">
        <br>
        <br>
        <input type="text" name="homepage" id="homepage" placeholder="homepage">
        <br>
        <br>
        <input type="text" name="comment" id="comment" placeholder="comment">
        <br>
        <br>
        <input type="submit" value="Submit" name="submit">


    </form>
    <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webserverprogrammering";
$conn = new mysqli($servername, $username, $password, $dbname);


// Kod här för att skapa HTML för alla rader i resultatet, en loop


$sql = "SELECT * FROM guestbook";
$result = $conn->query($sql);

$name = "";
$email = "";
$homepage = "";
$comment = "";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $email = $row["email"];
        $homepage = $row["homepage"];
        $comment = $row["comment"];
        $time = $row["time"];
        echo " <div> <p>$time</p> <p> $name </p><p> $email </p><p> $homepage </p><p> $comment </p> </div><br>";
        
    }
	}
    else {
    echo "Log in failed";

}


?>



</body>
</html>