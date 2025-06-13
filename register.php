<?php
if(isset($_POST['submit'])){


include "connection.php";

//get input values
$username= $_POST['uname'];
$password=$_POST['password'];
$mobile=$_POST['mobile'];

$query = mysqli_query($con, "insert into users(name, mobile, password) values('".$username."', '".$mobile."', '".$password."')");

if($query){
    echo"Values inserted in Database";
}
else{
    echo"Value not inserted in database";
}
}
else{
    echo"connection error";
}
?>

