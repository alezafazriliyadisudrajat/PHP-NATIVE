<?php

    // Panggil koneksi db
    include 'db.php';

    //Uji jika tombol simpan di klik
    if(isset($_POST['simpan'])){

        //Simpan data baru atau tambah data
        $simpan = mysqli_query($koneksi, "INSERT INTO siswa (nis, nama, alamat, jurusan)
                                          VALUES('$_POST[nis]',
                                                '$_POST[nama]',
                                                '$_POST[alamat]',
                                                '$_POST[jurusan]') ");

        // Jika simpan berhasil
        if($simpan){
            echo "<script>alert( 'data berhasil di simpan!');
                    document.location='index.php';
                  </script>";
        } else{
            echo "<script>alert( 'data gagal di simpan!');
                    document.location='index.php';
                  </script>";
        }
        
    }

        //Uji jika tombol ubah di klik
        if(isset($_POST['ubah'])){

            // Ubah data
            $ubah = mysqli_query($koneksi, "UPDATE siswa SET
                                                            nis = '$_POST[nis]',
                                                            nama = '$_POST[nama]',
                                                            alamat = '$_POST[alamat]',
                                                            jurusan = '$_POST[jurusan]'
                                                        WHERE id_siswa = '$_POST[id_siswa]'
                                                            ");


    
            // Jika ubah berhasil
            if($ubah){
                echo "<script>alert( 'data berhasil di perbarui!');
                        document.location='index.php';
                      </script>";
            } else{
                echo "<script>alert( 'data gagal di perbarui!');
                        document.location='index.php';
                      </script>";
            }
        }

        //Uji jika tombol Hapus di klik
        if(isset($_POST['hapus'])){

            // Ubah data
            $hapus = mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa = '$_POST[id_siswa]'");


    
            // Jika hapus berhasil
            if($hapus){
                echo "<script>alert( 'data berhasil di hapus!');
                        document.location='index.php';
                      </script>";
            } else{
                echo "<script>alert( 'data gagal di hapus!');
                        document.location='index.php';
                      </script>";
            }
        }

?>