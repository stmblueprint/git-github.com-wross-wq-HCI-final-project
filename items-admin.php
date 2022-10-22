<!-- <!DOCTYPE html> -->
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

  body{
    margin: 5px;
  }

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

.center{
  display: flex;
  justify-content: center;
  align-items: center;
}

textarea{
  width: 200px;
  height: 100px;
}


</style>
<?php
require_once "private/DB-Functions.php";
$conn = My_Connect_DB();

function validate_input($input)
{ // Validate user input for better security
    $input = trim($input); //ltrim, rtrim
    $input = htmlspecialchars($input);
    return $input;
}

// fill in the strings below to insert or update a table
$title = "";  // title
$longstr = ""; // description
$description = $conn -> real_escape_string($longstr);
$video = "";  // embed video link
$image = ""; // image name
$price = "59.99"; // price



if (isset($_REQUEST['insertSony']) or isset($_REQUEST['insertMicrosoft']) or isset($_REQUEST['insertNintendo']) ) {
  $title = validate_input($_REQUEST['title']);
  $description = validate_input($_REQUEST['description']);
  $video = validate_input($_REQUEST['video']);
  $image = validate_input($_REQUEST['image']);
  $price = validate_input($_REQUEST['price']);


  
}

// insert Sony
function insertSony($conn, $title, $description, $video, $image, $price ){
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

// insert Microsoft
function insertMicrosoft($conn, $title, $description, $video, $image, $price ){
  $sql = "SELECT * FROM Microsoft WHERE title='".$title."';";
  $result = My_SQL_EXE($conn, $sql);
  $row = mysqli_fetch_row($result);

  if($row[1] <> $title){
    $sql = "INSERT INTO Microsoft (title, description, video, image, price)
    VALUES('" . $title . "','" . $description . "','" . $video . "','" . $image . "', '".$price."');";
    My_SQL_EXE($conn, $sql);
  }
  else{
     echo "<div style='color:red;'>".$title. " is already in the database</div>";
  }
}

// insert Nintendo
function insertNintendo($conn, $title, $description, $video, $image, $price ){
  $sql = "SELECT * FROM Nintendo WHERE title='".$title."';";
  $result = My_SQL_EXE($conn, $sql);
  $row = mysqli_fetch_row($result);

  if($row[1] <> $title){
    $sql = "INSERT INTO Nintendo (title, description, video, image, price)
    VALUES('" . $title . "','" . $description . "','" . $video . "','" . $image . "', '".$price."');";
    My_SQL_EXE($conn, $sql);
  }
  else{
     echo "<div style='color:red;'>".$title. " is already in the database</div>";
  }
}



if(isset($_POST['insertSony']) 
and !empty($_REQUEST['title']) 
and !empty($_REQUEST['description']) 
and !empty($_REQUEST['video'])
and !empty($_REQUEST['image'])
and !empty($_REQUEST['price'])){
  insertSony($conn, $title, $description, $video, $image, $price);
}
else if(isset($_POST['insertMicrosoft']) 
and !empty($_REQUEST['title']) 
and !empty($_REQUEST['description']) 
and !empty($_REQUEST['video'])
and !empty($_REQUEST['image'])
and !empty($_REQUEST['price'])){
  insertMicrosoft($conn, $title, $description, $video, $image, $price);
}
else if(isset($_POST['insertNintendo']) 
and !empty($_REQUEST['title']) 
and !empty($_REQUEST['description']) 
and !empty($_REQUEST['video'])
and !empty($_REQUEST['image'])
and !empty($_REQUEST['price'])){
  insertNintendo($conn, $title, $description, $video, $image, $price);
}


?>
<?php



// Display all Sony images 
function fetchSony($conn){
 $sql = "SELECT * FROM Sony";
 $result = My_SQL_EXE($conn, $sql);

        echo "
        <div class='sony-scrolling'>
        <table ><tr class='row-grid'>";
          while($row = mysqli_fetch_array($result)){
              echo "
               <td class='item-manager'>
               <div class='item-container'>
                <div class='item-img'><img src=".$row[4]." width='250' height='300'></div>
              
               </div> </td>";
          }
        echo "</tr></table></div>";
}

// Display all Microsoft images
function fetchMicrosoft($conn){
  $sql = "SELECT * FROM Microsoft";
  $result = My_SQL_EXE($conn, $sql);
 
         echo "
         <div class='sony-scrolling'>
         <table><tr class='row-grid'>";
           while($row = mysqli_fetch_array($result)){
               echo "
                <td class='item-manager'>
                <div class='item-container'>
                 <div class='item-img'><img src=".$row[4]." width='250' height='300'></div>
                </div></td>";
           }
         echo "</tr></table></div>";
 }


 // Display all Nintendo images
function fetchNintendo($conn){
  $sql = "SELECT * FROM Nintendo";
  $result = My_SQL_EXE($conn, $sql);
 
         echo "
         <div class='sony-scrolling'>
         <table><tr class='row-grid'>";
           while($row = mysqli_fetch_array($result)){
               echo "
                <td class='item-manager'>
                <div class='item-container'>
                 <div class='item-img'><img src=".$row[4]." width='250' height='300'></div>
                </div></td>";
           }
         echo "</tr></table></div>";
 }





// <div class='item-img'><img src=".$row[4]." width='250' height='250'></div>
// <div class='item-title'>".$row[1]."</div>
?>




<form method="post">

<h3 class="center">Sony</h3>
  <?php 

  // Display all Sony
  fetchSony($conn);

  ?>

  <input type="text" name="title" value="<?php $title;?>" placeholder="title">
  <textarea type="text" name="description"  placeholder="description"><?php $description;?></textarea>
  <input type="text" name="video" value="<?php $video;?>" placeholder="video">
  <input type="text" name="image" value="<?php $image;?>"  placeholder="image">
  <input type="text" name="price" value="<?php $price;?>"  placeholder="price">
  <button type="submit" name="insertSony">Insert Sony</button>
</form>


<form method="post">
<h3 class="center">Microsoft</h3>

    <?php 
    // Display all Microsoft
     fetchMicrosoft($conn);


    ?>


<input type="text" name="title" value="<?php $title;?>" placeholder="title">
  <textarea type="text" name="description"  placeholder="description"><?php $description;?></textarea>
  <input type="text" name="video" value="<?php $video;?>" placeholder="video">
  <input type="text" name="image" value="<?php $image;?>"  placeholder="image">
  <input type="text" name="price" value="<?php $price;?>"  placeholder="price">
  <button type="submit" name="insertMicrosoft">Insert Microsoft</button>
</form>


<form method="post">
<h3 class="center">Nintendo</h3>


    <?php 

    // Display all Nintendo
    fetchNintendo($conn);



    ?>
  <input type="text" name="title" value="<?php $title;?>" placeholder="title">
  <textarea type="text" name="description"  placeholder="description"><?php $description;?></textarea>
  <input type="text" name="video" value="<?php $video;?>" placeholder="video">
  <input type="text" name="image" value="<?php $image;?>"  placeholder="image">
  <input type="text" name="price" value="<?php $price;?>"  placeholder="price">
  <button type="submit" name="insertNintendo">Insert Nintendo</button>
</form>