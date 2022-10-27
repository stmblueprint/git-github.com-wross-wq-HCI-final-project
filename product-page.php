


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
        cursor: pointer;
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
      translate: 0 -40px;
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
    .product{
      animation: image-float 1.5s infinite alternate;
    }
    @keyframes image-float {
      from{
        translate: 0 -2px;
      }
      to{
        translate: 0 2px;
      }
      
    }
    .product:hover{
      scale: 1.1;
    }
    dt{
      width: 50vw;
    }
    .labels{
      color: white;
      font-style: italic;
      background-color: #73C7E9;
      border-radius: 12px;
      width: 100px;
      padding: 2px;
    }
    .catalog-row-position{
        position: relative;
    }
    .indicator-position{
        position: absolute;
        z-index: 1;
        right: 0%;
        translate: 20px 60px;
       
    }
    .tocartbtn{
      font-size: 16px;
      color: white;
      background: none;
      border: none;
      cursor: pointer;
    }



</style>
<body>  


<div>
   <?php
    // HEADER    
    require_once "header.php";

    // NAVIGATION BAR
    require_once "navigation.php";
    require_once "private/DB-Functions.php";
    $conn = My_Connect_DB();
   ?>

<!-- add to cart button -->
<form method="post">
<div class="btn-price-grid">
<!-- <a href="cart.php"> -->
   <div class="addtocart-container" id="tocartbtn">
      <div class="addtocart-button">
        <button class="tocartbtn" type="submit" name ='tocartbtn'> ADD TO CART </button>
            <i class="fa-solid fa-cart-shopping"></i>
      </div>
   </div>
   <!-- </a> -->
<!-- price display -->
   <div class="price-container center">
    <div class="price-border">
      <div class="price-content">
        <?="$".$_GET['price'];?><i class="fa-sharp fa-solid fa-tag"></i>
      </div>
    </div>
   </div>
</div>
</form>
<?php
if(isset($_POST['tocartbtn'])){

  if($_SESSION['id'] !== null){
    cartItems($conn);
    echo "<script>window.top.location= 'cart.php'</script>";
 
}else{
  echo "<script>window.top.location= 'login.php'</script>";

}
unset($_POST['tocartbtn']);
}


?>

<div class="center" style="translate: 0 -30px;">
</div>

<!-- toggle rent or buy -->
<div class="center" style="translate: 0 -50px; margin: 5px;">
   <?php require_once "components/rent-or-buy.php";?>
</div>


<!-- image -->
<div class="page-product-container" style="translate: 0 -60px;">
   <div class="product-container">
    <div class="content-grid">
      <div class="product center">
        <img src="<?= $_GET['image']?>" alt="" height="250" style="border-radius: 12px;">
      </div>
      <h3 class="center" style="padding: 10px;"><?php echo $_GET['title'];?></h3> 

      <div class="information">
      <dl>
          <dt><?php fetchDescription($conn);?></dt>
        </dl>
      </div>
    </div>
   </div>
</div>

<!-- video -->
<div class="video-container">
    <div class="video-content-grid">
      <div class="video center">
        <iframe
          allowfullscreen="allowfullscreen"
          mozallowfullscreen="mozallowfullscreen" 
          msallowfullscreen="msallowfullscreen" 
          oallowfullscreen="oallowfullscreen" 
          webkitallowfullscreen="webkitallowfullscreen"
          width="400" height="345" src="<?php echo $_GET['video']."?vq=hd720&vq=hd1080";?>" style="border-radius: 12px;">
        </iframe>
      </div>
    </div>
   </div>

   <!-- SONY -->
    <div style="margin: 30px; font-size: 20px;" class="center scrollbar-hidden">You Might Also Like</div>
      
      <!-- display more sony games -->
      <div 
      <?php 
      if($_GET['console'] === 'sony'){ 
         echo "style='display: block;'";?> 
         class="catalog-row-position">
          <div class="indicator-position">
              <?php 
                  require "scroll-indicator.php";
              ?>
          </div>
      <div class="sony-scrolling"><?php require_once "sony-view.php";?></div>
      </div>
      <!-- display more microsoft games -->
      <div
      <?php } else if($_GET['console'] === 'microsoft'){ 
         echo "style='display: block;'"; ?>
         class="catalog-row-position">
          <div class="indicator-position">
              <?php 
                  require "scroll-indicator.php";
              ?>
          </div>
      <div class="sony-scrolling"><?php require_once "microsoft-view.php";?></div>
      </div>
      <!-- display more nintendo games -->
      <div
      <?php } else if($_GET['console'] === 'nintendo'){ 
         echo "style='display: block;'"; ?>
         class="catalog-row-position">
          <div class="indicator-position">
              <?php 
                  require "scroll-indicator.php";
              ?>
          </div>
      <div class="sony-scrolling"><?php require_once "nintendo-view.php";?></div>
      </div>
      <?php }    
?>



   


<div style="padding-top: 100px;">
   <?php require_once 'footer.php';?>
   
</div>
</div>



<?php 
 function fetchDescription($conn){
   $sqlSony = "SELECT * FROM Sony WHERE title='".$_GET['title']."';";
   $resultSony = My_SQL_EXE($conn, $sqlSony);

   $sqlMicrosoft = "SELECT * FROM Microsoft WHERE title='".$_GET['title']."';";
   $resultMicrosoft = My_SQL_EXE($conn, $sqlMicrosoft);

   $sqlNintendo = "SELECT * FROM Nintendo WHERE title='".$_GET['title']."';";
   $resultNintendo = My_SQL_EXE($conn, $sqlNintendo);


   while(
    $row = mysqli_fetch_array($resultSony) 
    or $row = mysqli_fetch_array($resultMicrosoft) 
    or $row = mysqli_fetch_array($resultNintendo)){
      
      // $_SESSION['console'] = $row[6];
      $_SESSION['console_type'] = $row[6];
      echo "<div class='labels'><h4 class='center'>".strtoupper($row[6])."</div></h4>";
      echo $row[2];
   }

 }
 $_SESSION['order_id'] = uniqid();
  function cartItems($conn){
    $sql = "SELECT * FROM Cart WHERE customer_id =".$_SESSION['id']." AND game_id = ".$_GET['id'].";";
    $result = My_SQL_EXE($conn, $sql);
    $row = mysqli_fetch_array($result);
   
  

    if($_SESSION['id'] !== $row[1]){
      $sql = "INSERT INTO `Cart`(
        `customer_id`,
        `game_id`,
        `order_id`,
        `title`,
        `image`,
        `price`,
        `payment_type`,
        `console`)
        VALUES 
        ('".$_SESSION['id']."', '".$_GET['id']."', '".$_SESSION['order_id']."',
        '".$_GET['title']."', '".$_GET['image']."', '".$_GET['price']."', 
        'Renting/Buying', '".$_SESSION['console_type']."');";
        My_SQL_EXE($conn, $sql);
        
    }  
  }




?>

</body>
</html>