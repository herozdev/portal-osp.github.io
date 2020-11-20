<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-6">
      <?= form_open('menu/updateSub'); ?>
      <input type="hidden" name="id" value="<?= $row['id']; ?>">
      <div class="form-group">
        <label for="title">New Sub Menu</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $row['title']; ?>">
        <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="menu_id">Access</label>
        <select name="menu_id" class="form-control" id="menu_id">
          <option value="">-PILIH-</option>
          <?php foreach ($menu as $m): ?>
            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="url">URL</label>
        <input type="text" class="form-control" name="url" id="url" value="<?= $row['url']; ?>">
        <?= form_error('url', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="icon">Icon</label>
        <input type="text" name="icon" class="form-control" id="icon" value="<?= $row['icon']; ?>">
        <?= form_error('icon', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="is_active">Active?</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="is_active" id="is_active" value="1" <?= $row['is_active'] == 1 ? "checked" : null ?>>
          <label class="form-check-label" for="is_active">
            Activate
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="is_active" id="is_active" value="0" <?= $row['is_active'] == 0 ? "checked" : null ?>>
          <label class="form-check-label" for="is_active">
            Deactivate
          </label>
        </div>
      </div>
      <div class="form-group">
        <a href="<?= base_url('menu/submenu'); ?>" class="btn btn-outline-warning">Back</a>
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


