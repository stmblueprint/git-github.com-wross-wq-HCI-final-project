
<?php session_start();?>
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
   
    body,html{
        overflow-x: hidden;
        scroll-behavior: smooth;
        /* overflow-x: hidden; */
        margin-top: 1px;
        position: relative;
        margin: 0%;
        
    }
    .catalog-row-position{
        position: relative;
    }
    .indicator-position{
        position: absolute;
        z-index: 1;
        right: 0%;
        translate: 20px 50px;
       
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

    //SLIDESHOW
    require_once "slideshow.php";
   ?>


    <?php 
      require_once "homepage-content.php";
    ?>



<div style="padding-top: 100px;">
   <?php require_once 'footer.php'; ?>
</div>
</div>
</body>
</html>