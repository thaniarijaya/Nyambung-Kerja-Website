<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>NYAMBUNGKERJA</title>

    <!-- add icon link -->
    <link rel="icon" href="asset/nyambungkerja.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- bagian css -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

        :root {
            --dark-one: #333;
            --dark-two: #7a7a7a;
            --main-color: #784cfb;
            --light-one: #fff;
            --light-two: #f9fafb;
            --light-three: #f6f7fb;
            --dark-blue: #23049d;
            --light-purple: #aa2ee6;
            --light-pink: #ff79cd;
            --light-yellow: #ffdf6b;
        }

        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
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


        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /*bagi kolom jadi 2 di dalem container*/
            align-items: center;
            justify-content: center;
        }

        .text {
            font: 1rem;
            color: var(--dark-two);
            line-height: 1.6;
        }

        .column-1 {
            margin-right: 1.5rem;
        }

        .column-2 {
            margin-left: 1.5rem;
        }

        .col-sm {
            margin-right: auto;
            margin-left: auto;
            margin-bottom: auto;
            margin-top: auto;
        }


        /* End General Styles*/
        header {
            width: 100%;
            background-color: #f6f7fb;
            overflow: hidden;
        }

        .service-content {
            width: 100%;
            background-color: var(--main-color);
            overflow: hidden;
        }

        nav {
            width: 100%;
            position: relative;
            z-index: 50;
        }

        nav .container {
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

        .links a:hover {
            color: var(--main-color);
        }

        .links a.active:hover {
            color: var(--light-one);
            background-color: #6b44e0;
        }

        /* bagi section pada website*/
        .header-content .container.grid-2 {
            grid-template-columns: 1fr 1fr;
            /*bagi kolom container jadi 2*/
            min-height: calc(100vh - 6rem);
            padding-bottom: 2.5rem;
            text-align: left;
        }

        .service-content .container.grid-2 {
            grid-template-columns: 1fr 1fr;
            /*bagi kolom container jadi 2*/
            min-height: calc(100vh - 6rem);
            padding-bottom: 2.5rem;
            text-align: left;
        }

        .header-title {
            font-size: 2.8rem;
            line-height: 0.8;
            color: var(--dark-one);
        }

        .header-content .text {
            margin: 2.15rem 0;
        }

        .btn {
            display: inline-block;
            padding: .85rem 2rem;
            background-color: var(--main-color);
            color: var(--light-one);
            border-radius: 2rem;
            font-size: 1.05rem;
            text-transform: uppercase;
            font-weight: 500;
            transition: .3s;
        }

        .btn:hover {
            background-color: #6b44e0;
        }

        .iconbox {
            display: flex;
            justify-content: center;
        }

        .icon1{
            text-align: center;
            color: white;
            font-size: 50px;
        }

        .icon1:hover{
            color: var(--light-purple);
        }

        .image {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-content .image .img-element {
            max-width: 750px;
        }

        .flip-card {
            background-color: transparent;
            width: 345px;
            height: 390px;
            perspective: 1000px;
            /* Remove this if you don't want the 3D effect */
        }

        /* This container is needed to position the front and back side */
        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.8s;
            transform-style: preserve-3d;
        }

        /* Do an horizontal flip when you move the mouse over the flip box container */
        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        /* Position the front and back side */
        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            /* Safari */
            backface-visibility: hidden;
        }

        /* Style the front side (fallback if image is missing) */
        .flip-card-front {
            background-color: #bbb;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: contain;
            background-size: cover;
            color: black;
            box-shadow: 0 14px 28px;
        }

        /* Style the back side */
        .flip-card-back {
            background-color: var(--light-one);
            color: var(--dark-one);
            transform: rotateY(180deg);
            box-shadow: 0 14px 28px;
            padding: 25px;
        }
    </style>


</head>

<body>
    <main>
        <header>
            <!-- navigation bar -->
            <nav>
                <div class="container">
                    <div class="logo">
                        <!-- buat logo -->
                        <img src="asset/nyambungkerja.png" alt="">
                    </div>

                    <div class="links">
                        <ul>
                            <!-- bagian button navbar -->
                            <li>
                                <a href="display.php">Daftar Lowongan</a>
                            </li>
                            <li>
                                <a href="displayLowongan.php">Buat Lowongan</a>
                            </li>
                            <li>
                                <a href="#aboutus">About Us</a>
                            </li>
                            <li>
                                <a href="login.php" class="active">Sign In as Employee</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- content pada header home website -->
            <div class="header-content">
                <div class="container grid-2">
                    <div class="column-1">
                        <h1 class="header-title">SELAMAT DATANG!</h1>
                        <P class="text">
                            Selamat datang di NYAMBUNGKERJA sebuah tempat favorit dimana kamu dapat menemukan berbagai peluang pekerjaan impianmu. Dan menjadi sumber tempat bagi kamu yang lagi mencari orang-orang bertalenta yang dapat membantumu mewujudkan impianmu.
                        </P>
                        <a href="#startnow" class="btn">Start Now!</a>
                    </div>

                    <div class="column-2 image">
                        <img src="asset/gambarhome-nobg.png" class="img-element" alt="">
                    </div>
                </div>
            </div>
        </header>
        <!-- service area -->
        <div id="startnow" class="service-content">
            <br><br><br><br>
            <p style="text-align: center; font-size: 20px; color: var(--light-three); text-transform: uppercase;">Mari Penuhi Kebutuhanmu</p>
            <h1 style="text-align: center; color: var(--light-one);">APA YANG KAMU BUTUHKAN?</h1>
            <div class="container grid-2">
                <div class="column-1" style="margin-left: auto; margin-right: auto;">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front" style="background-image: url(asset/pegawai.png);"></div>
                            <div class="flip-card-back">
                                <h1>Cari Pekerjaan</h1>
                                <p>Temukan pekerjaan impianmu dengan perusahaan bergengsi kesukaanmu sekarang juga. </p>
                                <a href="display.php" class="btn">Cari Kerja</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column-2" style="margin-left: auto; margin-right: auto;">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front" style="background-image: url(asset/kumpulanpegawai.png);"></div>
                            <div class="flip-card-back">
                                <h1>Buka Lowongan</h1>
                                <p>Temukan orang-orang yang akan membantumu menyukseskan impianmu disini sekarang juga.</p>
                                <a href="displayLowongan.php" class="btn">Buka Lowongan</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row iconbox mb-5">
                    <center><a href="#why"><i class="bi bi-chevron-double-down icon1"></a></i></center>
            </div>
        </div>
        </div>

        <br><br><br><br><br><br>

        <div id="why" class="employee-reasons">
            <h1 style="text-align: center;">Mengapa membuat akun di NYAMBUNGKERJA</h1>
            <div class="container">
                <div class="row">
                    <div class="col-sm" style="padding: 100px"><img src="asset/jobhunt-nobg.png" alt=""></div>
                    <div class="list-group col-sm">
                        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start" style="border:transparent;">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Peluang Yang Menarik</h5>

                            </div>
                            <p class="mb-1">Hanya dengan membuat akun anda mendapat kesempatan untuk mendaftarkan diri dan mendapat pekerjaan impian anda dengan jaminan dan upah yang menjanjikan.</p>

                        </div>
                        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start" style="border:transparent;">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Peluang Bekerja Dengan Perusahaan Ternama</h5>

                            </div>
                            <p class="mb-1">Mendapat kesempatan untuk bekerja dengan perusahaan-perusahaan ternama dan favorit anda.</p>

                        </div>
                        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start" style="border:transparent;">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Menemani Anda Sepanjang Proses Pencarian Kerja</h5>

                            </div>
                            <p class="mb-1">Menemani anda sepanjang proses pemilihan dan penerimaan pekerjaan dengan customer support 24 jam siap melayani segala kebutuhan anda.</p>

                        </div>
                        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start" style="border:transparent;">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Keamanan Yang Terjamin</h5>

                            </div>
                            <p class="mb-1">Menjamin keamanan dan privasi data-data para pengguna dan melakukan background check ke setiap pengguna dan perusahaan yang berinteraksi melalui NYAMBUNGKERJA.</p>

                        </div>
                    </div>
                </div>
            </div>

            <br><br><br><br><br>

            <!-- employer reason -->
            <div class="employer-reasons" id="class">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center mb-5">
                            <h1>Kenapa Membuka Lowongan Di NYAMBUNGKERJA</h1>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                            <div class="class-thumb">
                                <img src="asset/people.png" class="img-fluid" alt="Class" style="width: 325px; height: 350px;">

                                <div class="class-info">
                                    <h3 class="mb-1">Tempat Favorit</h3>

                                    <p class="mt-3">NYAMBUNGKERJA telah terbukti digunakan oleh orang-orang dari berbagai kalangan di seluruh Indonesia. Mulai dari fresh graduate yang lulus dengan nilai rata-rata tertinggi hingga seorang profesional dengan pengalaman bertahun-tahun.</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 mt-lg-0 mt-md-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">
                            <div class="class-thumb">
                                <img src="asset/security.png" class="img-fluid" alt="Class" style="width: 325px; height: 350px;">

                                <div class="class-info">
                                    <h3 class="mb-1">Keamanan</h3>

                                    <p class="mt-3">Sebagai pihak pengawas NYAMBUNGKERJA selalu melakukan background check secara intensif kepada setiap pengguna website demi kelancaran proses bersama.</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 mt-lg-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
                            <div class="class-thumb">
                                <img src="asset/nomad.png" class="img-fluid" alt="Class" style="width: 325px; height: 350px;">

                                <div class="class-info">
                                    <h3 class="mb-1">Kemudahan</h3>

                                    <p class="mt-3">Hanya dengan beberapa kali klik saja, anda sudah bisa membuka lowongan pekerjaan dimanapun kapanpun anda berada. NYAMBUNGKERJA menjamin bahwa iklan lowongan anda langsung terpapar ke para pengguna di seluruh Indonesia.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <br><br><br><br><br>

            <div id="contactus" class="contact-us">

                <div class="container">
                    <h1 class="contact-us-title" style="font-size: 25px;">Hubungi Kami</h1>

                    <P class="text">
                        Jalan Raya Timur blok SQ 12 No. 12
                    </P>
                    <p class="text">
                        Kecamatan Kebayoran Lama, Jakarta Selatan, IND
                    </p>
                    <p class="text">
                        Phone1: +6281 6206 2395
                    </p>
                    <p class="text">
                        Phone2: +6281 6324 5934
                    </p>
                    <p class="text">
                        Email: NYAMBUNGKERJA@gmail.com
                    </p>
                </div>
            </div>


            <br><br><br><br>

            <div id="aboutus" class="about-us">
                <div class="container">
                    <h1 class="about-us-title" style="font-size: 25px;">Tentang NYAMBUNGKERJA</h1>
                    <P class="text">
                        NYAMBUNGKERJA adalah sebuah website yang didedikasikan untuk orang-orang yang ingin mendapat peluang pekerjaan profesional dengan mudah dan gratis. Bermodal sebuah Curriculum Vitae seseorang sudah bisa mendaftarkan dirinya ke banyak perusahaan ternama.
                    </P>

                    <p class="text">Dengan sistem background check yang selalu dilakukan dan para operator kami yang selalu siap melayani anda setiap hari selama 24 jam. Sudah dapat dipastikan bahwa keamanan data dan privasi anda adalah tanggung jawab terbesar kami. Tidak hanya itu NYAMBUNGKERJA juga menyediakan kesempatan bagi perusahaan-perusahaan yang ingin mencari orang-orang berkualitas agar bisa membantu mengembangkan bisnis sekaligus mensejahterakan rakyat. Dengan NYAMBUNGKERJA hanya dengan beberapa klik dari tempat anda saat ini pastinya iklan lowongan dapat terbuka di website ini dengan mudah, aman, dan bebas biaya tentunya.</p>
                </div>
            </div>

            <br><br><br><br>

            <hr>
            <br>

            <!-- FOOTER -->
            <footer class="site-footer" style="margin-bottom: 45px;">
                <div class="container">
                    <div class="row justify-content-between">

                        <div class="ml-auto col-lg-4 col-md-5">
                            <p class="copyright-text">Copyright &copy; 2021 NYAMBUNGKERJA Co.
                        </div>

                        <div class="d-flex justify-content-center mx-auto col-lg-5 col-md-7 col-12">
                            <p class="mr-4">
                                <i class="bi bi-envelope"></i>
                                <a href="#">NYAMBUNGKERJA@gmail.com</a>
                            </p>
                        </div>
                        <a href="#">Scroll to Top</a>
                        

                    </div>
                </div>
            </footer>

    </main>
</body>

</html>