
<?php
session_start();
	
$username = $_SESSION['username'];
$msg = $_REQUEST['msg'];

require("db/db.php");

mysqli_query($con, "INSERT INTO logs(username, msg) VALUES('$username','$msg')");

$result = mysqli_query($con, "SELECT * FROM logs ORDER BY id DESC LIMIT 0, 10");
while($row=mysqli_fetch_array($result)){

echo "<span class='uname'>" . $row['username'] . "</span>: <span class='msg'>" . $row['msg'] . "</span></br></br>";

}
mysqli_close($con);
?>
