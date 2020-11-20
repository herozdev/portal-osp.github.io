<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-6">
      <?= form_open('admin/update'); ?>
      <input type="hidden" name="id" value="<?= $users['id']; ?>">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $users['email']; ?>">
        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" class="form-control" id="firstname" value="<?= $users['firstname']; ?>">
        <?= form_error('firstname', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" class="form-control" id="lastname" value="<?= $users['lastname']; ?>">
        <?= form_error('firstname', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="is_active">Access</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="role_id" id="role_id" value="1" <?= $users['role_id'] == 1 ? "checked" : null ?>>
          <label class="form-check-label" for="role_id">
            Admin
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="role_id" id="role_id" value="2" <?= $users['role_id'] == 2 ? "checked" : null ?>>
          <label class="form-check-label" for="is_active">
            Member
          </label>
        </div>
      </div>
      <div class="form-group">
        <label for="is_active">Active?</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="is_active" id="is_active" value="1" <?= $users['is_active'] == 1 ? "checked" : null ?>>
          <label class="form-check-label" for="is_active">
            Activate
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="is_active" id="is_active" value="0" <?= $users['is_active'] == 0 ? "checked" : null ?>>
          <label class="form-check-label" for="is_active">
            Deactivate
          </label>
        </div>
      </div>
      <div class="form-group">
        <a href="<?= base_url('admin/list_user'); ?>" class="btn btn-outline-warning">Back</a>
        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
        <button type="submit" class="btn btn-outline-primary">Update</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


