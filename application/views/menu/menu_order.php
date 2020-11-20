<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg">
      <?= $this->session->flashdata('message'); ?>

      <ul id="sortable" style="list-style: none;">
        <?php
        $start = 1;
        foreach ($menu as $menu) {

          ?>
          <li id="order-<?php echo $menu['id'];?>" ><p class="btn btn-lg btn-default flat"><?php echo strtoupper($menu['menu']) ?></br></p>

          </li>
        <?php } ?>
      </br>



    </ul>
    <a class="btn btn-sm btn-primary" onclick="history.go(-1);" ><i class="fas fa-fw fa-arrow-left"></i> Kembali</a>
    <a  id="post_sort" class="btn btn-success btn-sm" >
      <i class="fas fa-fw fa-folder"></i> Save Order
    </a>

  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


