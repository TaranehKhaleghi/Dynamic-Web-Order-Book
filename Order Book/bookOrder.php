<html>
	<head><title> Order </title>
	</head>
	<body>  
		<?php
			$provinces = array("AB", "BC", "MB", "NB", "NL",
				"NS", "NT", "NU", "ON", "PE", "QC", "SK", "YT");
			$salesTaxes = array(0.05, 0.12, 0.13, 0.15, 0.15, 
				0.5, 0.15, 0.5, 0.13, 0.15, 0.14975, 0.11, 0.5);			
			$firstName = $_POST["fName"];
			$lastName = $_POST["lName"];
			$address = $_POST["stAddress"];
			$city = $_POST["city"];
			$provinceIndex = $_POST["province_code"]-1;
			$postalCode = $_POST["postalCode"];
			$phone = $_POST["phNumber"];
			$book1 = $_POST["book1"];
			$book2 = $_POST["book2"];
			$book3 = $_POST["book3"];
			
			$amount1 = number_format((float)$book1*31.76, 2, '.', '');
			$amount2 = number_format((float)$book2*30.13, 2, '.', '');
			$amount3 = number_format((float)$book3*22.19, 2, '.', '');
			$subtotal = $amount1 + $amount2 + $amount3;
			$salesTax = number_format((float)$salesTaxes[$provinceIndex]*$subtotal, 2, '.', '');
			$deliveryFee = 0.00;
			$deliveryTime = "";
			if ($subtotal <= 25) {
				$deliveryFee = number_format((float)3, 2, '.', '');
				$deliveryTime = "+1 day";
			}
			else if ($subtotal <= 50) {
				$deliveryFee = number_format((float)4, 2, '.', '');
				$deliveryTime = "+1 day";
			}
			else if ($subtotal <= 75) {
				$deliveryFee = number_format((float)5, 2, '.', '');
				$deliveryTime = "+3 days";
			}
			else {
				$deliveryFee = number_format((float)6, 2, '.', '');
				$deliveryTime = "+4 days";
			}
			$total = $subtotal + $salesTax + $deliveryFee;
			$today = date("Y-m-d");
			$deliveryDate = date("Y-m-d", strtotime($deliveryTime));
			
			function ValidateEntry($fName, $lName, $add, $city, $pCode, $phoneNbr, $book1, $item2, $item3) {
				$errormessage = "";
				
				if (empty($fName)) {
					$errormessage .= "The error occured: first name received is empty <br>";
				}
				else {
					if (preg_match("/^[a-z][a-z\s'-]{0,28}[a-z\s]$/i", $fName) != true) {
						$errormessage .= "The error occured: the first name received is of incorrect format<br>";
					}
				}
				if (empty($lName)) {
					$errormessage .= "The error occured: last name received is empty";
				}
				else {
					if (preg_match("/^[a-z][a-z\s'-]{0,28}[a-z\s]$/i", $lName) != true) {
						$errormessage .= "The error occured: the last name received is of incorrect format<br>";
					}
				}
				if (empty($add)) {
					$errormessage .= "The error occured: the address received is empty<br>";
				}
				
				if (empty($city)) {
					$errormessage .= "The error occured: city name received is empty";
				}
				else {
					if (preg_match("/^[a-z][a-z\s'-]{0,28}[a-z\s]$/i", $city) != true) {
						$errormessage .= "The error occured: the city name received is of incorrect format<br>";
					}
				}				
				if (empty($pCode)) {
					$errormessage .= "The error occured: the postal code received is empty";
				}
				else {
					if (preg_match("/^[a-z][0-9][a-z][\s]?[0-9][a-z][0-9]$/i", $pCode) != true) {
						$errormessage .= "The error occured: the postal name received is of incorrect format<br>";
					}
				}				
				if (empty($phoneNbr)) {
					$errormessage .= "The error occured: the phone number received is empty";
				}
				else {
					if (preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/", $phoneNbr) != true) {
						$errormessage .= "The error occured: the phone number received is of incorrect format<br>";
					}
				}
				
				return $errormessage;
			}
			
			if (ValidateEntry($firstName, $lastName, $address, $city, $postalCode, $phone, $book1, $book2, $book3) != ""){
				print(ValidateEntry($firstName, $lastName, $address, $city, $postalCode, $phone, $book1, $book2, $book3));
			}
			else {					
				print ("<h1>Receipt</h1>
				<p>Your order has been processed. Please verify the information.</p>
				
				Receipt generated on $today<br><br>			
			
				<h2>Shipping to:</h2>$firstName $lastName <br>$address<br>$city, $provinces[$provinceIndex], $postalCode<br>$phone<br><br>
				<p>----------------------------------------------------------------------------------------</p>
				<table>
					<tr>
						<th>Product</th>
						<th>Unit Price</th>
						<th>Quantity</th>
						<th>Amount</th>
					</tr>
					<tr>
						<td>THE KREMLIN CONSPIRACY</td>
						<td>$31.76</td>
						<td>$book1</td>
						<td>\$$amount1</td>
					</tr>
					<tr>
						<td>THE ROOM ON RUE AMELIE</td>
						<td>$30.13</td>
						<td>$book2</td>
						<td>\$$amount2</td>
					</tr>
					<tr>
						<td>MAGNOLIA TABLE</td>
						<td>$22.19</td>
						<td>$book3</td>
						<td>\$$amount3</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>Subtotal</td>
						<td>\$$subtotal</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>Sales Tax</td>
						<td>\$$salesTax</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>Delivery Fees</td>
						<td>\$$deliveryFee</td>
					</tr>
					<tr>
						<td><b>Total</b></td>
						<td></td>
						<td></td>
						<td>\$$total</td>
					</tr>
			</table><br><b>Expected delivery date:</b> $deliveryDate");}
		?>
	</body>
</html>