<?php
    session_start();
    //load connect.php
    require_once "connect.php";

    if(isset($_POST['pilih'])) {  

        $username = $_SESSION["username"];

        $foto_id = $_POST['foto_baru'];
        
        $sql ="UPDATE employee SET foto_id='$foto_id' WHERE username='$username'";
        if (mysqli_query($conn, $sql)) {
            header("location: editprofil.php");
        } else {
            echo "Terjadi kesalahan. Silahkan coba lagi!";           
        }
    }  
?>