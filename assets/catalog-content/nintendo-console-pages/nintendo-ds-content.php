<style>

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

<div class="catalog-row-position">

<div class="indicator-position">
    <?php 
        require "scroll-indicator.php";
    ?>
</div>

<div class="row scrollbar-hidden">
<div class="item-containers">
    <div class="promotion-img center" style="margin:10px ;">
        <image src="assets/nintendo-images/s-l500.jpg" style="width:40%;">
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