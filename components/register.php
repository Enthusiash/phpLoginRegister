<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/login-register/styles/style.css">
    <title>Document</title>
</head>
<body>
    <div class="main-container">
        <div class="box form-box">

        <?php
        
            include("../php/config.php");
            if(isset($_POST['submit'])){
                $fullname = $_POST['fullname'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                // Verifying the unique email

                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

                if(mysqli_num_rows($verify_query) != 0){
                    echo "<div class='message'>
                            <p>This email is used, try another one!</p>
                          </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go back</button>";
                }
                
                else {
                    mysqli_query($con, "INSERT INTO users(Fullname, Username, Email, Password) VALUES('$fullname','$username','$email','$password')") or die("Error occured!");
                    echo "<div class='message'>
                            <p>Registered Successfully!</p>
                          </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Login now.</button>";
                }
            } else {

        ?>

            <header>Register</header>
                <form action="" method="post">
                    <div class="field-input">
                        <label for="fullname">Full Name: </label>
                        <input type="text" name="fullname" id="fullname" autocomplete="off" required>
                    </div>
                    <div class="field-input">
                        <label for="username">Username: </label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>
                    <div class="field-input">
                        <label for="email">Email: </label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>
                    <div class="field-input">
                        <label for="password">Password: </label>
                        <input type="text" name="password" id="password" autocomplete="off" required>
                    </div>
                    <div class="field-input">
                        <label for="password">Confirm Password: </label>
                        <input type="text" name="password" id="password" autocomplete="off" required>
                    </div>
                    <div class="field-input">
                        <input type="submit" class="btn" name="submit" value="Register" required>
                    </div>
                    <div class="link">
                        Already have an account? <a href="login.php">Login here.</a>
                    </div>
                </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>