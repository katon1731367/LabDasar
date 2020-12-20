<div class="card-body">
   <table class="table table-hover">
      <thead>
         <th>no</th>
         <th>List Laporan</th>
         <th>Nilai</th>
      </thead>
      <?php foreach ($laporan as $i => $l) : ?>
         <tbody>
            <td><?= ++$i ?></td>
            <td>Laporan <?= $l['urutan_laporan'] ?></td>
            <td><?= $l['nilai'] ?></td>
         </tbody>
      <?php endforeach; ?>
   </table>
</div>