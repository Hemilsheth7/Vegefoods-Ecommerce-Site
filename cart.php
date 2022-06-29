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
	
	// $sql="SELECT * FROM items WHERE item_name='Carrot'";
	// $result = mysqli_query($conn,$sql);
	// $row = $result->fetch_assoc();
	// $conn->close();
	
	// if(isset($_POST["cart"]))
	// {	
		// if(isset($_SESSION['user']))
		// {
			// $_SESSION["Carrot_pro"] = "Carrot";
			// $_SESSION["Carrot_quant"] = $_POST["quantity"];
			// $_SESSION["Carrot_img"] = "images/product-7.jpg";
			// header('Location: cart.php');	
		// }
		// else
		// {
			// echo "<script>alert('To proceed with cart Login please!');</script>";
		// }
	// }
	
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
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
						    <span class="text"vegefoods@email.com</span>
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
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
							
								
								  <tr class="text-center" id="Bellpepper_row">
									<td class="product-remove"><a href="clearcart.php"><span class="ion-ios-close"></span></a></td>						        
									<td class="image-prod"><div class="img" style="background-image:url('<?php echo $_SESSION["Bellpepper_img"];?>');"></div></td>
									<td class="product-name">
										<h3><?php echo $_SESSION["Bellpepper_pro"];?></h3>						        	
									</td>						        
									<td class="price">Rs.80.00</td>						        
									<td class="quantity">
										<div class="input-group mb-3">
										<input type="text" name="Bellpepper_quantity" id="Bellpepper_quantity" class="quantity form-control input-number" value=" <?php echo $_SESSION["Bellpepper_quant"];?> " min="1" max="100">
										</div>
									</td>						        
									<td class="total" name="Bellpepper_total" id="Bellpepper_total"></td>
									<input id="Bellpepper_t" value="0" hidden />
								  </tr>
							
							  
										<tr class="text-center" id="Carrot_row">
										<td class="product-remove"><a href="clearcart.php"><span class="ion-ios-close"></span></a></td>						        
										<td class="image-prod"><div class="img" style="background-image:url('<?php echo $_SESSION["Carrot_img"];?>');"></div></td>
										<td class="product-name">
											<h3><?php echo $_SESSION["Carrot_pro"];?></h3>						        	
										</td>						        
										<td class="price">Rs.120.00</td>						        
										<td class="quantity">
											<div class="input-group mb-3">
											<input type="text" name="Carrot_quantity" id="Carrot_quantity" class="quantity form-control input-number" value=" <?php echo $_SESSION["Carrot_quant"];?> " min="1" max="100">
											</div>
										</td>						        
										<td class="total" name="Carrot_total" id="Carrot_total" ></td>
										<input id="Carrot_t" value="0" hidden />
									  </tr> 
							  
								
									  <tr class="text-center" id="Strawberry_row" >
										<td class="product-remove"><a href="clearcart.php"><span class="ion-ios-close"></span></a></td>						        
										<td class="image-prod"><div class="img" style="background-image:url('<?php echo $_SESSION["Strawberry_img"];?>');"></div></td>
										<td class="product-name">
											<h3><?php echo $_SESSION["Strawberry_pro"];?></h3>						        	
										</td>						        
										<td class="price">Rs.120.00</td>						        
										<td class="quantity">
											<div class="input-group mb-3">
											<input type="text" name="Strawberry_quantity" id="Strawberry_quantity" class="quantity form-control input-number" value=" <?php echo $_SESSION["Strawberry_quant"];?> " min="1" max="100">
											</div>
										</td>						        
										<td class="total" id="Strawberry_total" name="Strawberry_total"></td>
										<input id="Strawberry_t" value="0" hidden />
									  </tr>
								
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>    
			
    			<center>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span id="subtotal"></span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>Rs.20.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>Rs.10.00</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span id="total"></span>
    					</p>
    				</div>
    				<p><a href="payment.php" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>
			</div>
      </center>
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
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Vegefoods</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
                <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                  <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                  <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                  <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                  <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                </ul>
                <ul class="list-unstyled">
                  <li><a href="#" class="py-2 d-block">FAQs</a></li>
                  <li><a href="#" class="py-2 d-block">Contact</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <!--<p> Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. 
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
               Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. 
            </p>-->
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
		<?php
			if(!isset($_SESSION["Strawberry_pro"]))
			{	
				echo "document.getElementById('Strawberry_row').style.display = 'none';";	
			}
			else
			{				
				$q = $_SESSION["Strawberry_quant"];
				$t = $q *120;
				echo "document.getElementById('Strawberry_t').value=$t;";
				echo "document.getElementById('Strawberry_total').innerHTML = 'RS $t.00';";
			}
			
			if(!isset($_SESSION["Carrot_pro"]))
			{
				echo "document.getElementById('Carrot_row').style.display = 'none';";
			}
			else
			{				
				$q = $_SESSION["Carrot_quant"];
				$t = $q *120;
				echo "document.getElementById('Carrot_t').value=$t;";
				echo "document.getElementById('Carrot_total').innerHTML = 'RS $t.00';";
			}
			
			if(!isset($_SESSION["Bellpepper_pro"]))
			{
				echo "document.getElementById('Bellpepper_row').style.display = 'none';";
			}
			else
			{
				$q = $_SESSION["Bellpepper_quant"];
				$t = $q *80;
				echo "document.getElementById('Bellpepper_t').value=$t;";
				echo "document.getElementById('Bellpepper_total').innerHTML = 'RS $t.00';";
			}	
			echo "var subtotal = parseInt(document.getElementById('Strawberry_t').value)+parseInt(document.getElementById('Bellpepper_t').value)+parseInt(document.getElementById('Carrot_t').value);";
			echo "document.getElementById('subtotal').innerHTML = 'Rs.' + subtotal +'.00';";
			echo "var total = subtotal+10;";
			echo "document.getElementById('total').innerHTML = 'Rs.' + total+'.00';";
		?>
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