<!DOCTYPE html>

<html>

<?php
session_start();
if (!isset($_SESSION["loggedinEmp"]) || $_SESSION["loggedinEmp"] !== true) {
    header("location: loginemployer.php");
    exit;
}
require_once 'connect.php';

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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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

        .container-nav{
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
            background-image: url(img/bgemp-01.png);
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

        #kolomcari:focus .dropdown-menu {
            display: block;
            margin-top: 0;
        }

        /* THANIA */
        p{
            padding-top:2px;
        }

        h4{
            padding-bottom:0px;
        }

        .dropdown-item:focus,
        .dropdown-item:hover,
        .dropdown-item:active{
            color:#FF79CD;
            background-color:white;
        }

    </style>
</head>

<body>
<nav>
        <div class="container-nav">
            <div class="logo">
                <!-- buat logo -->
                <h1>logo</h1>
            </div>

            <div class="links">
                <ul>
                    <!-- bagian button navbar -->
                    <li>
                        <a href="#">yuk</a>
                    </li>
                    <li>
                        <a href="#">selesai</a>
                    </li>
                    <li>
                        <a href="#">yuk</a>
                    </li>
                    <li>
                        <a href="#">sudah</a>
                    </li>
                    <li>
                        <a href="#">capek</a>
                    </li>
                    <div id="profile-dd" class="dropdown">
                        <a class="nav-item nav-link active dropdown-toggle" data-toggle="dropdown">Welcome, <?php echo $_SESSION["username"] ?> !</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="profilemployer.php">My Profile</a>
                            <a class="dropdown-item" href="logoutemployer.php">Log Out</a>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    
    <!--JUMBOTRON-->
    <div class="mt-3">
        <div class="jumbotron my-auto bg-cover">
            <h3 class="display-4 judul"><b>Lowongan Pekerjaan</b></h3>
            <form class="input-group" method="get" action="searchemployer.php">
                <input class="form-control" placeholder="Cari lowongan..." type="text" name="cari" id="cari" data-toggle="dropdown" autocomplete="off" value="" onfocus="fokus()">
                <div class="input-group-append">
                    <button class="input-group-text" name="Cari" type="submit"><i class="bi bi-search"></i></button>
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" name="dropdown-menu1" id="dropdown-menu1"></div>
                </div>
            </form>
        </div>
    </div>

    <!--Filters-->
    <div class="container mt-3">
        <div class="row mx-1">
            <p class="my-auto mr-3"><i class="bi bi-filter-circle-fill"></i> Filters</p>
            <form>
                <select class="btn btn-outline-dark text-left mr-3" name="gaji">
                    <option value="">Gaji minimum</option>
                    <option value="500000">IDR 500.000</option>
                    <option value="1000000">IDR 1.000.000</option>
                    <option value="1500000">IDR 1.500.000</option>
                    <option value="2000000">IDR 2.000.000</option>
                    <option value="2500000">IDR 2.500.000</option>
                    <option value="3000000">IDR 3.000.000</option>
                </select>
            </form>
            <p class="my-auto mr-3">-</p>
            <form>
                <select class="btn btn-outline-dark text-left mr-3" name="gaji">
                    <option value="">Gaji maksimum</option>
                    <option value="500000">IDR 500.000</option>
                    <option value="1000000">IDR 1.000.000</option>
                    <option value="1500000">IDR 1.500.000</option>
                    <option value="2000000">IDR 2.000.000</option>
                    <option value="2500000">IDR 2.500.000</option>
                    <option value="3000000">IDR 3.000.000</option>
                </select>
            </form>
            <form>
                <select class="btn btn-outline-dark text-left mr-3" name="gaji">
                    <option value="">Pendidikan terakhir</option>
                    <option value="1">SMP</option>
                    <option value="2">SMA</option>
                    <option value="3">D3</option>
                    <option value="4">S1</option>
                    <option value="5">S2</option>
                    <option value="6">S3</option>
                </select>
            </form>
        </div>
    </div>

    <!--Card Lowongan-->
<div class="container mt-3">
<div class="row" id="row-output">
<?php 

if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
    if($cari != ''){
	    $sql = mysqli_query($conn, "SELECT * FROM lowongan low JOIN employer emp on low.employer_id = emp.employer_id JOIN lokasi lok ON emp.lokasi_id = lok.lokasi_id WHERE low.judul_lowongan
        LIKE '%$cari%' OR low.posisi_jabatan LIKE '%$cari%' OR low.nama_perusahaan LIKE '%$cari%'");
    } else{
        $sql = mysqli_query($conn, "SELECT * FROM lowongan low JOIN employer emp on low.employer_id = emp.employer_id JOIN lokasi lok ON emp.lokasi_id = lok.lokasi_id");
    }

    if($sql->num_rows>0) {
    while ($data = mysqli_fetch_array($sql)) {

?>

<div class="col-9 col-sm">
    <div class="card p-3">
        <div>
            <h2 id="judul" class="d-inline judul"><?php echo $data['judul_lowongan']; ?></h2>
            <div class="tags ml-3">Full Time</div>
        </div>
        <p><?php echo $data['nama_perusahaan']; ?> |  <?php echo $data['posisi_jabatan']; ?></p>
        <ul>
            <b>Kriteria</b>
            <li><i class="bi bi-mortarboard"></i> Min. <?php echo $data['pend_akhir']; ?></li>
            <li><i class="bi bi-coin"></i> <?php echo $data['gaji']; ?></li>
            <li><a class="nav-link" href="#">See More ></a></li>
        </ul>
        <br>
        <small><i class="bi bi-geo-alt-fill"></i><?php echo $data['kota']; ?>, <?php echo $data['provinsi']; ?></small>
    </div>
</div>


<?php
}
} else {
    echo "<p>Tidak ada data yang ditemukan.</p>";
};
}

?>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("input").on("keyup", function(){
            var tmp = $("input").val();
            tmp = tmp.replaceAll(' ', '_');
            $("#dropdown-menu1").load("ajaxemployer.php?input=" + tmp);
        });
    });

    function ambilJudul(getValue){
        var judul = getValue;
        $("#cari").val(judul);
    }

    function fokus(){
        <?php 
        if(isset($_GET['cari'])){ 
            echo $_GET['cari'];
        }
        ?>
    }
</script>

</body>

</html>

