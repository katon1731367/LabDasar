<img src="<?= base_url('assets/') ?>/img/wave.svg" class="wave">
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Update Dosen!</h1>
              </div>
              <form class="user center" method="POST" action="<?= base_url('perkuliahan/editDosen/'.$dosen['id_dosen']) ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="id_dosen" placeholder="ID Dosen" name="id_dosen" id="id_dosen" value="<?= $dosen['id_dosen'] ?>">
                    <?= form_error('id_dosen','<small class="text-danger pl-3">','</small') ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nim" placeholder="Nama Dosen" name="nama_dosen" id="nama_dosen" value="<?= $dosen['nama_dosen'] ?>">
                    <?= form_error('nama_dosen','<small class="text-danger pl-3">','</small') ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="phone" placeholder="Phone Number" name="phone" value="<?= $dosen['no_hp'] ?>">
                    <?= form_error('phone','<small class="text-danger pl-3">','</small') ?>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" value="<?= $dosen['email'] ?>">
                  <?= form_error('email','<small class="text-danger pl-3">','</small') ?>
                </div>
                <input type="submit" class="btn btn-primary btn-user btn-block" value="Update Dosen">
                <a href="<?= base_url('perkuliahan/dosen') ?>" class="btn btn-danger btn-user btn-block"> Cancel </a>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>