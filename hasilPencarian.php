<?php
    session_start();
    //load connect.php
    require_once "connect.php";

        
    $sql = mysqli_query($conn, "SELECT * FROM lowongan low JOIN employer emp on low.employer_id = emp.employer_id JOIN lokasi lok ON emp.lokasi_id = lok.lokasi_id WHERE REPLACE(low.judul_lowongan, ' ', '_') 
        LIKE '%$_GET[input]%' OR REPLACE(low.posisi_jabatan, ' ' , '_') LIKE '%$_GET[input]%' OR REPLACE(low.nama_perusahaan, ' ', '_') LIKE '%$_GET[input]%'");

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
}


?>
