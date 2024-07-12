<?php

// Panggil koneksi db
include "db.php";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="mt-3">
            <h3 class="text-center">CRUD Siswa</h3>
        </div>

        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                Data Siswa
            </div>
            <div class="card-body">
                <!-- button awal modal -->
                <button type="button" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah Data
                </button>

                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>No.</th>
                        <th>Nis</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Jurusan</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    // ambil data siswa
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY id_siswa DESC");
                    while ($data = mysqli_fetch_array($tampil)) :
                    ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nis'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td><?= $data['jurusan'] ?></td>
                            <td>
                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no?>">Ubah</a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no?>">Hapus</a>
                            </td>
                        </tr>

                        <!-- Awal Modal ubah -->
                            <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Siswa</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="aksi_crud.php">
                                            <input type="hidden" name="id_siswa" value="<?= $data ['id_siswa'] ?>">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">NIS</label>
                                                    <input type="number" class="form-control" name="nis" placeholder="Masukkan Nis Anda" value="<?= $data['nis']?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap Anda" value="<?= $data ['nama']?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Alamat</label>
                                                    <textarea class="form-control" name="alamat" rows="3"><?= $data ['alamat']?></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Jurusan</label>
                                                    <select class="form-select" name="jurusan">
                                                        <option value="<?= $data ['jurusan']?>"><?= $data ['jurusan']?></option>
                                                        <option value="RPL">RPL</option>
                                                        <option value="TKJ">TKJ</option>
                                                        <option value="MMD">MMD</option>
                                                        <option value="HTL">HTL</option>
                                                        <option value="PMN">PMN</option>
                                                        <option value="KLN">KLN</option>
                                                        <option value="MPLB">MPLB</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-info" name="ubah">Ubah</button>
                                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <!-- akhir modal Ubah -->

                         <!-- Awal Modal Hapus -->
                         <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="aksi_crud.php">
                                            <input type="hidden" name="id_siswa" value="<?= $data ['id_siswa'] ?>">
                                            <div class="modal-body">

                                                <h5 class="text-center"> Apakah anda yakin ingin menghapus data ini? <br>
                                                    <span class="text-danger"><?= $data['nis']?> - <?= $data['nama']?></span>
                                                </h5>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-info" name="hapus">Ya, Hapus Data!</button>
                                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <!-- akhir modal Hapus -->


                    <?php endwhile; ?>
                </table>

                <!-- Awal Modal tambah -->
                <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Siswa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="aksi_crud.php">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">NIS</label>
                                        <input type="number" class="form-control" name="nis" placeholder="Masukkan Nis Anda">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap Anda">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="3"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Jurusan</label>
                                        <select class="form-select" name="jurusan">
                                            <option value="RPL">RPL</option>
                                            <option value="TKJ">TKJ</option>
                                            <option value="MMD">MMD</option>
                                            <option value="HTL">HTL</option>
                                            <option value="PMN">PMN</option>
                                            <option value="KLN">KLN</option>
                                            <option value="MPLB">MPLB</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info" name="simpan">Simpan</button>
                                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- akhir modal tambah -->

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>