



<style>
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
        justify-content: center;
        flex-wrap: nowrap;
        overflow-x: scroll;

          
    }
    .item-containers{
        padding-right: 100px;
    }

   
</style>


<div class="center" style="margin: 30px;">Most Popular</div>

 <div class="featured-container center">
     <div class="featured-system">
     </div>
     <div class="featured-game">
     </div>
 </div>
 <div style="margin: 30px;" class="center">Featured Deals</div>


 <div class="catalog-row-position">

    <div class="indicator-position">
        <?php 
            require "scroll-indicator.php";
        ?>
    </div>

<div class="row scrollbar-hidden">
    <div class="item-containers">
        <div class="promotion-img center" style="margin:10px ;">
        item img
    
        </div>
        <div class="vendor center" style="margin:10px ;">
        vendor name
        </div>
    </div>
    <div class="item-containers">
        <div class="promotion-img center" style="margin:10px ;">
        item img
    
        </div>
        <div class="vendor center" style="margin:10px ;">
        vendor name
        </div>
    </div>
    <div class="item-containers">
        <div class="promotion-img center" style="margin:10px ;">
        item img
    
        </div>
        <div class="vendor center" style="margin:10px ;">
        vendor name
        </div>
    </div>

    <div class="item-containers">
        <div class="promotion-img center" style="margin:10px ;">
        item img
    
        </div>
        <div class="vendor center" style="margin:10px ;">
        vendor name
        </div>
    </div>

    <div class="item-containers">
        <div class="promotion-img center" style="margin:10px ;">
        item img
    
        </div>
        <div class="vendor center" style="margin:10px ;">
        vendor name
        </div>
    </div>
</div>
</div>

        
