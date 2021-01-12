<?php 
    session_start();

    require_once('php/createDb.php');
    require_once('php/component.php');

    $db = new CreateDb("Product_db", "Product_tb");

    if(isset($_POST['remove'])){
        if($_GET['action'] == 'remove'){
            foreach($_SESSION['cart'] as $key => $value){
                if($value['product_id'] == $_GET['id']){
                    unset($_SESSION['cart'][$key]);
                    echo "<script> alert('Product has been Removed!') </script>";
                    echo "<script> window.location = 'cart.php' </script>";
                }
            }
        }
        //print_r($_GET['id']);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

<!-- Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<link rel="stylesheet" href="style.css">
<script src="script.js"></script>
</head>
<body class="bg-light">
    
<?php 
    require_once('./php/header.php');
?>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>My Cart</h6>
                    <hr>

<?php 

    $total = 0;

    if(isset($_SESSION['cart'])){
        $product_id = array_column($_SESSION['cart'], 'product_id');

        $result = $db->getData();
        while($row = mysqli_fetch_assoc($result)){
            foreach($product_id as $id){
                if($row['id'] == $id){
                    cartElement($row['id'], $row['product_name'], $row['product_price'], $row['product_image']);
                    $total = $total + (int)$row['product_price'];
                }
            }
        }
    }else{
        echo "<h5>Cart is empty</h5>";
    }
?>
            </div>
        </div>

        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php 
                            if(isset($_SESSION['cart'])){
                                $count = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else 
                                echo "<h6>Price (0 items)</h6>";
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                            <h6>$ <?php echo $total; ?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>$<?php 
                                echo $total;
                            ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>