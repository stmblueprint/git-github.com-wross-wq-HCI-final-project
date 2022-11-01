
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

    <div class="w3-container center">
        <h1>About Us</h1>
    </div>

    <div class="w3-container center">
    <p>Our mission is to provide options for gamers who are feeling nostalgic and whant to revisit 
        there past by playing the video games that helped shape them as kids. With good prices, options to rent or buy,
        and seemless browsing. Take a look! We're sure you wont be disapointed!</p>
    </div>

    <?php 
    // FOOTER
     require_once "footer.php"
    ?>
</body>
</html>