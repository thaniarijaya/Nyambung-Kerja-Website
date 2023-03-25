<!DOCTYPE html>
<html>
<?php
session_start();
if (!isset($_SESSION["loggedinEmp"]) || $_SESSION["loggedinEmp"] !== true) {
    header("location: loginemployer.php");
    exit;
}
require_once 'connect.php';
$lowongan_id = $judul_lowongan = $status = $durasi = $posisi_jabatan = $deskripsi   = $nama_perusahaan = $ketentuan = $min = $max = $employer_id = $pend_akhir = $email = $alamat = $no_telp = $kota = $provinsi = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $employer_id = $_SESSION["employer_id"];
    $stmt = "SELECT lowongan_id from lowongan where employer_id='$employer_id'";
    $querystmt = $conn->query($stmt);
    if ($querystmt->num_rows > 0) {
        while ($row = $querystmt->fetch_assoc()) {
            $lowongan_id = $row["lowongan_id"];
        }
    }
?>




    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
        <style type="text/css">
            :root {
                --dark-one: #333;
                --dark-two: #7a7a7a;
                --main-color: #784cfb;
                --light-one: #fff;
                --light-two: #f9fafb;
                --light-three: #f6f7fb;
            }

            *,
            *::before,
            *::after {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body,
            button,
            input,
            textarea {
                font-family: 'Poppins', sans-serif;
            }

            a {
                text-decoration: none;
            }

            ul {
                list-style: none;
            }

            img {
                width: 100%;
            }

            .container-nav {
                position: relative;
                z-index: 5;
                max-width: 85rem;
                margin: 0 auto;
            }

            /* End General Styles*/
            header {
                width: 100%;
                background-color: #f6f7fb;
                overflow: hidden;
            }

            nav {
                width: 100%;
                position: relative;
                z-index: 50;
            }

            nav .container-nav {
                display: flex;
                /*jadiin 1 baris*/
                justify-content: space-between;
                /*membuat space antara logo di kiri dan tulisan di kanan*/
                height: 6rem;
                align-items: center;
            }

            .logo {
                width: 80px;
                display: flex;
                align-items: center;
            }

            .links ul {
                display: flex;
            }

            .links a {
                display: inline-block;
                padding: .9rem 1.2rem;
                color: var(--dark-one);
                font-size: 1.05rem;
                text-transform: uppercase;
                /*biar huruf besar semua*/
                font-weight: 500;
                line-height: 1;
                transition: 0.3s;
            }

            .links a.active {
                background-color: var(--main-color);
                color: var(--light-one);
                border-radius: 2rem;
                font-size: 1rem;
                padding: 0.9rem 2.1rem;
                margin-left: 1rem;
            }

            body {
                font-family: 'Poppins', sans-serif;
            }

            .bg-cover {
                background-image: url(img/bgtrial2-01.png);
                color: white;
                background-blend-mode: darken;
                background-position: center;
            }

            .tags-full {
                display: inline-block;
                background-color: #aa2ee6;
                color: white;
                border-radius: 20px 20px 20px 20px;
                padding: 5px 8px;
                text-align: right;
                font-size: small;
                width: max-content;
            }

            .tags-part {
                display: inline-block;
                border: 1px solid #aa2ee6;
                color: #aa2ee6;
                border-radius: 20px 20px 20px 20px;
                padding: 5px 8px;
                text-align: right;
                font-size: small;
                width: max-content;
            }

            a {
                text-decoration: none;
            }

            ul {
                list-style-type: none;
                margin: 0px;
                padding: 0px;
                font-size: 12pt;
            }

            .card {
                border: 1px solid #23049D;
                text-decoration: none;
                margin-left: 55px;
                margin-right: 55px;
                margin-top: 10px;
                margin-bottom: 10px;
            }

            #profile-dd:hover .dropdown-menu {
                display: block;
                margin-top: 0;
            }

            .judul {
                font-weight: 500;
            }

            .jumbotron {
                border-radius: 0px;
            }

            .card-footer {
                background-color: white;
            }

            .main-btn {
                width: 500px;
                background-color: #23049D;
                color: white;
            }

            .main-btn:hover {
                background-color: #3006d4;
                color: white;
            }

            .outline-btn {
                width: 500px;
                border-color: #23049D;
                color: #23049D;
            }

            .outline-btn:hover {
                border-color: #3006d4;
                color: #3006d4;
            }

            a.cardlink {
                text-decoration: none;
                color: black;
            }

            .card:hover {
                border: 1px solid darkblue;
                transition: border 0.5s ease-in-out;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
                transition: box-shadow 0.1s ease-in-out;
            }

            .dropdown-item:focus,
            .dropdown-item:hover,
            .dropdown-item:active {
                color: #AA2EE6;
                background-color: white;
            }

            .btn1 {
            color: #878787;
            font-weight: bold;
            text-align: right;
            float: right;
        }

        .btn1:focus,
        .btn1:active,
        .btn1:hover {
            text-decoration: none;
            color: #959392;
        }

        .btn2 {
            background-color: #784CFB;
            border: 0;
            color: white;
            border-radius: 15px;
            width: 40%;
            font-size: 18px;
            float: right;
            text-align: center;
            height: 40px;
            padding-top: 5px;
        }

        .btn2:focus,
        .btn2:active,
        .btn2:hover {
            text-decoration: none;
            background-color: #23049D;
            color: white;
            box-shadow: 2px 2px 2px #23049D;
        }


        .btn3 {
            text-align: center;
            background-color: #784CFB;
            border: 0;
            color: white;
            border-radius: 15px;
            width: 40%;
            font-size: 18px;
            height: 40px;
            padding-top: 5px;
        }

        .btn3:focus,
        .btn3:active,
        .btn3:hover {
            text-decoration: none;
            background-color: #23049D;
            color: white;
            box-shadow: 2px 2px 2px #23049D;
        }

        .modal-body {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            opacity: 0.9;
            padding-bottom: 30px;
            padding-top: 10px;
        }

        .container-modal {
            margin: 5px;
            padding-left: 30px;
            padding-top: 10px;
            padding-bottom: 30px;
            padding-right: 30px;
        }
        </style>
    </head>

    <body>
        <!-- navigation bar -->
        <nav>
            <div class="container-nav">
                <div class="logo">
                    <!-- buat logo -->
                    <a href="index.php"><img src="asset/nyambungkerja.png" alt=""></a>
                </div>

                <div class="links">
                    <ul>
                        <!-- bagian button navbar -->
                        <li>
                            <a href="displayLowongan.php"> Lihat Lowongan</a>
                        </li>
                        <li>
                            <a href="inputLowongan.php">Buat Lowongan</a>
                        </li>
                        <li>
                            <div id="profile-dd" class="dropdown">
                                <a class="nav-item nav-link active dropdown-toggle" data-toggle="dropdown">Welcome, <?php echo $_SESSION["username"] ?> !</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="profilemployer.php">My Profile</a>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#modalProfil">Log Out</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <?php
            $stmt = "SELECT * from lowongan low join employer empl on low.employer_id = empl.employer_id join lokasi loc on empl.lokasi_id = loc.lokasi_id join pend_akhir pend on low.pend_akhir_id = pend.pend_akhir_id where empl.employer_id = '$employer_id'";

            $querystmt = $conn->query($stmt);
            if ($querystmt->num_rows > 0) {
                while ($row = mysqli_fetch_array($querystmt)) {
                    $judul_lowongan = $row["judul_lowongan"];
                    $durasi = $row["durasi"];
                    $posisi_jabatan = $row["posisi_jabatan"];
                    $deskripsi = $row["deskripsi"];
                    $pend_akhir = $row["pend_akhir"];
                    $min = $row["gaji_min"];
                    $max = $row["gaji_max"];
                    $nama_perusahaan = $row["nama_perusahaan"];
                    $ketentuan = $row["ketentuan"];
                    $kota = $row["kota"];
                    $provinsi = $row["provinsi"];
            ?>
                    <!--Card 1-->
                    <div class="row mt-3">
                        <div class="col-9 col-sm">

                            <div class="card p-5" onclick="tampil(<?php echo $row['lowongan_id'] ?>)">

                                <?php if ($durasi == $durasi) echo ' <div class="tags-part">';
                                else echo 'tags-full';
                                ?> <?php echo $row['durasi'] ?></div>

                            <h2 id="judul" class="d-inline judul"><?php echo $row['judul_lowongan'] ?></h2>

                            <p><?php echo $row['nama_perusahaan'] ?> | <?php echo $row['posisi_jabatan'] ?></p>

                            <ul>
                                <b>Deskripsi</b>
                                <li><?php echo $row['deskripsi'] ?></li>
                            </ul>
                            <br>
                            <ul>
                                <b>Kriteria</b>
                                <li><i class="bi bi-mortarboard"></i> Min. <?php echo $row['pend_akhir'] ?></li>
                                <li><i class="bi bi-coin"></i> IDR <?php echo $row['gaji_min'] ?> - IDR
                                    <?php echo $row['gaji_max'] ?>
                                </li>
                            </ul>
                            <br>
                            <ul>
                                <b>Ketentuan</b>
                                <li><?php
                                    echo nl2br($row['ketentuan']);
                                    ?></li>
                            </ul>
                            <br>
                            <b>Detail Perusahaan</b>
                            <p class="mb-0"><?php echo $row['nama_perusahaan'] ?></p>
                            <small><?php echo $row['no_telp'] ?></small>
                            <small><?php echo $row['email'] ?></small>
                            <small><?php echo $row['alamat'] ?></small>
                            <br>
                        </div>
                    </div>
        </div>

<?php
                }
            }
        }
?>


</div>
<div class="card-footer mt-3 p-3">
    <div class="col-12 d-flex justify-content-center mb-1">
        <a class="btn main-btn my-auto" href="showLowongan.php">Edit Lowongan</a>
        <a class="btn main-btn my-auto" href="inputLowongan.php" style="margin-left: 5px;">Input Lowongan</a>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="modalProfil">
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
                <a type="button" class="btn3" href="logoutemployer.php">Iya</a>
                <a type="button" class="btn2" data-dismiss="modal" href="#">Tidak</a>
            </div>

        </div>
    </div>
</div>
    </body>
    <script>
        function tampil(id) {
            window.location.href = "querydaftar.php?lowid=" + id;
        }
    </script>

</html>