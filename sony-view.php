
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

  .item-img{
    background-color: lightgray;
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
    font-size: 20px;
    background-color: aliceblue;
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



</style>
<?php
require_once "private/DB-Functions.php";
$conn = My_Connect_DB();

$title = "Batman Arkham Asylum";  // title
$longstr = "Explore every inch of Arkham Asylum and roam freely on the infamous island, presented for the first time ever in its gritty and realistic entirety Experience what it's like to be Batman using Batarangs, explosive gel aerosol, The Batclaw, sonar resonator and the line launcher Unlock more secrets by completing hidden challenges in the world and develop and customize equipment by earning experience points Move through the environment with the use of Batman's grapnel gun to get to out-of-reach places, and jump from any height to glide in any direction";
$description = $conn -> real_escape_string($longstr);
$video = "https://www.youtube.com/embed/T8bu2Y_cZb8";  // embed video link
$image = "assets/sony/batmanarkhamasylum.png"; // image name
$price = "59.99";


function insert($conn, $title, $description, $video, $image, $price ){
  $sql = "SELECT * FROM Sony WHERE title='".$title."';";
  $result = My_SQL_EXE($conn, $sql);
  $row = mysqli_fetch_row($result);

  if($row[1] <> $title){
    $sql = "INSERT INTO Sony (title, description, video, image, price)
    VALUES('" . $title . "','" . $description . "','" . $video . "','" . $image . "', '".$price."');";
    My_SQL_EXE($conn, $sql);
  }
  else{
     echo "<div style='color:red;'>".$title. " is already in the database</div>";
  }
}
if(isset($_POST['insert'])){
  insert($conn, $title, $description, $video, $image, $price);
}
else{
  ;
}
?>
<?php
// invoke item functions
echo "<div class='sony-scrolling'>
  <div class='content-border'>
    <div class=''>".fetchSony($conn)."</div>
  </div
</div>";

function fetchSony($conn){
 $sql = "SELECT * FROM Sony";
 $result = My_SQL_EXE($conn, $sql);
        echo "<table><tr class='row-grid'>";
          while($row = mysqli_fetch_array($result)){
              echo "
               <td class='item-manager'>
               <div class='item-container'>
                <div class='item-img'>
                <a href='product-page.php?id=".$row[0]."&title=".$row[1]."&video=".$row[3]."&image=".$row[4]."&price=".$row[5]."'><img src=".$row[4]." width='250' height='300'></a></div>
               </td>
               </div>";
          }
        echo "</tr></table>";
}
?>

