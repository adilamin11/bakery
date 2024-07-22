<?php
session_start();
$id = $_GET['id'];
$response = array();

if (empty($_SESSION['cart'])) {
    $_SESSION['cart'][] = $id;
    $response['message'] = 'Item added to cart successfully.';
} else {
    if (in_array($id, $_SESSION['cart'])) {
        $response['message'] = 'Item is already in the cart.';
    } else {
        $_SESSION['cart'][] = $id;
        $response['message'] = 'Item added to cart successfully.';
    }
}

$response['cart'] = $_SESSION['cart'];
echo json_encode($response);
?>