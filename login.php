<?php
session_start();
if(isset($_POST['login'])){

    include "connection.php";

    $name=$_POST['uname'];
    $password=$_POST['upassword'];

    $query= mysqli_query($con, "Select * from users where name='$name' AND password='$password'");

    if(mysqli_num_rows($query) > 0){
        $rows=mysqli_fetch_assoc($query);
        $_SESSION['uname']= $rows['uname'];
        header("Location: Store.php");
        exit();
    } 
    
else{
    echo "Username or Password is incorrect!";

}
}

?>