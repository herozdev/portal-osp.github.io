<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-8">

      <?= form_open_multipart('user/edit_profile'); ?>

      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="email" id="email" value="<?= $user['email']; ?>" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="firstname" id="firstname" value="<?= $user['firstname']; ?>">
          <?= form_error('firstname', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
      <div class="form-group row">
        <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="lastname" id="lastname" value="<?= $user['lastname']; ?>">
          <?= form_error('lastname', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-2">Picture</div>
        <div class="col-sm-10">
          <div class="row">
            <div class="col-sm-3">
              <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
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
          <button type="submit" class="btn btn-primary">Update Data</button>
          <button type="reset" class="btb btn-primary">Reset Data</button>
        </div>
      </div>

      <?= form_close(); ?>

    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->