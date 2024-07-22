<?php
$i = $_GET['val_i'];
session_start();
unset($_SESSION['cart'][$i]);
$_SESSION['cart'] = array_values($_SESSION['cart']);

echo "<script>
	alert('Item Removed.');
	location.assign('./cart.php');
	</script>";
?>