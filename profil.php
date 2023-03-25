<!--EMPLOYEE-->
<!DOCTYPE html>
<html>
    <?php
        session_start();
        //load connect.php
        require_once "connect.php";
    ?>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<style>
    body {
        font-family: "Poppins", sans-serif;
    }

    h3{
        font-family: "Poppins", sans-serif;
        font-weight: bold;
        opacity:0.9;
        padding-top:8px;
    }

    p{
        opacity:0.8;
        font-size:13px;
    }

    h4{
        opacity:0.9;
        font-size:15px;
    }

    strong{
        opacity:0.8;
        color: #878787;
        font-size:18px;
    }


    a{
        color: white;
        font-size:30px;
    }

    a:hover{
        text-decoration: none;
        color: white;
    }

    button{
        color:#959392;
    }

    img{
        max-width: 15%;
    }

    .navbar{
        background-color: #AA2EE6;
        font-size:18px;
        max-width: 100%;
        background-image :url(img/bgnavbarTop.png);
        background-position:right;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .container-profile {
        background-image :url(img/bgnavbarBel.png);
        background-position:top;
        background-size: 100% 50%;
        background-repeat: no-repeat;
        padding: 0px;
        margin: -16.5px;
    }

    .a1 {
        font-size:18px;
        color: #aaa9a8;
    }

    .a1:hover{
        color: #784CFB;
    }

    .previous{
        color: white;
        font-size:50px;
    }

    .btn{
        background-color:#784CFB;
        border: 0;
        color: white;
        border-radius:15px;
        width:40%;
        font-size:18px;
        height:40px;
    }

    .btn:focus, 
    .btn:active, 
    .btn:hover{
        text-decoration: none;
        background-color:#23049D;
        color: white;
        box-shadow: 2px 2px 2px #23049D;
    }

    .modal-body{
        text-align: center;
        font-size:20px;
        font-weight: bold;
        opacity:0.9;
        padding-bottom:30px;
        padding-top:10px;
    }

    .container-modal{
        margin:5px;
        padding-left:30px;
        padding-top:10px;
        padding-bottom:30px;
        padding-right:30px;
    }

    .btn1{
        color: #878787;
        font-weight: bold;
        text-align:right;
        float: right;
    }

    .btn1:focus, 
    .btn1:active, 
    .btn1:hover{
        text-decoration: none;
        color: #959392;
    }

    .btn2{
        background-color:#784CFB;
        border: 0;
        color: white;
        border-radius:15px;
        width:40%;
        font-size:18px;
        float:right;
        text-align:center;
        height:40px;
        padding-top:8px;
    }

    .btn2:focus, 
    .btn2:active, 
    .btn2:hover{
        text-decoration: none;
        background-color:#23049D;
        color: white;
        box-shadow: 2px 2px 2px #23049D;
    }

</style>
</head>
<body>
<nav class="navbar navbar-expand-sm">
    <div class="container">
    <a href="display.php" class="previous">&#8249;</a>
    <a class="fas fa-sign-out-alt" data-toggle="modal" data-target="#myModal"></a>
    </div>
</nav>
<div class = "container-profile">
    <?php
        $username = $_SESSION["username"];
        $sql = "SELECT nama_foto FROM employee emp JOIN foto_profil fot ON emp.foto_id = fot.foto_id WHERE username = '$username'";
        $hasil = $conn->query($sql);

        while($row = $hasil->fetch_assoc()){
            echo "<img src='" . $row['nama_foto'] . "' class='mx-auto d-block mt-3' alt='Gambar Profil' name='foto_id'>";
        }
    ?>

</div>
<div class="container">
    <?php       
        $username = $_SESSION["username"];
        $kalimatquery = "SELECT username, email, alamat, no_telp, kota, provinsi FROM employee emp JOIN lokasi lok on emp.lokasi_id = lok.lokasi_id WHERE username='$username'";
        $hasilquery = $conn->query($kalimatquery);

        if($hasilquery->num_rows>0) {
            while($row = $hasilquery->fetch_assoc()) {
                echo "<h3 class='text-center mt-3'>" . $row['username'] . "&nbsp;<a href='editprofil.php'><i class='bi bi-pencil-fill a1'></i></a></h3>";
                echo "<h4 class='text-center'>" . $row['email'] . "</h4>";
                echo "<br>";
                echo "<p class='text-center'><strong class='fas fa-map-marker-alt'></strong>&nbsp; " . $row['alamat'] . "</p>";
                echo "<p class='text-center'>&nbsp;" . $row['kota'] . ", " . $row['provinsi'] . "</p>";
                echo "<br>";
                echo "<p class='text-center'><strong>&#9742;</strong>&nbsp;&nbsp;" . $row['no_telp'] . "</p>";
            }
            //bisa pake fetch row juga
        }
    ?>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="container-modal">
            <a class="btn1" data-dismiss="modal" href="profil.php">x</a>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            Yakin ingin keluar?
        </div>

        <br>
        
        <!-- Modal footer -->
        <div class="container-modal">           
            <a type="button" class="btn" href="logout.php">Iya</a>
            <a type="button" class="btn2" data-dismiss="modal" href="profil.php">Tidak</a>
        </div>
        
      </div>
    </div>
</div>

</body>