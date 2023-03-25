<html>
    <head>
        <title>Detail CV Pelamar</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <style type="text/css">
            .container {
                font-family: 'Poppins', sans-serif;
            }
            .btn-view {
                background-color: #FF79CD;
                color: white;
            }
        </style>
    </head>
    <body>
        <?php 
            require_once "connect.php";
            $id = $_GET['id'];
            $kalimatquery = $conn->prepare("select * from detail_lamaran where lamaran_id=?");
            $kalimatquery->bind_param("s",$id);
            $kalimatquery->execute();
            $hasilquery=$kalimatquery->get_result();
            if ($hasilquery->num_rows>0) {
                while($row = $hasilquery->fetch_assoc()) {
                    echo "<div class='container'>";
                    echo "<br>";
                    echo "<div class='row'>"; //row buat ktp sama nama
                    echo "<div class='col-md-6'>"; //col buat ktp
                    $rowktp = $row['no_ktp'];
                    echo "<label>Nomor KTP</label>";
                    echo "<input disabled class='form-control' type='text' placeholder='$rowktp' readonly>";
                    echo "</div>"; //col buat ktp close
                    echo "<div class='col-md-6'>"; //col buat nama
                    $rownama = $row['nama_lengkap'];
                    echo "<label>Nama Lengkap</label>";
                    echo "<input disabled class='form-control' type='text' placeholder='$rownama' readonly>";
                    echo "</div>"; //col buat nama close
                    echo "</div>"; //row buat ktp sama nama close
                    echo "<div class='row'>"; //row buat birthday
                    echo "<div class='col'>"; //col buat birthday
                    $rowhbd = $row['tgl_lahir'];
                    echo "<label>Tanggal Lahir</label>";
                    echo "<input disabled class='form-control' type='text' placeholder='$rowhbd' readonly>";
                    echo "</div>"; //col buat hbd close
                    echo "</div>"; //row buat hbd close
                    echo "<div class='row'>"; //row buat alamat asal
                    echo "<div class='col'>"; //col buat alamat asal
                    $rowasal = $row['alamat_asal'];
                    echo "<label>Alamat Asal</label>";
                    echo "<textarea disabled class='form-control' rows='3' placeholder='$rowasal'></textarea>";
                    echo "</div>"; //col buat alamat asal close
                    echo "</div>"; //row buat alamat asal close
                    echo "<div class='row'>"; //row buat alamat sekarang
                    echo "<div class='col'>"; //col buat alamat sekarang
                    $rowskrg = $row['alamat_sekarang'];
                    echo "<label>Alamat Sekarang</label>";
                    echo "<textarea disabled class='form-control' rows='3' placeholder='$rowskrg'></textarea>";
                    echo "</div>"; //col buat alamat sekarang close
                    echo "</div>"; //row buat alamat sekarang close
                    echo "<div class='row'>"; //row buat agama sama pendidikan
                    echo "<div class='col-md-6'>"; //col buat agama
                    $rowagama = $row['agama'];
                    echo "<label>Agama</label>";
                    echo "<input disabled class='form-control' type='text' placeholder='$rowagama' readonly>";
                    echo "</div>"; //col buat agama close
                    echo "<div class='col'>"; //col buat pendidikan
                    $rowpend = $row['pend_akhir'];
                    echo "<label>Pendidikan</label>";
                    echo "<input disabled class='form-control' type='text' placeholder='$rowpend' readonly>";
                    echo "</div>"; //col buat pendidikan close
                    echo "</div>"; //row buat agama sama pendidikan close
                    echo "<div class='row'>"; //row buat pengalaman kerja
                    echo "<div class='col'>"; //col buat pengalaman kerja
                    $rowpengalaman = $row['pengalaman_kerja'];
                    echo "<label>Pengalaman Kerja</label>";
                    echo "<textarea disabled class='form-control' rows='3' placeholder='$rowpengalaman'></textarea>";
                    echo "</div>"; //col buat pengalaman kerja close
                    echo "</div>"; //row buat pengalaman kerja close
                    echo "<div class='row'>"; //row buat email sama no telp
                    echo "<div class='col-md-6'>"; //col buat email
                    $rowemail = $row['email'];
                    echo "<label>Email</label>";
                    echo "<input disabled class='form-control' type='text' placeholder='$rowemail' readonly>";
                    echo "</div>"; //col buat email close
                    echo "<div class='col-md-6'>"; //col buat no telp
                    $rowtelp = $row['no_telp'];
                    echo "<label>Nomor Telp</label>";
                    echo "<input disabled class='form-control' type='text' placeholder='$rowtelp' readonly>";
                    echo "</div>"; //col buat no telp close
                    echo "</div>"; //row buat email sama no telp close
                    echo "<div class='row'>"; //row buat berkas
                    echo "<div class='col'>"; //col buat berkas
                    $rowberkas = $row['berkas'];
                    echo "<label>File Berkas</label>";
                    echo "<div class='row'>"; //row buat button
                    echo "<div class='col'>"; //col buat button
                    echo "<a class='btn btn-view' href='$rowberkas'>Lihat Detail File</a>";
                    echo "</div>"; //col buat button close
                    echo "</div>"; //row buat button close
                    echo "</div>"; //col buat berkas close
                    echo "</div>"; //row buat berkas close
                    echo "</div>"; //container close
                }
            }       
        ?>
    </body>
</html>