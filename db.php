<?php

    // Koneksi database
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'db_siswa';

    // Buat Koneksi
    $koneksi = mysqli_connect($server, $username, $password, $dbname) or die(mysqli_error($koneksi));
?>