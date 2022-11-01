<?php session_start();?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1" />

<body>
    <!-- 
#73C7E9
#E1B3A1 -->
    <style>
        body {
            margin: 0;
            position: relative;
        }

        label {
            font-size: 20px;
        }

        input {
            width: 70vw;
            height: 50px;
            border: 0.5px solid #73C7E9;
            border-radius: 12px;
            font-size: 20px;
        }

        /* input box flicker on click */
        input:focus {
            animation: flicker 1s alternate infinite;
        }

        @keyframes flicker {
            from {
                opacity: 1;
                border: 1.5px solid tomato;

            }

            to {
                opacity: 0.4;
                border: 0.5px solid turquoise;
            }
        }

        ::placeholder {
            opacity: 0.6;
        }

        #submit-registration,
        #submit-login {
            background-color: #73C7E9;
            color: white;
            font-size: 20px;
            border: 1px solid #E1B3A1;
            margin-bottom: 5vh;
            box-shadow: 3px 3px 10px lightgrey;
        }

        #submit-registration:hover,
        #submit-login:hover {
            background-color: #E1B3A1;
            cursor: pointer;
        }

        .user-icon-account {
            background-color: #73C7E9;
            padding: 20px;
            border-radius: 50px;
            box-shadow: 3px 3px 10px lightgrey;
        }

        .footer-settings {
            position: absolute;
            bottom: 0;
            background-color: #73C7E9;
            height: 50px;
            width: 100%;
            margin-top: 5vh;
        }

        .registration-alts {
            margin-bottom: 20px;
        }

        #to-login-section:hover,
        #to-registration-section:hover {
            cursor: pointer;
        }

        .messages {
            color: tomato;
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

    <!-- login backend -->
    <?php

    // TODO: Validate input function
    function validate_input($input)
    { // Validate user input for better security
        $input = trim($input); //ltrim, rtrim
        $input = htmlspecialchars($input);
        return $input;
    }

    $email = $password = "";
    $emailMSG = $passwordMSG = "";

    // checks input formats
    if (isset($_REQUEST['submit-login'])) {

        $email = validate_input($_REQUEST['email-login']);
        $password = validate_input($_REQUEST['password-login']);
        if (empty($password)) $passwordMSG = "password is required";
        if (empty($email)) $emailMSG = "email is required";
        else {
            // PHP email format filter to check for valid email address
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailMSG = "Invalid email format";
            }
        }
    }
    ?>
    <?php
    function asterisk()
    {
        echo "<span style='color:red;'>*</span>";
    }

    // TODO: fetch encryted password

    // fetch user information database
   
    function fetchUser($conn, $email, $password)
    {
        $checkForUser = "SELECT * FROM Customers WHERE email='" . $email . "' AND password='" . $password . "';";
        $result = My_SQL_EXE($conn, $checkForUser);
        $row = mysqli_fetch_array($result);


        if ($row[1] <> null and $row[3] <> null) {
            $_SESSION['username'] = $row[2];
            $_SESSION['id'] = $row[0];

            echo "<div class='center' style='color: green;'>You logged in successfully!</div>";
            echo "<script>window.top.location='loginsplash.php'</script>";

        } else {
            echo "<div class='center messages'>User credentials doesn't exist! Try again</div>";
        }
    }

    ?>

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

    <?=
    "<div class='center messages'>" . $emailMSG . "</div>
     <div class='center messages'>" . $passwordMSG . "</div>;"
    ?>

    <?php
    // call function fetchUser function when login is attempted

    if (isset($_POST['submit-login'])) {
        if (!empty($email) and !empty($password) and $emailMSG !== 'Invalid email format') {
            fetchUser($conn, $email, $password);

        }
    }
    My_Disconnect_DB($conn);

    ?>



    <!-- sign in -->
    <section id="login-section">
        <div class="login-container center">
            <div class="login">
                <form method="post">
                    <fieldset style="border: none;">
                        <!-- email -->
                        <label for="email-login">Email <?php asterisk(); ?></label><br />
                        <input type="text" name="email-login" value="<?php echo $email; ?>" placeholder="Email"><br /><br />

                        <!-- password -->
                        <label for="password-login">Password <?php asterisk(); ?></label><br />
                        <input type="password" name="password-login" value="<?php echo $password; ?>" placeholder="Password"><br /><br />
                        <!-- display registration view -->
                        <!-- reset password or display login view -->

                        <div class="registration-alts">

                            <div class="center">
                                <a href="" style="font-weight: bold;">Forgot Password?</a>
                            </div>
                            <div class="center">
                                Don't have an account?<a href="registration.php" id="to-registration-section" style="font-weight: bold;">&nbsp;&nbsp;Create Account</a>
                            </div>
                        </div>
                        <!-- submit -->
                        <input id="submit-login" type="submit" name="submit-login" value="Login">
                    </fieldset>
                </form>
            </div>
        </div>
    </section>

    <?php
        // FOOTER  
        require_once "footer.php";
    ?>
</body>

</html>