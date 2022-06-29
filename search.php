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
	$search1 = $_POST['search'];
	
	$search1 = strtolower($search1);
	$search1 = str_replace(' ', '', $search1);
	
	
	$sql="SELECT * FROM items WHERE item_name='$search1'";
	$result = mysqli_query($conn,$sql);
    if($result->num_rows > 0)
    {
       	if($search1 == "bellpepper")
		{
			header('Location: Bellpepper.php');	
		}
		elseif($search1 == "carrot"){
			header('Location: Carrot.php');	
		}
		elseif($search1 == "strawberry"){
			header('Location: Strawberry.php');	
		}
		else{
			header('Location: notavailable.php');	
		}
		// greenbean and tomato pages to be created
    }
	else
	{
		header('Location: notavailable.php');	
	}
	


$conn->close();
?>