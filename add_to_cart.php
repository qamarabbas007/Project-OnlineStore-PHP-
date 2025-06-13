<?php
session_start();
include 'connection.php';
if (isset($_POST['add']) && isset($_SESSION['user'])) {
    $pid = $_POST['pid'];
    $uid = $_SESSION['user']['id'];
    $conn->query("INSERT INTO cart (user_id, product_id) VALUES ('$uid', '$pid')");
    header("Location: index.php");
} else {
    echo "Please login first!";
}
?>
