<?php
session_start();
include("../config/db.php");

$error = "";

if(isset($_POST['login'])){

    $u = $_POST['username'];
    $p = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$u' AND password='$p'";
    $res = $conn->query($sql);

    if($res->num_rows > 0){
        $_SESSION['admin'] = $u;
        header("Location: ../admin/dashboard.php");
        exit();
    }else{
        $error = "❌ Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial, sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg, #141e30, #243b55);
}

.login-box{
    width:320px;
    background: rgba(255,255,255,0.1);
    padding:30px;
    border-radius:15px;
    backdrop-filter: blur(10px);
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    text-align:center;
    color:white;
}

.login-box h2{
    margin-bottom:20px;
}

.login-box input{
    width:100%;
    padding:10px;
    margin:10px 0;
    border:none;
    border-radius:8px;
    outline:none;
}

.login-box button{
    width:100%;
    padding:10px;
    border:none;
    border-radius:8px;
    background:#00c6ff;
    color:black;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

.login-box button:hover{
    background:#0099cc;
    color:white;
}

.error{
    color:#ff4d4d;
    margin-bottom:10px;
    font-size:14px;
}
</style>

</head>

<body>

<div class="login-box">

    <h2>🔐 Admin Login</h2>

    <?php if($error != "") echo "<div class='error'>$error</div>"; ?>

    <form method="POST">

        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" name="login">Login</button>

    </form>

</div>

</body>
</html>