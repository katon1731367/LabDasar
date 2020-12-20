<img src="<?= base_url('assets/') ?>/img/wave.svg" class="wave">
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Update Matakuliah!</h1>
              </div>

              <form class="user center" method="POST" action="<?= base_url('perkuliahan/editMatkul/'.$matakuliah['id_matkul']) ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="id_matakuliah" placeholder="ID Matakuliah" name="id_matakuliah" id="id_matakuliah" value="<?= $matakuliah['id_matkul'] ?>">
                    <?= form_error('id_matakuliah','<small class="text-danger pl-3">','</small') ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama_matakuliah" placeholder="Nama Matakuliah" name="nama_matakuliah" id="nama_matakuliah" value="<?= $matakuliah['nama_matkul'] ?>">
                    <?= form_error('nama_matakuliah','<small class="text-danger pl-3">','</small') ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="sks" placeholder="SKS" name="sks" value="<?= $matakuliah['sks'] ?>">
                    <?= form_error('sks','<small class="text-danger pl-3">','</small') ?>
                </div>
                <input type="submit" class="btn btn-primary btn-user btn-block" value="Update Matakuliah">
                <a href="<?= base_url('perkuliahan/matakuliah') ?>" class="btn btn-danger btn-user btn-block"> Cancel </a>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>