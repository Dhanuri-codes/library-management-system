<?php
$conn = new mysqli("localhost","root","","library_system");

if($conn->connect_error){
    die("DB Error");
}
?>