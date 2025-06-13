<?php
include "connection.php";
if(!isset($_GET['id'])){
    echo "invalid request";
    exit();
}
$id= intval($_GET['id']);

$sql = "DELETE FROM products WHERE id = $id";

if(mysqli_query($con, $sql)){
    header("Location: add_product.php");
    exit();
}
else{
    echo "Error deleting record " . mysqli_error($con);
}

//-----------------------
if(!isset($_GET['id'])){
    echo "invalid request";
    exit();
}
$id= intval($_GET['id']);
$sql = "delete from products where id=$id";
if(mysqli_query($con, $sql)){
    header("Location: add_product.php");
    exit();
}

?>