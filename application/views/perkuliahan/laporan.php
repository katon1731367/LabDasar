    <!-- Begin Page Content -->
    <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-4 text-gray-800"><?= $header ?></h1>

       <div id='laporan_berhasil'></div>

       <?= $this->session->flashdata('message') ?>
       <form action="<?= base_url('perkuliahan/exportLaporanExcel') ?>" method="get">
          <div class="form-group row">
             <label for="namex" class="col-sm-2 col-form-label mr-1">Laporan</label>
             <div class="col-sm-9">
                <select class="form-control" id="kelas" name="kelas">
                   <option id="pilih-kelas">--pilih kelas--</option>
                   <?php $i = 1;
                     foreach ($kelas as $k) : ?>
                      <option value="<?= $k['id_perkuliahan'] ?>" <?= set_value('kelas') == $i ? 'selected' : null ?>><?= $k['nama_matkul'] ?> kelas <?= $k['index_kelas'] ?></option>
                   <?php endforeach; ?>
                </select>
                <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>') ?>
             </div>
          </div>

          <div class="form-group row">
             <label for="namex" class="col-sm-2 col-form-label mr-1" id="laporan">Laporan ke-</label>
             <div class="col-sm-9">
                <select class="form-control" id="laporan" name="laporan">
                   <option id="pilih-laporan">--pilih laporan--</option>
                   <?php for ($i = 1; $i <= 14; $i++) : ?>
                      <option value="<?= $i ?>"><?= $i ?></option>
                   <?php endfor; ?>
                </select>
                <?= form_error('laporan', '<small class="text-danger pl-3">', '</small>') ?>
             </div>
          </div>

          <div class="form-group row justify-content-end">
             <div class="col-sm-10">
                <button class="btn btn-primary pilih">submit</button>
                <button type="submit" class="btn btn-success" id="btn-export-excel" hidden>export
             </div>
          </div>
       </form>

       <div class="card shadow mb-4" id="tugas">
          <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">LIST MAHASISWA</h6>
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
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                   </tbody>
                </table>
             </div>
          </div>
       </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
       $(document).on('click', '.pilih', function() {
          event.preventDefault();
          var idPerkuliahan = $('select[name=kelas] option').filter(':selected').val();
          var laporan = $('select[name=laporan] option').filter(':selected').val();
          $.ajax({
                url: '<?= base_url('./perkuliahan/lihatLaporan') ?>',
                type: 'GET',
                dataType: 'html',
                data: {
                   idPerkuliahan: idPerkuliahan,
                   laporan: laporan
                },
             })
             .done(function(data) {
                $('#tugas').html(data);
                $('#btn-export-excel').removeAttr('hidden');
             });
       });

       $(document).on('click', '#kelas', function() {
          $('#pilih-kelas').remove();
       });

       $(document).on('click', '#laporan', function() {
          $('#pilih-laporan').remove();
       });

       $(document).on('click', '.submit-laporan', function() {
          var nilai = $('input[name^=nilai]').map(function(idx, nilai) {
             return $(nilai).val();
          }).get();
          var nim = $('input[name^=nim]').map(function(idx, nim) {
             return $(nim).val();
          }).get();
          var idPerkuliahan = $('select[name=kelas] option').filter(':selected').val();
          var laporan = $('select[name=laporan] option').filter(':selected').val();

          var nilaiLaporan = nim.map((e, i) => [nim[i], nilai[i]]);

          console.log(nilaiLaporan);

          $.ajax({
                url: '<?= base_url('./perkuliahan/inputNilaiLaporan') ?>',
                type: 'POST',
                dataType: 'html',
                data: {
                   nilaiLaporan: nilaiLaporan,
                   idPerkuliahan: idPerkuliahan,
                   laporan: laporan
                },
             })
             .done(function(data) {
               $('#laporan_berhasil').html(data);
             });
       });
    </script>