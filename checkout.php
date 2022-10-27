<?php session_start(); ?>

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
.paypal-buttons-container{
    margin: 30px;
    padding-top: 10px;
}

.table-row{
    display: grid;
    grid-template-columns: auto auto;
    gap: 50px;
    margin: 20px;
}
.tble-grid{
        display: grid;
        grid-template-columns: auto auto;
        gap: 20px;
        
    }
    .cart-item-container{
        margin: 10px;
    }
    .img{
        border-radius: 12px;
        box-shadow: 4px 4px 16px gray;
    }
    .heading{
        margin-right: auto;
        margin-left: auto;
        background-color: #73C7E9; 
        color: white;
        width: 50vw;
        border-radius: 6px;
        box-shadow: 4px 4px 16px lightgray;
    }

</style>



    <?php
        // HEADER    
        require_once "header.php";

        // NAVIGATION BAR
        require_once "navigation.php";
        require_once "private/DB-Functions.php";
        $conn = My_Connect_DB();

        // TEMPORARY NAVIGATION
        // require_once "temp-file-navigation.php";
    ?>
     



     <div class="items-information">
        <div class="heading"><div class=""><h4 class="center">Payment</h4></div></div>
<?php 
$sql = "SELECT * FROM Cart WHERE customer_id='".$_SESSION['id']."';";
$result = My_SQL_EXE($conn, $sql);
$row = mysqli_fetch_array($result);
?>

        <table>
            <tr class="table-row">
                <td>Total:$<?= number_format($_SESSION['total'], 2, '.', ''); ?></td>
                <td>ID: <?php echo $row[3];?></td>
            </tr>
        </table>

        <?php fetchCustomerCart($conn);?>
     </div>

      
    <!-- paypal payment options -->

    <div class="paypal-buttons-container">
        <div class="paypal-buttons-border">
            <div class="paypal-buttons-content">
              <?php require_once "APIs/paypal/checkout.php";?>
            </div>
        </div>
    </div>




    <div style="padding-top: 100px;">
            <?php
                // FOOTER  
                require_once "footer.php";


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
                                <div>Price: $".$row['price']."</div>
                                <div>".$row['payment_type']."</div>
                              </div>";

                            echo "</div>";
                        
                        echo "<div style='padding:10px'><div class='hr-line'></div></div>
                        
                        </div>";
                    }
                    
                }
            ?>
    </div>

