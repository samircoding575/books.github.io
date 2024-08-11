<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       
        .login-form {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
        }
        .login-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <script>
        function validateForm() {
            var username = document.forms["loginForm"]["username"].value;
            var password = document.forms["loginForm"]["password"].value;
            if (username == "") {
                alert("Please enter a username.");
                return false;
            }
            if (password == "") {
                alert("Please enter a password.");
                return false;
            }
            return true;
        }

        function changeStyle() {
            let username = document.forms["loginForm"]["username"].value;
            let password = document.forms["loginForm"]["password"].value;
            let usernameInput = document.getElementsByName("username")[0];
            let passwordInput = document.getElementsByName("password")[0];
            
            if (username !== "") {
                usernameInput.style.backgroundColor = "green";
            } else {
                usernameInput.style.backgroundColor = "";
            }

            if (password !== "") {
                passwordInput.style.backgroundColor = "green";
            } else {
                passwordInput.style.backgroundColor = "";
            }
        }
    </script>
</head>
<body>
<form name="loginForm" class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
    <h2>Welcome to bookutopia!</h2>
    Username: <br> <input type="text" name="username"><br>
    Password: <br> <input type="password" name="password"><br>
    <input type="submit" name="submit" value="Login" class="login-button" onclick="changeStyle()">
</form>
<link href="mom.css" rel="stylesheet">
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username)) {
        echo "Please enter a username.";
    } elseif (empty($password)) {
        echo "Please enter a password.";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash')";
    
        try {
            if (mysqli_query($conn, $sql)) {
                echo "You are now registered!";
            } else {
                echo "That username is taken.";
            }
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . "That username is taken.". "<br>" . $conn->error;
        }
        
        
    }
}
mysqli_close($conn);
?>





