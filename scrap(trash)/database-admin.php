
<?php session_start();?>
<head>
   
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
    .tble-row{

    }

    .tble-data{
        padding: 20px;
        border: 0.5px solid black;
    }
    .db-image{
        border-radius: 12px;
    }
    .tble-data:nth-child(odd){
        background-color: dodgerblue;
        border-radius: 12px;

    }
    .tble-style{
        background-color: #E1B3A1;
        border-collapse:separate; 
        width: 100%; 
        border: 1px solid #E1B3A1;
        box-shadow: 2px 4px 15px grey;

    }

    .admin-controls-container{
        padding: 30px;
    }
    .admin-controls{
        padding: 50px;
        background-color: #E1B3A1;
        border-radius: 12px;
        box-shadow: 2px 4px 12px lightgray;
    }
    input[type=checkbox]{
        height: 30px;
    }
    .tble-name{
        background-color: aliceblue;
        padding: 10px;
    }

    .remove{
        color: red;
        animation: blinking 3s infinite alternate;
    }
    @keyframes blinking {
        from{
            color: red;
        }
        to{
            color: white;
        }
    }

</style>

<body>
    <div>
        <?php

            // HEADER    
            require_once "header.php";

            // NAVIGATION BAR
            require_once "navigation.php";

            require_once "private/DB-Functions.php";
            $conn = My_Connect_DB();
        ?>
    </div>


    <!-- values -->
    <?php 


    // TODO: Validate input function
    function validate_input($input)
    { // Validate user input for better security
        $input = trim($input); //ltrim, rtrim
        $input = htmlspecialchars($input);
        return $input;
    }

    $title = "";
    $description = "";
    $image = "";
    $video = "";


    if (isset($_REQUEST['updatetable'])) {
        $title = validate_input($_REQUEST['title']);
        $description = validate_input($_REQUEST['description']);
        $image = validate_input($_REQUEST['image']);
        $video = validate_input($_REQUEST['video']);
    }


    ?>

    <!-- table view -->
    <h4 class="center tble-name"> Sony</h4>
    
<form method="post">
    <div class="center">
        <table class="tble-style">
            <tr class="tble-row">
                <th class="tble-data">Select</th>
                <th class="tble-data">ID</th>
                <th class="tble-data">Title</th>
                <th class="tble-data">Description</th>
                <th class="tble-data">Video</th>
                <th class="tble-data">Image</th>
            </tr>


            <?php 
              $sql = "SELECT * FROM Sony";
              $result = My_SQL_EXE($conn, $sql);
              
              while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr class="tr-parent">
                <td class="tble-data"><a href=<?= $_SERVER['PHP_SELF']. "?act=remove&id=".$row[0];?>><h4 class="remove" id="remove">Remove</h4></a></td>
                <td class="tble-data"><?=$row[0];?></td></a>
                <td class="tble-data"><?=$row[1];?></td>
                <td class="tble-data"><?=$row[2];?></td>
                <td><?=$row[3];?></td>
                <td class="tble-data"><img src="<?=$row[4];?>" alt="" width="100" class="db-image"></td>
            </tr>
            <?php }?>

          
            <tr class="tr-parent" id="new-row">
                <!-- <td class="tble-data checkbox"><input type="checkbox" name="checkbox"></td> -->
                <td class="tble-data confirm-changes"> <button type="submit" name="updatetable" value="Confirm">Confirm</button></td>
                <td class="tble-data"></td>
                <td class="tble-data"><input type="text" value="<?php echo $title;?>" name="title" placeholder="title"></td>
                <td class="tble-data"><input id="description" name="description" placeholder="description" value="<?php echo $description;?>">
                <td class="tble-data"><input type="text" value="<?php echo $video;?>" name="image" placeholder="video link"></td>
                <td><input type="text" placeholder="image" name="video" value="<?php echo $image;?>"></td>
            </tr>
        </table>
    </div>
    
    <div class="center admin-controls-container">
        <table>
                <tr class="admin-controls-parent">
                    <td class="admin-controls"><button type="submit" name="new" id="new">New</button>
                    </td>
                    <!-- <td class="admin-controls">Update</td> -->
                    <!-- <td class="admin-controls"><input type="submit" name="delete" value="Delete">
                   </td> -->
                </tr>
        </table>
    </div>
    </form>
    <!-- display new row to input information-->
     <script>
    //    document.getElementById('new').addEventListener('click', () =>{
    //      document.getElementById('new-row').style.visibility = 'visible';
         
    //    });

       document.getElementById('remove').addEventListener('click', () =>{
         <?= deleteProduct($conn, $_GET['id']);?>
       });
       
     </script>

     

        <?php 
        //    insert new information into Sony database

            if(isset($_POST['updatetable']) and !empty($_REQUEST['title']) && !empty($_REQUEST['description']) && !empty($_REQUEST['video']) && !empty($_REQUEST['image'])){
                    insertSony($conn);
            }
            else{
                echo "<h4 class=center style='color:red;'>Input information is missing</h4>";
            }
        
        ?>


    <?php

    
      function insertSony($conn){
        $sql = "INSERT INTO Sony(title, description, video, image) VALUES('".$_REQUEST['title']."', '".$_REQUEST['description']."', '".$_REQUEST['video']."', '".$_REQUEST['image']."')";
          My_SQL_EXE($conn, $sql);
      }
      function deleteProduct($conn, $id){
        $sql = "DELETE FROM Sony WHERE id=".$id;
        My_SQL_EXE($conn, $sql);

      }
    
    
    ?>






<div style="padding-top: 100px;">
   <?php require_once 'footer.php'; ?>
</div>
</body>
</html>