<div class="card shadow mb-4" id="tugas">
   <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">LIST LAPORAN KE- <?= $laporan ?></h6>
   </div>
   <div class="card-body">
      <div class="table-responsive-xl">
         <table class="table table-hover" id="tugas">
            <thead>
               <tr>
                  <th class="align-middle">#</th>
                  <th class="align-middle">NIM</th>
                  <th class="align-middle">Nama Mahasiswa</th>
                  <th class="text-center">Nilai</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1 ?>
               <?php foreach ($mahasiswa as $i => $m) : ?>
                  <tr>
                     <th scope="row"><?= $i ?></th>
                     <td><?= $m['nim'] ?></td>
                     <td><?= $m['name'] ?></td>
                     <td>
                        <?php if (isset($nilai[$i]) && $nilai[$i]['nim'] == $m['nim']) { ?>
                           <input type="number" class="form-control nilai" name="nilai[]" min="1" max="100" value="<?= $nilai[$i]['nilai'] ?>">
                        <?php } else { ?>
                           <input type="number" class="form-control nilai" name="nilai[]" min="1" max="100" value="">
                        <?php } ?>
                        <input type="text" class="form-control nim" name="nim[]" value="<?= $m['nim'] ?>" hidden>
                        <input type="text" class="form-control urutan-laporan" name="laporan" value="<?= $laporan ?>" hidden>
                        <input type="text" class="form-control id-Perkuliahan" name="id-perkuliahan" value="<?= $m['id_perkuliahan'] ?>" hidden>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>


<button type="submit" class="btn btn-primary submit-laporan" style="margin: -10px auto 10px auto; width: 30rem;">Submit</button>

