<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
     body,html{
        overflow-x: hidden;
        scroll-behavior: smooth;
        /* overflow-x: hidden; */
        margin-top: 1px;
        position: relative;
        margin: 0%;
        
    }

    .checkout-btn-container{
        padding: 40px;
        display: flex;
        justify-content: left;
    }
    .checkout-btn-border{
        background-color: #73C7E9;
        color: white;
        padding-left: 10px;
        border-radius: 12px;
        box-shadow: 5px 5px 17px lightgray;
    }
    .checkout-btn-border:hover{
       scale: 1.1;
    }
    .cart-content-grid{
        display: grid;
        grid-template-columns: auto auto auto;
        gap: 100px;
        padding: 10px;
        justify-content: left;

    }
    .cart-item-border{
        width: 25vw;
        height: 380px;
        background-color: lightgray;
        border-radius: 12px;
        box-shadow: 5px 5px 17px lightgray;
        border: 1px solid #0005;
    }
    .cart-item-container{
        padding: 10px;
    }

    @media only screen and (min-width: 340px) and (max-width: 900px){
        .cart-content-grid{
            display: grid;
            grid-template-columns: auto auto;
            gap: 30px;
            padding: 10px;
            justify-content: center;
        }
        .cart-item-border{
            width: 40vw;
            height: 250px;
            background-color: lightgray;
            border-radius: 12px;
            box-shadow: 5px 5px 17px lightgray;
            border: 1px solid #0005;
        }
    }
    .indicator-position{
        position: absolute;
        bottom: 15%;
        right: 2%;
    }
</style>
<body>




<?php
   // temporary test amount
//    $_SESSION['totalpayment'] = 49.99;



    // HEADER    
    require_once "header.php";

    // NAVIGATION BAR
    require_once "navigation.php";

    // TEMPORARY NAVIGATION
    require_once "temp-file-navigation.php";
   ?>

      <!-- proceed to checkout button -->
<a href="checkout.php">
    <div class="checkout-btn-container">
      <div class="checkout-btn-border">
        <div class="checkout-btn-content">
            Proceed to Checkout <i class="fa-sharp fa-solid fa-credit-card"></i>
        </div>
      </div>
    </div>
   </a>

   <div class="cart-content-grid">

   <!-- cart items -->
   <div class="cart-item-container">
    <div class="cart-item-border">
        <div class="cart-item-content">
            
       </div>
    </div>
   </div>

   <div class="cart-item-container">
    <div class="cart-item-border">
        <div class="cart-item-content">

        </div>
    </div>
   </div>

   <div class="cart-item-container">
    <div class="cart-item-border">
        <div class="cart-item-content">
            
       </div>
    </div>
   </div>

   <div class="cart-item-container">
    <div class="cart-item-border">
        <div class="cart-item-content">
            
       </div>
    </div>
   </div>
   </div>

   <!-- product recommendations -->
<div>
<h4 class="center">You Might Also Like</h4>
<div style=" overflow-x:scroll;" class="scroller">

<div class="indicator-position">
    <?php 
      require "scroll-indicator.php";
    ?>
</div>
    <table>
        <tr>
            <td>
                <div class="cart-item-container">
                 <div class="cart-item-border">
                    <div class="cart-item-content">
                    </div>
                 </div>
                </div>
            </td>
            <td>
                <div class="cart-item-container">
                 <div class="cart-item-border">
                    <div class="cart-item-content">
                    </div>
                 </div>
                </div>
            </td>
            <td>
                <div class="cart-item-container">
                 <div class="cart-item-border">
                    <div class="cart-item-content">
                    </div>
                 </div>
                </div>
            </td>
            <td>
                <div class="cart-item-container">
                 <div class="cart-item-border">
                    <div class="cart-item-content">
                    </div>
                 </div>
                </div>
            </td>
        </tr>
    </table>
    </div>
</div>


   
<div style="padding-top: 100px;">
    <?php
        // FOOTER  
        require_once "footer.php";
    ?>
 </div>
</body>
</html>