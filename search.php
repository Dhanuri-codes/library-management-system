<?php
include("../config/db.php");

$q = isset($_GET['q']) ? trim($_GET['q']) : "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Search Books</title>

<style>
body{
    font-family: Arial;
    background: linear-gradient(135deg, #141e30, #243b55);
    color:white;
    padding:30px;
}

.container{
    max-width:800px;
    margin:auto;
}

/* search box */
input{
    width:100%;
    padding:12px;
    border-radius:8px;
    border:none;
    margin-bottom:20px;
}

/* result card */
.card{
    background: rgba(255,255,255,0.08);
    padding:12px;
    margin:10px 0;
    border-radius:8px;
    transition:0.3s;
}

.card:hover{
    background: rgba(255,255,255,0.15);
}

.empty{
    text-align:center;
    color:#ffcc00;
}
</style>

</head>

<body>

<div class="container">

<h2>🔍 Search Books</h2>

<form method="GET">
    <input type="text" name="q" placeholder="Search by title..." value="<?= htmlspecialchars($q) ?>">
</form>

<?php
if($q != ""){

    // SAFE query (basic improvement)
    $q_safe = $conn->real_escape_string($q);

    $result = $conn->query("SELECT * FROM books WHERE title LIKE '%$q_safe%'");

    if($result->num_rows > 0){

        while ($row = $result->fetch_assoc()) {
            echo "<div class='card'>
                    📘 <b>{$row['title']}</b><br>
                    ✍ {$row['author']}
                  </div>";
        }

    } else {
        echo "<div class='empty'>⚠ No Books Found</div>";
    }

} else {
    echo "<div class='empty'>🔎 Type something to search books</div>";
}
?>

</div>

</body>
</html>