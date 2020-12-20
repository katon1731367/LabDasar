    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
      <?= $this->session->flashdata('message') ?>

      <div class="row">
        <div class="col-lg">
          <?= form_open_multipart('user/uploadTugas'); ?>
          <div class="form-group row">
            <label for="nim" class="col-sm-2 col-form-label mr-1">NIM</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-user" name="nim" id="nim" value="<?= $user['nim'] ?>" readonly>
              <?= form_error('nim', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="namex" class="col-sm-2 col-form-label mr-1">Kelas</label>
            <div class="col-sm-9">
              <select class="form-control" id="kelas" name="kelas">
                <option id="pilih-kelas"> --- kelas ---</option>
                <?php $i = 1;
                foreach ($kelas as $k) : ?>
                  <option value="<?= $k['nama_matkul'] ?>_<?= $k['index_kelas'] ?>|<?= $k['id_perkuliahan'] ?>" <?= set_value('kelas') == $i ? 'selected' : null ?>><?= $k['nama_matkul'] ?> kelas <?= $k['index_kelas'] ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="namex" class="col-sm-2 col-form-label mr-1">Jenis</label>
            <div class="col-sm-6">
              <select class="form-control" name="jenis" id="jenis">
                <option id="pilih-jenis"> --- jenis ---</option>
                <?php foreach ($jenis as $j) { ?>
                  <option value="<?= $j ?>"><?= $j ?></option>
                <?php } ?>
              </select>
              <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="col-1">
              <label for="jenis-ke"> Urutan ke</label>
            </div>
            <div class="col-sm-2">
              <input type="number" name="jenis-ke" id="jenis-ke" min="1" max="14" class="form-control" value="1" disabled>
              <?= form_error('jenis-ke', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-2">File</div>
            <div class="col-sm-9">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="userfile">
                <label class="custom-file-label" for="image">Choose file</label>
              </div>
            </div>
          </div>

          <div class="form-group row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Upload</button>
            </div>
          </div>
          </form>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(document).on('click', '#kelas', function() {
        $('#pilih-kelas').remove();
      });

      $(document).on('click', '#jenis', function() {
        var select = $("#jenis").val();
        $('#pilih-jenis').remove();
        if (select == 'uts' || select == 'uas') {
          $("#jenis-ke").prop("disabled", true);
          $("#jenis-ke").val('');
        } else {
          $("#jenis-ke").prop("disabled", false);
        }
      });
    </script>