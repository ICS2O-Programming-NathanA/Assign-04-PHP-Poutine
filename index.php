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


					<!-- dropdown menu -->
								<label for="size">Size:</label>
				<select name="size" id="size">
        	<optgroup label="Size">
						<option value="small">Small</option>
						<option value="medium">Medium</option>
						<option value="large">Large</option>
					</optgroup>
				</select>
					
					<br></br>
					<!-- checkboxes -->
            <input type="checkbox" value="bacon" name="bacon">bacon
            <input type="checkbox" value="pulledPork" name="pulledPork">Pulled Pork
            <input type="checkbox" value="butterChicken" name="butterChicken">Butter Chicken
            <input type="checkbox" value="taterTots" name="taterTots">Tater Tots

					<br></br>
					<!-- Radio Buttons -->
            <input type="radio" value="no" name="no">no
            <input type="radio" value="yes" name="yes">yes

				<br></br>
			<input type = "submit" name = "enter" value="Calculate">  
			<br></br>
				</form>

		<?php  
			if(isset($_POST['enter'])) {
				// declare constants
				define('HST', 0.13);
				//declare variables
				$size = $_POST['size'];
				$sizes = 0;
				$bacon = 0;
				$pulledPork = 0;
				$butterChicken = 0;
				$taterTots = 0;
				$drink = 0;
				
				// IF statements
				if ($size == "small") {
					$sizes = 7.99;
				} 
				elseif ($size == "medium") {
					$sizes = 12.49;
				}
				elseif ($size == "large") {
					$sizes = 18.99;
				}
				
				if(isset($_POST['bacon'])){
					$bacon = 1;
			} if(isset($_POST['pulledPork'])) {
					$pulledPork = 3;	
			}
				if(isset($_POST['butterChick'])){
					$butterChicken = 3;
				}
				if(isset($_POST['taterTots'])){
					$taterTots = 1;
			}
				if(isset($_POST['yes'])){
					$drink = 2;
			}
				$subtotal = ($sizes + $bacon + $pulledPork + $butterChicken + $taterTots + $drink);
				$tax = $subtotal * HST;
				$total = $subtotal + $tax;
				echo "<p>Your subtotal is $" . round($subtotal, 2);
				echo "<p>Your tax is $" . round($tax, 2);
				echo "<p>Your total is $" . round($total, 2);
		}
		?>
	</body>
</html>