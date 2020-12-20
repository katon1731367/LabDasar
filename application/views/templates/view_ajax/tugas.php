<table class="table table-hover" id="tampung-tugas">
   <thead>
      <th>no</th>
      <th>List Tugas</th>
      <th>Jenis Tugas</th>
      <th>Nilai</>
   </thead>
   <tbody>
   <?php foreach ($tugas as $i => $t) : ?>
         <tbody>
            <td><?= ++$i ?></td>
            <td><?= $t['nama_file'] ?></td>
            <td><?=$t['jenis_tugas'] . ' ' .$t['urutan'] ?></td>
            <td><?= $t['nilai'] ?></td>
         </tbody>
      <?php endforeach; ?>
   </tbody>
</table>
</div>