<?php
include("./header.php")
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="./user_css/details_css.css">
</head>

<body>
    <div class="parent_container">
        <?php
        if(isset($_POST['dt'])){
        require_once('./config.php');
        $product_id = $_POST['pi'];
        $cat=$_POST['ct'];
        $select = "SELECT * FROM cake_shop_product1 where product_id = $product_id";
        $query = mysqli_query($conn, $select);
        $res = mysqli_fetch_assoc($query);
        ?>
        <div class="mian_title_container">
            <h3 id="title">Details</h3>
        </div>
        <div class="big_container">
            <div class="info_container">
            <?php
                    $file_array = explode(', ', $res['product_image']);
                    ?>
                <div class="prod_img_container">
                    <!-- <img class="" src="./Image/ds1.jpg" alt="img"> -->
                     <?php
                                for ($i = 0; $i < count($file_array); $i++) {
                                    ?>
                                    <div> 
                                        <img class="main_image"  src="uploads/<?php echo $file_array[$i]; ?>"
                                            alt="slide<?php echo $i; ?>">
                                    </div>
                                <?php } ?>
                </div>
                <div class="combine_container">
                    <div class="item_name_conta">
                        <h3 class="p_name"><?php echo $res['product_name']; ?></h3>
                    </div>
                    <div class="item_price">
                      Rs.<?php echo $res['product_price']; ?>
                    </div>
                    <div class="description">
                        <h5 class="d_title">Descriptions</h5>
                    <p class="itm_dtl_desc"><?php echo $res['product_description']; ?></p>
                    
                    </div>
                    <div class="order_button_container">
                    <button onclick="add_cart(<?php echo $res['product_id']; ?>)"  class="button">Add to Cart</button>
                    
                    </div>

                </div>

            </div>


        </div>
        <?php }?>
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