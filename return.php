<?php
include("../config/db.php");

$msg = "";

if(isset($_POST['submit'])){

    $id = $_POST['issue_id'];

    // get issue record
    $row = $conn->query("SELECT * FROM issue_books WHERE id=$id")->fetch_assoc();

    if($row){

        $today = date("Y-m-d");
        $due = $row['due_date'];

        $fine = 0;

        // calculate fine if late
        if(strtotime($today) > strtotime($due)){
            $days = (strtotime($today) - strtotime($due)) / 86400;
            $fine = $days * 10;
        }

        // update issue record
        $conn->query("UPDATE issue_books 
        SET return_date='$today', fine='$fine', status='returned'
        WHERE id=$id");

        // restore book quantity
        $conn->query("UPDATE books 
        SET available=available+1 
        WHERE id={$row['book_id']}");

        $msg = "✅ Book Returned Successfully | Fine = Rs. $fine";

    } else {
        $msg = "❌ Invalid Issue ID";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Return Book</title>

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

<h2>📥 Return Book</h2>

<?php if($msg != "") { ?>
    <div class="<?= strpos($msg,'❌') !== false ? 'error' : 'success' ?>">
        <?= $msg ?>
    </div>
<?php } ?>

<form method="POST">

    <input type="number" name="issue_id" placeholder="Issue ID" required>

    <button type="submit" name="submit">Return Book</button>

</form>

</div>

</body>
</html>