<?php
	session_start();
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "vegefoods";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	
	function update_Bellpepper($quantity,$conn)
	{
		$sql="SELECT * FROM items WHERE item_name = 'Bellpepper'";
		$result = mysqli_query($conn,$sql);
		$item = $result->fetch_assoc();	
		$total = $item[availability] + $quantity;
		$sql = "UPDATE items SET availability = $total WHERE item_name = 'Bellpepper'";
		$result = mysqli_query($conn,$sql);
	}  
	function update_Carrot($quantity,$conn)
	{
		$sql="SELECT * FROM items WHERE item_name = 'Carrot'";
		$result = mysqli_query($conn,$sql);
		$item = $result->fetch_assoc();	
		$total = $item[availability] + $quantity;
		$sql = "UPDATE items SET availability = $total WHERE item_name = 'Carrot'";
		$result = mysqli_query($conn,$sql);
	}
	function update_Strawberry($quantity,$conn)
	{
		$sql="SELECT * FROM items WHERE item_name = 'Strawberry'";
		$result = mysqli_query($conn,$sql);
		$item = $result->fetch_assoc();	
		$total = $item[availability] + $quantity;
		$sql = "UPDATE items SET availability = $total WHERE item_name = 'Strawberry'";
		$result = mysqli_query($conn,$sql);
	}
	$user = $_SESSION['user'];
	
	$sql="SELECT * FROM user WHERE username='$user'";
	$result = mysqli_query($conn,$sql);
	$mail = $result->fetch_assoc();
	
	$sql = "SELECT * FROM `cart` WHERE `username` = '$user'";
	$result = mysqli_query($conn,$sql);
	$num_row = mysqli_num_rows($result);
	while ($row = $result->fetch_assoc()) {
		  $id[] = $row['ID'];
          $item_name[] = $row['item_name'];
          $quantity[] = $row['quantity'];
          $date[] = $row['date'];
    }
	if(isset($_POST["delete_one"]))
	{
		mail($mail['email'],'Order Cancelation from Vegefoods',"Your Order has been cancelled successfully. For follwing details(Product Name, Quantity, Order Date) '".$item_name[0]."'   '".$quantity[0]."'   '".$date[0]."'");
		$sql = "DELETE FROM `cart` WHERE `ID` = $id[0]";
		$result = mysqli_query($conn,$sql); 
		if ($item_name[0] == 'Bellpepper'){
			update_Bellpepper($quantity[0],$conn);
		}
		else if($item_name[0] == 'Strawberry'){
			update_Strawberry($quantity[0],$conn);
		}
		else{
			update_Carrot($quantity[0],$conn);
		}
		header('location: order.php');
	}
	if(isset($_POST["delete_two"]))
	{
		mail($mail['email'],'Order Cancelation from Vegefoods',"Your Order has been cancelled successfully. For follwing details(Product Name, Quantity, Order Date) '".$item_name[1]."'   '".$quantity[1]."'   '".$date[1]."'");
		$sql = "DELETE FROM `cart` WHERE `ID` = $id[1]";
		$result = mysqli_query($conn,$sql);
		if ($item_name[1] == 'Bellpepper'){
			update_Bellpepper($quantity[1],$conn);
		}
		else if($item_name[1] == 'Strawberry'){
			update_Strawberry($quantity[1],$conn);
		}
		else{
			update_Carrot($quantity[1],$conn);
		}
		header('location: order.php');
	}
	if(isset($_POST["delete_three"]))
	{
		mail($mail['email'],'Order Cancelation from Vegefoods',"Your Order has been cancelled successfully. For follwing details(Product Name, Quantity, Order Date) '".$item_name[2]."'   '".$quantity[2]."'   '".$date[2]."'");
		$sql = "DELETE FROM `cart` WHERE `ID` = $id[2]";
		$result = mysqli_query($conn,$sql);
		if ($item_name[2] == 'Bellpepper'){
			update_Bellpepper($quantity[2],$conn);
		}
		else if($item_name[2] == 'Strawberry'){
			update_Strawberry($quantity[2],$conn);
		}
		else{
			update_Carrot($quantity[2],$conn);
		}
		header('location: order.php');
	}
	if(isset($_POST["delete_four"]))
	{
		mail($mail['email'],'Order Cancelation from Vegefoods',"Your Order has been cancelled successfully. For follwing details(Product Name, Quantity, Order Date) '".$item_name[3]."'   '".$quantity[3]."'   '".$date[3]."'");
		$sql = "DELETE FROM `cart` WHERE `ID` = $id[3]";
		$result = mysqli_query($conn,$sql);
		if ($item_name[3] == 'Bellpepper'){
			update_Bellpepper($quantity[3],$conn);
		}
		else if($item_name[3] == 'Strawberry'){
			update_Strawberry($quantity[3],$conn);
		}
		else{
			update_Carrot($quantity[3],$conn);
		}
		header('location: order.php');
	}
	if(isset($_POST["delete_five"]))
	{
		mail($mail['email'],'Order Cancelation from Vegefoods',"Your Order has been cancelled successfully. For follwing details(Product Name, Quantity, Order Date) '".$item_name[4]."'   '".$quantity[4]."'   '".$date[4]."'");
		$sql = "DELETE FROM `cart` WHERE `ID` = $id[4]";
		$result = mysqli_query($conn,$sql);
		if ($item_name[4] == 'Bellpepper'){
			update_Bellpepper($quantity[4],$conn);
		}
		else if($item_name[4] == 'Strawberry'){
			update_Strawberry($quantity[4],$conn);
		}
		else{
			update_Carrot($quantity[4],$conn);
		}
		header('location: order.php');
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+91 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">vegefoods@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Vegefoods</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
            <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
            <?php
				if(isset($_SESSION['user']))
				{
					?>
					<li class="nav-item dropdown">
					  <a class="nav-link dropdown-toggle" href="#" id="username" data-toggle="dropdown"1 aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user'];?></a>
					  <div class="dropdown-menu" aria-labelledby="username">					  
						<a class="dropdown-item" href="order.php">My Order</a>
						<a class="dropdown-item" href="logout.php">Logout</a>
					  </div>
					</li>
					<?php
				}
				else
				{
					?>
					<li class="nav-item cta cta-colored"><a href="login.php" class="nav-link">Login</a></li>
					<?php
				}
			?>
          </ul>
	      </div>
	    </div>
	  </nav>
    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">My Order</h2> 
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">	
				<table width="100%,100%,100%,100%" border="1" class="heading-section text-center ftco-animate">
					<form method="post">
						<tr >
							<td>PRODUCT</td>
							<td>QUANTITY</td>
							<td>DATE</td>
							<td>ORDER</td>						
						</tr>
						<tr>
							<?php if ($num_row >= 1){ ?>
								<td><?php echo $item_name[0];?></td>
								<td><?php echo $quantity[0];?></td>
								<td><?php echo $date[0];?>	</td>
								<td><Button name="delete_one" class="btn btn-danger py-2 px-4" text="Cancel">Cancel</button></td>
							<?php }?>
						</tr>
						<tr>
							<?php if ($num_row >= 2){ ?>
								<td><?php echo $item_name[1];?></td>
								<td><?php echo $quantity[1];?></td>
								<td><?php echo $date[1];?></td>
								<td><Button name="delete_two" class="btn btn-danger py-2 px-4" text="Cancel">Cancel</button></td>
							<?php }?>
						</tr>
						<tr>
							<?php if ($num_row >= 3){ ?>
								<td><?php echo $item_name[2];?></td>
								<td><?php echo $quantity[2];?></td>
								<td><?php echo $date[2];?></td>
								<td><Button name="delete_three" class="btn btn-danger py-2 px-4" text="Cancel">Cancel</button></td>
							<?php }?>
						</tr>
						<tr>
							<?php if ($num_row >= 4){ ?>
								<td><?php echo $item_name[3];?></td>
								<td><?php echo $quantity[3];?></td>
								<td><?php echo $date[3];?></td>
								<td><Button name="delete_four" class="btn btn-danger py-2 px-4" text="Cancel">Cancel</button></td>
							<?php }?>
						</tr>
						<tr>
							<?php if ($num_row >= 5){ ?>
								<td><?php echo $item_name[4];?></td>
								<td><?php echo $quantity[4];?></td>
								<td><?php echo $date[4];?></td>
								<td><Button name="delete_five" class="btn btn-danger py-2 px-4" text="Cancel">Cancel</button></td>
							<?php }?>
						</tr>
					</form>
				</table>			
    		</div>
    	</div>
    </section>

	
    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
			</div>      
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  <script>
		function cartbtn()
		{
			document.getElementById("cart").click();
		}
		
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>