<html>

<head>
    <title>Hasil Pengisian CV</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <style>
        .main-btn {
            width: 500px;
            background-color: #23049D;
            color: white;
        }

        .main-btn:hover {
            background-color: #3006d4;
            color: white;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $lowid = $_POST["lowid"];
    require_once "connect.php";
    $ktp = $nama = $birthday = $asal = $sekarang = $agama = $pendidikan = $pengalaman = $email = $telp = $berkas = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['ktp'])) {
            $errktp = "Nomor KTP tidak boleh kosong";
        } else {
            $ktp = filterInput($_POST['ktp']);
        }
        if (empty($_POST['nama'])) {
            $errnama = "Nama lengkap tidak boleh kosong";
        } else {
            $nama = filterInput($_POST['nama']);
        }
        if (empty($_POST['birthday'])) {
            $errbirthday = "Tanggal lahir tidak boleh kosong";
        } else {
            $birthday = filterInput($_POST['birthday']);
        }
        if (empty($_POST['asal'])) {
            $errasal = "Alamat asal tidak boleh kosong";
        } else {
            $asal = filterInput($_POST['asal']);
        }
        if (empty($_POST['sekarang'])) {
            $errsekarang = "Alamat sekarang tidak boleh kosong";
        } else {
            $sekarang = filterInput($_POST['sekarang']);
        }
        if (empty($_POST['agama'])) {
            $erragama = "Agama tidak boleh kosong";
        } else {
            $agama = filterInput($_POST['agama']);
        }
        if (empty($_POST['pendidikan'])) {
            $errpendidikan = "Pendidikan akhir tidak boleh kosong";
        } else {
            $pendidikan = filterInput($_POST['pendidikan']);
        }
        if (empty($_POST['pengalaman'])) {
            $errpengalaman = "Pengalaman kerja tidak boleh kosong";
        } else {
            $pengalaman = filterInput($_POST['pengalaman']);
        }
        if (empty($_POST['email'])) {
            $erremail = "Email tidak boleh kosong";
        } else {
            $email = filterInput($_POST['email']);
        }
        if (empty($_POST['telp'])) {
            $errtelp = "Nomor telpon tidak boleh kosong";
        } else {
            $telp = filterInput($_POST['telp']);
        }
        echo '<script>console.log("' . $ktp . ', ' . $nama . ', ' . $birthday, ', ' . $asal . ', ' . $sekarang . ', ' . $agama . ', ' . $pendidikan . ', ' . $pengalaman . ', ' . $email . ', ' . $telp . ', ' . $berkas . '")</script>';
        echo '<script>console.log("Low ID: ' . $lowid . '")</script>';
    }
    function filterInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <div class="container">
        <br>
        <!-- row buat ktp sama nama lengkap-->
        <div class="row">
            <div class="col-md-6">
                <?php
                if (!empty($ktp)) {
                    $ktp = $_POST['ktp'];
                    echo "<label for='ktp'>No KTP</label>";
                    echo "<input class='form-control' type='text' placeholder='$ktp' readonly>";
                } else {
                    echo "$errktp <br>";
                }
                ?>
            </div>
            <div class="col-md-6">
                <?php
                if (!empty($nama)) {
                    $nama = $_POST['nama'];
                    echo "<label for='nama'>Nama Lengkap</label>";
                    echo "<input class='form-control' type='text' placeholder='$nama' readonly>";
                } else {
                    echo "$errnama <br>";
                }
                ?>
            </div>
        </div>
        <!-- row buat tanggal lahir-->
        <div class="row">
            <div class="col">
                <?php
                if (!empty($birthday)) {
                    $birthday = $_POST['birthday'];
                    echo "<label for='birthday'>Tanggal lahir</label>";
                    echo "<input class='form-control' type='text' placeholder='$birthday' readonly>";
                } else {
                    echo "$errbirthday <br>";
                }
                ?>
            </div>
        </div>
        <!-- row buat alamat asal-->
        <div class="row">
            <div class="col">
                <?php
                if (!empty($asal)) {
                    $asal = $_POST['asal'];
                    echo "<label for='asal'>Alamat Asal</label>";
                    echo "<textarea disabled class='form-control' rows='3' placeholder='$asal'></textarea>";
                } else {
                    echo "$errasal <br>";
                }
                ?>
            </div>
        </div>
        <!-- row buat alamat sekarang-->
        <div class="row">
            <div class="col">
                <?php
                if (!empty($sekarang)) {
                    $sekarang = $_POST['sekarang'];
                    echo "<label for='sekarang'>Alamat Sekarang</label>";
                    echo "<textarea disabled class='form-control' rows='3' placeholder='$sekarang'></textarea>";
                } else {
                    echo "$errsekarang <br>";
                }
                ?>
            </div>
        </div>
        <!-- row buat agama sama pendidikan terakhir-->
        <div class="row">
            <div class="col-md-6">
                <?php
                if (!empty($agama)) {
                    $agama = $_POST['agama'];
                    echo "<label for='agama'>Agama</label>";
                    echo "<input class='form-control' type='text' placeholder='$agama' readonly>";
                } else {
                    echo "$erragama <br>";
                }
                ?>
            </div>
            <div class="col-md-6">
                <?php
                if (!empty($pendidikan)) {
                    $pendidikan = $_POST['pendidikan'];
                    echo "<label for='pendidikan'>Pendidikan Terakhir</label>";
                    echo "<input class='form-control' type='text' placeholder='$pendidikan' readonly>";
                } else {
                    echo "$errpendidikan <br>";
                }
                ?>
            </div>
        </div>
        <!-- row buat pengalaman kerja-->
        <div class="row">
            <div class="col">
                <?php
                if (!empty($pengalaman)) {
                    $pengalaman = $_POST['pengalaman'];
                    echo "<label for='pengalaman'>Pengalaman Kerja</label>";
                    echo "<textarea disabled class='form-control' rows='3' placeholder='$pengalaman'></textarea>";
                } else {
                    echo "$errpengalaman <br>";
                }
                ?>
            </div>
        </div>
        <!-- row buat email sama no telp-->
        <div class="row">
            <div class="col-md-6">
                <?php
                if (!empty($email)) {
                    $email = $_POST['email'];
                    echo "<label for='email'>Email</label>";
                    echo "<input class='form-control' type='text' placeholder='$email' readonly>";
                } else {
                    echo "$erremail <br>";
                }
                ?>
            </div>
            <div class="col-md-6">
                <?php
                if (!empty($telp)) {
                    $telp = $_POST['telp'];
                    echo "<label for='telp'>No Telp</label>";
                    echo "<input class='form-control' type='text' placeholder='$telp' readonly>";
                } else {
                    echo "$errtelp <br>";
                }
                ?>
            </div>
        </div>
        <!-- row buat berkas-->
        <div class="row">
            <div class="col">
                <?php
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["berkas"]["name"]);
                $uploadOk = 1;
                //untuk check file size
                if ($_FILES["berkas"]["size"] > 500000) {
                    echo "Maaf, file yang Anda upload terlalu besar.";
                    $uploadOk = 0;
                }
                //untuk check kalo $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Maaf, file Anda belum terupload.";
                    //if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["berkas"]["tmp_name"], $target_file)) {
                        $berkas = 'uploads/' . $_FILES["berkas"]["name"];
                        echo "File " . htmlspecialchars(basename($_FILES["berkas"]["name"])) . " sudah terupload.";
                    } else {
                        echo "Maaf, terjadi kesalahan dalam mengupload file Anda.";
                    }
                }
                ?>
            </div>
        </div>
        <br>
    </div>
    <?php
    $sql = $conn->prepare("insert into detail_lamaran (no_ktp, nama_lengkap, tgl_lahir, alamat_asal, alamat_sekarang, agama, pend_akhir, pengalaman_kerja, email, no_telp, berkas, employee_id, lowongan_id) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("sssssssssssss", $ktp, $nama, $birthday, $asal, $sekarang, $agama, $pendidikan, $pengalaman, $email, $telp, $berkas, $_SESSION["employee_id"], $lowid);
    $sql->execute();
    echo '<center><a href="display.php" class="btn main-btn">Kembali ke Home</a></center>';
    ?>
</body>

</html>