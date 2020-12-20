    <!-- Begin Page Content -->
    <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-4 text-gray-800"><?= $header ?></h1>

       <?= $this->session->flashdata('message') ?>

       <div class="row">
          <div class="col mt-1">
             <div class="form-group">
                <select class="form-control" name="kelas" id="kelas">
                   <option id="pilih-kelas"> --- kelas ---</option>
                   <?php foreach ($kelas as $k) : ?>
                      <option value=<?= $k['id_perkuliahan'] ?>><?= $k['nama_matkul'] ?> kelas <?= $k['index_kelas'] ?></option>
                   <?php endforeach; ?>
                </select>
             </div>
          </div>
       </div>

       <div class="row">
          <div class="col-md-6">
             <div class="card shadow mb-4">
                <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">Nilai Laporan</h6>
                </div>
                <div class="card-body" id="tampung-laporan">
                   <table class="table table-hover">
                      <thead>
                         <th>no</th>
                         <th>List Laporan</th>
                         <th>Nilai</th>
                      </thead>
                      <tbody>
                         <td>-</td>
                         <td>-</td>
                         <td>-</td>
                      </tbody>
                   </table>
                </div>
             </div>
          </div>
          <div class="col-md-6">
             <div class="card shadow mb-4">
                <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">Nilai Tugas</h6>
                </div>
                <div class="card-body">
                   <table class="table table-hover" id="tampung-tugas">
                      <thead>
                         <th>no</th>
                         <th>List Tugas</th>
                         <th>Jenis Tugas</th>
                         <th>Nilai</>
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
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- modalDowndload-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" id="modal-download">
          </div>
       </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
       $(document.body).on('change', '#kelas', function() {
          var kelas = $(this).val();
          $.ajax({
                url: '<?= base_url('./user/nilaiLaporan') ?>',
                type: 'GET',
                dataType: 'html',
                data: {
                   kelas: kelas
                },
             })
             .done(function(data) {
                $('#tampung-laporan').html(data);
             });
       });

       $(document.body).on('change', '#kelas', function() {
          var kelas = $(this).val();
          $.ajax({
                url: '<?= base_url('./user/nilaiTugas') ?>',
                type: 'GET',
                dataType: 'html',
                data: {
                   kelas: kelas
                },
             })
             .done(function(data) {
                $('#tampung-tugas').html(data);
                console.log(data);
             });
       });

       $(document).on('click', '#kelas', function() {
        $('#pilih-kelas').remove();
      });
    </script>