<?php
if (isset($_GET['login_error']) && $_GET['login_error'] == 1) {
    echo "<script>alert('Username or Password does not exist!')</script>";
    echo "<script>window.location.assign('index.php')</script>";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/login_css.css">
    <!-- Login title -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=Kaushan+Script&family=Merienda:wght@300&family=Roboto+Condensed:ital,wght@1,400;1,500;1,600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="body_container">
        <div class="container">
            <div class="parent_container">
                <div class="login_title">
                    <h3>Admin Login</h3>
                </div>
                <form class="form_container" action="" method="post">
                    <div class="username_div">
                        <span id="username_title">Username</span>
                        <span id="username_input"><label for="user"></label>
                        <input type="text" required placeholder="Type your username"
                                id="user" name="admin_username"></span>
                    </div>
                    <div class="password_div">
                        <span id="password_title">Password</span>
                        <span><input type="password" name="admin_password" required placeholder="Type your password" id="pwd"></span>
                        <span class="ancor"><a href="#" class="forgate_title">Forgot password/username</a></span>
                    </div>
                    <div class="button_div">

                        <span><input type="submit" name="admin_login" value="LOGIN" id="submit_button"></span>
                    </div>
                </form>
                <!-- <div class="signup_title">
                    <span  ><a id="signup" href="../sign_up_admin/sign_up_ad.html">SignUp</a></span>
                </div> -->
            </div>
        </div>
    </div>
</body>

</html>
<?php
if(isset($_POST["admin_login"]))
{
require_once('../config.php');
$admin_username = $_POST['admin_username'];
$admin_password = $_POST['admin_password'];
$select = "SELECT * FROM cake_shop_admin_registrations1 where admin_username = '$admin_username' AND admin_password = '$admin_password'";
$query = mysqli_query($conn, $select);
$res = mysqli_fetch_assoc($query);
if (mysqli_num_rows($query) > 0) {
	session_start();
	$_SESSION['user_admin_id'] = $res['admin_id'];
	$_SESSION['user_admin_username'] = $res['admin_username'];
	header("Location: dashboard.php?login_success=1");
} 
else {
	header("Location: index.php?login_error=1");
}
}
?>