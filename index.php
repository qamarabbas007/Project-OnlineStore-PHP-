<?php
include("connection.php");
session_start();

$query = mysqli_query($con, "SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 90%;
            margin: auto;
            display: flex;
            gap: 20px;
        }

        .auth-box {
            width: 30%;
            padding: 20px;
            border-radius: 10px;
        }

        input, button {
            width: 95%;
            margin: 8px 0;
            padding: 10px;
            border-radius: 4px;
        }

        button {
            background-color: orange;
            color: white;
            border: none;
            cursor: pointer;
            text-align: center;
        }

        .btn-login {
            background-color: #007bff;
        }

        .btn-register {
            background-color: #28a745;
        }

        .form-box {
            display: flex;
            flex-direction: column;
        }

        h3 {
            text-align: center;
        }

        .register, .login {
            background: #fff;
            padding: 10px 20px;
            border-radius: 20px;
            margin: 40px 0;
        }

        .products {
            width: 70%;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            background: #fff;
            margin-top: 60px;
            margin-bottom: 30px;
            border-radius: 20px;
            height: 570px;
            padding: 25px;
            overflow: hidden;
        }

        h2 {
            width: 100%;
            background: #007bff;
            margin: 0;
            padding: 10px;
            font-family: Arial;
            position: fixed;
            text-align: center;
            border-radius: 0 20px 100px 40px;
            color: white;
        }

        .product-card {
            width: 130px;
            padding: 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h2>My Store</h2>
    <div class="container">
        <div class="auth-box">
            <div class="login">
                <h3>Login</h3>
                <form class="form-box" action="login.php" method="post">
                    <input type="text" name="uname" placeholder="Enter your username/email">
                    <input type="password" name="upassword" placeholder="Enter your password">
                    <button class="btn-login" name="login">Login</button>
                </form>
            </div>
            <div class="register">
                <h3>Register</h3>
                <form action="register.php" method="post">
                    <input type="text" name="uname" placeholder="Name">
                    <input type="text" name="mobile" placeholder="Mobile">
                    <input type="password" name="password" placeholder="Password">
                    <button class="btn-register" name="submit">Register</button>
                </form>
            </div>
        </div>
        <div class="products">
            <?php while ($row = mysqli_fetch_array($query)) { ?>
                <div class="product-card">
                    <strong><?php echo $row['name']; ?></strong><br><br>
                    <img src="image/<?php echo htmlspecialchars($row['image']); ?>" width="100" height="100" alt="product image"><br><br>
                    Price: <?php echo $row['price']; ?>/-<br><br>
                    <form action="add_to_cart.php" method="post">
                        <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="add">Add to Cart</button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>