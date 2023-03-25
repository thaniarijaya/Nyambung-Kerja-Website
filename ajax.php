<?php
session_start();
// Include config file
require_once "connect.php";

$sql = mysqli_query($conn, "SELECT * FROM lowongan low JOIN employer emp on low.employer_id = emp.employer_id JOIN lokasi lok ON emp.lokasi_id = lok.lokasi_id WHERE REPLACE(low.judul_lowongan, ' ', '_') 
    LIKE '%$_GET[input]%' OR REPLACE(low.posisi_jabatan, ' ' , '_') LIKE '%$_GET[input]%' OR REPLACE(low.nama_perusahaan, ' ', '_') LIKE '%$_GET[input]%' LIMIT 4");

if($sql->num_rows>0) {
while ($data = mysqli_fetch_array($sql)) {

?>

<a class="dropdown-item" value="<?php echo $data['judul_lowongan']; ?>" onclick="ambilJudul(this.getAttribute('value'))"><p><strong><?php echo $data['judul_lowongan']; ?></strong></p><p><?php echo $data['nama_perusahaan']; ?> | <?php echo $data['posisi_jabatan']; ?></p></a>

<?php

}
}

?>