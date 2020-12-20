    <!-- Begin Page Content -->
    <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-4 text-gray-800"><?= $header ?></h1>

       <div id='tugas_berhasil'></div>
       <?= $this->session->flashdata('message') ?>
       <form action="<?= base_url('perkuliahan/exportTugasExcel') ?>" method="get">
          <div class="form-group row">
             <label for="namex" class="col-sm-2 col-form-label mr-1">Kelas</label>
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
             <label for="namex" class="col-sm-2 col-form-label mr-1">Jenis</label>
             <div class="col-sm-7">
                <select class="form-control" name="jenis" id="jenis">
                   <option id="pilih-jenis">--pilih jenis--</option>
                   <?php foreach ($jenis as $j) { ?>
                      <option value="<?= $j ?>"><?= $j ?></option>
                   <?php } ?>
                </select>
                <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>') ?>
             </div>
             <div class="col-1">
                <label for="jenis-ke"> Urutan ke</label>
             </div>
             <div class="col-sm-1">
                <input type="number" id="jenis-ke" name="urutan" min="1" max="14" class="form-control" value="1">
             </div>
          </div>
          <div class="form-group row justify-content-end">
             <div class="col-sm-10">
                <button class="btn btn-primary submit">submit</button>
                <button type="submit" class="btn btn-success" id="btn-export-excel" hidden>export excel</button>
             </div>
          </div>
       </form>


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
                      <td>-</td>
                      <td>-</td>
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
       $(document).on('click', '.submit', function() {
          event.preventDefault();
          var idPerkuliahan = $('select[name=kelas] option').filter(':selected').val();
          var jenis = $('select[name=jenis] option').filter(':selected').val();
          var urutan = $('#jenis-ke').val();
          $.ajax({
                url: '<?= base_url('./perkuliahan/lihatTugas') ?>',
                type: 'GET',
                dataType: 'html',
                data: {
                   idPerkuliahan: idPerkuliahan,
                   jenis: jenis,
                   urutan: urutan
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

       $(document).on('click', '#jenis', function() {
          $('#pilih-jenis').remove();
       });

       $(document).on('click', '#jenis', function() {
          $('#pilih-jenis').remove();
       });

       $(document).on('click', '#status', function() {
          $('#pilih-status').remove();
       });

       $(document).on('click', '.submit-tugas', function() {
          event.preventDefault();
          var nilai = $('input[name^=nilai]').map(function(idx, nilai) {
             return $(nilai).val();
          }).get();
          var id = $('input[name^=id-tugas]').map(function(idx, id) {
             return $(id).val();
          }).get();
          var nama = $('input[name^=nama]').map(function(idx, nama) {
             return $(nama).val();
          }).get();
          var jenis = $('select[name=jenis] option').filter(':selected').val();
          var urutan = $('#jenis-ke').val();
          var nilaiTugas = id.map((e, i) => [id[i], nilai[i], nama[i], jenis, urutan ]);
          $.ajax({
                url: '<?= base_url('./perkuliahan/inputNilaiTugas') ?>',
                type: 'POST',
                dataType: 'html',
                data: {
                   nilaiTugas: nilaiTugas
                },
             })
             .done(function(data) {
               $('#tugas_berhasil').html(data);
             });
       });
    </script>