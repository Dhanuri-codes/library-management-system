<?php
include("../config/db.php");

$msg = "";

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $conn->query("INSERT INTO members(name,email,phone)
    VALUES('$name','$email','$phone')");

    $msg = "✅ Member Added Successfully";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Member</title>

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
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
}

.form-box{
    width:350px;
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(10px);
    padding:25px;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    color:white;
    text-align:center;
}

.form-box h2{
    margin-bottom:15px;
}

.form-box input{
    width:100%;
    padding:10px;
    margin:8px 0;
    border:none;
    border-radius:8px;
    outline:none;
}

.form-box button{
    width:100%;
    padding:10px;
    border:none;
    border-radius:8px;
    background:#00c6ff;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

.form-box button:hover{
    background:#0099cc;
    color:white;
}

.success{
    background: rgba(0,255,0,0.2);
    padding:8px;
    border-radius:8px;
    margin-bottom:10px;
    font-size:14px;
}
</style>

</head>

<body>

<div class="form-box">

<h2>👤 Add New Member</h2>

<?php if($msg != "") echo "<div class='success'>$msg</div>"; ?>

<form method="POST">

    <input type="text" name="name" placeholder="Full Name" required>

    <input type="email" name="email" placeholder="Email" required>

    <input type="text" name="phone" placeholder="Phone Number" required>

    <button type="submit" name="submit">Save Member</button>

</form>

</div>

</body>
</html>