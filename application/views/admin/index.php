    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= "Hello " . $user['name'] ?></h1>

        <?= $this->session->flashdata('message') ?>

        <?php
        setlocale(LC_ALL, 'ID');
        $dayNow = strftime("%A");
        ?>

        <!-- Jadwal Lab -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">JADWAL LABORATORIUM DASAR</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                    <ul class="nav nav-tabs">
                        <?php foreach ($days as $day) { ?>
                            <li class="nav-item ">
                                <?php if ($day == $dayNow) { ?>
                                    <a class="nav-link link active"><?= $day ?></a>
                                <?php } else { ?>
                                    <a class="nav-link link"><?= $day ?></a>
                                <?php } ?>
                            </li>
                        <?php
                        } ?>
                    </ul>

                    <table class="table table-hover" id="jadwal-kelas">
                        <thead>
                            <tr>
                                <th rowspan="2" class="align-middle">#</th>
                                <th rowspan="2" class="align-middle">Nama Matakuliah</th>
                                <th rowspan="2" class="align-middle">Sesi</th>
                                <th rowspan="2" class="align-middle">Nama Dosen</th>
                                <th colspan="2" class="text-center">Jam</th>
                                <th rowspan="2" class="align-middle text-center">Materi</th>
                            </tr>
                            <tr>
                                <th>Jam Mulai</th>
                                <th>Jam Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Request Password -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Request Password</h6>
                    </div>
                    <div class="card-body">
                        <?php if (empty($passRecover)) { ?>
                            <p>Tidak ada Permintaan Ganti Password</p>
                        <?php } else { ?>
                            <table class="table table-hover">
                                <thead>
                                    <th>no</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </thead>
                                <?php foreach ($passRecover as $i => $r) : ?>
                                    <tbody>
                                        <td><?= ++$i ?></td>
                                        <td><?= $r['nim'] ?></td>
                                        <td><?= $r['name'] ?></td>
                                        <td><a class="badge badge-success" href="<?= base_url('admin/accRecoverPass/') . $r['nim'] ?>" onclick="return confirm('recover pass for <?= $r['name'] ?> ?')">Recover</a></td>
                                    </tbody>
                            <?php endforeach;
                            } ?>
                            </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Barang hilang -->
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Barang Hilang</h6>
                    </div>
                    <div class="card-body">
                    <?php if (empty($barang)) { ?>
                            <p>Tidak ada barang hilang</p>
                        <?php } else { ?>
                        <table class="table table-hover">
                            <thead>
                                <th>no</th>
                                <th>Nama Barang</th>
                                <th>Tanggal Ditemukan</th>
                                <th>Ditemukan Oleh</th>
                                <th>Nomor PC</th>
                                <th>Action</th>
                            </thead>
                            <?php foreach ($barang as $i => $b) : ?>
                                <tbody>
                                    <td><?= ++$i ?></td>
                                    <td><?= $b['nama_barang'] ?></td>
                                    <td><?= $b['tanggal_ditemukan'] ?></td>
                                    <td><?= $b['ditemukan_oleh'] ?></td>
                                    <td><?= $b['no_pc'] ?></td>
                                    <td><a class="badge badge-danger" href="<?= base_url('admin/deleteBarangHilang/') . $b['id_barang_hilang'] ?>" onclick="return confirm('Deleting <?= $b['nama_barang'] ?> ?')">Delete</a></td>
                                </tbody>
                            <?php endforeach; }?>
                        </table>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#ModalBarangHilang">Tambah Barang Hilang</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">INFO LAB</h6>
                    </div>
                    <div class="card-body">
                    <?php if (empty($info)) { ?>
                            <p>Tidak ada info saat ini</p>
                        <?php } else { ?>
                        <table class="table table-hover">
                            <thead>
                                <th>no</th>
                                <th>List Info</th>
                                <th>Action</th>
                            </thead>
                            <?php foreach ($info as $i => $in) : ?>
                                <tbody>
                                    <td><?= ++$i ?></td>
                                    <td><?= ++$in['keterangan'] ?></td>
                                    <td><a class="badge badge-danger" href="<?= base_url('admin/deleteInfoLab/') . $in['id_info'] ?>" onclick="return confirm('Deleting ?')">Delete</a></td>
                                </tbody>
                            <?php endforeach; }?>
                        </table>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#ModalInfoLab">Tambah Info Lab</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- modalDowndload-->
    <div class="modal fade" id="modalDownload" tabindex="-1" role="dialog" aria-labelledby="modalDownloadTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="modal-download">
            </div>
        </div>
    </div>

    <!-- Modal tambahBarangHilang -->
    <div class="modal fade" id="ModalBarangHilang" tabindex="-1" role="dialog" aria-labelledby="ModalBarangHilangLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalBarangHilangLabel">Form Barang Hilang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/addBarangHilang') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" id="nama_barang" name="nama_barang" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_ditemukan">Tanggal Ditemukan</label>
                            <input type="date" class="form-control" id="tanggal_ditemukan" id="tanggal_ditemukan" name="tanggal_ditemukan" required>
                        </div>
                        <div class="form-group">
                            <label for="ditemukan_oleh">Ditemukan Oleh</label>
                            <input type="text" class="form-control" id="ditemukan_oleh" id="ditemukan_oleh" name="ditemukan_oleh" required>
                        </div>
                        <div class="form-group">
                            <label for="no_pc">No PC</label>
                            <input type="number" class="form-control" id="no_pc" min="1" max="44" id="no_pc" name="no_pc" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal infoLab-->
    <div class="modal fade" id="ModalInfoLab" tabindex="-1" role="dialog" aria-labelledby="ModalInfoLabLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalInfoLabLabel">Form Info Lab</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/addInfoLab') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="info">Info</label>
                            <input type="text" class="form-control" id="addinfo" name="keterangan" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).on('click', '.link', function() {
            var hari = $(this).html();
            $('.link').removeClass('active');
            $.ajax({
                    url: '<?= base_url('./user/getjadwal') ?>',
                    type: 'GET',
                    dataType: 'html',
                    data: {
                        hari: hari
                    },
                })
                .done(function(data) {
                    $('#jadwal-kelas').html(data);
                });

            i = $(this).closest('.nav-item').index();
            $('.nav-item .link').eq(i).addClass('active');
        });

        $(document).on('click', '.modal-materi', function() {
            event.preventDefault();
            var idKelas = $(this).data('kelas');
            var namaKelas = $('#nama_kelas').html();
            var indexKelas = $('#index_kelas').html();
            var kelas = namaKelas + '_' + indexKelas;
            $.ajax({
                    url: '<?= base_url('./user/getModalDownload') ?>',
                    type: 'GET',
                    dataType: 'html',
                    data: {
                        idKelas: idKelas,
                        namaKelas: namaKelas,
                        kelas: kelas
                    },
                })
                .done(function(data) {
                    $('#modal-download').html(data);
                });
            console.log(kelas);
        });
    </script>