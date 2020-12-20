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

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Barang Hilang</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <th>no</th>
                                <th>Nama Barang</th>
                                <th>Tanggal Ditemukan</th>
                                <th>Ditemukan Oleh</th>
                                <th>Nomor PC</th>
                            </thead>
                            <?php foreach ($barang as $i => $b) : ?>
                                <tbody>
                                    <td><?= ++$i ?></td>
                                    <td><?= $b['nama_barang'] ?></td>
                                    <td><?= $b['tanggal_ditemukan'] ?></td>
                                    <td><?= $b['ditemukan_oleh'] ?></td>
                                    <td><?= $b['no_pc'] ?></td>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">INFO LAB</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <th>no</th>
                                <th>List Info</th>
                            </thead>
                            <?php foreach ($info as $i => $in) : ?>
                                <tbody>
                                    <td><?= ++$i ?></td>
                                    <td><?= ++$in['keterangan'] ?></td>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- modalDowndload-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="modal-download">
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