<!-- Modal Update kontrak-->
<div class="modal fade" id="formKontrak" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="form-update">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Kontrak Tempat Duduk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?>seat/kontrakPC" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="comnumber">No. PC</label>
            <input type="text" class="form-control" placeholder="Nomor PC" name="no_pc" value="<?= $ip ?>">
            <!-- substr($_SERVER['REMOTE_ADDR'], 10) -->
          </div>
          <div class="form-group">
            <label for="nama">Kelas</label>
            <input type="text" class="form-control" placeholder="Kelas" name="kelas" value="<?= $Seat[0]['id_perkuliahan'] ?>">
          </div>
          <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" placeholder="Nomor Induk Mahasiswa" name="nim" value="<?= $user['nim'] ?>">
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" value="<?= $user['name'] ?>">
          </div>
        </div>
        <div class="container">
          <p class="lead ">Kontrak PC ini akan berlangsung selama satu semester apakah anda yakin?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary">Kontrak</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- layout kursi -->
<div class="row mt-3">
    <?php $kelasKontrak = $Seat[0]['id_perkuliahan'] ?>
    <!-- Kolom 1 -->
    <div class="col mt-6">
        <?php for ($i = 0; $i <= 25; $i++) {
            if ($i == 0 || true) { ?>
                <li class="list-group-item">
                    <?php echo $Seat[$i]['no_pc']; ?>
                    <?php if ($ip == $Seat[$i]['no_pc']) { ?>
                        <img src="<?= base_url() ?>assets/img/seat_selected.png" height="80px">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else if ($Seat[$i]['nim'] == 'Tersedia') { ?>
                        <img src="<?= base_url() ?>assets/img/seat_available.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else { ?>
                        <img src="<?= base_url() ?>assets/img/seat_booked.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php $nama = $Seat[$i]['nim'];
                    } ?>
                    <?php $i = $i + 5 ?>
                </li>
        <?php }
        } ?>
    </div>
    <!-- Kolom 2 -->
    <div class="col mt-6">
        <?php for ($i = 1; $i <= 26; $i++) {
            if ($i == 1 || true) { ?>
                <li class="list-group-item">
                    <?php echo $Seat[$i]['no_pc']; ?>
                    <?php if ($ip == $Seat[$i]['no_pc']) { ?>
                        <img src="<?= base_url() ?>assets/img/seat_selected.png" height="80px">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else if ($Seat[$i]['nim'] == 'Tersedia') { ?>
                        <img src="<?= base_url() ?>assets/img/seat_available.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else { ?>
                        <img src="<?= base_url() ?>assets/img/seat_booked.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } ?>
                    <?php $i = $i + 5 ?>
                </li>
        <?php }
        } ?>
    </div>

    <div class="col mt-6"></div>

    <!-- Kolom 3 -->
    <div class="col mt-6">
        <?php for ($i = 2; $i <= 38; $i++) {
            if ($i == 2 || $i <= 26) { ?>
                <li class="list-group-item">
                    <?php echo $Seat[$i]['no_pc']; ?>
                    <?php if ($ip == $Seat[$i]['no_pc']) { ?>
                        <img src="<?= base_url() ?>assets/img/seat_selected.png" height="80px">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else if ($Seat[$i]['nim'] == 'Tersedia') { ?>
                        <img src="<?= base_url() ?>assets/img/seat_available.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else { ?>
                        <img src="<?= base_url() ?>assets/img/seat_booked.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } ?>
                    <?php $i = $i + 5;
                    if ($i == 31) {
                        $i = $i - 5;
                    } ?>
                </li>
            <?php } else if ($i >= 27) {
            ?> <li class="list-group-item">
                    <?php $i = $i + 3; ?>
                    <?php echo $Seat[$i]['no_pc']; ?>
                    <?php if ($ip == $Seat[$i]['no_pc']) { ?>
                        <img src="<?= base_url() ?>assets/img/seat_selected.png" height="80px">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else if ($Seat[$i]['nim'] == 'Tersedia') { ?>
                        <img src="<?= base_url() ?>assets/img/seat_available.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else { ?>
                        <img src="<?= base_url() ?>assets/img/seat_booked.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } ?>
                </li>
        <?php }
        } ?>
    </div>
    <!-- Kolom 4 -->
    <div class="col mt-6">
        <?php for ($i = 3; $i <= 39; $i++) {
            if ($i == 3 || $i <= 27) { ?>
                <li class="list-group-item">
                    <?php echo $Seat[$i]['no_pc']; ?>
                    <?php if ($ip == $Seat[$i]['no_pc']) { ?>
                        <img src="<?= base_url() ?>assets/img/seat_selected.png" height="80px">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else if ($Seat[$i]['nim'] == 'Tersedia') { ?>
                        <img src="<?= base_url() ?>assets/img/seat_available.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else { ?>
                        <img src="<?= base_url() ?>assets/img/seat_booked.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } ?>
                    <?php $i = $i + 5;
                    if ($i == 32) {
                        $i = $i - 5;
                    } ?>
                </li>
            <?php
            } else if ($i >= 28) {
            ?> <li class="list-group-item">
                    <?php $i = $i + 3; ?>
                    <?php echo $Seat[$i]['no_pc']; ?>
                    <?php if ($ip == $Seat[$i]['no_pc']) { ?>
                        <img src="<?= base_url() ?>assets/img/seat_selected.png" height="80px">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else if ($Seat[$i]['nim'] == 'Tersedia') { ?>
                        <img src="<?= base_url() ?>assets/img/seat_available.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else { ?>
                        <img src="<?= base_url() ?>assets/img/seat_booked.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } ?>
                </li>
        <?php }
        } ?>
    </div>

    <div class="col mt-6"></div>

    <!-- Kolom 5 -->
    <div class="col mt-6">
        <?php for ($i = 4; $i <= 40; $i++) {
            if ($i == 4 || $i <= 28) { ?>
                <li class="list-group-item">
                    <?php echo $Seat[$i]['no_pc']; ?>
                    <?php if ($ip == $Seat[$i]['no_pc']) { ?>
                        <img src="<?= base_url() ?>assets/img/seat_selected.png" height="80px">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else if ($Seat[$i]['nim'] == 'Tersedia') { ?>
                        <img src="<?= base_url() ?>assets/img/seat_available.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else { ?>
                        <img src="<?= base_url() ?>assets/img/seat_booked.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } ?>
                    <?php $i = $i + 5;
                    if ($i == 33) {
                        $i = $i - 5;
                    } ?>
                </li>
            <?php
            } else if ($i >= 29) {
            ?> <li class="list-group-item">
                    <?php $i = $i + 3; ?>
                    <?php echo $Seat[$i]['no_pc']; ?>
                    <?php if ($ip == $Seat[$i]['no_pc']) { ?>
                        <img src="<?= base_url() ?>assets/img/seat_selected.png" height="80px">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else if ($Seat[$i]['nim'] == 'Tersedia') { ?>
                        <img src="<?= base_url() ?>assets/img/seat_available.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else { ?>
                        <img src="<?= base_url() ?>assets/img/seat_booked.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } ?>
                </li>
        <?php }
        } ?>
    </div>
    <!-- Kolom 6 -->
    <div class="col mt-6">
        <?php for ($i = 5; $i <= 41; $i++) {
            if ($i == 5 || $i <= 29) { ?>
                <li class="list-group-item">
                    <?php echo $Seat[$i]['no_pc']; ?>
                    <?php if ($ip == $Seat[$i]['no_pc']) { ?>
                        <img src="<?= base_url() ?>assets/img/seat_selected.png" height="80px">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else if ($Seat[$i]['nim'] == 'Tersedia') { ?>
                        <img src="<?= base_url() ?>assets/img/seat_available.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else { ?>
                        <img src="<?= base_url() ?>assets/img/seat_booked.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } ?>
                    <?php $i = $i + 5;
                    if ($i == 34) {
                        $i = $i - 5;
                    } ?>
                </li>
            <?php
            } else if ($i >= 30) {
            ?> <li class="list-group-item">
                    <?php $i = $i + 3; ?>
                    <?php echo $Seat[$i]['no_pc']; ?>
                    <?php if ($ip == $Seat[$i]['no_pc']) { ?>
                        <img src="<?= base_url() ?>assets/img/seat_selected.png" height="80px">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else if ($Seat[$i]['nim'] == 'Tersedia') { ?>
                        <img src="<?= base_url() ?>assets/img/seat_available.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } else { ?>
                        <img src="<?= base_url() ?>assets/img/seat_booked.png" height="80px" data-toggle="modal">
                        <p class="font-weight-bold text-center mt-1"><?= $Seat[$i]['nim'] ?></p>
                    <?php } ?>
                </li>
        <?php }
        } ?>
    </div>
</div>