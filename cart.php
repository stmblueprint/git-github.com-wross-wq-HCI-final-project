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
        margin: 0%;
        position: relative;
        
    }

    .checkout-btn-container{
        padding: 10px;
        display: flex;
        justify-content: right;
        cursor: pointer;
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
        position: relative;
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
        display: flex;
        flex-wrap: wrap;
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
    .checkout-btn-content{
      font-weight: bold;
    }
    .img{
        border-radius: 12px;
        box-shadow: 4px 4px 20px white;
        animation: img 2s alternate infinite;

    }
    .hr-line{
        width: 100vw;
        height: 2px;
        background-color: black;
        opacity: 0.15;
    }
    .tble-grid{
        display: grid;
        grid-template-columns: auto auto;
        gap: 20px;
        
    }
    #remove{
        color: white;
        background-color: tomato;
        border: none;
        cursor: pointer;
        text-shadow: 2px 2px 6px lightgray;
        border-radius: 6px;
        padding: 6px;
        width: 75px;
    }
   .item-info-grid{
    display: grid;
    grid-template-columns: auto;
    justify-content: center;
    padding: 10px;
   }
   .cart-console{
    background-color: #E1B3A1;
    color: black;
    border-radius: 12px;
    padding: 4px;

   }
   .cc{
    animation: cc 5s alternate infinite;
   }
   @keyframes img {
    from{
        translate: 0 -2px;
    }
    to{
        translate: 0 2px;
    }
    
   }
   @keyframes cc {
    from{
        translate: -2px;
    }
    to{
        translate: 3px;
        color: black;
    }
    
   }
   .subtotal-container{
    display: grid;
    grid-template-columns: auto auto;
    justify-content: center;
    align-items: center;
    width: 80vw; 
    border-radius: 12px;
    
   }

   .cart-footer{
    position: fixed;
    bottom: 0%;
   }

 
</style>
<body>




<?php
   // temporary test amount
//    $_SESSION['totalpayment'] = 49.99;



    // HEADER    
    require_once "header.php";
    require_once "private/DB-Functions.php";
    $conn = My_Connect_DB();

    // NAVIGATION BAR
    require_once "navigation.php";

    // TEMPORARY NAVIGATION
    // require_once "temp-file-navigation.php";
   ?>

<?php
$sql = "SELECT customer_id FROM Cart WHERE customer_id='".$_SESSION['id']."'";
$result = My_SQL_EXE($conn, $sql);
$row = mysqli_fetch_array($result);

if($row['customer_id'] === null){
  echo "<div class='center empty-cart'><h4>Your Cart is Empty</h4></div>";
  ?>
  <div class="cart-footer" style="padding-top: 100px;">
    <?php
        // FOOTER  
        require_once "footer.php";
    ?>
 </div>
  <?php
}
else{


?>
<!-- proceed to checkout button -->
<div class="center">
<div class="subtotal-container">
    <div class="subtotal-content center"><?php customerPayment($conn);?></div><br/>
   

<a href="checkout.php">
    <div class="checkout-btn-container">
      <div class="checkout-btn-border">
        <div class="checkout-btn-content">
            Proceed to Checkout <i class="cc fa-sharp fa-solid fa-credit-card"></i>
        </div>
      </div>
    </div>
   </a>
</div>
</div>
   
   <?php // echo $_SESSION['paymentType'];?>


  <!-- cart items -->
        <?php         
            removeItem($conn);
            unset($_GET['remove']);
            
            



            fetchCustomerCart($conn);
        ?>

   


<div style="padding-top: 100px;">
    <?php
        // FOOTER  
        require_once "footer.php";
    ?>
 </div>
 <?php }?>


 <?php
        function fetchCustomerCart($conn){
            $sql = "SELECT * FROM Cart WHERE customer_id='".$_SESSION['id']."';";
            $result = My_SQL_EXE($conn, $sql);

           
            while($row = mysqli_fetch_array($result)){
                echo "
                <div class='cart-item-container'>

                    <div class='tble-grid cart-console'>
                      <div><img class=img src=".$row[5]." height='230' width='180'></div>
                      
                      <div class='item-info-grid'>
                        <h3>".$row['title']."</h3>
                        <div>Console: ".strtoupper($row['console'])."</div>
                        <div>Price: $".$row['price']."</div>
                        <div>".$row['payment_type']."</div>
                      </div>
                        <div id=remove><a href=cart.php?remove=".$row['id'].">Remove</a></div>";

                      
                    echo "</div>";
                
                echo //"<div style='padding:10px'><div class='hr-line'></div></div>
                
                "</div>";
            }
            
        }

            function customerPayment($conn){
                $sql = "SELECT COUNT(customer_id) AS 'amount', SUM(price) AS 'totalDue'
                        FROM Cart
                        WHERE customer_id ='".$_SESSION['id']."';";
                $result = My_SQL_EXE($conn, $sql);
                
                 while($row = mysqli_fetch_array($result)){
                   $totalAmount = $row['totalDue'];
                   $amount = $row['amount'];
                   $_SESSION['total'] = $totalAmount;
                //    $_SESSION['cartAmount'] = $amount;
                }
                echo "<div class='subtotal center'>Subtotal (" . $amount . " items): $" . number_format($totalAmount, 2, '.', '') . "</div>"; 
               
            }

            function removeItem($conn){
                $sql = "DELETE FROM Cart WHERE id ='".$_GET['remove']."';";
                My_SQL_EXE($conn, $sql);
            }


               
        ?>

      
</body>
</html>