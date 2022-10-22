<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
.menu-container{
    background-color: #73C7E9;
    box-shadow: 1px 1px 10px grey;
    border-radius: 2px;
    transition: .2s;
}

li{
    list-style: none;
}
.navbar{
    min-height: 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 24px;
}
.nav-menu{
    display: flex;
    align-items: center;
    gap: 40px;
}
.nav-link{
    transition: 0.7s ease; 
}
.nav-link:hover{
    color: white;
}

.hamburger{
    display: none;
    cursor: pointer;
}
.bar{
    display: block;
    width: 25px;
    height: 3px;
    margin: 5px auto;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    background-color: black;
}

@media(max-width: 900px){
    .hamburger{
        display: block;
    }
    .hamburger.active .bar:nth-child(2){
        opacity: 0;
    }
    .hamburger.active .bar:nth-child(1){
       translate: 300px 8px;
       rotate: 45deg;
    }
    .hamburger.active .bar:nth-child(3){
        translate: 300px -8px;
        rotate: -45deg;
        
     }

     .nav-menu{
       position: fixed;
       left: -110%;
       top: 190px;
       gap: 0;
       flex-direction: column;
       background-color:#73C7E9;
       width: 50vw;
       text-align: center;
       transition: 0.3s;
       border-radius: 12px;
       box-shadow: 5px 5px 20px grey;
       translate: -10px;
     }
     .nav-item{
        margin: 16px 0;
     }
     .nav-menu.active{
        left: 0;
     }



}

.nav-arrow-btn{
    filter: brightness(0.3);
    translate: -2px 6px ;
}

</style>
<body>

<div class="menu-container">
    <nav class="navbar">
        <!-- <a href="#" class="nav-branding"></a> -->

        <ul class="nav-menu">
            <li class="nav-item">
                <a href="index.php" class="nav-link">Homepage</a>
            </li>

            <li class="nav-item">
                <a href="catalog.php" class="nav-link">Retro Catalog</a>
                <img class="nav-arrow-btn" src="assets/nav-arrow.png" height="20" width="20">

            </li>
            <li class="nav-item">
                <a href="sony-catalog.php" class="nav-link">Sony</a>
            </li>
            <li class="nav-item">
                <a href="microsoft-catalog.php" class="nav-link">Microsft</a>
            </li>
            <li class="nav-item">
                <a href="nintendo-catalog.php" class="nav-link">Nintendo</a>
            </li>
            <li class="nav-item">
                <a href="about.php" class="nav-link">About</a>
            </li>
            <li class="nav-item">
                <a href="items-admin.php" class="nav-link">Admin</a>
            </li>
        </ul>
        <div class="hamburger-container">
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
        
    </nav>
</div>



<script>

    const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");

    // display the links when the menu is clicked
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
    });

    // if a nav link is selected, close the nav bar
    document.querySelectorAll(".nav-link").forEach(n => n.addEventListener('click', () => {
        hamburger.classList.remove("active");
        navMenu.classList.remove("active");

    }))


</script>


    
</body>
</html>