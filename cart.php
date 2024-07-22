<?php
include("./header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="./user_css/cart_css.css">
</head>

<body>

    <div class="parent_container">

        <div class="mian_title_container">
            <h3 id="title">My Cart</h3>
        </div>
        <div class="table_container">
            <table>
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <form method="post" action="insert_orders.php">
                    <tbody>
                        <?php
                        if ($printCount == 0) {
                            ?>
                            <tr>
                                <td colspan="6" align="center">Your cart is empty!</td>
                            </tr>
                        <?php } else { ?>
                            <?php
                            $total_amount = 0;
                            require_once('config.php');
                            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                                $select = "SELECT * FROM cake_shop_product1 where product_id = {$_SESSION['cart'][$i]}";
                                $query = mysqli_query($conn, $select);
                                $j = $i;
                                while ($res = mysqli_fetch_assoc($query)) {
                                    $total_amount = $total_amount + $res['product_price'];
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo ++$j; ?>
                                        </td>
                                        <td>
                                            <?php echo $res['product_name']; ?><input type="hidden" name="hidden_product_name[]"
                                                value="<?php echo $res['product_name']; ?>">
                                        </td>
                                        <td>Rs.
                                            <?php echo $res['product_price']; ?><input type="hidden" name="hidden_product_price[]"
                                                value="<?php echo $res['product_price']; ?>">
                                        </td>
                                        <td><input  type="number" min="1" max="9" step="1" value="1"
                                                name="product_quantity[]" onchange="prodTotal(this)"></td>
                                        <td><span>Rs.
                                                <?php echo $res['product_price'] * 1; ?>
                                            </span><input type="hidden" name="hidden_product_total[]"
                                                value="<?php echo $res['product_price']; ?>">
                                        </td>
                                        <td align="center"><a class="btn btn-outline-danger" href="remove_product.php?val_i=<?php echo $i; ?>">REMOVE</a></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <tr>
                            <td colspan="4" align="right">Total Amount:</td>
                            <td colspan="2" id="total_amount"><span>Rs.
                                    <?php if ($printCount == 0) {
                                        echo 0;
                                    } else {
                                        echo $total_amount;
                                    } ?>
                                </span><input type="hidden" name="hidden_total_amount"
                                    value="<?php echo $total_amount; ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                Delivery Date:<input type="date" name="delivery_date" required="">
                            </td>
                            <td colspan="3">
                                Payment Method:<select  name="payment_method">
                                    <option>Cash</option>
                                    <option>Card</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" align="right">
                                <button class="btn btn-warning" onclick="clear_cart()">Clear</button>
                                <button class="btn btn-primary" type="submit">Checkout</button>
                            </td>
                        </tr>
                    </tbody>
                </form>
            </table>
        </div>
    </div>



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/main-js.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script>
        function add_cart(product_id) {
            $.ajax({
                url: 'fetch_cart.php',
                data: 'id=' + product_id,
                method: 'get',
                dataType: 'json',
                success: function (cart) {
                    console.log(cart);
                    $('.badge').html(cart.length);
                }
            });
        }
        function prodTotal(quantity) {
            var price = $(quantity).parent().prev().find('input').val();
            var total = quantity.value * price;
            $(quantity).parent().next().find('input').val(total);
            $(quantity).parent().next().find('span').html("Rs. " + total);
            var total_amount = 0;
            $('input[name="hidden_product_total[]"]').each(function () {
                total_amount += parseInt($(this).val());
            });
            $('#total_amount').find('span').html("Rs. " + total_amount);
            $('#total_amount').find('input').val(total_amount);
        }
        function clear_cart() {
            var flag = confirm("Do you want to clear cart?");
            if (flag) {
                window.location.href = "clear_cart.php";
            }
        }
    </script>
</body>

</html>