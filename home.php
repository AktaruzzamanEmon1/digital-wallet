<!DOCTYPE html>
<html>

<head>
<title>Conversion site</title>
</head>

<body>
<form>
	<table>
    
<h1>Page 1 [Home] </h1>
<h2>Digital Wallet</h2>

<?php
define("filepath", "data.txt");

$selectCategory = $phone = $amount = "";
$selectCategoryErr = $phoneErr = $amountErr = "";
$successfulMessage = $errorMessage = "";
$flag = false;

 if($_SERVER['REQUEST_METHOD'] === "POST") {
 	$selectCategory = $_POST['selectCategory'];
    $phone = $_POST['phone'];
    $amount = $_POST['amount'];

  if(empty($selectCategory)) {
$selectCategoryErr = "Please select a category";
$flag = true;
}

 if(empty($phone)) {
$phoneErr = "Please provide a phone number";
$flag = true;
}
if(empty($amount)) {
$amountErr = "Please provide an amount";
$flag = true;
}
if(!$flag) {
$selectCategory = test_input($selectCategory);
$phone = test_input($phone);
$amount = test_input($amount);
$data = $selectCategory . "," . $phone . "," . $amount;
$result1 = write($data);
if($result1) {
$successfulMessage = "Paid";
}
else {
$errorMessage = "Failed ";
}
}
}

 function write($content) {
$resource = fopen(filepath, "a");
$fw = fwrite($resource, $content . "\n");
fclose($resource);
return $fw;
}

 function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>
1. <a href="http://localhost/Lab/Lab-task/home.php">Home</a></a></h1> 2. <a href="https://localhost/Lab/Lab-task/history.php"> Transection History</a></a></h1>   

<h2>Fund Transfer: </h2>


<label for="Select Category:">Select Category:</label>
		<select id="Select Category:">
			<option value="Select Category:">Select Category:</option>
			<option value="mobile_recharge">mobile_recharge</option>
			<option value="send_money">send_money</option>
			<option value="merchant_pay">merchant_pay</option>
			
			
         
		</table>
		<br><br>
		
       <label for="phone">To:</label>
<input type="tel" id="phone" name="phone" >
			<br><br>
	<label for="Amount:">Amount:</label>
<input type="number" id="Amount" name="Amount"  min="1" max="5000000">
<br><br>
<input type="submit" value="Submit">

</form>
</body>
</html>



