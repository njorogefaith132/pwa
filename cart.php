<?php
session_start();

require_once('./PHP/component.php');
require_once('PHP/createDb.php');

$db = new createDb("Productdb","Producttb");

if(isset($_POST['remove'])){
    //print_r($_GET['id']);
    if($_GET['action']=='remove'){
        foreach($_SESSION['cart'] as $key=>$value){
            if($value["product_id"]==$_GET['id']){

                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been removed')</script>";
                echo "<script>window.location='cart.php'</script>";
            }
        }
    } 
}
?>
<?php

include('header.php');

?>
<body class="bg-light">

<?php
require_once('./PHP/header.php');
?>
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shoppping-cart py-3">
                <h6>My shopping cart</h6>
                <hr>

                <?php
                if(isset($_SESSION['cart'])){
                    $product_id= array_column($_SESSION['cart'], 'product_id');

                $result = $db->getData(); 
                while($row =mysqli_fetch_assoc($result)){
                    foreach($product_id as $id){
                        if($row['id']==$id){
                            cartElement($row['product_image'],$row['product_name'], $row['product_price'], $row['id']);
                        }
                    }
                }
                }else{
                    echo"<h5>Cart is empty</h5>";
                }

                ?>
 
                <!--<form action="cart.php" method="GET" class="cart-items">
                    <div class="border rounded">
                        <div class="row bg-white">
                            <div class="col-md-3">
                                <img src="image1.jpg" alt="image1" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5 class="pt-2">Product1</h5>
                                <small class="text-secondary">Seller:tution</small>
                                <h5 class="pt-2">Ksh 599</h5>
                                <button class="btn btn-warning" type="submit">Save for later</button>
                                <button class="btn btn-danger mx-2 my-2" name="remove" type="submit">Remove</button>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </form> -->
            </div>
        </div>
        <div class="col-md-5">
        
        </div>
    </div>
</div>
<script src="index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</body>
</html>