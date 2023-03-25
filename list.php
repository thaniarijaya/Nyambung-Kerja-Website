<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    Bootstrap CSS
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
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
            background-image: url(images/bgtrial2-01.png);
            color: white;
            background-blend-mode: darken;
            background-position: center;
        }

        .tags {
            display: inline-block;
            background-color: blue;
            color: white;
            outline-color: blue;
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

        .card:hover {
            border: 1px solid darkblue;
            transition: border 0.5s ease-in-out;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            transition: box-shadow 0.1s ease-in-out;
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

        a.cardlink {
            text-decoration: none;
            color: black;
        }

        h2.judul:hover {
            text-decoration: none;
            color: #6699CC;
        }
    </style>
    <title>List Lowongan</title> -->
</head>

<body>

    <?php
    require_once "connect.php";
    $min = $_GET["min"];
    $max = $_GET["max"];
    $pend = intval($_GET["pend"]);
    $cari = $_GET["cari"];
    $sqlstr = "";

    if ($cari == "" && $min == "" && $max == "" && $pend == "") { //kalo kosong semua
        $sqlstr = "SELECT * from lowongan low join employer empl on low.employer_id = empl.employer_id join lokasi loc on empl.lokasi_id = loc.lokasi_id join pend_akhir pend on low.pend_akhir_id = pend.pend_akhir_id";

    } else if ($min == "" && $max == "" && $pend == "") { //kalau cm ada cari
        $sqlstr = "SELECT * from lowongan low join employer empl on low.employer_id = empl.employer_id join lokasi loc on empl.lokasi_id = loc.lokasi_id join pend_akhir pend on low.pend_akhir_id = pend.pend_akhir_id WHERE (low.judul_lowongan
        LIKE '%$cari%' OR low.posisi_jabatan LIKE '%$cari%' OR low.nama_perusahaan LIKE '%$cari%')";

    } else if ($min == "" && $pend == "") { //cm ada max & cari
        $sqlstr = "SELECT * from lowongan low join employer empl on low.employer_id = empl.employer_id join lokasi loc on empl.lokasi_id = loc.lokasi_id join pend_akhir pend on low.pend_akhir_id = pend.pend_akhir_id WHERE gaji_max <= $max AND (low.judul_lowongan
        LIKE '%$cari%' OR low.posisi_jabatan LIKE '%$cari%' OR low.nama_perusahaan LIKE '%$cari%')";

    } else if ($max == "" && $pend == "") { //cm ada min & cari
        $sqlstr = "SELECT * from lowongan low join employer empl on low.employer_id = empl.employer_id join lokasi loc on empl.lokasi_id = loc.lokasi_id join pend_akhir pend on low.pend_akhir_id = pend.pend_akhir_id WHERE gaji_min >= $min AND (low.judul_lowongan
        LIKE '%$cari%' OR low.posisi_jabatan LIKE '%$cari%' OR low.nama_perusahaan LIKE '%$cari%')";

    } else if ($min == "" && $max == "") { //cm pendidikan & cari
        $sqlstr = "SELECT * from lowongan low join employer empl on low.employer_id = empl.employer_id join lokasi loc on empl.lokasi_id = loc.lokasi_id join pend_akhir pend on low.pend_akhir_id = pend.pend_akhir_id WHERE low.pend_akhir_id <= $pend AND (low.judul_lowongan
        LIKE '%$cari%' OR low.posisi_jabatan LIKE '%$cari%' OR low.nama_perusahaan LIKE '%$cari%')";

    } else if ($pend == "") { //cm range gaji & cari
        $sqlstr = "SELECT * from lowongan low join employer empl on low.employer_id = empl.employer_id join lokasi loc on empl.lokasi_id = loc.lokasi_id join pend_akhir pend on low.pend_akhir_id = pend.pend_akhir_id WHERE (gaji_min >= $min and gaji_min <= $max) OR (gaji_max >= $min and gaji_max <= $max) AND (low.judul_lowongan
        LIKE '%$cari%' OR low.posisi_jabatan LIKE '%$cari%' OR low.nama_perusahaan LIKE '%$cari%')";

    } else if ($min == "") { //ada max, pendidikan, & cari
        $sqlstr = "SELECT * from lowongan low join employer empl on low.employer_id = empl.employer_id join lokasi loc on empl.lokasi_id = loc.lokasi_id join pend_akhir pend on low.pend_akhir_id = pend.pend_akhir_id WHERE gaji_max <= $max and low.pend_akhir_id <= $pend AND (low.judul_lowongan
        LIKE '%$cari%' OR low.posisi_jabatan LIKE '%$cari%' OR low.nama_perusahaan LIKE '%$cari%')";

    } else if ($max == "") { //ada min, pendidikan, & cari
        $sqlstr = "SELECT * from lowongan low join employer empl on low.employer_id = empl.employer_id join lokasi loc on empl.lokasi_id = loc.lokasi_id join pend_akhir pend on low.pend_akhir_id = pend.pend_akhir_id WHERE gaji_min >= $min and low.pend_akhir_id <= $pend AND (low.judul_lowongan
        LIKE '%$cari%' OR low.posisi_jabatan LIKE '%$cari%' OR low.nama_perusahaan LIKE '%$cari%')";

    } else if ($cari == "") { //ada range gaji & pend, carinya kosong
        $sqlstr = "SELECT * from lowongan low join employer empl on low.employer_id = empl.employer_id join lokasi loc on empl.lokasi_id = loc.lokasi_id join pend_akhir pend on low.pend_akhir_id = pend.pend_akhir_id WHERE ((gaji_min >= $min and gaji_min <= $max) OR (gaji_max >= $min and gaji_max <= $max)) AND low.pend_akhir_id <= $pend";
    
    } else { //ada isinya semua
        $sqlstr = "SELECT * from lowongan low join employer empl on low.employer_id = empl.employer_id join lokasi loc on empl.lokasi_id = loc.lokasi_id join pend_akhir pend on low.pend_akhir_id = pend.pend_akhir_id WHERE (gaji_min >= $min and gaji_min <= $max) OR (gaji_max >= $min and gaji_max <= $max) AND low.pend_akhir_id <= $pend AND (low.judul_lowongan
        LIKE '%$cari%' OR low.posisi_jabatan LIKE '%$cari%' OR low.nama_perusahaan LIKE '%$cari%')";
    }

    $sqlquery = $conn->query($sqlstr);
    if ($sqlquery->num_rows > 0) {
        while ($row = mysqli_fetch_array($sqlquery)) {
            if ($row["durasi"] == 'Part-Time') $tags = 'tags-part';
            else $tags =  'tags-full'; ?>

            <div class="row mt-3">
                <div class="col-9 col-sm"><a class="cardlink" href="lowongan.php?lowid=<?php echo $row["lowongan_id"] ?>">
                        <div class="card p-3">
                            <div>
                                <h2 id="judul" class="d-inline judul"><?php echo $row["judul_lowongan"] ?></h2>
                                <div class="<?php echo $tags ?> ml-3"><?php echo $row["durasi"] ?></div>
                            </div>
                            <p><?php echo $row["nama_perusahaan"] ?> | <?php echo $row["posisi_jabatan"] ?> </p>
                            <ul><b>Kriteria</b>
                                <li><i class="bi bi-mortarboard"></i> Min. <?php echo $row["pend_akhir"] ?> </li>
                                <li><i class="bi bi-coin"></i> IDR <?php echo $row["gaji_min"] ?> - IDR <?php echo $row["gaji_max"] ?></li>
                            </ul><br><small><i class="bi bi-geo-alt-fill"></i> <?php echo $row["kota"] ?>, <?php echo $row["provinsi"] ?></small>
                        </div>
                    </a></div>
            </div>






    <?php
        }
    }

    ?>

    
</body>

</html>