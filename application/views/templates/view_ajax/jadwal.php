<thead>
   <tr>
      <th rowspan="2" class="align-middle">#</th>
      <th rowspan="2" class="align-middle">Nama Matakuliah</th>
      <th rowspan="2" class="align-middle">Sesi</th>
      <th rowspan="2" class="align-middle">Nama Dosen</th>
      <th colspan="2" class="text-center">Jam</th>
      <th rowspan="2" class="align-middle text-center">Materi</th>
   </tr>
   <tr>
      <th>Jam Mulai</th>
      <th>Jam Akhir</th>
   </tr>
</thead>
<tbody>
   <?php $i = 1 ?>
   <?php foreach ($hari as $h) : ?>
      <tr>
         <th scope="row"><?= $i ?></th>
         <td id="nama_kelas"><?= $h['nama_matkul'] ?></td>
         <td><?= $h['index_kelas'] ?></td>
         <td><?= $h['nama_dosen'] ?></td>
         <td><?= $h['jam_mulai'] ?></td>
         <td><?= $h['jam_akhir'] ?></td>
         <td class="text-center"><button class="badge badge-success modal-materi" data-toggle="modal" data-target="#modalDownload" data-kelas="<?= $h['id_perkuliahan'] ?>">Buka Materi</button></td>
      </tr>
   <?php $i++;
   endforeach; ?>
</tbody>