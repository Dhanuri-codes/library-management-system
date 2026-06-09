<?php
include("../config/db.php");

$msg = "";

/* ISSUE BOOK */
if(isset($_POST['submit'])){

    $book_id = $_POST['book_id'];
    $member_id = $_POST['member_id'];

    $date = date("Y-m-d");
    $due = date('Y-m-d', strtotime("+7 days"));

    // check availability first
    $check = $conn->query("SELECT available FROM books WHERE id=$book_id");
    $b = $check->fetch_assoc();

    if($b && $b['available'] > 0){

        $conn->query("INSERT INTO issue_books(book_id,member_id,issue_date,due_date)
        VALUES('$book_id','$member_id','$date','$due')");

        $conn->query("UPDATE books SET available=available-1 WHERE id=$book_id");

        $msg = "✅ Book Issued Successfully";

    } else {
        $msg = "❌ Book Not Available";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Issue Book</title>

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
    background: linear-gradient(135deg, #1e3c72, #2a5298);
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

/* messages */
.success{
    background: rgba(0,255,0,0.2);
    padding:8px;
    border-radius:8px;
    margin-bottom:10px;
}

.error{
    background: rgba(255,0,0,0.2);
    padding:8px;
    border-radius:8px;
    margin-bottom:10px;
}
</style>

</head>

<body>

<div class="form-box">

<h2>📤 Issue Book</h2>

<?php if($msg != "") { ?>
    <div class="<?= strpos($msg,'❌') !== false ? 'error' : 'success' ?>">
        <?= $msg ?>
    </div>
<?php } ?>

<form method="POST">

    <input type="number" name="book_id" placeholder="Book ID" required>

    <input type="number" name="member_id" placeholder="Member ID" required>

    <button type="submit" name="submit">Issue Book</button>

</form>

</div>

</body>
</html>