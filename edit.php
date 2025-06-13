<?php
include ('connection.php');

ini_set('display_error', 1);
$id = $_GET['id'];
$result = mysqli_query($con, "select * from products where id=$id");
$row= mysqli_fetch_assoc($result);

if($_SERVER['REQUEST_METHOD']=="POST"){

    $name= $_POST['name'];
    $price=$_POST['price'];
    $id=$_GET['id'];

    //File Handling
    $filename=  $_FILES['filename']['name'];
    $tmp_name=$_FILES['filename']['tmp_name'];
    $location="image/";

    if(!empty($filename)){
        $filepath= $location . $flilename;
        move_uploaded_file($tmp_name, $filepath);

        $sql="UPDATE products SET name='$name', price='$price', image='$filepath'  where id='$id' ";
    }
    else{
        $sql= "UPDATE products SET name='$name', price='$price' where id='$id' ";
    }

    if(mysqli_query($con, $sql)){
        header("Location: index.php");
        exit();
    }
    else{
        echo "Error: " . mysqli_error($ocn);
    }
}
?>
 <h1>Update product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        Enter Product Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"> 
        Enter product price: <input type="text" name="price" value="<?php echo $row['price']; ?>">
        <input type="file" name="filename" > (Current: <?php echo $row['image']; ?>)

        <input type="submit" value="Update">
    </form>
