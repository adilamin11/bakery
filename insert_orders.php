<?php
require_once('./config.php');
session_start();
function generateBill($delivery_date, $payment_method, $total_amount, $product_name, $quantity, $price, $total) {
    // Generate the bill content
    $bill = "Delivery Date: $delivery_date\n";
    $bill .= "Payment Method: $payment_method\n\n";
    $bill .= "Products:\n";
    for ($i = 0; $i < count($product_name); $i++) {
        $bill .= "Product: " . $product_name[$i] . ", Quantity: " . $quantity[$i] . ", Price: " . $price[$i] . ", Total Price: " . $total[$i] . "\n";
    }
    $bill .= "\nTotal Amount: $total_amount";

    return $bill;
}
if (isset($_SESSION['cart']) && $_SESSION['cart'] !== null) {
if (isset($_SESSION['login'])){
	$username = $_SESSION['uname'];
	$users_id = $_SESSION['user_users_id'];
	$product_name = $_POST['hidden_product_name'];
    $price = $_POST['hidden_product_price'];
    $quantity = $_POST['product_quantity'];
    $total = $_POST['hidden_product_total'];
    $total_amount = $_POST['hidden_total_amount'];
    $delivery_date = $_POST['delivery_date'];
    $payment_method = $_POST['payment_method'];
    $insert_orders = "INSERT INTO cake_shop_orders1 (users_id, delivery_date, payment_method, total_amount) values ('$users_id', '$delivery_date', '$payment_method', '$total_amount')";
    mysqli_query($conn, $insert_orders);
    $orders_id = mysqli_insert_id($conn);
    for ($i=0; $i < count($product_name); $i++) { 
    	$insert_orders_detail = "INSERT INTO cake_shop_orders_detail1 (orders_id, product_name, quantity) values ('$orders_id', '$product_name[$i]', '$quantity[$i]')";
    	mysqli_query($conn, $insert_orders_detail);
    }
	$bill = generateBill($delivery_date, $payment_method, $total_amount, $product_name, $quantity, $price, $total);

    // Set filename for the bill
    $filename = 'bill.txt';


    if (file_put_contents($filename, $bill) !== false) {
        unset($_SESSION['cart']);
        echo '<script>
		alert("Your order has been placed successfully!");
		</script>';

    } else {
        // If writing to file fails, handle the error
        echo "Failed to create the bill file.";
    }
} else {
	echo "<script>
	alert('Please login!!!');
	location.assign('./log_in.php');
	</script>";
}
} else {
	echo "<script>
	alert('Please select a product!!!');
	location.assign('cart.php');
	</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You</title>
	<style>
		*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.body_container{
    height: 100vh;
    width: 98vw;
    display: flex;
    justify-content: center;
    align-items: center;
    
}
.mid_container{
	height: 60%;
	width:60% ;

}
h1,h3{
	width: 50%;
	height: 10%;
}

.order_button_container1{
    border: 0px solid rgb(6, 8, 10);
    display: flex;
    justify-content: center;
    align-items: center;
    width: 25%;
    height: 20%;
    
}
.button{
	text-decoration: none;
    font-size: 14px;
    color:white;
    height:30px;
    width: 140px;
    cursor: pointer;
    border: 0px;
    border-radius: 8px;
    background-color: #00cc66;
    font-family:Arial, Helvetica;
   
}
.button1{
	text-decoration: none;
    font-size: 14px;
    color: white;
    height:30px;
    width: 140px;
    cursor: pointer;
    border: 0px;
    border-radius: 8px;
    background-color: #33ccff;
    font-family:Arial, Helvetica;
   
}
a{
    text-decoration: none;
}

	</style>
</head>
<body>
	<div class="body_container">
		<div class="mid_container">

		
    <h1>Thank You for Your Order!</h1>
	
    <h3>Your order has been successfully placed.</h3>
	<br>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
       
		<button  class="button"> <a href="bill.txt" download>Download Bill</a></button>

    <?php endif; ?>
	<button  class="button1"> <a href="home.php" >Home</a></button>
	</div>

	</div>
</body>
</html>