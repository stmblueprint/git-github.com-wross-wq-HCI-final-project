
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title></title>
</head>
<style>
    html,body{
        scroll-behavior: smooth;
        /* overflow-x: hidden; */
        margin-top: 1px;
        
    }
</style>

<body>
   <?php
    // HEADER    
    require_once "header.php";

    // NAVIGATION BAR
    require_once "navigation.php";

    // TEMPORARY NAVIGATION
    // require_once "temp-file-navigation.php";
   
   ?>

<div class="w3-center w3-container">
        <h3>Xbox</h3>
        <!-- display xbox games -->
        <div>
        <?php 
        if($_GET['console'] === 'xbox'){ 
            echo "style='display: block;'";
        ?> 
            class="catalog-row-position">
            <div class="indicator-position">
                <?php 
                    require "scroll-indicator.php";
                ?>
          </div>
        <div class="sony-scrolling"><?php require_once "xbox-view.php";?></div>
        </div>

        <h3>Xbox 360</h3>
        <!-- display xbox 360 games -->
        <div>
        <?php } else if($_GET['console'] === 'xbox 360'){ 
         echo "style='display: block;'"; ?>
         class="catalog-row-position">
          <div class="indicator-position">
              <?php 
                  require "scroll-indicator.php";
              ?>
          </div>
      <div class="sony-scrolling"><?php require_once "xbox-360-view.php";?></div>

      <?php }    
    ?>
        </div>
    </div>

    <?php 
    // FOOTER
     require_once "footer.php"
    ?>
</body>
</html>