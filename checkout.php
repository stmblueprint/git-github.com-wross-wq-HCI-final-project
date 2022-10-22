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


</style>



    <?php
        // HEADER    
        require_once "header.php";

        // NAVIGATION BAR
        require_once "navigation.php";

        // TEMPORARY NAVIGATION
        // require_once "temp-file-navigation.php";
    ?>
     



     <div class="items-information">

        <table>
            <tr class="table-row">
                <td>Total:$49.99</td>
                <td>OrderID:</td>
            </tr>
        </table>
        <hr style="height: 3px;"/>



        <table>
            <tr class="table-row">
                    <td>image</td>
                    <td>price</td>
                    <tr class="table-row"><td>product name</td></tr>
            </tr>
        </table>
        <hr style="height: 3px;"/>

        <table>
            <tr class="table-row">
                    <td>image</td>
                    <td>price</td>
                    <tr class="table-row"><td>product name</td></tr>
            </tr>
        </table>
        <hr style="height: 3px;"/>

     <div class="items-container center">
        <div class="items-border">
            <div class="items-content">

            </div>
        </div>
     </div>
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
            ?>
    </div>

