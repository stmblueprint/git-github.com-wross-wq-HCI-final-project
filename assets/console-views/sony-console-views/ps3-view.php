
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
  .item-img{
    padding: 10px;
    border-radius: 12px;
    box-shadow: 2px 2px 14px gray;
  }
  .item-title{
    background-color: lightgray;
    padding: 10px;
    border-radius: 12px;
    box-shadow: 2px 2px 14px gray;
    font-size: 20px;
    font-weight: bold;
  }
  button[type='submit']{
    margin: 10px;
    padding: 10px;
    border-radius: 12px;
  }
  .item-container {
     padding: 10px;          
  }
  .row-grid{
    /* display: inline-grid; */
    padding: 30px;
  }
.sony-scrolling{
  overflow-x: scroll;
}
.item-img:hover{
    scale: 1.2;
  }


</style>
<?php
require_once "private/DB-Functions.php";
$conn = My_Connect_DB();

?>
<?php
// invoke item functions
echo "<div class='sony-scrolling'>
  <div class='content-border'>
    <div class=''>".fetchSony($conn)."</div>
  </div
</div>";

function fetchSony($conn){
  $sql = "SELECT s.title, s.video, p.image, s.price, s.console FROM Sony s WHERE s.title = 'ps3'";
 $result = My_SQL_EXE($conn, $sql);
        echo "<table><tr class='row-grid'>";
          while($row = mysqli_fetch_array($result)){
              echo "
               <td class='item-manager'>
               <div class='item-container'>
                <div class='item-img'>
                <a href='product-page.php?id=".$row[0]."&title=".$row[1]."&video=".$row[3]."&image=".$row[4]."&price=".$row[5]."&console=ps3'><img class=img src=".$row[4]." width='140' height='190'></a></div>
               </td>
               </div>";
          }
        echo "</tr></table>";
}
?>

