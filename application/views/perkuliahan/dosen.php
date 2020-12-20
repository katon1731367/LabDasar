    <!-- Begin Page Content -->
    <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-4 text-gray-800"><?= $header ?></h1>

       <div class="card">
          <div class="card-body">
          <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>

         <?= $this->session->flashdata('message') ?>

         <!-- Button trigger modal -->
         <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newDosenModal">Add New Dosen</a>

         <table class="table table-hover">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">ID Dosen</th>
                  <th scope="col">Nama Dosen</th>
                  <th scope="col">Email</th>
                  <th scope="col">No Handphone</th>
                  <th scope="col">Action</th>
               </tr>
            </thead>
            <tbody>

               <?php $i = 1 ?>
               <?php foreach ($dosen as $d) : ?>
                  <tr>
                     <th scope="row"><?= $i ?></th>
                     <td><?= $d['id_dosen'] ?></td>
                     <td><?= $d['nama_dosen'] ?></td>
                     <td><?= $d['email'] ?></td>
                     <td><?= $d['no_hp'] ?></td>
                     <td>
                        <a href="<?= base_url(); ?>perkuliahan/EditDosen/<?= $d['id_dosen'] ?>" class="badge badge-success">edit</a>
                        <a href="<?= base_url(); ?>perkuliahan/deletedosen/<?= $d['id_dosen'] ?>" class="badge badge-danger" onclick="return confirm('Deleting <?= $d['nama_dosen'] ?> ?')">delete</a>
                     </td>
                  </tr>
               <?php $i++;
               endforeach; ?>
            </tbody>
         </table>
          </div>
       </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Modal New Modal-->
    <div class="modal fade" id="newDosenModal" tabindex="-1" role="dialog" aria-labelledby="newDosenModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="newDosenModalLabel">Add New Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
             </div>
             <form action="<?= base_url('Perkuliahan/dosen') ?>" method="post">
                <div class="modal-body">
                   <div class="form-group">
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="id dosen" id="id_dosen" name="id_dosen">
                   </div>
                   <div class="form-group">
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="nama dosen" id="nama_dosen" name="nama_dosen">
                   </div>
                   <div class="form-group">
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="email" id="email" name="email">
                   </div>
                   <div class="form-group">
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="No Handphone" id="no_handphone" name="no_handphone">
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