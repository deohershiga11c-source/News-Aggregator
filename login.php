<?php
include 'db.php';
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $_SESSION['username'] = $username;
        // echo "Login successful! Welcome " . $username;
         header("Location: dashboard.html"); 
         exit();
    } else {
        $error = "Invalid username or password!";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bungee&display=swap');

        .bungee-regular {
            font-family: "Bungee", sans-serif;
            font-weight: 400;
            font-style: normal;
            position: absolute;
            bottom: 30px;
            right: 40px;
            max-width: 400px;
            text-align: right;
            border-radius: 10px;
            background: linear-gradient(90deg, rgba(87, 19, 19, 0.65), rgba(167, 106, 106, 0.88), rgba(32, 32, 75, 0.86));
        }

        body {
            background-color: rgb(9, 9, 52);
            display: flex;
        }

        .img-container {
            background-image: url(img.jpg);
            background-size: contain;
            width: 70%;
            height: 100vh;
            border: 4px solid white;
            color: white;
            font-size: 30px;
            font: bold;
            text-align: center;
            position: relative;
        }

        .login-box-container {
            margin: 100px;
            margin-top: 140px;
        }

        .login-box {
            border: 2px solid rgba(255, 255, 255, 0.195);
            height: 400px;
            width: 310px;
            background-color: rgba(26, 26, 106, 0.212);
            border-radius: 6px;
            color: white;
        }

        #user-input,
        #user-pass {
            border-radius: 5px;
            margin: 10px;
            font-size: large;
            padding: 5px;
        }

        .checkbox {
            display: flex;
            justify-content: space-between;
        }

        #button {
            background-color: red;
            border-radius: 10px;
            padding: 10px;
            color: white;
            font-size: 20px;
            margin: 20px;
            padding-left: 35px;
            padding-right: 35px;
            margin-bottom: 0px;
            margin-top: 5px;
        }

        a {
            text-decoration: none;
        }

        #msg {
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="img-container">
        <p class="bungee-regular">
            Your news, your way. <b>Login</b> to unlock a smarter, faster, and personalized news experience.
        </p>
    </div>

    <div class="login-box-container">
        <div class="login-box">
            <center>
                <form method="POST" action="">
                    <h1>LOGIN</h1><br>
                    <input id="user-input" type="text" name="username" placeholder="Username" required><br>
                    <input id="user-pass" type="password" name="password" placeholder="Password" required><br>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember">remember me
                        </label>
                        <label>forgot password ?</label>
                    </div><br>

                    <button type="submit" id="button">Log in</button>

                    <p>Don't have an account? <a href="register.php">register</a></p>

                    <?php if($error != "") { echo "<p style='color:red;'>$error</p>"; } ?>
                </form>
            </center>
        </div>
    </div>
</body>

</html>
