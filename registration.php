<?php session_start(); ?>

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

    <div class="body-grid">
        <div class="">
            <?php
            require_once "private/DB-Functions.php";
            require_once "header.php";
            require_once "navigation.php";
            $conn = My_Connect_DB();
            ?>
        </div>

        <!-- registration backend -->
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
            if ($confirm !== $password) {
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
        // indication for required fields
        function asterisk()
        {
            echo "<span style='color:red;'>*</span>";
        }

        ?>

        <!-- Create Account heading-->
        <div class="center">
            <h3 id="new" style="color:#73C7E9;">
                Create Account
            </h3>
        </div>

        <!-- user icon -->
        <div class="center" style="margin-top: 50px; margin-bottom: 20px;">
            <div class="user-icon-account">
                <i class="fa-solid fa-user-astronaut" style="color: white;"></i>
            </div>
        </div>

        <!-- display error messages -->
        <?= "<div class='center messages'>" . $emailMSG . "</div>
     <div class='center messages'>" . $usernameMSG . "</div>
     <div class='center messages'>" . $passwordMSG . "</div>
     <div class='center messages'>" . $confirmMSG . "</div>";
        ?>

        <!-- call the function to create new user when user submit form -->
        <?php
        if (isset($_POST['submit-registration'])) {
            if (
                !empty($email) and !empty($username) and !empty($password)
                and !empty($confirm) and $emailMSG !== 'Invalid email format' and
                $confirmMSG !== 'password does not match! try again'
            ) {
                saveUser($conn, $email, $password, $username);
                echo "<script>window.top.location='registrationsplash.php'</script>";

            }
        }
        My_Disconnect_DB($conn);

        ?>
        <!-- store new user info into database -->
        <?php
        function saveUser($conn, $email, $password, $username)
        {
            // check if user exists
            $checkForUser = "SELECT * FROM Customers WHERE email='" . $email . "' AND password='" . $password . "';";
            $result = My_SQL_EXE($conn, $checkForUser);
            $row = mysqli_fetch_array($result);

            // TODO: encrpyt user password


            // insert user info into database
            if ($row[1] <> $email) {
                $sql = "INSERT INTO Customers(email, username, password) 
                VALUES('" . $email . "','" . $username . "','" . $password . "');";
                $result = My_SQL_EXE($conn, $sql);
                $_SESSION['username'] = $username;
                // echo "<div class=center style='color:green; font-size:20px;'>Success! <a href='login.php' style='font-weight: bold;'>&nbsp;&nbsp; Log in</a></div>";
            } else {
                echo "<div class=center style='color:red; font-size:20px;'>User already exists! <a href='login.php' style='font-weight: bold;'>&nbsp;&nbsp; Log in</a></div>";
            }
        }

        ?>


        <!-- register -->
        <section id="registration-section">
            <div class="registration-container center">
                <div class="register">
                    <form method="post">
                        <fieldset style="border: none;">
                            <!-- email -->
                            <label for="email-registration">Email <?php asterisk(); ?></label><br />
                            <input type="text" name="email-registration" value="<?php echo $email ?>" placeholder="Email"><br /><br />
                            <!-- username -->
                            <label for="username-registration">Name <?php asterisk(); ?></label><br />
                            <input type="text" name="username-registration" value="<?php echo $username; ?>" placeholder="Username"><br /><br />
                            <!-- password -->
                            <label for="password-registration">Password <?php asterisk(); ?></label><br />
                            <input type="password" name="password-registration" value="<?php echo $password ?>" placeholder="Password"><br /><br />
                            <!-- confirm password -->
                            <label for="confirm-password">Confirm Password <?php asterisk(); ?></label><br />
                            <input type="password" name="confirm-password" value="<?php echo $confirm ?>" placeholder="Confirm Password"><br /><br />
                            <!-- reset password or display login view -->
                            <div class="registration-alts">
                                <div class="center">
                                    <a href="" style="font-weight: bold;">Forgot Password?</a>
                                </div>
                                <div class="center">
                                    Already have an account?
                                    <a href="login.php" id="to-login-section" style="font-weight: bold;">&nbsp;&nbsp;Log in</a>
                                </div>
                            </div>
                            <!-- submit -->
                            <input id="submit-registration" type="submit" name="submit-registration" value="Register">
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>


       <?php
        // FOOTER  
        require_once "footer.php";
       ?>
    </div>
</body>

</html>