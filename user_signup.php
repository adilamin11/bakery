

<!DOCTYPE html>
<html lang="en">

<head>
  <title>User SignUp</title>
    <link rel="stylesheet" href="./user_css/signup_css.css">
    <!-- Login title -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=Kaushan+Script&family=Merienda:wght@300&family=Roboto+Condensed:ital,wght@1,400;1,500;1,600&display=swap" rel="stylesheet">
   
</head>
  

<body>

    <div class="body_container">

        <div class="container">
            <div class="parent_container">
                <div class="register_title">
                    <h3>Register Yourself !!</h3>
                </div>
                <form class="form_container" action="" method="post" >
                    <div class="username_div">
                        <span id="username_title">Username</span>
                        <span id="username_input"><label for="user"></label>
                        <input type="text" name="uname" placeholder="Type your username" id="user"></span>
                    </div>

                    <div class="mail_div">
                        <span id="mail_title">E-mail</span>
                        <span><input type="mail" required placeholder="Type your mail" name="mail" id="mail"></span>
                        
                    </div>

                    <div class="password_div">
                        <span id="password_title">Password</span>
                        <span><input type="password" required placeholder="Type your password" name="pass" maxlength="8" id="pwd"></span>
                        
                    </div>

                    <div class="Con_password_div">
                        <span id="Con_password_title">Confirm Password</span>
                        <span><input type="password"  required placeholder="Confirm password" name="cpass" maxlength="8" id="con_pwd"></span>
                    </div>

                    <div class="mob_div">
                        <span id="mob_title">Mobile No.</span>
                        <span><input type="tel" required placeholder=" Mobile no" name="mobno" maxlength="10" id="mob"></span>
                       
                    </div>

                    <div class="add_div">
                        <span id="add_title">Address</span>
                        <span><input type="text" required placeholder="Your Address" name="add" id="add"></span>
                       
                    </div>


                    <div class="button_div">

                        <span><input type="submit" value="REGISTER" id="submit_button" name="REGISTER"></span>
                    </div>
                </form>
                <div class="login_title">
                   
                    <span class="ancor">Already member?<a href="./log_in.php" class="login_here_title">Login Here</a></span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
include("./config.php");
session_start();
if(!isset($_SESSION['login']))
{
    if(isset($_POST['REGISTER'])){
        $check="SELECT * FROM `cake_shop_users_registrations1` WHERE users_username='$_POST[uname]' OR users_email='$_POST[mail]'";
        $result=mysqli_query($conn,$check);
        if($result){
            if(mysqli_num_rows($result)>0){
                $fetch=mysqli_fetch_assoc($result);
                if($fetch['users_username']==$_POST['uname']){
                    echo "<script>alert('$_POST[uname]- username is already taken.');</script>";
                    header("refresh:0; url=./user_signup.php");            
                }
                else{
                    echo "<script>alert('$_POST[mail]- Email Id is already register.');</script> ";
                    header("refresh:0; url=./user_signup.php");  
                }
            }
            else{
                $nm=$_POST['uname'];
                $mail=$_POST['mail'];
                $pass=$_POST['pass'];
                $cpass=$_POST['cpass'];
                $mob=$_POST['mobno'];
                $add=$_POST['add'];

                if($pass == $cpass)
                {
                    $sql="INSERT INTO `cake_shop_users_registrations1`(`users_username`, `users_email`,`users_password`, `users_mobile`, `users_address`) VALUES ('$nm','$mail','$cpass','$mob','$add')";
                    $DATA=mysqli_query($conn,$sql);
                    if($DATA){
                    echo "<script>alert('Account is created.');</script> ";
                    header("refresh:0; url=./log_in.php");
                    }
                    else{
                    echo "query failed.... 002";
                    }
                }
                else{
                    echo "<script>alert('Please Check Your Password...Its Incorrect');</script> ";
                    header("refresh:0; url=./user_signup.php");
                }

                

            }
        }
        else{
            echo "<script>alert('Query failed.... 001');</script>";
        }
    }
}
else
{
    header("location:http://localhost/BK/home.php");
}
?>