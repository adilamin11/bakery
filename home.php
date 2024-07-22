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

    <title>Online Bakery Management System</title>
    <link rel="stylesheet" href="./user_css/home_css.css">

    <!------------------------------REQUIRED GOOGLE FONTS API------------------------------------------------------------------->
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&family=Merriweather:wght@300&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">


</head>

<body>
    <div class="container">

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
                                <a class="menu_items_links" href="./shop.php?category=<?php echo $res['category_id'];?>">
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

        <!-- Nav Bar End---------------------------------------------- ------------------------------------------------------>
        <div class="bakery_shop_image">
            <div class="title">
                <span class="img-title" id="Home_Bakery_title">
                    Welcome to Bakers Kitchen..

                </span>
            </div>
        </div>
    </div>

    <div class="mid_container">
        <div id="our_categories" class="our_speci_title">OUR CATEGORIES</div>

        <span class="our_desc">Fresh Bakery Items with the Finest Ingredients</span>
    </div>


    <!--Home Page Products using grid --------------------------------------------------------- -->
    <div class="grid_container">
    <?php
            require_once('./config.php');
            $select = "SELECT * FROM cake_shop_category1";
            $query = mysqli_query($conn, $select);
            while ($res = mysqli_fetch_assoc($query))
             {
                
            ?>
        <!-- 1st product div start -->
        <div class="item1_container">
            

                <div class="prod_img_container">
                    <img class="cake_img1" src="./uploads/<?php echo $res['category_image']; ?>" alt="image">
                </div>
                
                <div class="price_and_button_container">
                <div id="p_name">
                    <?php echo $res['category_name']; ?>
                </div>
                    <!-- <div class="price">&#8377;500 </div> -->
                    <div class="order_button_container"><a href="./shop.php?category=<?php echo $res['category_id']; ?>" id="order_title">View</a>
                    </div>
                </div>
              
        </div>
        <?php
            }
        ?>
        <!-- 1st product div end -->



    </div>
  
    <!-- FEEDBACK SECTION------------------------------------------------------------------------>
    <div class="feedback_main_container">
        <div class="main_feedback_title">Feedback</div>

        <span class="main_feed_desc">Your feedback could make a difference!</span>
    </div>

    <div class="new_feedback_img_container">
        <div class="feedback_container">
            <div>
                <p class="feed_desc">Have feedback about our products or service
                    <br>
                    Please contact Baker's Kitchen directly
                </p>
            </div>
            <div class="feed_button">
                <a href="#" class="feed_title">SEND FEEDBACK NOW</a>
            </div>
        </div>
    </div>
    <div class="footer_container">
        <div class="four_in_one">
            <div class="first_footer_bakery_cont">
                <h2 class="foot_bak_title">Bakers Kitchen</h2>
                <span id="bak_des_container">
                    <p class="bakery_desc">Welcome to Bakers Kitchen, where every creation is a masterpiece of flavor
                        and craftsmanship. Our artisanal bakery takes pride in crafting delectable delights that elevate
                        the art of baking. Immerse yourself in the aroma of freshly baked bread, pastries, and cakes,
                        all meticulously prepared with the finest ingredients. At Bakers Kitchen, we blend tradition
                        with innovation, offering a diverse menu that caters to every palate. Indulge in our decadent
                        desserts, savor our savory treats, and experience the joy of authentic baking. </p>
                </span>
            </div>

            <div class="quick_links_container">
                <h3 class="q_link_title">Quick Links</h3>
                <nav class="nav_link_cont">

                    <a href="#Home_Bakery_title" class="nav_home2">Home</a>
                    <a href="#our_categories" class="nav_product2">Product Category</a>
                    <a href="./about.php" class="nav_about2">About Us</a>
                    <a href="./log_in.php" class="nav_login2">Login</a>
                    <a href="./user_signup.php" class="nav_signup2">Sign Up</a>
                    <a href="./cart.php" class="nav_track2">Cart</a>
                    <a href="./contact.php" id="contact_us" class="nav_contact2">Contact Us</a>
                </nav>
            </div>

            <div class="work_time_container">
                <h3 class="work_title">Work Times</h3>
                <div class="work_des">
                    <p>
                        Mon.:Fri.:8am - 8pm
                        <br><br>
                        Sat.:9am - 4pm
                        <br><br>
                        Sun.:Closed
                    </p>
                </div>
            </div>

            <div class="contact_info_container">
                <h3 class="contact_title">Contact Info</h3>
                <div class="contact_des">
                    <p>
                        Phone :9112439927
                        <br><br>
                        Address :
                        2390-B,K.B,Hidayatulla Rd, Azam Campus, Pune Cantonment, Pune, Maharashtra 411001
                        <br><br>
                        Email :bakerskitchen@gmail.com
                    </p>
                </div>
            </div>
        </div>
        <div class="last_footer">
            <div class="logos">
                <div class="insta_container"><a href="https://www.instagram.com"><img class="insta"
                            src="./Image/instagram.png" alt="insta"></a></div>
                <div class="facebook_container"><a href="https://www.facebook.com"><img class="facebook"
                            src="./Image/facebook.png" alt="faceb"></a></div>
                <div class="twitter_container"><a href="https://twitter.com"><img class="twitter"
                            src="./Image/twitter.png" alt="twitt"></a></div>
            </div>
            <div class="copy_right">
                <p id="copy_right_desc">© Copyright <b>Bakers Kitchen</b>.All Rights Reserved</p>
            </div>
        </div>
    </div>
</body>

</html>