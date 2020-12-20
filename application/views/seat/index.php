<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- flashdata -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

  <?php if ($this->session->flashdata('flash')) : ?>
    <div class="row mt-3">
      <div class="col mt-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Tempat Duduk <strong> Berhasil </strong> <?= $this->session->flashdata('flash'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col-sm-8 mt-1">
      <div class="form-group">
        <select class="form-control" name="kelas" id="kelas">
          <option id="pilih-kelas"> --- kelas ---</option>
          <?php foreach ($kelas as $k) : ?>
            <option value=<?= $k['id_perkuliahan'] ?>><?= $k['nama_matkul'] ?> kelas <?= $k['index_kelas'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="col-sm-4">
      <!-- Button trigger modal -->
      <button type="button" class="btn-primary btn-lg" data-toggle="modal" id="btn-kontrak" data-target="#formKontrak">
        Kontrak Tempat Duduk
      </button>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-8 mb-3" id="tampung">
      <h1 class="display-3">Silahkan Pilih Kelas</h1>
    </div>

    <div class="col-sm-3 mr-2 mt-3">
      <ul id="seatDescription" style="list-style-type:none;">
        <li><span><img src="<?= base_url() ?>assets/img/seat_available.png" height="30px"></span> Available Seat</li>
        <li><span><img src="<?= base_url() ?>assets/img/seat_booked.png" height="30px"></span> Booked Seat</li>
        <li><span><img src="<?= base_url() ?>assets/img/seat_selected.png" height="30px"></span> Your Seat</li>
      </ul>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>

</div>
<!-- End of Main Content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
  document.getElementById("btn-kontrak").disabled = true;

  $(document.body).on('change', '#kelas', function() {
    var kelas = $(this).val();
    $.ajax({
        url: '<?= base_url('./seat/ambil') ?>',
        type: 'GET',
        dataType: 'html',
        data: {
          kelas: kelas
        },
      })
      .done(function(data) {
        $('#tampung').html(data);
      });

    var myJavascriptVar = $(this).val();
    document.cookie = "myJavascriptVar = " + myJavascriptVar;

    document.getElementById('pilih-kelas').remove();
    document.getElementById("btn-kontrak").disabled = false;
  });

  $(document).on('click', '#kelas', function() {
    $('#pilih-kelas').remove();
  });
</script>