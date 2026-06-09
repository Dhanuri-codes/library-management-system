<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Library System</title>

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
    color:white;
}

/* main box */
.container{
    text-align:center;
    padding:40px;
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(10px);
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

/* title */
h1{
    font-size:32px;
    margin-bottom:20px;
}

/* subtitle */
p{
    margin-bottom:25px;
    opacity:0.8;
}

/* button */
a{
    display:inline-block;
    padding:12px 25px;
    background:#00c6ff;
    color:black;
    text-decoration:none;
    border-radius:8px;
    font-weight:bold;
    transition:0.3s;
}

a:hover{
    background:#0099cc;
    color:white;
    transform:scale(1.05);
}
</style>

</head>

<body>

<div class="container">

    <h1>📚 Library Management System</h1>

    <p>Manage Books, Members & Transactions Easily</p>

    <a href="auth/login.php">🔐 Login to Dashboard</a>

</div>

</body>
</html>