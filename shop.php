<?php
include ("./header.php");
// include('../config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Cake Catagory</title>
    <link rel="stylesheet" href="./user_css/shop_css.css">
    <!-- <link rel="stylesheet" href="../CSS/home_css.css"> -->

</head>

<body>
    <div class="heading_container">
        <div class="cake_heading" id="">
            <?php
            require_once ('./config.php');
            $select = "SELECT * FROM cake_shop_category1 WHERE category_id =" . $_GET['category'];
            $query = mysqli_query($conn, $select);
            while ($res = mysqli_fetch_assoc($query)) {
                echo $res['category_name'];
            }
            ?>
        </div>
    </div>
    <!--Cake Products using grid  -->

    <div class="grid_container">

        <?php
        require_once ('./config.php');
        $select = "SELECT * FROM cake_shop_product1 where product_category =" . $_GET['category'];
        $query = mysqli_query($conn, $select);
        while ($res = mysqli_fetch_assoc($query)) {
            ?>
            <!-- 1st product div start -->
            <div class="item1_container">

                <div class="prod_img_container">
                    <?php
                    $file_array = explode(', ', $res['product_image']);
                    ?>
                    <img class="cake_img1" src="./uploads/<?php echo $file_array[0]; ?>" class="img-fluid">
                </div>
                <div class="name_price_container">
                    <div id="p_name">
                        <?php echo $res['product_name']; ?>
                    </div>
                    <div class="price">&#8377;
                        <?php echo $res['product_price']; ?>
                    </div>
                </div>


                <div class="price_and_button_container">

                    <div class="order_button_container">
                        <button onclick="add_cart(<?php echo $res['product_id']; ?>)" class="button">Add to Cart</button>

                    </div>

                    <div class="order_button_container1">
                        <form action="item_detail.php?product=<?= $res['product_id']; ?>" method="post">
                            <button type="submit" class="det_button" name="dt">Details</button>
                            <input type="hidden" name="ct" value="<?= $_GET['category']; ?>">
                            <input type="hidden" name="pi" value="<?= $res['product_id']; ?>">


                        </form>
                    </div>
                </div>



            </div>
            <?php
        }
        ?>
        <!-- 1st product div end -->


    </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script>
        function add_cart(product_id) {
            $.ajax({
                url: 'fetch_cart.php',
                data: 'id=' + product_id,
                method: 'get',
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    $('.Ayaz').html(response.cart.length);
                    alert(response.message);
                }
            });
        }
    </script>




</body>

</html>