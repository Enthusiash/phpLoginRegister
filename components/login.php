<?php
    session_start();
?>
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
            if (isset($_POST['submit'])){
                $username = mysqli_real_escape_string($con, $_POST['username']); // Corrected field name
                $password = mysqli_real_escape_string($con, $_POST['password']);

                $result = mysqli_query($con, "SELECT * FROM users WHERE Username='$username' AND Password='$password'") or die("Select Error!"); // Corrected field name
                $row = mysqli_fetch_assoc($result);

                if (is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['fullname'] = $row['Fullname'];
                    $_SESSION['id'] = $row['Id'];
                } else {
                    echo "<div class='message'>
                          <p>Wrong username or password!</p>
                          </div> <br>";
                }

                if (isset($_SESSION['valid'])) {
                    header("Location: home.php");
                }
            }
            ?>
            
            <header>Login</header>
                <form action="" method="post">
                    <div class="field-input">
                        <label for="username">Username: </label>
                        <input type="text" name="username" id="username" required>
                    </div>
                    <div class="field-input">
                        <label for="password">Password: </label>
                        <input type="password" name="password" id="password" required> <!-- Corrected input type -->
                    </div>
                    <div class="field-input">
                        <input type="submit" class="btn" name="submit" value="Login" required>
                    </div>
                    <div class="link">
                        Don't have an account? <a href="register.php">Register here.</a>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>