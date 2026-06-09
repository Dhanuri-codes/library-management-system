<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body{
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .dashboard{
            width: 450px;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            text-align: center;
            color: white;
        }

        .dashboard h1{
            margin-bottom: 25px;
            font-size: 28px;
            letter-spacing: 1px;
        }

        .dashboard a{
            display: block;
            margin: 12px 0;
            padding: 12px;
            text-decoration: none;
            color: white;
            background: rgba(255,255,255,0.15);
            border-radius: 10px;
            transition: 0.3s ease;
            font-weight: 500;
        }

        .dashboard a:hover{
            background: #00c6ff;
            transform: scale(1.05);
            color: #000;
        }

        /* Logout button style */
        .dashboard a.logout{
            background: rgba(255, 0, 0, 0.4);
        }

        .dashboard a.logout:hover{
            background: red;
            color: white;
        }
    </style>

</head>

<body>

<div class="dashboard">

    <h1>📚 Library Dashboard</h1>

    <a href="../books/add.php">➕ Add Book</a>
    <a href="../books/list.php">📖 View Books</a>
    <a href="../members/add.php">👤 Add Member</a>
    <a href="../members/list.php">👥 View Members</a>
    <a href="../transactions/issue.php">📤 Issue Book</a>
    <a href="../transactions/return.php">📥 Return Book</a>

    <a class="logout" href="../auth/logout.php">🚪 Logout</a>

</div>

</body>
</html>