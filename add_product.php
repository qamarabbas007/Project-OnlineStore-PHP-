<?php
include "connection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Image file info
$imageName = $_FILES['filename']['name'];
$imageType = $_FILES['filename']['type'];
$imageSize = $_FILES['filename']['size'];
$imageTmp  = $_FILES['filename']['tmp_name'];

// Product info
$productName = $_POST['name'];
$price       = $_POST['price'];
$uploadPath  = "image/" . $imageName;

// Upload image and insert into DB
if (move_uploaded_file($imageTmp, $uploadPath)) {
    echo "✅ File uploaded to 'image/' folder.<br>"; 

    $query = mysqli_query($con, "INSERT INTO products (name, price, image) 
                                 VALUES ('$productName', '$price', '$imageName')");

    if ($query) {
        echo "✅ Product inserted into database.";
    } else {
        echo "❌ DB Insert failed: " . mysqli_error($con);
    }

} else {
    echo "❌ File upload failed.";
}}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
     body{
        font-family: Arial;
        margin: 0px;
        padding:0px;
        background-color: #f4f4f4;
    }
.container{
    width: 95%;
    height:100%;
    margin: auto;
    background: rgb(241, 244, 241);
    padding: 10px;
}
.container h3{
    margin-top:50px;
    text-align:center;
    font-size: 25px;
    font-weight: bold;
}
 table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: Arial, sans-serif;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;}

        tr:hover {
            background-color: #e6ffe6;
        }
         h2{
        width: 100%;
        background: #007bff;
        margin:0px;
        padding: 10px;
        font-family: Arial;
        position: fixed;
        text-align:center;
       border-radius: 0px 20px 100px 40px;
        color: white;
    }
</style>
<body>
    <h2>My Store</h2>
<div class="container">
    <h3>Add product</h3>
    <form action="" method="post" enctype="multipart/form-data">
        Enter Product Name: <input type="text" name="name" id=""> 
        Enter product price: <input type="text" name="price" id="">
        <input type="file" name="filename" id="">

        <input type="submit" value="submit">
    </form>

    <table border='1' cellpadding='10'>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
 
    
    <?php 
    $result=mysqli_query($con, "select * from products");
    
        while($row= mysqli_fetch_assoc($result)){
            echo "<tr>
            <td> {$row['id']}</td>
            <td>{$row['name']} </td>
            <td> {$row['price']} </td>
           <td> <a href='edit.php?id={$row['id']}'>Update</a> | 
            <a href='delete.php?id={$row['id']}' onclick=\"return confirm('Are you sure?')\"> Delete</a> </td>
            ";
         }

    ?>
    </table>
</div>
</body>
</html>