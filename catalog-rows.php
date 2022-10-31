





<style>
    body{
        overflow-x: hidden;
        margin: 0%;
    }
    .featured-container{
        display: grid;
        grid-template-columns: auto auto;
        gap: 50px;
        margin-bottom: 50px;
    }
    
  
    
    .featured-system{
        background-color: lightgrey;
        width: 300px;
        height: 200px;
        border-radius: 12px;

    }
    .featured-game{
        background-color: lightgrey;
        width: 300px;
        height: 200px;
        border-radius: 12px;
    }
    @media only screen and (min-width: 340px) and (max-width: 500px){
        .featured-container{
            display: grid;
            grid-template-columns: auto;
            gap: 30px;
            margin-bottom: 50px;
        }

        .featured-system{
            background-color: lightgrey;
            width: 240px;
            height: 180px;
            border-radius: 12px;

        }
        .featured-game{
            background-color: lightgrey;
            width: 240px;
            height: 180px;
            border-radius: 12px;
        }
    }

    .promotion-img{

        background-color: lightgrey;
        width: 150px;
        height: 200px;
        border-radius: 12px;

    }
    .vendor{
        background-color: lightgrey;
        width: 150px;
        height: 40px;
        border-radius: 12px;

    }
    .row{
        display: flex;
        flex-wrap: nowrap;
        overflow-x: scroll;
          
    }
    .item-containers{
        display: grid;
        justify-content: center;
        padding: 40px;
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


   
</style>
<div style="margin: 30px; font-size: 20px;" class="center scrollbar-hidden">Retro Catalog</div>

<!-- SONY -->
<div style="margin: 30px; font-size: 20px;" class="center scrollbar-hidden">Sony</div>

<div class="catalog-row-position">
    <div class="indicator-position">
        <?php 
            require "scroll-indicator.php";
        ?>
    </div>
<div class="sony-scrolling"><?php require_once "sony-view.php";?></div>
</div>

<!-- MICROSOFT -->
<div style="margin: 30px; font-size: 20px;" class="center scrollbar-hidden">Microsoft</div>

<div class="catalog-row-position">
    <div class="indicator-position">
        <?php 
            require "scroll-indicator.php";
        ?>
    </div>
<div class="sony-scrolling"><?php require_once "microsoft-view.php";?></div>
</div>

<!-- NINTENDO -->
<div style="margin: 30px; font-size: 20px;" class="center">Nintendo</div>
<div class="catalog-row-position">
    <div class="indicator-position">
        <?php 
            require "scroll-indicator.php";
        ?>
    </div>
<div class="sony-scrolling"><?php require_once "nintendo-view.php";?></div>
</div>