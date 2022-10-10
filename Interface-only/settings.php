<?php session_start();?>

<html>
<body>  
<!-- 
#73C7E9
#E1B3A1 -->
<style>
    body{
        margin: 0;
        position: relative;
    }
   label{
    font-size: 20px;
   }

   input{
    width: 40vw;
    height: 50px;
    border: 0.5px solid #73C7E9;
    border-radius: 12px;
    font-size: 20px;
   }
   /* input box flicker on click */
   input:focus{
    animation: flicker 1s alternate infinite;
   }
   @keyframes flicker{
    from{
         opacity: 1;
         border: 1.5px solid tomato;

    }to{
       opacity: 0.4;
       border: 0.5px solid turquoise;
    }
   }

   ::placeholder{
    opacity: 0.6;
   }
   #submit-registration, #submit-login{
    background-color: #73C7E9;
    color: white;
    font-size: 20px;
    border: 1px solid #E1B3A1;
    margin-bottom: 5vh;
    box-shadow: 3px 3px 10px lightgrey;
   }
   #submit-registration:hover, #submit-login:hover{
    background-color: #E1B3A1;
    cursor: pointer;
   }
   .user-icon-account{
    background-color: #73C7E9;
    padding: 20px;
    border-radius: 50px;
    box-shadow: 3px 3px 10px lightgrey;
   }
   .footer-settings{
    position: absolute;
    bottom: 0;
    background-color: #73C7E9;
    height: 50px;
    width: 100%;
    margin-top: 5vh;
   }
   .registration-alts{
      margin-bottom: 20px;
   }
   #to-login-section:hover, #to-registration-section:hover{
      cursor: pointer;
   }
</style>

<div class="">
    <?php
     require_once "private/DB-Functions.php";
     require_once "header.php";
     require_once "navigation.php";
     $conn = My_Connect_DB();
    ?>
</div>

<!-- login/registration backend -->
<?php

    // TODO: Validate input function
    function validate_input($input)
    { // Validate user input for better security
        $input = trim($input); //ltrim, rtrim
        $input = htmlspecialchars($input);
        return $input;
    }

    $email = $username = $password = $confirm = "";
    $emailMSG = $usernameMSG = $passwordMSG = $confirmMSG = "";

    // checks input formats
    if (isset($_REQUEST['submit-registration'])) {
        $username = validate_input($_REQUEST['username-registration']);
        $email = validate_input($_REQUEST['email-registration']);
        $password = validate_input($_REQUEST['password-registration']);
        $confirm = validate_input($_REQUEST['confirm-password']);

        if (empty($username)) $usernameMSG = "username is required";
        if (empty($password)) $passwordMSG = "password is required";
        if($confirm !== $password){
             $confirmMSG = "password does not match! try again";
        }
        if (empty($email)) $emailMSG = "email is required";
        else {
            // PHP email format filter to check for valid email address
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailMSG = "Invalid email format";
            }
        }
        ?>
<?php
        
    }

    function asterisk(){
        echo "<span style='color:red;'>*</span>";
    }

?>

<!-- Create Account -->
<div class="center">
    <h3 id="new" style="color:#73C7E9; display: none;">
        Create Account
    </h3>
</div>

<!-- Welcome Back -->
<div class="center">
    <h3 id="welcome" style="color:#73C7E9; visibility: visible;">
        Welcome Back!
    </h3>
</div>

<!-- user icon -->
<div class="center" style="margin-top: 50px; margin-bottom: 20px;">
    <div class="user-icon-account">
        <i class="fa-solid fa-user-astronaut" style="color: white;"></i>
    </div>
</div>

<?= "<div class=center>".$emailMSG."</div>";?>

<!-- register -->
<section id="registration-section" style="display: none;">
<div class="registration-container center">
    <div class="register">
        <form method="post">
            <fieldset style="border: none;">
            <!-- email -->
            <label for="email-registration">Email</label><br/>
            <input type="text" name="email-registration"
             value="<?php echo $email?>" placeholder="Email"><br/><br/>
            <!-- username -->
            <label for="username-registration">Name</label><br/>
            <input type="text" name="username-registration"
             value="<?php echo $username;?>" placeholder="Username"><br/><br/>
            <!-- password -->
            <label for="password-registration">Password</label><br/>
            <input type="text" name="password-registration"
             value="<?php echo $password?>" placeholder="Password"><br/><br/>
             <!-- confirm password -->
            <label for="confirm-password">Confirm Password</label><br/>
            <input type="text" name="confirm-password"
             value="<?php echo $password?>" placeholder="Confirm Password"><br/><br/>
             <!-- reset password or display login view -->
             <div class="registration-alts" >
                <div class="center">
                   <a href="" style="font-weight: bold;">Forgot Password?</a>
                </div>
               <div class="center">
                   Already have an account?
                   <a id="to-login-section" style="font-weight: bold;">&nbsp;&nbsp;Log in</a>
               </div> 
            </div>
            <!-- submit -->
            <input id="submit-registration" type="submit" name="submit-registration" value="Register">
            </fieldset>
        </form>
    </div>
</div>
</section>

<!-- sign in -->
<section id="login-section" style="visibility: visible;">
<div class="login-container center">
    <div class="login">
        <form  method="post">
            <fieldset style="border: none;">
            <!-- email -->
            <label for="email-login">Email</label><br/>
            <input type="text" name="email-login"
             value="<?php ?>" placeholder="Email"><br/><br/>        
            <!-- password -->
            <label for="password-login">Password</label><br/>
            <input type="text" name="password-login"
             value="<?php ?>" placeholder="Password"><br/><br/>
              <!-- display registration view -->
              <div class="registration-alts" >
               <div class="center">
                   Don't have an account?<a id="to-registration-section" style="font-weight: bold;">&nbsp;&nbsp;Create Account</a>
               </div> 
            </div>
            <!-- submit -->
            <input id="submit-login" type="submit" name="submit-login" value="Login">
            </fieldset>
        </form>
    </div>
</div>
</section>

<!-- footer -->
<div class="footer-settings-container">
    <div class="footer-settings">
    </div>
</div>
</body>
</html>
<script>
// if user clicks 'log in', display login section and login headertag
// hide hide registration view and registration headertag 
    document.getElementById('to-login-section').addEventListener('click', function(){
        document.getElementById('login-section').style.display = 'block';
        document.getElementById('welcome').style.display = 'block';
        document.getElementById('registration-section').style.display = 'none';
        document.getElementById('new').style.display = 'none';
    });
</script>
<script>
// if user clicks 'create account', display registration section and registration headertag
// hide hide login view and login headertag 
    document.getElementById('to-registration-section').addEventListener('click', function(){
        document.getElementById('login-section').style.display = 'none';
        document.getElementById('welcome').style.display = 'none';
        document.getElementById('registration-section').style.display = 'block';
        document.getElementById('new').style.display = 'block';
    });
</script>
