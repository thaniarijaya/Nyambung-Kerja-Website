<?php
session_start();
if (!isset($_SESSION["loggedinEmp"]) || $_SESSION["loggedinEmp"] !== true) {
    header("location: loginemployer.php");

    exit;
}
// Include config file
require_once 'connect.php';
// Define variables and initialize with empty values
$employer_id = $judul_lowongan = $status = $durasi = $posisi_jabatan = $deskripsi = $pend_akhir_id  = $nama_perusahaan = $ketentuan = $min = $max = $employer_id = "";
$judul_lowongan_err = $status_err = $durasi_err = $posisi_jabatan_err = $deskripsi_err = $employer_id_err = $pend_akhir_id_err  = $nama_perusahaan_err = $ketentuan_err = $min_err = $max_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Validasi Judul Lowongan
    if (empty($_POST["judul_lowongan"])) {
        $judul_lowongan_err = "This Field is Required";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $judul_lowongan)) {
        $judul_lowongan_err = "Only letters and white space allowed";
    } else {
        $judul_lowongan = trim($_POST["judul_lowongan"]);
    }


    //Validasi  Status
    if (empty($_POST["status"])) {
        $status_err = "This Field is Required";
    } else {
        $status = trim($_POST["status"]);
    }
    if (empty($_POST["pend_akhir_id"])) {
        $pend_akhir_id_err = "This Field is Required";
    } else {
        $pend_akhir_id = trim($_POST["pend_akhir_id"]);
    }


    //Validasi Durasi
    if (empty($_POST["durasi"])) {
        $durasi_err = "This Field is Required";
    } else {
        $durasi = trim($_POST["durasi"]);
    }

    //Validasi Nama Perusahaan
    if (empty($_POST["nama_perusahaan"])) {
        $nama_perusahaan_err = "This Field is Required";
    } else {
        $nama_perusahaan = trim($_POST["nama_perusahaan"]);
    }
    //Validasi Jabatan
    if (empty($_POST["posisi_jabatan"])) {
        $posisi_jabatan_err = "This Field is Required";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $posisi_jabatan)) {
        $posisi_jabatan_err = "Only letters and white space allowed";
    } else {
        $posisi_jabatan = trim($_POST["posisi_jabatan"]);
    }


    if (empty($_POST["deskripsi"])) {
        $deskripsi_err = "";
    } else {
        $deskripsi = trim($_POST["deskripsi"]);
    }
    if (empty($_POST["ketentuan"])) {
        $ketentuan_err = "";
    } else {
        $ketentuan = trim($_POST["ketentuan"]);
    }
    //Validasi Minimal Gaji
    if (empty($_POST["gaji_min"])) {
        $min_err = "This Field is Required";
    } else {
        $min = (int)trim($_POST["gaji_min"]);
    }
    //Validasi maximal Gaji
    if (empty($_POST["gaji_max"])) {
        $max_err = "This Field is Required";
    } else {
        $max = (int)trim($_POST["gaji_max"]);
    }



    if (isset($_POST['submit']) && empty($judul_lowongan_err) && empty($status_err) && empty($pend_akhir_id_err) && empty($durasi_err) && empty($posisi_jabatan_err) && empty($deskripsi_err) && empty($nama_perusahaan_err) && empty($ketentuan_err) && empty($min_err) && empty($max_err)) {
        /* $stmt = "SELECT employer_id from employer";
        $querystmt = $conn->query($stmt);
        if ($querystmt->num_rows > 0) {
            while ($row = $querystmt->fetch_assoc()) {
                $employer_id = $row["employer_id"];
            }
        } */

        $employer_id = $_SESSION["employer_id"];
        $judul_lowongan = $_POST['judul_lowongan'];
        $status = $_POST['status'];
        $pend_akhir_id = $_POST['pend_akhir_id'];
        $durasi = $_POST['durasi'];
        $posisi_jabatan = $_POST['posisi_jabatan'];
        $deskripsi = $_POST['deskripsi'];
        $min = $_POST['gaji_min'];
        $max = $_POST['gaji_max'];
        $nama_perusahaan = $_POST['nama_perusahaan'];
        $ketentuan = $_POST['ketentuan'];




        $sql = "INSERT INTO lowongan (judul_lowongan, status, pend_akhir_id, durasi, posisi_jabatan, deskripsi,gaji_min,gaji_max,nama_perusahaan,ketentuan,employer_id) VALUES ('$judul_lowongan','$status','$pend_akhir_id','$durasi','$posisi_jabatan','$deskripsi','$min','$max','$nama_perusahaan','$ketentuan','$employer_id')";
        echo '<script>console.log("' . $sql . '")</script>';

        if (mysqli_query($conn, $sql)) {
            header("location:displayLowongan.php");
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

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

    <title>Input Lowongan Pekerjaan</title>
    <style type="text/css">
        p {
            text-indent: 25px;
        }

        .help-block {
            color: #FF0000;
        }


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

        ul {
            list-style-type: none;
            margin: 0px;
            padding: 0px;
            font-size: 12pt;
        }

        .card {
            border: none;
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
                        <a href="#">Home</a>
                    </li>
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
                                <a class="dropdown-item" data-toggle="modal" data-target="#modalProfil" href="logout.php">Log Out</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-group <?php echo (!empty($judul_lowongan_err)) ? 'has-error' : ''; ?>">
                        <label>Judul Lowongan Pekerjaan :</label>
                        <input type="text" name="judul_lowongan" placeholder="Masukkan Judul Lowongan" class="form-control" value="<?php echo $judul_lowongan; ?>">
                        <span class="help-block"><?php echo $judul_lowongan_err; ?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group <?php echo (!empty($status_err)) ? 'has-error' : ''; ?>">
                        <label>Status :</label>
                        <select name="status" class="form-control" value="<?php echo $status; ?>">>
                            <option></option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak aktif">Tidak Aktif</option>
                        </select>
                        <span class="help-block"><?php echo $status_err; ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group <?php echo (!empty($pend_akhir_id_err)) ? 'has-error' : ''; ?>">
                        <label>Pendidikan Terakhir :</label>
                        <select name="pend_akhir_id" class="form-control" value="<?php echo $pend_akhir_id; ?>">>
                            <option></option>
                            <option value="1">SD</option>
                            <option value="2">SMP</option>
                            <option value="3">SMA</option>
                            <option value="4">D3</option>
                            <option value="5">S1</option>
                            <option value="6">S2</option>
                            <option value="7">S3</option>
                        </select>
                        <span class="help-block"><?php echo $pend_akhir_id_err; ?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group <?php echo (!empty($posisi_jabatan_err)) ? 'has-error' : ''; ?>">
                        <label>Posisi Jabatan :</label>
                        <input type="text" name="posisi_jabatan" placeholder="Masukkan Posisi Jabatan" class="form-control" value="<?php echo $posisi_jabatan; ?>">
                        <span class="help-block"><?php echo $posisi_jabatan_err; ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group <?php echo (!empty($durasi_err)) ? 'has-error' : ''; ?>">
                        <label>Durasi :</label>
                        <select name="durasi" class="form-control" value="<?php echo $durasi; ?>">>
                            <option></option>
                            <option value="Full-Time">Full-Time</option>
                            <option value="Part-Time">Part-Time</option>
                        </select>
                        <span class="help-block"><?php echo $durasi_err; ?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group <?php echo (!empty($nama_perusahaan_err)) ? 'has-error' : ''; ?>">
                        <label>Nama Perusahaan :</label>
                        <input type="text" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan" class="form-control" value="<?php echo $nama_perusahaan; ?>">
                        <span class="help-block"><?php echo $nama_perusahaan_err; ?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group ">
                        <label>Deskripsi :</label>
                        <textarea class="form-control" rows="2" name="deskripsi" placeholder="Masukkan Deskripsi" value="<?php echo $deskripsi; ?>"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group ">
                        <label>Ketentuan :</label>
                        <textarea class="form-control" rows="2" name="ketentuan" placeholder="Masukkan Ketentuan" value="<?php echo $ketentuan; ?>"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="ml-3">Kisaran Gaji :</label>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group <?php echo (!empty($min_err)) ? 'has-error' : ''; ?>">
                        <input type="text" name="gaji_min" placeholder="Minimal Gaji" class="form-control" value="<?php echo $min; ?>">
                        <span class="help-block"><?php echo $min_err; ?></span>
                    </div>
                </div>
                <div class="col-md-2">
                    <center><label><b>-</label></b></center>
                </div>
                <div class="col-md-5">
                    <div class="form-group <?php echo (!empty($max_err)) ? 'has-error' : ''; ?>">
                        <input type="text" name="gaji_max" placeholder="Maximal Gaji" class="form-control" value="<?php echo $max; ?>">
                        <span class="help-block"><?php echo $max_err; ?></span>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <center>
                    <button type="submit" style="background-color: #23049D; color: white; width: 50%" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                </center>
            </div>
        </div>
    </form>
    <!--</div>-->
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

</html>