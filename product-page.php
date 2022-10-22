


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
        scale: 1.1;

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
        grid-template-columns: auto;
        justify-content: center;
    }
    .content-grid{
        display: grid;
        grid-template-columns: auto;
    }
    .btn-price-grid{
      display: grid;
      grid-template-columns: auto auto;
    }
    .price-border{
      background-color: lightblue;
      border-radius: 100px;
      box-shadow: 5px 5px 15px lightgray;
      filter: brightness(1.1);
      padding-left: 6px;

    }
    .price-border:hover{
      background-color: #73C7E9;
      border-radius: 100px;
      padding: 10px;
      box-shadow: 5px 5px 15px lightgray;

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
    // require_once "temp-file-navigation.php";
   ?>

<!-- add to cart button -->
<div class="btn-price-grid">
<a href="cart.php">
   <div class="addtocart-container">
      <div class="addtocart-button">
        <span style="padding: 10px;"> ADD TO CART </span>
            <i class="fa-solid fa-cart-shopping"></i>
      </div>
   </div>
   </a>
<!-- price display -->
   <div class="price-container center">
    <div class="price-border">
      <div class="price-content">
        <?="$".$_GET['price'];?><i class="fa-sharp fa-solid fa-tag"></i>
      </div>
    </div>
   </div>
</div>

<div class="center">
  <h4><?= $_GET['title'];?></h4>
</div>

<!-- toggle rent or buy -->
<div style="margin:20px;" class="center">
   <?php require_once "components/rent-or-buy.php";?>
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
   <?php
   require_once "private/DB-Functions.php";
   $conn = My_Connect_DB();
   ?>
</div>

<div class="video-container center">
    <div class="video-content-grid">
      <div class="video">
      <iframe width="420" height="345" src="<?php echo $_GET['video'];?>">
      </iframe>
      </div>


      <div class="information">
        <dl>
            <dt>Description: </dt>
            <dt>Information</dt>
        </dl>
      </div>
    </div>
   </div>



<div style="padding-top: 100px;">
   <?php require_once 'footer.php'; ?>
</div>
</div>
</body>
</html>