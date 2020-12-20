    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                    <?= form_open_multipart('user/edit');?>
                        <div class="form-group row">
                            <label for="nim" class="col-sm-2 col-form-label mr-1">NIM</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-user" name="nim" id="nim" value="<?= $user['nim'] ?>" readonly>
                                <?= form_error('nim','<small class="text-danger pl-3">','</small') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namex" class="col-sm-2 col-form-label mr-1">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-user" name="name" id="name" value="<?= $user['name'] ?>">
                                <?= form_error('namex','<small class="text-danger pl-3">','</small') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label mr-1">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-user" name="email" id="email" value="<?= $user['email'] ?>">
                                <?= form_error('email','<small class="text-danger pl-3">','</small') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label mr-1">Phone Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-user" name="phone" id="phone" value="<?= $user['phone_number'] ?>">
                                <?= form_error('phone','<small class="text-danger pl-3">','</small') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">Picture</div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->