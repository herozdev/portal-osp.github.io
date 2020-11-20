<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="row">
		<div class="col-lg">
			<?php if (validation_errors()): ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>
				</div>
			<?php endif; ?>
			<?= $this->session->flashdata('message'); ?>
			<a href="#" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Sub Menu</a>
			<table class="table align-items-center table-flush table-sm"  id="tableSubMenu">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Sub Menu</th>
						<th scope="col">Menu</th>
						<th scope="col">URL</th>
						<th scope="col">Icon</th>
						<th scope="col">Active</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 0 ?>
					<?php foreach ($submenu as $sm) : ?>
						<tr>
							<td><?= ++$no; ?></td>
							<td><?= $sm['title']; ?></td>
							<td><?= $sm['menu']; ?></td>
							<td><?= $sm['url']; ?></td>
							<td><?= $sm['icon']; ?></td>
							<td><?= $sm['is_active']; ?></td>
							<td>
								<a href="<?= base_url('menu/edit_sub_form/' . $sm['id']); ?>" class="badge badge-success">Edit</a>
								<a href="" onclick="confirm_modal('<?= site_url('menu/deleteSub/' . $sm['id']); ?>')" data-toggle="modal" data-target="#deleteSubMenu" class="badge badge-danger">Delete</a>
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
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newMenuModalLabel">Add New Sub Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('menu/submenu'); ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" name="id" value="<?= uniqid(); ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="title" name="title" placeholder="Sub Menu Title">
					</div>
					<div class="form-group">
						<select name="menu_id" class="form-control" id="menu_id">
							<option value="">-SELECT-</option>
							<?php foreach ($menu as $m): ?>
								<option value="<?= $m['id'] ?>"><?= $m['menu']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="url" id="url" placeholder="Submenu URL">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="icon" id="icon" placeholder="Submenu Icon">
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="is_active" id="is_active" value="1" checked>
							<label class="form-check-label" for="is_active">
								Activate
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="is_active" id="is_active" value="0">
							<label class="form-check-label" for="is_active">
								Deactivate
							</label>
						</div>
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
<div class="modal fade" id="deleteSubMenu" tabindex="-1" role="dialog" aria-labelledby="deleteSubMenuLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteSubMenuLabel">Delete this menu?</h5>
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
		jQuery('#deleteSubMenu').modal('show', {
			backdrop: 'static',
			keyboard: false
		});
		jQuery("#deleteSubMenu .grt").text(title);
		document.getElementById('delete_link').setAttribute("href", delete_url);
		document.getElementById('delete_link').focus();
	}
</script>
