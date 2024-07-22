<?php
session_start();

if (isset($_SESSION['login']))
{


if (isset($_SESSION['login']))
{
    session_destroy();
    header("refresh:0; url=./home.php");
}


}
else
{
    echo "<script>alert('You are not login.');</script>";
    header("refresh:0; url=./log_in.php");

}
?>