<html lang="en-ca">
	<head>
		<!-- Meta Data -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Favicon -->
	    <link rel="apple-touch-icon" sizes="180x180" href="./fav/apple-touch-icon.png" />
	    <link rel="icon" type="image/png" sizes="32x32" href="./fav/favicon-32x32.png" />
	    <link rel="icon" type="image/png" sizes="16x16" href="./fav/favicon-16x16.png" />
	    <link rel="manifest" href="./fav/site.webmanifest" />
		<!-- Css style sheet -->
		<link rel="stylesheet"dfghj href="./css/style.css" />
		<title>Poutine Shop</title>
	</head>
	<body>
				<!-- Title, Info and image -->
		<center><?php 
			echo '<center><h1>Order some Poutine!</h1></center>';
			echo '<img src="./images/poutine.jpeg" width="30%"/>';
			echo "<p><center>Choose your size, toppings and drinks below!</center></p>"; 
		?>

			<br><br>

        <form method="POST"
					<!-- dropdown menu for sizes-->
					<label for="size">Size:</label>
					<select name="size" id="size">
	        	<optgroup label="Size">
							<option value="small">Small</option>
							<option value="medium">Medium</option>
							<option value="large">Large</option>
						</optgroup>
					</select>
					
					<br></br>
					<!-- checkboxes for toppings -->
            <input type="checkbox" value="bacon" name="bacon">Bacon
            <input type="checkbox" value="pulledPork" name="pulledPork">Pulled Pork
            <input type="checkbox" value="butterChicken" name="butterChicken">Butter Chicken
            <input type="checkbox" value="taterTots" name="taterTots">Tater Tots

					<br></br>
					<!-- Radio Buttons for drinks -->
            <input type="radio" value="no" name="no">no
            <input type="radio" value="yes" name="yes">yes

					<br></br>
					<!-- button for order -->
					<input type = "submit" name = "enter" value="Order">  
					<br></br>
				</form>

		<?php  
			if(isset($_POST['enter'])) {
				// declare constants
				define('HST', 0.13);
				define('SMALL_PRICE', 7.99);
				define('MEDIUM_PRICE', 12.49);
				define('LARGE_PRICE', 18.99);
				define('BACON_PRICE', 1);
				define('PULLEDPORK_PRICE', 3);
				define('BUTTERCHICKEN_PRICE', 3);
				define('TATERTOTS_PRICE', 1);
				define('DRINK_PRICE', 2);
				
				//declare variables
				$size = $_POST['size'];
				$sizes = 0;
				$bacon = 0;
				$pulledPork = 0;
				$butterChicken = 0;
				$taterTots = 0;
				$drink = 0;
				
				//IF small size is selected then set small price
				if ($size == "small") {
					$sizes = SMALL_PRICE;
				} 
				//IF medium size is selected then set medium price
				elseif ($size == "medium") {
					$sizes = MEDIUM_PRICE;
				}
				//IF large size is selected then set large price
				elseif ($size == "large") {
					$sizes = LARGE_PRICE;
				}

				//IF bacon is selected then set bacon price
				if(isset($_POST['bacon'])){
					$bacon = BACON_PRICE;
			} 
			//IF pulled pork is selected then set bacon price
			if(isset($_POST['pulledPork'])) {
					$pulledPork = PULLEDPORK_PRICE;	
			}
			//IF butter chicken is selected then set bacon price
				if(isset($_POST['butterChicken'])){
					$butterChicken = BUTTERCHICKEN_PRICE;
				}
				//IF tater tots is selected then set bacon price
				if(isset($_POST['taterTots'])){
					$taterTots = TATERTOTS_PRICE;
			}

			//IF drinks is selected then set drink price
				if(isset($_POST['yes'])){
					$drink = DRINK_PRICE;
			}
				
			//Calculations for subtotal, tax and total
				$subtotal = ($sizes + $bacon + $pulledPork + $butterChicken + $taterTots + $drink);
				$tax = $subtotal * HST;
				$total = $subtotal + $tax;
				
				//Display results
				echo "<p>Your subtotal is $" . round($subtotal, 2);
				echo "<p>Your tax is $" . round($tax, 2);
				echo "<p>Your total is $" . round($total, 2);
		}
		?>
	</body>
</html>