
<?php




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webserverprogrammering";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM uploads";




session_start(); 


$fp = fopen('data.txt', 'a');
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$filename = basename($_FILES["fileToUpload"]["name"]);



//w3schools
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".<br>";
    $uploadOk = 1;
  } else {
    echo "File is not an image.<br>";
    $uploadOk = 0;
  }
}


//if (file_exists($target_file)) {
  //echo "Sorry, file already exists.";
 // $uploadOk = 0;
//}
//
//w3schools
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

//Från w3schools
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    fwrite($fp, '$_SESSION["username"] uploaded $filename');  
    fclose($fp);  
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.<br>";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

if($_SESSION["username"] == "holros") {
	$sql = "INSERT INTO uploads (filename, user, uploadtime, snuskig)
	VALUES ('$filename', '" . $_SESSION["username"] . "', NOW(), TRUE)";
	$conn->query($sql);
}
else{
  $sql = "INSERT INTO uploads (filename, user, uploadtime, snuskig) VALUES ('$filename', '" . $_SESSION["username"] . "', NOW(), FALSE)";
$result = $conn->query($sql);
}

echo "<p><a href='inlamning5.html'>Back</a></p>";

?>
