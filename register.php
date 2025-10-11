<?php
session_start();
include 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   

    $username = $_POST['username'];
    $password = $_POST['password'];

     $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        $message = "<h2>click here to <a href='login.php'>login</a></h2>.";
    } else {
        $message = "Error: " . $conn->error;
    }

    
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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
            border-radius:10px ;
            background: linear-gradient(90deg, rgba(83, 6, 43, 0.8), rgba(167, 106, 106, 0.7), rgba(32, 32, 75, 0.89));
        }


        body {
            background-color: rgb(9, 9, 52);
            display: flex;
        }

        .img-container {
            background-image: url(img1.jpg);
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
        .reg-box-container {
            margin: 100px;
            margin-top: 140px;
        }

        .reg-box {
            border: 2px solid rgba(255, 255, 255, 0.195);
            height: 380px;
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
            margin-top: 40px;
        }
        a{
            text-decoration: none;
            color:green;
        }
    </style>

</head>
<body>

    <div class="reg-box-container">
        <div class="reg-box">
            

            <center>
                <form method="POST">
                    <h1>REGISTER</h1><br>
                    <input id="user-input" type="text" name="username" placeholder="Username" required><br>

                    <input id="user-pass" type="password" name="password" placeholder="Password" required><br>

                    <button type="submit" id="button">Register</button>

                </form>
                
                <?php
                if ($message != "") {
                        echo "<p>$message</p>";
                }
                ?>

            </center>
        </div>
    </div>



    <div class="img-container">

        <p class="bungee-regular">
            Your news, your way. <b>Login</b> to unlock a smarter, faster, and personalized news experience.
        </p>

    </div>
</body>
</html>