<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">
      <?= $this->session->flashdata('message'); ?>
      <table class="table align-items-center table-flush" id="tableUser">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">First name</th>
            <th scope="col">Last name</th>
            <th scope="col">Role</th>
            <th scope="col">Is active?</th>
            <th scope="col">Date Created</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0 ?>
          <?php foreach ($users as $usr) : ?>
            <tr>
              <td><?= ++$no; ?></td>
              <td><?= $usr['email']; ?></td>
              <td><?= $usr['firstname']; ?></td>
              <td><?= $usr['lastname']; ?></td>
              <td><?= $usr['role']; ?></td>
              <td><?= $usr['is_active']; ?></td>
              <td><?= date('d F Y', $usr['date_created']); ?></td>
              <td>
                <a href="<?= base_url('admin/edit_user/' . $usr['id']); ?>" class="badge badge-success">Edit</a>
                <a href="" onclick="confirm_modal('<?= site_url('admin/delete/' . $usr['id']); ?>')" data-toggle="modal" data-target="#deleteMenu" class="badge badge-danger">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteMenu" tabindex="-1" role="dialog" aria-labelledby="deleteMenuLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteMenuLabel">Delete this menu?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>After this, data can't be restored!</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="delete_cancel_link">Close</button>
        <a href="" id="delete_link" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function confirm_modal(delete_url, title) {
    jQuery('#deleteMenu').modal('show', {
      backdrop: 'static',
      keyboard: false
    });
    jQuery("#deleteMenu .grt").text(title);
    document.getElementById('delete_link').setAttribute("href", delete_url);
    document.getElementById('delete_link').focus();
  }
</script>
