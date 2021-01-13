<?php

function component($productname, $productprice, $productimg, $productid, $description){
    $element = "

    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
      <form action=\"index.php\" method=\"post\">
        <div class=\"card shadow\">
          <div>
            <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid card-img top\">
          </div>
          <div class=\"card-body\">
            <h5 class=\"card-title\">$productname</h5>
            <h6>
              <i class=\"fas fa-star\"></i>
            </h6>
            <p class=\"card-text\">
              $description
            </p>
            <h5>
              <span class=\"price\">$$productprice</span>
            </h5>

            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart<i class=\"fas fa-shopping-cart\"></i></button>
            <input type=\"hidden\" name=\"product_id\" value=\"$productid\">
          </div>
        </div>
      </form>
    </div>                                                                                                                

    ";
    
    echo $element;

}

function cartElement($productid, $productname, $productprice, $productimg){
    $element = "    
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
    <div class=\"border rounded\">
        <div class=\"row bg-white\">
            <div class=\"col-md-3 pl-0\">
                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
            </div>
            <div class=\"col-md-6\">
                <h5 class=\"pt-2\">$productname</h5>
                <h5 class=\"pt-2\">$$productprice</h5>
                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
            </div>
            <div class=\"col-md-3 py-5\">
                <div>
                    <button type=\"button\" id=\"btn_min\" onClick=\"decreaseValue();\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                    <input type=\"number\" id=\"number\" min=\"1\" value=\"1\" class=\"w-25 d-inline\">
                    <button type=\"button\" id=\"btn_plus\" onClick=\"increaseValue();\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>

";
echo  $element;

}

// <button type=\"button\" id=\"btn_min\" onClick=\"decreaseValue();\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
// <button type=\"button\" id=\"btn_plus\" onClick=\"increaseValue();\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>