<?php  
	session_start();
    $host = 'localhost:3306';  
    $user = 'root';  
    $pass = '';  
    $dbname = 'vegefoods';  
      
    $conn = mysqli_connect($host, $user, $pass,$dbname);  
    if(!$conn){  
      die('Could not connect: '.mysqli_connect_error());  
    }  
						
    // echo 'Connected successfully<br/>'; 	
    if(isset($_POST["submit"]))
	{   
		$fname = $_POST['first-name']; $lname = $_POST['last-name']; $address = $_POST['streetaddress'];  $city = $_POST['city'];   
		$zipcode = $_POST['zipcode'];	$email = $_POST['email'];
		$username = $_SESSION['user'];
		$sql= "INSERT INTO user_add VALUES('$username','$fname','$lname','$address','$city','$zipcode','$email')";
		if(mysqli_query($conn, $sql))
		{  
			if (mail($email,"Confirmation from Vegefoods",'ORDER PLACED SUCESSFULLY! YOU WILL RECEIVE YOUR ORDER WITHIN 1-2 DAYS'))
			{
					if(isset($_SESSION["Strawberry_quant"]))
					{
						$sql1="SELECT * FROM items WHERE item_name='Strawberry'";
						$result = mysqli_query($conn,$sql1);
						$row = $result->fetch_assoc();
						$Straw_pro = $row["availability"] - $_SESSION["Strawberry_quant"];
						$sql2="UPDATE items SET availability='$Straw_pro' WHERE item_name='Strawberry'";
						mysqli_query($conn, $sql2);
						$sql3="INSERT INTO cart (username,item_name,quantity) VALUES('$username','Strawberry','".$_SESSION['Strawberry_quant']."')";
						mysqli_query($conn, $sql3);
					}
					if(isset($_SESSION["Carrot_quant"]))
					{
						$sql1="SELECT * FROM items WHERE item_name='Carrot'";
						$result = mysqli_query($conn,$sql1);
						$row = $result->fetch_assoc();
						$Carrot_pro = $row["availability"] - $_SESSION["Carrot_quant"];
						$sql2="UPDATE items SET availability='$Carrot_pro' WHERE item_name='Carrot'";
						mysqli_query($conn, $sql2);
						$sql3="INSERT INTO cart (username,item_name,quantity) VALUES('$username','Carrot','".$_SESSION['Carrot_quant']."')";
						mysqli_query($conn, $sql3);
					}
					if(isset($_SESSION["Bellpepper_quant"]))
					{
						$sql1="SELECT * FROM items WHERE item_name='Bellpepper'";
						$result = mysqli_query($conn,$sql1);
						$row = $result->fetch_assoc();
						$Bellpepper_pro = $row["availability"] - $_SESSION["Bellpepper_quant"];
						$sql2="UPDATE items SET availability='$Bellpepper_pro' WHERE item_name='Bellpepper'";
						mysqli_query($conn, $sql2);
						$sql3="INSERT INTO cart (username,item_name,quantity) VALUES('$username','Bellpepper','".$_SESSION['Bellpepper_quant']."')";
						mysqli_query($conn, $sql3);
					}				
				header('location: py_sucessful.html');
			}
		}
		else
		{  
			echo "Could not insert record: ". mysqli_error($conn);  
		} 		 
	}
    mysqli_close($conn);  
?> 
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>VEGEFOODS</title>
  <link rel="stylesheet" href="./style.css">
  <style>
	#column-left {
		width: 45.8% !important;
	}
  </style>
</head>
<body>
<!-- partial:index.partial.html -->

  <form action="" method="post" height="">
    <div class="form-container">
      <div class="personal-information">
        <h1>Payment Information</h1>
      </div> <!-- end of personal-information -->
           
          <input id="column-left" type="text" name="first-name" placeholder="First Name"/ >
          <input id="column-right" type="text" name="last-name" placeholder="Surname"/>
          <input id="input-field" type="text" name="number" placeholder="Card Number"/>
          <input id="column-left" type="text" name="expiry" placeholder="MM / YY"/>
          <input id="column-right" type="text" name="cvc" placeholder="CCV"/>
         
          <div class="card-wrapper"></div>
      
          <input id="input-field" type="text" name="streetaddress" required="required" autocomplete="on" maxlength="45" placeholder="Streed Address"/>
          <input id="column-left" type="text" name="city" required="required" autocomplete="on" maxlength="20" placeholder="City"/>
          <input id="column-right" type="text" name="zipcode" required="required" autocomplete="on" pattern="[0-9]*" maxlength="6" placeholder="ZIP code"/>
          <input id="input-field" type="email" name="email" required="required" autocomplete="on" maxlength="40" placeholder="Email"/>
          <input id="input-button" type="submit" name="submit" value="Submit"/>
        
    </form>
  </div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/card.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/jquery.card.js'></script><script  src="./script.js"></script>

</body>
</html>
