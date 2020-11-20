<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">
      <?= $this->session->flashdata('message'); ?>
      <a href="#" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#newSub"><i class="fas fa-fw fa-plus"></i>Add</a>
      <table class="table align-items-center table-flush" id="tableMenu">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th>Kode</th>
            <th scope="col">Jenis Eksploitasi</th>
            <th scope="col">Kategori</th>
            <th scope="col">Menu</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0 ?>
          <?php foreach ($kat_expl as $sub) : ?>
            <tr>
              <td><?= ++$no; ?></td>
              <td><?= $sub['kode_kategori'] ?></td>
              <td><?php echo $sub['jenis_eksploitasi']; ?></>
              <td><?= $sub['kategori'] ?></td>
              <td>
                <a href="<?= base_url('menu/edit_sub_expl_kategori/' . $sub['id']); ?>" class="badge badge-success">Edit</a>
                <a href="" onclick="confirm_modal('<?= site_url('menu/delete_sub_expl_kategori/' . $sub['id']); ?>')" data-toggle="modal" data-target="#deleteMenu" class="badge badge-danger">Delete</a>
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
<div class="modal fade" id="newSub" tabindex="-1" role="dialog" aria-labelledby="newSubLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubLabel">Add New Sub Expl Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/sub_expl_kat'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="id" value="<?= uniqid(); ?>">
            <select name="kode_jenis" class="form-control" id="kode_jenis">
              <option value="">-PILIH-</option>
              <?php foreach ($jenis as $jns) : ?>
                <option value="<?= $jns['kode_jenis']; ?>"><?= $jns['jenis_eksploitasi']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="hidden" name="kode_kategori" value="<?= $kode; ?>">
            <input type="text" name="kategori" id="kategori" class="form-control" placeholder="Kategori">
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