    <!-- Begin Page Content -->
    <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-4 text-gray-800"><?= $header ?></h1>

       <div class="row">
          <div class="col">

             <div class="card">
               <div class="card-body">
               <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>

               <?= $this->session->flashdata('message') ?>

               <!-- Button trigger modal -->
               <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahKelasModal">Tambah Kelas</a>


               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th rowspan="2" class="align-middle">#</th>
                        <th rowspan="2" class="align-middle">Id Perkuliahan</th>
                        <th rowspan="2" class="align-middle">Nama Matakuliah</th>
                        <th rowspan="2" class="align-middle">Nama Dosen</th>
                        <th rowspan="2" class="align-middle">Hari</th>
                        <th colspan="2" class="text-center">Jam</th>
                        <th rowspan="2" class="align-middle text-center">Jumlah Mahasiswa</th>
                        <th rowspan="2" class="align-middle">Action</th>
                     </tr>
                     <tr>
                        <th class="text-center">Jam Mulai</th>
                        <th class="text-center">Jam Akhir</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1 ?>
                     <?php foreach ($kelas as $k) : ?>
                        <tr>
                           <th scope="row"><?= $i ?></th>
                           <td><?= $k['id_perkuliahan'] ?></td>
                           <td><?= $k['nama_matkul'] ?></td>
                           <td><?= $k['nama_dosen'] ?></td>
                           <td><?= $k['hari'] ?></td>
                           <td class="text-center"><?= $k['jam_mulai'] ?></td>
                           <td class="text-center"><?= $k['jam_akhir'] ?></td>
                           <td class="text-center"><?= $k['jumlah_mahasiswa'] ?></td>
                           <td>
                              <a href="<?= base_url(); ?>perkuliahan/deletekelas/<?= $k['id_perkuliahan'] ?>" class="badge badge-danger" onclick="return confirm('Deleting <?= $k['id_perkuliahan'] ?> ?')">delete</a>
                              <a href="<?= base_url(); ?>perkuliahan/exportkelas/<?= $k['id_perkuliahan'] ?>" class="badge badge-success" onclick="return confirm('export <?= $k['id_perkuliahan'] ?> ?')">export</a>
                           </td>
                        </tr>
                     <?php $i++;
                     endforeach; ?>
                  </tbody>
               </table>
                </div>
             </div>
          </div>
       </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Modal tambahKelasModal -->
    <div class="modal fade" id="tambahKelasModal" tabindex="-1" role="dialog" aria-labelledby="tambahKelasModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="tambahKelasModalLabel">Tambah Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <form action="<?= base_url('Perkuliahan/kelas') ?>" method="post">
               <p class="text-justify font-weight-bold" style="margin: 8px;">Untuk menambahkan kelas, pastikan Dosen dan Matakuliah sudah tersedia!</p> <hr>
               <div class="modal-body">
                  <div class="form-group">
                     <label for="index_kelas">Index Kelas</label>
                     <input type="text" class="form-control" id="index_kelas" placeholder="cth: A" id="index_kelas" name="index_kelas">
                     <?= form_error('index_kelas','<small class="text-danger pl-3">','</small') ?>
                  </div>
                   <div class="form-group">
                      <label for="id_matkul">Matakuliah</label>
                      <select class="form-control" id="id_matkul" name="id_matkul" required>
                         <?php foreach ($matkul as $m) : ?>
                            <option value="<?= $m['id_matkul'] ?>"><?= $m['nama_matkul'] ?></option>
                         <?php endforeach; ?>
                      </select>
                   </div>
                   <div class="form-group">
                      <label for="id_dosen">Dosen</label>
                      <select class="form-control" id="id_dosen" name="id_dosen">
                         <?php foreach ($dosen as $d) : ?>
                            <option value="<?= $d['id_dosen'] ?>"><?= $d['nama_dosen'] ?></option>
                         <?php endforeach; ?>
                      </select>
                   </div>
                   <div class="form-group">
                      <label for="hari">Hari</label>
                      <select class="form-control" name="hari">
                         <?php foreach ($hari as $h) : ?>
                            <option value="<?= $h ?>"><?= $h ?></option>
                         <?php endforeach; ?>
                      </select>
                   </div>
                   <div class="form-group">
                      <label for="jam_mulai">Jam Mulai</label>
                      <input type="time" class="form-control" id="jam_mulai" placeholder="Jam Mulai" id="jam_mulai" name="jam_mulai">
                      <?= form_error('jam_mulai','<small class="text-danger pl-3">','</small') ?>
                     </div>
                     <div class="form-group">
                        <label for="jam_akhir">Jam Akhir</label>
                        <input type="time" class="form-control" id="jam_akhir" placeholder="Jam Akhir" id="jam_akhir" name="jam_akhir">
                        <?= form_error('jam_mulai','<small class="text-danger pl-3">','</small') ?>
                     </div>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" name="add" class="btn btn-primary">Add</button>
                </div>
          </div>
          </form>
       </div>
    </div>