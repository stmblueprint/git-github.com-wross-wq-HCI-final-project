


<?php session_start();?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1" />

<style>
    body,html{
        overflow-x: hidden;
        scroll-behavior: smooth;
        /* overflow-x: hidden; */
        margin-top: 1px;
        position: relative;
        margin: 0%;
        
    }
    .addtocart-container{
        display: flex;
        justify-content: left;
        margin: 15px;
    }
    @media only screen and (min-width: 600px) {
     .addtocart-container{
        display: flex;
        justify-content: left;
        margin: 15px;
        translate: 120px;
      }
    }
    .addtocart-button{
        background-color: #73C7E9;
        border-radius: 12px;
        color: white;
        box-shadow: 5px 5px 15px lightgray;
    }
    .addtocart-button:hover{
        filter: brightness(1.1);
        box-shadow: 10px 10px 20px lightgray;

    }
    .fa-solid, .fa-cart-shopping{
      padding: -10px;
    }
    .product-container{
        margin: 10px;
    }
    .product, .video{
        background-color: lightgray;
        height: 200px;
        width: 40vw;
        border-radius: 12px;
    }
    .page-product-container{
        display: grid;
        grid-template-columns: auto auto;
        justify-content: center;
    }
    .content-grid{
        display: grid;
        grid-template-columns: auto;
    }
    
</style>
<body>  


<div>
   <?php
    // HEADER    
    require_once "header.php";

    // NAVIGATION BAR
    require_once "navigation.php";

    // TEMPORARY NAVIGATION
    require_once "temp-file-navigation.php";
   ?>

<!-- add to cart button -->
   <div class="addtocart-container">
      <div class="addtocart-button">
        <span style="padding: 10px;"> ADD TO CART </span>
            <i class="fa-solid fa-cart-shopping"></i>
      </div>
   </div>

<!-- page content -->
<div class="page-product-container">
    <!-- image -->
   <div class="product-container">
    <div class="content-grid">
      <div class="product"></div>
      <div class="information">
      <dl>
          <dt>Title: </dt>
          <dt>Information</dt>
        </dl>
      </div>
    </div>
   </div>
   
   <!-- video -->
   <div class="product-container">
    <div class="content-grid">
      <div class="video"></div>
      <div class="information">
        <dl>
            <dt>Description: </dt>
            <dt>Information</dt>
        </dl>
      </div>
    </div>
   </div>
</div>



<div>
    <?php require_once 'footer.php'; ?>
</div>
</div>
</body>
</html>