      <div class="card shadow mb-4" id="tugas">
         <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">LIST TUGAS PRAKTIKAN</h6>
         </div>
         <div class="card-body">
            <div class="table-responsive-xl">
               <table class="table table-hover" id="tugas">
                  <thead>
                     <tr>
                        <th class="align-middle">#</th>
                        <th class="align-middle">NIM</th>
                        <th class="align-middle">Nama Mahasiswa</th>
                        <th class="align-middle">File</th>
                        <th class="align-middle">Jenis</th>
                        <th class="text-center">Nilai</th>
                        <th class="text-center">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1 ?>
                     <?php foreach ($tugas as $t) : ?>
                        <tr>
                           <th scope="row"><?= $i ?></th>
                           <td><?= $t['nim'] ?></td>
                           <td><?= $t['name'] ?></td>
                           <td><?= $t['nama_file'] ?></td>
                           <td><?= $t['jenis_tugas'] ?></td>
                           <td>
                              <input type="number" class="form-control nilai" name="nilai[]" min="1" max="100" value=<?= $t['nilai'] ?>>
                              <input type="text" class="form-control id" name="id-tugas[]" value="<?= $t['id_file_tugas'] ?>" hidden>
                              <input type="text" class="form-control id" name="nama[]" value="<?= $t['name'] ?>" hidden>
                              <input type="text" class="form-control id" name="jenis[]" value="<?= $t['jenis_tugas'] ?>" hidden>
                           </td>
                           <td class="text-center">
                              <a href="<?= base_url(); ?>perkuliahan/hapustugas/<?= $t['id_file_tugas'] ?>" class="badge badge-danger" onclick="return confirm('Deleting <?= $t['nama_file'] ?> ?')">delete</a>
                           </td>
                        </tr>
                     <?php $i++;
                     endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <button type="submit" class="btn btn-primary submit-tugas" style="margin: -10px auto 10px auto; width: 30rem;">Submit</button>
