<?php
include ("connection.php");
session_start();

$query= mysqli_query($con, "Select * from products");

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
        width: 90%;
        margin: auto;
        display: flex;
        gap:20px;
    }
  

    input, button{
         width: 95%;
            margin: 8px 0;
            padding: 10px;
            border-radius: 4px;
    }
    button{
         background-color: orange;
            color: white;
            border: none;
            cursor: pointer;
            text-align: center;
    }
   

    
    .products{
    
        display: flex;
        flex-wrap: wrap;
        gap:15px;
     background: #fff;
     margin-top: 60px;
     margin-bottom: 30px;
     border-radius: 20px;
             height: 100%;
             padding: 25px;
               

    }
    .navbar{
        width: 100%;
        background: #007bff;
        padding-left:  10px;
        font-family: Arial;
        position: fixed;
        display: flex;
        justify-content: space-between;
        color: white;
        border-radius: 0px 20px 100px 40px;
    }
    
    input{
width: 100px;
        padding:10px;
        margin-right: 20px;
        border-radius: 20px;
    background: #dc3545;
    border: none;
    font-weight: bold;
    color: white;

    }
    .product-card{
        width: 175px;
        /* border: 1px solid #ddd; */
        padding: 15px;
        border-radius: 8px;
        background-color: #f9f9f9;
        text-align: center;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
      
    }
</style>
<body>
    <div class="navbar">
        <h3>My Store</h3>
    <form action="logout.php" method="post" enctype="multipart/form-data">
        <input type="submit" value="Logout">
    </form>
    </div>
    
    <div class="container">
        <div class="products">
    <?php while ($row = mysqli_fetch_array($query)) : ?>   
        <div class="product-card">
            <strong><?php echo $row['name']; ?></strong><br><br>
            <img src="image/<?php echo htmlspecialchars($row['image']); ?>" width="100" height="100" alt="product image"> <br><br>
           Price: <?php echo $row['price']; ?>/- <br><br>

            <form action="" method="post">
                <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
                <button type="submit" name="add">Add to Cart</button>
            </form>
        </div>
    <?php endwhile; ?>
</div>
       
 </div>
    </div>
</body>
</html>