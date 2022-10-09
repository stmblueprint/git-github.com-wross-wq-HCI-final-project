


<head>

</head>
<style>

.dropbtn {
  color: black;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;

}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  width: 300px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
  display: grid;
  grid-template-columns: auto auto;
}

.dropdown:hover .dropbtn {
  background-color: turquoise;
  border-radius: 12px;
}

.nav-arrow-btn{
    filter: brightness(0.7);
    translate: -2px 10px ;
}
.table-row-gap{
    padding-right: 20px;
}

</style>

<div class="center">

 <!-- SONY LIST -->
<div class="dropdown">
  <a href="sony-catalog.php">
  <div class="dropbtn">Sony 
    <img class="nav-arrow-btn" src="assets/nav-arrow.png" height="20" width="20"></div>
  <div class="dropdown-content">
  </a>
    
   <table class="center">
    <tr>
        <th>PS1</th>
    </tr>
    <tr>
        <td>Game Title</td>
    </tr>
   </table>

   <table class="center">
    <tr>
        <th>PS2</th>
    </tr>
    <tr>
        <td>Game Title</td>
    </tr>
   </table>

   <table class="center">
    <tr>
        <th>PS3</th>
    </tr>
    <tr>
        <td>Game Title</td>
    </tr>
   </table>   

  </div>
</div>

  
 <!-- MICROSOFT LIST -->
 <div class="dropdown">
  <a href="microsoft-catalog.php">
  <div class="dropbtn">Microsoft 
    <img class="nav-arrow-btn" src="assets/nav-arrow.png" height="20" width="20"></div>
  <div class="dropdown-content">
  </a>
    
   <table class="center">
    <tr>
        <th>XBOX</th>
    </tr>
    <tr>
        <td>Game Title</td>
    </tr>
   </table>

   <table class="center">
    <tr>
        <th>XBOX 360</th>
    </tr>
    <tr>
        <td>Game Title</td>
    </tr>
   </table>

   <table class="center">
    <tr>
        <th>XBOX ONE</th>
    </tr>
    <tr>
        <td>Game Title</td>
    </tr>
   </table>
  </div>
 </div>


 <!-- NINTENDO LIST -->
 <div class="dropdown">
  <a href="nintendo-catalog.php">
  <div class="dropbtn">Nintendo 
    <img class="nav-arrow-btn" src="assets/nav-arrow.png" height="20" width="20"></div>
  <div class="dropdown-content">
  </a>
    
   <table class="center">
    <tr>
        <th>GAME BOY</th>
    </tr>
    <tr>
        <td>Game Title</td>
    </tr>
   </table>

   <table class="center">
    <tr>
        <th>NINTENDO 64</th>
    </tr>
    <tr>
        <td>Game Title</td>
    </tr>
   </table>

   <table class="center">
    <tr>
        <th>NINTENDO DS</th>
    </tr>
    <tr>
        <td>Game Title</td>
    </tr>
   </table>
  </div>
 </div>
</div>