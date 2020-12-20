    <!-- Begin Page Content -->
    <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-4 text-gray-800"><?= $header ?></h1>

       <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>

       <?= $this->session->flashdata('message') ?>

       <!-- Button trigger modal -->
       <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMatkulModal">Add New Dosen</a>


       <table class="table table-hover">
          <thead>
             <tr>
                <th scope="col">#</th>
                <th scope="col">ID Matakuliah</th>
                <th scope="col">Nama Matakuliah</th>
                <th scope="col">sks</th>
                <th scope="col">Action</th>
             </tr>
          </thead>
          <tbody>

             <?php $i = 1 ?>
             <?php foreach ($matakuliah as $d) : ?>
                <tr>
                   <th scope="row"><?= $i ?></th>
                   <td><?= $d['id_matkul'] ?></td>
                   <td><?= $d['nama_matkul'] ?></td>
                   <td><?= $d['sks'] ?></td>
                   <td>
                      <a href="<?= base_url(); ?>perkuliahan/EditMatkul/<?= $d['id_matkul'] ?>" class="badge badge-success">edit</a>
                      <a href="<?= base_url(); ?>perkuliahan/deleteMatkul/<?= $d['id_matkul'] ?>" class="badge badge-danger" onclick="return confirm('Deleting <?= $d['nama_matkul'] ?> ?')">delete</a>
                   </td>
                </tr>
             <?php $i++;
               endforeach; ?>
          </tbody>
       </table>


    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Modal New Modal-->
    <div class="modal fade" id="newMatkulModal" tabindex="-1" role="dialog" aria-labelledby="newMatkulModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="newMatkulModalLabel">Add New Matakuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
             </div>
             <form action="<?= base_url('Perkuliahan/matakuliah') ?>" method="post">
                <div class="modal-body">
                   <div class="form-group">
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="ID Matakuliah" id="id_matakuliah" name="id_matakuliah">
                   </div>
                   <div class="form-group">
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Matakuliah" id="nama_matakuliah" name="nama_matakuliah">
                   </div>
                   <div class="form-group">
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="SKS" id="sks" name="sks">
                   </div>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Add</button>
                </div>
          </div>
          </form>
       </div>
    </div>