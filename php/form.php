<?php
session_start();

require 'config.php';
if(isset($_POST["submit"])){
    $email=$_POST["email"];
    $password=$_POST["password"];
    $query= "INSERT INTO user VALUE('','$email','$password')";
    mysqli_query($conn,$query);

}










?>