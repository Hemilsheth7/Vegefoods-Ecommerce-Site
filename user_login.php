<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "vegefoods";
	$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
$user = $_POST['uname'];
$pass = $_POST['pass'];
	$sql="SELECT * FROM user WHERE username='$user' AND password='$pass';";
	$result = mysqli_query($conn,$sql);
    	if($result->num_rows > 0)
    	{
       		header('Location: payment.php');	
    	}
	else
	{
		echo("Error logging in.The username or password does not match");
	}
	


$conn->close();
?>