    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

        <div class="row">
            <div class="col-lg-8">
            
            <?php if(validation_errors()) :?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php endif?>
                
            <?= $this->session->flashdata('message')?>

            <!-- Button trigger modal -->
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Sub-Menu</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Menu</th>
                            <th scope="col">URL</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Active</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1?>
                        <?php foreach($subMenu as $sm):?>
                            <tr>
                                <th scope="row"><?=$i?></th>
                                <td><?=$sm['title']?></td>
                                <td><?=$sm['menu']?></td>
                                <td><?=$sm['url']?></td>
                                <td><?=$sm['icon']?></td>
                                <td><?=$sm['is_active']?></td>
                                <td>
                                <a href="<?= $_GET['page']="edit";?>" class='badge badge-success ml-1' data-toggle="modal" data-target="#newSubMenuModal">Edit</a>
                                <a href="<?= base_url(); ?>menu/deleteSubMenu/<?= $sm['id'] ?>" class="badge badge-danger" onclick="return confirm('Deleting <?= $sm['title'] ?> ?')">Delete</a>
                                </td>
                            </tr>
                        <?php $i++; endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

 <!-- Modal Add Sub Menu -->
 <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="newSubMenuModalLabel">Add Sub-Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url('menu/submenu') ?>" method="post">
            <div class="modal-body">
            <div class="form-group">
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Title" id="title" name="title">
            </div>
            <div class="form-group">
                <select name="menu_id" id="menu_id" class="form-control">
                    <option value="">Select Menu</option>
                    <?php $i = 1?>
                    <?php foreach($menu as $m):?>
                        <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                        <?php $i++; endforeach;?>
                    </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="URL" id="url" name="url">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Icon" id="icon" name="icon">
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                    <label for="form-check-label" for="is_active">Is Active ?</label>
                </div>
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

    