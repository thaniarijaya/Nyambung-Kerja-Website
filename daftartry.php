<!DOCTYPE html>
<html>
    <head>
        <title>Pengisian CV</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <style type="text/css">
            .container{
                font-family: 'Poppins', sans-serif;
            }
        </style>
        <script>
            function alertFunc() {
                alert("Pengisian data hanya bisa disubmit 1x. Pastikan data yang Anda isi sudah benar.");
            }
        </script>
    </head>
    <body>
    <?php 
        require_once "connect.php";
        $lowid = $_GET['lowid'];
        $username = $_GET['username'];
        $kalimatquery = $conn->prepare("select email, no_telp from employee WHERE username=?");
        $kalimatquery->bind_param("s",$username);
        $kalimatquery->execute();
        $hasilquery=$kalimatquery->get_result();

        if ($hasilquery->num_rows>0) {
            while($row = $hasilquery->fetch_assoc()) {
    ?>
    <form action="insertdaftartry.php" method="post" enctype="multipart/form-data">
        <div class="container">
            <br>
            <!-- row buat ktp sama nama lengkap-->
            <div class="row">
                <input type="hidden" name="lowid" value="<?php echo $lowid?>">
                <div class="col">
                    <div class="form-group">
                        <label for="ktp">Nomor KTP</label>
                        <input type="text" class="form-control" id="ktp" name="ktp">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="ktp">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama"  name="nama">
                    </div>
                </div>  
            </div>
            <!-- row buat tanggal lahir-->
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="birthday">Tanggal lahir</label>
                        <input type="date" id="birthday" name="birthday">
                    </div> 
                </div>
            </div>
            <!-- row buat alamat asal-->
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="asal">Alamat Asal</label>
                        <textarea class="form-control" id="asal" rows="3" name="asal"></textarea>
                    </div>
                </div>
            </div>
            <!-- row buat alamat sekarang-->
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="sekarang">Alamat Sekarang</label>
                        <textarea class="form-control" id="sekarang" rows="3" name="sekarang"></textarea>
                    </div>
                </div>    
            </div>
            <!-- row buat agama sama pendidikan terakhir-->
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-control" id="agama" name="agama">
                            <option>Islam</option>
                            <option>Kristen</option>
                            <option>Katolik</option>
                            <option>Hindu</option>
                            <option>Buddha</option>
                            <option>Kong Hu Cu</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="pendidikan">Pendidikan Terakhir</label>
                        <select class="form-control" id="pendidikan" name="pendidikan">
                            <option>SD</option>
                            <option>SMP</option>
                            <option>SMA</option>
                            <option>Sarjana 1</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- row buat pengalaman kerja-->
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="pengalaman">Pengalaman Kerja</label>
                        <textarea class="form-control" id="pengalaman" rows="3" name="pengalaman"></textarea>
                    </div>
                </div>  
            </div>
            <!-- row buat email sama no telp-->
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" value="<?php echo $row["email"] ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="telp">No Telp</label>
                        <input class="form-control" type="text" name="telp" value="<?php echo $row["no_telp"] ?>">
                    </div>
                </div>
                <div class="col" style="display: none;">
                    <?php
                                echo "<div class='row'></div>";
                                echo "Email: ". $row['email'];
                                echo "</br>";
                                echo "No Telp: ". $row['no_telp'];
                                echo "</br>";
                            }
                        } else {
                            echo "Mahasiswa Tidak Ditemukan";
                        }
                    ?>
                </div>
            </div>
            <!-- row buat upload file-->
            <div class="row">
                <div class="col">
                    <form>
                        <div class="form-group">
                            <label for="berkas">Upload File Berkas</label>
                            <input type="file" class="form-control-file" id="berkas" name="berkas">
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <center>
                <input type="submit" style="background-color: #23049D; color: white;" onclick="alertFunc()">
            </center>
            <br>
        </div>
    </form>
    </body>
</html>