<div class="modal-header">
   <h5 class="modal-title" id="nama_modal"><?= $nama_kelas . ' ' . $index_kelas ?> </h5>
   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
   </button>
</div>
<div class="modal-body">
   <table class="table">
      <thead>
         <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col" class="text-right">Action</th>
         </tr>
      </thead>
      <tbody>
         <?php $i = 1 ?>
         <?php foreach ($materi as $m) : 
            if($id_kelas == $m['id_perkuliahan']) {?>
            <tr>
               <th scope="row"><?= $i ?></th>
               <td><?= $m['nama_materi'] ?></td>
               <td class="text-center">
                  <a href="<?= base_url() ?>user/downloadMateri?file=<?= $m['nama_materi'] ?>&kelas=<?= $m['id_perkuliahan'] ?>">Download</a>
            </tr>
         <?php $i++; };
         endforeach; ?>
      </tbody>
   </table>
</div>