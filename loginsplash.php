


<?php session_start();?>
<meta name="viewport" content="width=device-width, initial-scale=1" />

<style>

.splash{
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100vh;
    background-color: white;
    opacity: 0.7;
    color: black;
    z-index: 200;

}
.splash.display-none{
    position: fixed;
    width: 100%;
    opacity: 0;
    color: black;
    background-color: white;
    transition: all 0.5s;
    z-index: -10;
    
}
.feedback-words{
  position: absolute;
  text-shadow: 2px 2px 4px grey;

}
@keyframes fadeIn{
    to{
        opacity: 1;
    }
}
.fade-in{
    opacity: 0;
    animation: fadeIn 1s ease-in forwards;
}

</style>

<div class="splash">
    <img src="https://cdn.dribbble.com/users/3337757/screenshots/6825268/076_-loading_animated_dribbble_copy.gif" alt="" height="400">
    <div class="feedback-words">
       <h1 ><?= ucfirst($_SESSION['username']).", Welcome Back!";?></h1>
    </div>
</div>

<script>
  const splash = document.querySelector('.splash');

  document.addEventListener('DOMContentLoaded', (e) =>{
    setTimeout(() =>{
        splash.classList.add('display-none')
        window.top.location='index.php'

    }, 8000);
  })

</script>