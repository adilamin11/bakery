<?php
include("./config.php");

session_start();
if(!isset($_SESSION['login']))
{
    if(isset($_POST['login']))
    {
        $username=$_POST['uname'];
        $password=$_POST['password'];
        //check user in db
        $check="SELECT * FROM `cake_shop_users_registrations1` WHERE users_username='$username' OR users_email='$username'";
        $result=mysqli_query($conn,$check);
        if($result)
        {
            if(mysqli_num_rows($result)==1) //if user faund
            {
                $fetch=mysqli_fetch_assoc($result);
                if($fetch['users_password']==$_POST['password'])
                {
                    $_SESSION['login']=true;
                    $_SESSION['user_users_id']=$fetch['users_id'];
                    $_SESSION['uname']=$fetch['users_username'];
                    $_SESSION['umail']=$fetch['users_email'];//
                    $_SESSION['upass']=$fetch['users_password'];//
                    $_SESSION['umob']=$fetch['users_mobile'];//
                    $_SESSION['uaddr']=$fetch['users_address'];//

                    echo "<script>alert('Login Successfully.');</script>";
                    header("refresh:0; url=./home.php");
                }  
                else{
                    echo "<script>alert('Password Invalid.');</script>";
                    header("refresh:0; url=./log_in.php");
                }
            }
            else
            {
                echo "<script>alert('User Not registered.');</script>";
                header("refresh:0; url=./log_in.php");            }
        }
        else
        {
            echo "<script>alert('Query failed.... 001');</script>";
        }
    }
}
else
{
    header("refresh:0; url=./home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>User Login</title>
    <link rel="stylesheet" href="./user_css/login_css.css">
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
                    <h3>User Login</h3>
                </div>
                <form class="form_container" action="" method="post">
                    <div class="username_div">
                        <span id="username_title">Username</span>
                        <span id="username_input"><label for="user"></label>
                            <input type="text" required placeholder="Type your username"
                                id="user" name="uname"></span>
                    </div>
                    <div class="password_div">
                        <span id="password_title">Password</span>
                        <span><input type="password" required placeholder="Type your password" id="pwd" name="password"></span>
                        <span class="ancor"><a href="#" class="forgate_title">Forgot password/username</a></span>
                    </div>
                    <div class="button_div">

                        <span><input type="submit" name="login" value="LOGIN" id="submit_button" ></span>
                    </div>
                </form>
                <div class="signup_title">
                    <span  ><a id="signup" href="./user_signup.php">SignUp</a></span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>