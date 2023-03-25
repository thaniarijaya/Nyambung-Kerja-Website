<!--EMPLOYEE-->
<?php
session_start();
// Include config file
require_once "connect.php";
// Define variables and initialize with empty values
$username = $email = $alamat = $no_telp = $lokasi_id = "";
$err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["email"]))){
        $err = "Kolom tidak boleh kosong.";     
    }else{
        $email = trim($_POST["email"]);
    }

    if(empty(trim($_POST["alamat"]))){
        $err = "Kolom tidak boleh kosong.";    
    }else{
        $alamat = trim($_POST["alamat"]);
    }

    if(empty(trim($_POST["no_telp"]))){
        $err = "Kolom tidak boleh kosong.";    
    }else{
        $no_telp = trim($_POST["no_telp"]);
    }

    if(empty(trim($_POST["lokasi_id"]))){
        $err = "Kolom tidak boleh kosong.";     
    }else{
        $lokasi_id = (int)trim($_POST["lokasi_id"]);
    }
    
    if(empty($err)){
        $username = $_SESSION["username"];

        $sql = "UPDATE employee SET email='$email', alamat='$alamat', no_telp='$no_telp', lokasi_id='$lokasi_id' WHERE username='$username'";
                
        if (mysqli_query($conn, $sql)) {
            header("location: profil.php");
        } else {
            echo "Terjadi kesalahan. Silahkan coba lagi!";           
        }
    }
}
?>

<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">

<style>
    body {
        font-family: "Poppins", sans-serif;
    }

    .img_profil{
        max-width: 15%;
        border-radius:50%;
    }

    .img_profil:hover,
    .img_profil:focus,
    .img_profil:active{
        border-color:#23048D;
        border-style:solid;
        border-radius:50%;
        box-shadow: 2px 2px 2px #23048D;
    }

    p{
        margin-bottom:1px;
        margin-top:3px;
    }

    form{
        padding-left:15%;
        padding-right:15%;
        margin-top:10px;
    }

    span{
        color:red;
        font-size:12px;
        padding-left: 3px;
    }

    h4{
        text-align: center;
        opacity:0.9;
        font-size:20px;
        font-weight: bold;
        padding-bottom:10px;
    }

    a{
        float:right;
    }

    .form-group{
        align-items: center;
    }

    .form-control{
        border-radius:15px;
        border-color:#784CFB;
        border-width: 2px;
    }

    .form-control:focus,
    .form-control:hover{
        border-color:#23048D;
        box-shadow: 2px 2px 2px #23048D;
    }

    .btn{
        background-color:#784cfb;
        border: 0;
        color: white;
        border-radius:15px;
        width:40%;
    }

    .btn:focus, 
    .btn:active, 
    .btn:hover{
        text-decoration: none;
        background-color:#23048D;
        color: white;
        box-shadow: 2px 2px 2px #23048D;
    }

    .modal-body{
        text-align: center;
        font-size:20px;
        font-weight: bold;
        opacity:0.9;
        padding-bottom:15px;
        padding-top:10px;
    }

    .container-modal-footer{
        margin:5px;
        padding-left:30px;
        padding-top:30px;
        padding-bottom:20px;
        padding-right:25px;
    }

    .container-modal-header{
        margin:5px;
        padding-right:30px;
        padding-bottom:3px;
        padding-top:20px;
        font-size:25px;
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

    .radio{
        display:inline-block;
    }

    .container{
        display:inline-block;
    }

    /* Menyembunyikan radio button */
    label > input{ 
        visibility: hidden; 
        position: absolute; 
    }

    label > input + img{ 
        cursor:pointer;
        border:2px solid transparent;
    }
        
    label > input:checked + img{
        border-style: solid;
        border-color:#23049d;
        border-radius:50%;
        box-shadow: 2px 2px 2px #23049d;
    }

    .img1{
        max-width:35%;
    }

    .textAvatar{
        text-align: center;
        opacity:0.8;
        padding-top:2px;
        font-size:15px;
        font-weight: bold;
        padding-bottom:15px;
        color:#23049d;
    }

    .previous{
        color:white;
        font-size:50px;
    }

    .previous:hover{
        text-decoration: none;
        color: white;
    }

    .navbar{
        background-color: #23049d;
        max-width: 100%;
        background-size: 100% 100%;
        margin:0px;
        padding: 0px;
    }

</style>
</head>
<body>
<nav class="navbar navbar-expand-sm">
    <div class="container">
    <a href="profil.php" class="previous">&#8249;</a>
    </div>
</nav>

<div class="container-form">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <?php
        $username = $_SESSION["username"];
        $sql = "SELECT nama_foto FROM employee emp JOIN foto_profil fot ON emp.foto_id = fot.foto_id WHERE username = '$username'";
        $hasil = $conn->query($sql);

        while($row = $hasil->fetch_assoc()){
            echo "<img src='" . $row['nama_foto'] . "' class='img_profil mx-auto d-block mt-3' alt='Gambar Profil' name='foto_id' data-toggle='modal' data-target='#modalProfil' class='profil'>";
        }

        $username = $_SESSION["username"];
        $kalimatquery = "SELECT username, email, alamat, no_telp, kota, provinsi FROM employee emp JOIN lokasi lok on emp.lokasi_id = lok.lokasi_id WHERE username='$username'";
        $hasilquery = $conn->query($kalimatquery);

        if($hasilquery->num_rows>0) {
            while($row = $hasilquery->fetch_assoc()) {
                $temp_email = $row['email'];
                $temp_alamat = $row['alamat'];
                $temp_no_telp = $row['no_telp'];
                $temp_kota = $row['kota'];
                $temp_prov = $row['provinsi'];

            }
        }
    ?>

    <p class='textAvatar' data-toggle='modal' data-target='#modalProfil'>Edit Avatar</p>

    <div class="form-group">
        <p>Username</p>
        <input type="username" class="form-control" value="<?php echo $username; ?>" name="username" disabled>
    </div>
    <div class="form-group">
        <p>Email</p>
        <input type="email" class="form-control" placeholder='Email' value="<?php echo $temp_email; ?>" name="email">
    </div>
    <div class="form-group">
        <p>Alamat</p>
        <input type="alamat" class="form-control" placeholder='Alamat' value="<?php echo $temp_alamat; ?>" name="alamat">
    </div>
    <div class="form-group">
        <p>Kota, Provinsi</p>
        <select class="form-control" name="lokasi_id">
                <?php
                    $sql_stmt = mysqli_query($conn, "SELECT * from lokasi");
                    while ($row = $sql_stmt->fetch_assoc()){
                        if($row['kota'] != $temp_kota){
                            echo "<option value='" . $row['lokasi_id']. "'>" . $row['kota'] . ", " . $row['provinsi'] . "</option>";
                        } else{
                            echo "<option value='" . $row['lokasi_id']. "' selected='selected'>" . $row['kota'] . ", " . $row['provinsi'] . "</option>";
                        }
                    }
                ?>
        </select>
    </div>
    <div class="form-group">
        <p>Nomor Telepon</p>
        <input type="no_telp" class="form-control" placeholder='Nomor Telepon' value="<?php echo $temp_no_telp; ?>" name="no_telp">
    </div>

    <span class="help-block"><?php echo $err; ?></span>
    <div class="form-group">
        <input type="submit" class="btn mx-auto d-block mt-4" value="Simpan">
    </div>
    </form>
</div>

<!-- The Modal -->
<div class="modal fade" id="modalProfil">
<div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

        <div class="container-modal-header">
            <a class="btn1" data-dismiss="modal" href="editprofil.php">x</a>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <h4>Pilih Avatarmu!</h4>
        <form id="pilihProfil" action="gantiProfil.php" method="POST">
            <div class='container'>
            <?php
                $username = $_SESSION["username"];
                $sql = "SELECT foto_id FROM employee WHERE username = '$username'";
                $hasil = $conn->query($sql);
        
                while($row = $hasil->fetch_assoc()){
                    $temp_foto_id = $row['foto_id'];
                }

                $sql_stmt = mysqli_query($conn, "SELECT foto_id, nama_foto FROM foto_profil");
                $count = 0;

                while ($row = $sql_stmt->fetch_assoc()){
                    if($row['foto_id'] != $temp_foto_id){
                        echo "<div>";
                        echo "<label>";
                        echo "<input type='radio' name='foto_baru' value='" . $row['foto_id']. "' id='fotoProf'><img src='" . $row['nama_foto'] . "' class='img1 mx-auto d-block mt-3'  alt='Gambar Profil'>";
                        echo "</label>";
                    } else{
                        echo "<div>";
                        echo "<label>";
                        echo "<input type='radio' name='foto_baru' value='" . $row['foto_id']. "' id='fotoProf' checked><img src='" . $row['nama_foto'] . "' class='img1 mx-auto d-block mt-3' alt='Gambar Profil'>";
                        echo "</label>";
                    }

                }
            ?>
        </div>
        </form>
        </div>
        
        <!-- Modal footer -->
        <div class="container-modal-footer">           
            <input type="submit" class="btn mx-auto d-block" value="Pilih" name='pilih'>
        </div>
        
    </div>
</div>
</div>
</body>
</html>