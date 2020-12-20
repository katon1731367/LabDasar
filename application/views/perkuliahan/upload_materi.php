    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

      <?= $this->session->flashdata('message') ?>

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-bottom: 10px;">Tambahkan Materi</button>

      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">ID Perkuliahan</th>
            <th scope="col">Nama Kelas</th>
            <th scope="col">Nama File</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

          <?php $i = 1 ?>
          <?php foreach ($materi as $m) : ?>
            <tr>
              <th scope="row"><?= $i ?></th>
              <td><?= $m['id_perkuliahan'] ?></td>
              <td><?= $m['kelas'] ?></td>
              <td><?= $m['nama_materi'] ?></td>
              <td>
                <a href="<?= base_url(); ?>perkuliahan/deleteMateri/<?= $m['id_materi'] ?>/<?= $m['nama_materi'] ?>/<?= $m['id_perkuliahan'] ?>" class="badge badge-danger" onclick="return confirm('Deleting <?= $m['nama_materi'] ?> ?')">delete</a>
              </td>
            </tr>
          <?php $i++;
          endforeach; ?>
        </tbody>
      </table>

      <!-- Modal New Modal-->
      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="newDosenModalLabel">Upload Materi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col">
                  <?= form_open_multipart('perkuliahan/uploadmateri'); ?>
                  <div class="form-group row">
                    <label for="namafile" class="col-sm-2 col-form-label mr-1">Nama File</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control form-control-user" name="namafile" id="namafile" value="<?= set_value('text') ?>">
                      <?= form_error('namafile', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label mr-1">Kelas</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="exampleFormControlSelect1" name="kelas">
                        <option></option>
                        <?php $i = 1;
                        foreach ($kelas as $k) : ?>
                          <option value="<?= $k['nama_matkul'] ?>_<?= $k['index_kelas'] ?>|<?= $k['id_perkuliahan'] ?>" <?= set_value('kelas') == $i ? 'selected' : null ?>><?= $k['nama_matkul'] ?> kelas <?= $k['index_kelas'] ?></option>
                        <?php endforeach; ?>
                      </select>
                      <?= form_error('namafile', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2">File</div>
                    <div class="col-sm-9">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="materi">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                    </div>
                  </div>

                </div>
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

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->