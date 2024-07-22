<?php
// include("./header.php");
session_start();
if (!isset($_SESSION['login'])) {
    header("refresh:0; url=./log_in.php");
}
if (!empty($_SESSION['cart'])) {
    $printCount = count($_SESSION['cart']);
} else {
    $printCount = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./user_css/account_css.css">
    <title>Users Account</title>

    <link rel="stylesheet" href="./user_css/home_css.css">

    <!------------------------------REQUIRED GOOGLE FONTS API------------------------------------------------------------------->
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&family=Merriweather:wght@300&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="pos_container">
        <div class="menu">
            <div class="leftside">
                <img src="./Image/logo.png" alt="logo.png">
            </div>
            <nav class="nav_items">

                <a href="./home.php" class="nav_home">Home</a>

                <div class="dropdown_menu">Shop
                    <div class="sub_menu">
                        <?php
                        require_once('./config.php');
                        $select = "SELECT * FROM cake_shop_category1";
                        $query = mysqli_query($conn, $select);
                        while ($res = mysqli_fetch_assoc($query)) {
                            ?>
                        <div class="menu_items">
                            <a style="text-decoration:none;" class="menu_items_links"
                                href="./shop.php?category=<?php echo $res['category_id']; ?>">
                                <?php echo $res['category_name']; ?>
                            </a>
                        </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>

                <a href="./cart.php" class="nav_cart">Cart(<span class="Ayaz">
                        <?php echo $printCount; ?>
                    </span>)</a>
                <a href="./about.php" class="nav_about">About Us</a>
                <a href="./contact.php" class="nav_contact">Contact </a>
                <div class="dropdown_menu1"> <img class="account_img" src="./Image/user.png" alt="account logo">
                    <div class="sub_menu1">
                        <div class="menu_items"><a href="./account.php" class="menu_items_links">Account</a></div>
                        <div class="menu_items"><a href="./log_in.php" class="menu_items_links">Login</a></div>
                        <div class="menu_items"><a href="./logout.php" class="menu_items_links">Logout</a></div>
                        <div class="menu_items"><a href="./admin/index.php" target="_blank"
                                class="menu_items_links">Admin</a></div>
                    </div>
                </div>
            </nav>

        </div>

    </div>
    <div class="parent_container">
        <div class="mian_title_container">
            <h3 id="title">Users Account</h3>
        </div>
        <div class="big_container">
            <div class="box_container">
                <?php
                require_once("./config.php");
                $users_id = $_SESSION['user_users_id'];
                $select = "SELECT * FROM cake_shop_users_registrations1 where users_id = $users_id";
                $query = mysqli_query($conn, $select);
                $res = mysqli_fetch_assoc($query);
                ?>
                <div class="user_info_con">
                    <h4>
                        <?php echo $res['users_username']; ?>
                    </h4>
                    <h4>
                        <?php echo $res['users_email']; ?>
                    </h4>
                    <h4>
                        <?php echo $res['users_password']; ?>
                    </h4>
                    <h4>
                        <?php echo $res['users_mobile']; ?>
                    </h4>
                    <h4>
                        <?php echo $res['users_address']; ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>


    <div class="mian_title_container">
            <h3 id="title">Order History</h3>
        </div>


    <div class="table_container">
        <table>
            <thead id="one">
                <tr id="one">
                    <th id="one">S. No.</th>
                    <th id="one">Orders id</th>
                    <th id="one">Delivery date</th>
                    <th id="one">Payment method</th>
                    <th id="one">Total amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('./config.php');
                $select = "SELECT * FROM cake_shop_orders1 where users_id = $users_id";
                $query = mysqli_query($conn, $select);
                $i = 1;
                while ($res = mysqli_fetch_assoc($query)) {
                    ?>
                <tr id="one">
                    <td id="one">
                        <?php echo $i++; ?>
                    </td>
                    <td id="one">
                        <?php echo $res['orders_id']; ?>
                    </td>
                    <td id="one">
                        <?php echo $res['delivery_date']; ?>
                    </td>
                    <td id="one">
                        <?php echo $res['payment_method']; ?>
                    </td>
                    <td id="one">Rs.
                        <?php echo $res['total_amount']; ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>

    <div class="mian_title_container">
            <h3 id="title">Order Details</h3>
        </div>



    <div class="table_container1">
        <table>
            <thead id="one">
                <tr id="one">
                    <th id="one">S. No.</th>
                    <th id="one">Orders id</th>
                    <th id="one">Product name</th>
                    <th id="one">Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('./config.php');
                // $select = "SELECT * FROM cake_shop_orders_detail";
                $select = "SELECT cake_shop_orders_detail1.*, cake_shop_orders1.orders_id FROM cake_shop_orders_detail1 JOIN cake_shop_orders1 ON cake_shop_orders_detail1.orders_id = cake_shop_orders1.orders_id WHERE users_id = $users_id";
                $query = mysqli_query($conn, $select);
                $i = 1;
                while ($res = mysqli_fetch_assoc($query)) {
                    ?>
                <tr id="one">
                    <td id="one">
                        <?php echo $i++; ?>
                    </td>
                    <td id="one">
                        <?php echo $res['orders_id']; ?>
                    </td>
                    <td id="one">
                        <?php echo $res['product_name']; ?>
                    </td>
                    <td id="one">
                        <?php echo $res['quantity']; ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>






</body>

</html>