






<style>
    .nav-arrow-container{
        rotate: -90deg;
        animation: point 0.8s infinite alternate;
    }
    @keyframes point {
        0%{
            translate: -2px;
            opacity: 0.6;
        }
        25%{
            opacity: 0.6;
        }
        75%{
            opacity: 0.9;
        }
        100%{
            translate: 6px;
        }
    }

    .nav-arrow{
        filter: brightness(1.1)
    }
</style>

<div class="nav-arrow-container">
   <div class="nav-arrow">
      <img src="assets/nav-arrow.png" alt="scroll" width="100">
   </div>
</div>
