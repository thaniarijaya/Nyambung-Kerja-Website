<!DOCTYPE html>
<html>
<?php
session_start();
require_once 'connect.php';

$id = $_GET["emp"];
$sent = "";

if (isset($_POST["send"])) {
    $to = $_POST["to"];
    $sub = $_POST["subject"];
    $msg = $_POST["msg"];
    if ((!empty($to)) && (!empty($sub)) && (!empty($msg))) {
        echo '<script>console.log("' . $to . ', ' . $sub . ', ' . $msg . '")</script>';
        if (mail($to, $sub, $msg)) {
            $sent = true;
            header("location: contact.php?emp=$id");
        } else {
            echo 'Something went wrong';
        }
    }
}

$sqlquery = $conn->query("SELECT * FROM employer WHERE employer_id = $id");

if ($sqlquery->num_rows > 0) {
    while ($row = mysqli_fetch_array($sqlquery)) { ?>

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

                ul {
                    list-style-type: none;
                    margin: 0px;
                    padding: 0px;
                    font-size: 12pt;
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
                                    <a class="dropdown-item" href="profil.php">My Profile</a>
                                    <a class="dropdown-item" href="logout.php">Log Out</a>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>

            <!--JUMBOTRON-->
            <div class="mt-3">
                <div class="jumbotron my-auto bg-cover">
                    <h3 class="display-4 judul"><b>Hubungi Penyedia Lowongan</b></h3>
                </div>
            </div>
            <?php
            if ($sent) {
                echo '<div class="alert alert-info" role="alert">Your email has been sent!</div>';
            }

            ?>
            <div class="mx-3">
                <div class="row mt-3">
                    <div class="col-9 col-sm">
                        <div class="card p-5">
                            <form class="form-group" method="post">
                                <div class="form-inline-block">
                                    <label for="">To:</label>
                                    <input class="form-control" type="email" name="to" value="<?php echo $row["email"] ?>" readonly>
                                </div>
                                <div class="form-inline-block my-2">
                                    <label for="">Subject:</label>
                                    <input class="form-control" type="text" name="subject" placeholder="e.g. Pertanyaan perihal lowongan...">
                                </div>
                                <label for="">Message:</label>
                                <textarea class="form-control" name="msg" cols="30" rows="10"></textarea>
                                <input class="btn btn-dark mt-3" type="submit" name="send" value="Send">
                            </form>
                        </div>
                    </div>
                </div>
            </div>




    <?php
    }
}
    ?>
        </body>

</html>