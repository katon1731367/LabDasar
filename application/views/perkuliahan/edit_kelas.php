<img src="<?= base_url('assets/') ?>/img/wave.svg" class="wave">
<div class="container">
   <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
         <!-- Nested Row within Card Body -->
         <div class="row">
            <div class="col-lg">
               <div class="p-5">
                  <div class="text-center">
                     <h1 class="h4 text-gray-900 mb-4">Update Kelas!</h1>
                     <hr>
                     <p>Dosen : <?= $kelas['nama_dosen'] ?></p>
                     <p>Matakuliah : <?= $kelas['nama_matkul'] ?></p>
                  </div>
                  <form class="user center" method="POST" action="<?= base_url('perkuliahan/editKelas/' . $kelas['id_perkuliahan']) ?>">
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
                     </div>
                     <div class="form-group">
                        <label for="jam_Akhir">Jam Akhir</label>
                        <input type="time" class="form-control" id="jam_akhir" placeholder="Jam Akhir" id="jam_akhir" name="jam_akhir">
                     </div>
               </div>
               <input type="submit" class="btn btn-primary btn-user btn-block" value="Update Kelas" name="update">
               <a href="<?= base_url('perkuliahan/dosen') ?>" class="btn btn-danger btn-user btn-block"> Cancel </a>
               </form>
               <hr>
            </div>
         </div>
      </div>
   </div>
</div>

</div>