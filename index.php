<?php

//start session
session_start();

require_once('./PHP/component.php');
require_once('PHP/createDb.php');

$database=new createDb("Productdb","Producttb");

if(isset($_POST['add'])){
    //print_r($_POST['product_id']);

    if(isset($_SESSION['cart'])){

        $item_array_id=array_column($_SESSION['cart'], "product_id");

        //print_r($item_array_id);
       // print_r($_SESSION['cart']);

       if(in_array($_POST['product_id'], $item_array_id)){
        echo "<script>alert('Product is already added in th cart')</script>";
        echo "<script>window.location = 'index.php'</script>";
       }else{
           $count =count($_SESSION['cart']);
           $item_array=array(
            'product_id'=>$_POST['product_id']
        );
        $_SESSION['cart'][$count]=$item_array;
       print_r($_SESSION['cart']);

       }



    }else{
        $item_array=array(
            'product_id'=>$_POST['product_id']
        );

        $_SESSION['cart'][0]=$item_array;
        print_r($_SESSION['cart']);
    }
}
?>
<?php
include('header.php');
?>
<body>

<?php
    require_once("./PHP/header.php");
?>
    <div class="container">
        <div class="row text-center py-5">
            <!-- <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                        <img src="image1.jpg" style="size: 400px;" alt="image1" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Product1</h5>
                            <p class="card-text">
                                Amaizng products for less money
                            </p>
                            <h5><span class="price">KSH 100000</span></h5>
                            
                            <button type="submit" class="btn btn-warning my-3" name="add">Add to cart<i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                        <img src="image1.jpg" style="size: 400px;" alt="image1" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Product1</h5>
                            <p class="card-text">
                                Amaizng products for less money
                            </p>
                            <h5><span class="price">KSH 100000</span></h5>
                            
                            <button type="submit" class="btn btn-warning my-3" name="add">Add to cart<i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                        <img src="image1.jpg" style="size: 400px;" alt="image1" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Product1</h5>
                            <p class="card-text">
                                Amaizng products for less money
                            </p>
                            <h5><span class="price">KSH 100000</span></h5>
                            
                            <button type="submit" class="btn btn-warning my-3" name="add">Add to cart<i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                        <img src="image1.jpg" style="size: 400px;" alt="image1" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Product1</h5>
                            <p class="card-text">
                                Amaizng products for less money
                            </p>
                            <h5><span class="price">KSH 100000</span></h5>
                            
                            <button type="submit" class="btn btn-warning my-3" name="add">Add to cart<i class="fas fa-shopping-cart"></i></button>
                        </div>
                    </div>
                </form>
            </div> -->
            <?php
            // component("Product 1",599,"image1.jpg");
            // component("Product 2" ,5000,"image2.jpg");
            // component("Product 3", 7000, "image3.jpg");
            // component("Product 4", 8000, "image4.jpg");
            $result= $database->getData();
            
            while($row = mysqli_fetch_assoc($result)){
                component($row['product_name'],$row['product_price'], $row['product_image'],$row['id']);
            }
            ?>

        </div>
    </div>
<!-- <script src="index.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>