<?php
  //start session
  session_start();

  require_once ('./php/createDb.php');
  require_once ('./php/component.php');
  

  //create instance of createDb class
  $database = new CreateDb("Product_db", "Product_tb");

  if(isset($_POST['add'])){
    //print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

      $item_array_id = array_column($_SESSION['cart'], "product_id");
      
      //print_r($item_array_id);
      //print_r($_SESSION['cart']);

      if(in_array($_POST['product_id'], $item_array_id)){
        echo "<script>alert('Product is already added to the cart..!')</script>";
        echo "<script>window.location = 'index.php'</script>";
      }else{

        $count = count($_SESSION['cart']);
        $item_array = array(
          'product_id' => $_POST['product_id']
        );

        $_SESSION['cart'][$count] = $item_array;
        //print_r($_SESSION['cart']);
      }

    }else{

      $item_array = array(
        'product_id' => $_POST['product_id']
      );

      //create new session variable
      $_SESSION['cart'][0] = $item_array;
      print_r($_SESSION['cart']);
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
require_once('./php/header.php');
?>

<div class="container">
  <div class="row text-center py-5"> 
    <?php
    $result = $database->getData();
    while ($row = mysqli_fetch_assoc($result)){
      component($row['product_name'], $row['product_price'], $row['product_image'], $row['id'], $row['product_description']);
    }
    ?>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>