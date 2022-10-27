
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
        /*overflow-x: hidden;*/
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
        <h3>Playstation 1</h3>
        <div>
            <?php require_once 'assets/catalog-content/sony-console-pages/ps1-content.php'; ?>
        </div>

        <h3>Playstation 2</h3>
        <div>
            <?php require_once 'assets/catalog-content/sony-console-pages/ps2-content.php'; ?>
        </div>

        <h3>Playstation 3</h3>
        <div>
            <?php require_once 'assets/catalog-content/sony-console-pages/ps3-content.php'; ?>
        </div>

    </div>
    <footer>
        <div style="padding-top: 100px;">
            <?php require_once 'footer.php'; ?>
        </div>
    </footer>
</body>
</html>