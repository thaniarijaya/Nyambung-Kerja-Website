<!DOCTYPE html>
<html>
    <head>
        <title>Daftar Pelamar</title>
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
    </head>
    <body>
        <?php
            require_once "connect.php";
            $lowid = $_GET['lowid'];
            $sql = "select lamaran_id, no_ktp, nama_lengkap from detail_lamaran where lowongan_id = '$lowid'";
            $result = $conn->query($sql);
        ?>
        <div class="container">
            <br>
            <div class="row">
                <table border="1" class="table table-bordered">
                <thead class="thead-white" style="background-color: #FF79CD; color: white;">
                    <tr>
                        <th scope="col">ID Lamaran</th>
                        <th scope="col">Nomor KTP</th>
                        <th scope="col">Nama Lengkap</th>
                    </tr>
                </thead>
                <?php
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        $id = $row['lamaran_id'];
                        echo "<tr>";
                        echo "<td><a href='showdaftar.php?id=$id'>". $row['lamaran_id']. "</a></td>";
                        echo "<td>". $row['no_ktp']. "</td>";
                        echo "<td>". $row['nama_lengkap']. "</td>";
                        echo "</tr>";
                    }
                    } else {
                        echo "0 results";
                    }     
                        $conn->close();
                ?>
                </table>
            </div>
        </div>
    </body>
</html>