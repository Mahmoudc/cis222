<?php
function beginning() {
    if(!isset($_SESSION)) {
        session_start();
    }
    $isCartPage=$_SESSION['isCart'];
    if(!$isCartPage) {
        $user_products = numberOfCartProducts();
        if ($user_products > 0) {
            $header = " <div class=\"container\" >

    <div class=\"jumbotron\" >
    <center>
    <a href='?page=cart' class='btn btn-primary text-center'>View cart " . $user_products . "</a><br><br>
    </center>
        <div class=\"row\" >
        ";
            return $header;
        } else {
            $header = " <div class=\"container\" >

    <div class=\"jumbotron\" >
        <div class=\"row\" >";
            return $header;
        }
    }
    else if($isCartPage) {
        $header = " <div class=\"container\" >

    <div class=\"jumbotron\" >
     <div class=\"h1 text-center\">View Cart</div>
        <div class=\"row\" >";
        return $header;
    }

}
function endHtml() {
    if(!isset($_SESSION)) {
        session_start();
    }
    if(isset($_SESSION['isCart'])) {
        if($_SESSION['isCart']) {
            $endDivs="</div >
<center>
<div class='h1'>Checkout</div>
<form class=\"form-horizontal\" action=\"MainTemplate/controller.php?option=6\" method='post'>
 <label class=\"control-label col-2\" for=\"CreditInput\">
        Credit card number:
    </label>
    <input type=\"text\" class=\"col-5\"  name=\"Card\" id=\"nameInput\" placeholder=\"Card Number\" required><br>
    <input class='btn btn-primary' type='submit' name='submit' value='submit'>
</form>
</center>
<a class='btn btn-primary' href='?page=product'>Go back to products</a>
        </div >
</div >";
            return $endDivs;
        }
    }

    $endDivs="</div >

        </div >
</div >";
    return $endDivs;
}
function numberOfCartProducts() {
    $user_products=0;
    if(!isset($_SESSION)) {
        session_start();
    }
    if(isset($_SESSION['user_id']))
    {
        include '../../credential.php';

        $uid=$_SESSION['user_id'];
        $sql="select count(cartId) FROM cart where user_id='$uid';";
        $stmt=$pdo->query($sql);
        $user_products=0;
        while($row=$stmt->fetch()) {
            $user_products=$row['count(cartId)'];
        }
    }



   return $user_products;
}
function displayAllProducts($productNames, $productDescriptions, $media, $prices, $productIds) {
    $htmlData=beginning();
    $count=0;
    foreach($productNames as $product) {
        $htmlData =$htmlData.displayProductColumn($product, $productDescriptions[$count],$media[$count], $prices[$count], $productIds[$count]);
        $count++;
    }
    $htmlData=$htmlData.endHtml();
    echo $htmlData;
}
function displayProductColumn($productName, $productDescription, $media, $prices, $productIds)
{
    //this will dynamically create columns depending upon the value passed per array value and image or video tag
    if(!isset($_SESSION)) {
        session_start();
    }
    $isCartPage=$_SESSION['isCart'];
    $link="";
    if(!$isCartPage) {
        $link="  <a href = \"?page=product&option=4&product_id=".$productIds."\" class=\"btn btn-primary offset-4\" > Add to cart $".$prices."</a>";
    }
    else if($isCartPage) {
        $link="  <a href = \"?page=cart&option=5&product_id=".$productIds."\" class=\"btn btn-primary offset-4\" > Delete product $".$prices."</a>";
    }

   return '
            <div class="col" >
                <div class="card" >
                    <div class="card-header h2" > '.$productName.' </div >
                    <div class="card-block" >
                        <div class="card-title h3" >'.$media.'</div >
                        <div class="card-text offset-2" >
                        <p > '.$productDescription.'
                        </p >
                       '.$link.'
                        <!-- Dynamic link that would store the product id then use it to insert into the database also I have to check if there a user id session being used if 
                        not then I would popout a message that would inform the user that they should login or registor to buy products or possibly just redirect them to the registration page-->
                    </div >
                </div >

            </div >

            </div >';

    }