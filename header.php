<?php
session_start();
if (!empty($_SESSION['cart'])) {
    $printCount = count($_SESSION['cart']);
} else {
    $printCount = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  
    <link rel="stylesheet" href="./user_css/home_css.css">

    <!------------------------------REQUIRED GOOGLE FONTS API------------------------------------------------------------------->
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&family=Merriweather:wght@300&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    

        <!-- NAV BAR Start   ----------------------------------------------------------------------------------------------------- -->
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
                                <a style="text-decoration:none;" class="menu_items_links" href="./shop.php?category=<?php echo $res['category_id'];?>">
                                    <?php echo $res['category_name'];?>
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
                            <div class="menu_items"><a href="./log_in.php"
                                    class="menu_items_links">Login</a></div>
                            <div class="menu_items"><a href="./logout.php"
                                    class="menu_items_links">Logout</a></div>
                            <div class="menu_items"><a href="./admin/index.php" target="_blank" class="menu_items_links">Admin</a></div>
                        </div>
                    </div>
                </nav>

            </div>

        </div>
</body>
</html>
