


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>


.footer-container{
  bottom: 0;
}

.footer{
    position: absolute;
    bottom: 0;
    background-color: #73C7E9;
    height: 50px;
    width: 100%;
    margin-top: 5vh;
   }
   .footer-branding{
     opacity: 0.7;
     position: absolute;
     right: 2%;
     bottom: 0%;
     z-index: 10;

    }
    .footer-links{
        translate: 0 -20px;
        /* color: white; */
    }
    .footer-grid{
        display: grid;
        grid-template-columns: 100vw;
    }
</style>


<div class="footer">
    <!-- <div class="footer-settings center">
        Footer
    </div> -->
    <div class="w3-display-bottomleft footer-grid">

        <div>
          <a href="about.php" class="w3-btn footer-links">About</a>
          <a href="login.php" class="w3-btn footer-links">Account</a>

        </div>
        
        
        

        <div class="footer-branding">
            &copy; RetroGaming 2022
        </div>

    </div>
</div>