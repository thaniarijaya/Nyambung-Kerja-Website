<?php
$servername = "localhost";
$username = "admin"; //username kita
$password = "admin";
$dbname = "proyektekweb";

//Create connection
//conn: objek yg memuat koneksi ke db kita
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//echo "Connected successfully";
?>