<?php
include("../config/db.php");

$res = $conn->query("SELECT * FROM members");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Members List</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial, sans-serif;
}

body{
    background: linear-gradient(135deg, #141e30, #243b55);
    min-height:100vh;
    padding:30px;
    color:white;
}

/* container */
.container{
    max-width:900px;
    margin:auto;
}

/* header */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

h2{
    font-size:28px;
}

/* back button */
.back{
    text-decoration:none;
    padding:10px 15px;
    background:#00c6ff;
    color:black;
    border-radius:8px;
    font-weight:bold;
    transition:0.3s;
}

.back:hover{
    background:#0099cc;
    color:white;
}

/* table */
table{
    width:100%;
    border-collapse: collapse;
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(10px);
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

th{
    background:#00c6ff;
    color:black;
    padding:12px;
    text-align:left;
}

td{
    padding:12px;
    border-bottom:1px solid rgba(255,255,255,0.1);
}

tr:hover{
    background: rgba(255,255,255,0.1);
    transition:0.3s;
}

/* empty */
.empty{
    text-align:center;
    margin-top:20px;
    color:#ffcc00;
}

/* email highlight */
.email{
    color:#00ffcc;
}
</style>

</head>

<body>

<div class="container">

<div class="header">
    <h2>👥 Members List</h2>
    <a class="back" href="../admin/dashboard.php">⬅ Back</a>
</div>

<?php if($res->num_rows > 0){ ?>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
</tr>

<?php while($r = $res->fetch_assoc()){ ?>
<tr>
<td><?= $r['id'] ?></td>
<td><?= $r['name'] ?></td>
<td class="email"><?= $r['email'] ?></td>
</tr>
<?php } ?>

</table>

<?php } else { ?>
    <div class="empty">⚠ No Members Found</div>
<?php } ?>

</div>

</body>
</html>