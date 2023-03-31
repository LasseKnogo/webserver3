<?php
session_start();
if (isset($_SESSION["username"])) {
    echo "<p>You are signed in as " . $_SESSION["username"] . "</p>";
}
else {
    echo "<p>Not Signed in!</p>";
}
echo "<a href='inlamning5.html'>Back</a>";
?>