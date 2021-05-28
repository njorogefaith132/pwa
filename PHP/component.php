<?php
function component($productname, $productprice, $productimage,$productid){
    $element="
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"index.php\" method=\"POST\" >
                    <div >
                        <div>
                        <img src=\"$productimage\" style=\"size: 400px;\" alt=\"image1\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>
                            <p class=\"card-text\">
                                Amaizng products for less money
                            </p>
                            <h5><span class=\"price\">$productprice</span></h5>
                            
                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to cart<i class=\"fas fa-shopping-cart\"></i></button>
                            <input type='hidden' name='product_id' value='$productid'>
                        </div>
                    </div>
                </form>
            </div>
    
    ";
    echo $element;
}

function cartElement($productimage,$productname,$productprice, $productid){
    $element="
    <form action=\"cart.php?action=remove&id=$productid\" method=\"POST\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3\">
                                <img src=$productimage alt=\"image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">Seller:tution</small>
                                <h5 class=\"pt-2\">$productprice</h5>
                                <button class=\"btn btn-warning\" type=\"submit\">Save for later</button>
                                <button class=\"btn btn-danger mx-2 my-2\" name=\"remove\" type=\"submit\">Remove</button>
                            </div>
                            <div class=\"col-md-3\"></div>
                        </div>
                    </div>
                </form>
    ";
    echo $element;
}


