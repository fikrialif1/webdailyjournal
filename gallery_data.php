<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- link icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="style.css">

</head>
<body>
<table class="table table-hover table-light">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th class="w-25">Judul</th>
                        <th class="w-25">Tanggal</th>
                        <th class="w-25">Gambar</th>
                        <th class="w-25">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                include "koneksi.php";

                $hlm = (isset($_POST['hlm'])) ? $_POST['hlm'] : 1;
                $limit = 3;
                $limit_start = ($hlm - 1) * $limit;
                $no = $limit_start + 1;

                $sql = "SELECT * FROM gallery ORDER BY tanggal DESC LIMIT $limit_start, $limit";
                $hasil = $conn->query($sql);


                    $no = 1;
                    while ($row = $hasil->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <strong><?= $row["judul"] ?></strong>
                                
                            </td>
                            <td>
                            <?= $row["tanggal"] ?>
                            </td>
                            <td>
                                <?php
                                if ($row["gambar"] != '') {
                                    if (file_exists('img-gallery/' . $row["gambar"] . '')) {
                                ?>
                                        <img src="img-gallery/<?= $row["gambar"] ?>" width="100">
                                <?php
                                    }
                                }
                                ?>
                            </td>
                             <!-- untuk tombol aksi update dan delete -->
                            <td>
    <a href="#" title="edit" class="badge rounded-pill text-bg-primary" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row["id"] ?>"><i class="bi bi-pencil-square fs-5"></i></a>
    <br>
    <a href="#" title="delete" class="badge rounded-pill text-bg-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row["id"] ?>"><i class="bi bi-trash3-fill fs-5"></i></a>

<!-- Awal Modal Edit -->
<div class="modal fade" id="modalEdit<?= $row["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Gallery</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Judul</label>
                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                        <input type="text" class="form-control" name="judul" placeholder="Tuliskan Judul Gallery" value="<?= $row["judul"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Ganti Gambar</label>
                        <input type="file" class="form-control" name="gambar">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput3" class="form-label">Gambar Lama</label>
                        <?php
                        if ($row["gambar"] != '') {
                            if (file_exists('img-gallery/' . $row["gambar"] . '')) {
                        ?>
                                <br><img src="img-gallery/<?= $row["gambar"] ?>" width="100">
                        <?php
                            }
                        }
                        ?>
                        <input type="hidden" name="gambar_lama" value="<?= $row["gambar"] ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Akhir Modal Edit -->

<!-- Awal Modal Hapus -->
<div class="modal fade" id="modalHapus<?= $row["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Gallery</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Yakin akan menghapus gallery "<strong><?= $row["judul"] ?></strong>"?</label>
                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                        <input type="hidden" name="gambar" value="<?= $row["gambar"] ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
                    <input type="submit" value="hapus" name="hapus" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Akhir Modal Hapus -->
</td>
                            <td> 
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

            <?php 
$sql1 = "SELECT * FROM gallery";
$hasil1 = $conn->query($sql1); 
$total_records = $hasil1->num_rows;
?>
<p class="text-dark" id="text">Total article : <?php echo $total_records; ?></p>
<nav class="mb-2">
    <ul class="pagination justify-content-end">
    <?php
        $jumlah_page = ceil($total_records / $limit);
        $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
        $start_number = ($hlm > $jumlah_number)? $hlm - $jumlah_number : 1;
        $end_number = ($hlm < ($jumlah_page - $jumlah_number))? $hlm + $jumlah_number : $jumlah_page;

        if($hlm == 1){
            echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
            echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
        } else {
            $link_prev = ($hlm > 1)? $hlm - 1 : 1;
            echo '<li class="page-item halaman" id="1"><a class="page-link" href="#">First</a></li>';
            echo '<li class="page-item halaman" id="'.$link_prev.'"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
        }

        for($i = $start_number; $i <= $end_number; $i++){
            $link_active = ($hlm == $i)? ' active' : '';
            echo '<li class="page-item halaman '.$link_active.'" id="'.$i.'"><a class="page-link" href="#">'.$i.'</a></li>';
        }

        if($hlm == $jumlah_page){
            echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
            echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
        } else {
        $link_next = ($hlm < $jumlah_page)? $hlm + 1 : $jumlah_page;
            echo '<li class="page-item halaman" id="'.$link_next.'"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
            echo '<li class="page-item halaman" id="'.$jumlah_page.'"><a class="page-link" href="#">Last</a></li>';
        }
    ?>
    </ul>
</nav>   


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
    ></script>
</body>
</html>













