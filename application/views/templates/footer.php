<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Portal OSP - PT Bank Rakyat Indonesia <?= date('Y'); ?></span>
      <br>
      <small style="font-weight: bold;">Develop by <a href="#"><i>Herozdev</i></a></small>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/jszip/dist/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/pdfmake/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/pdfmake/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/vendor/jquery-easing/jquery-easing.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>

<script src="<?= base_url(); ?>assets/vendor/popper/popper.min.js"></script>

<script type="text/javascript" src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript" src="<?= base_url(); ?>assets/vendor/bootstrap/js/alert.js"></script>

<script src="<?= base_url(); ?>assets/vendor/jquery-ui/jquery-ui-1.12.1/jquery-ui.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Chart -->
<script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url(); ?>assets/js/demo/chart-area-demo.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>assets/js/custom.js"></script>
<script src="<?= base_url(); ?>assets/js/rupiah.js"></script>
<script src="<?= base_url(); ?>assets/js/tanggal.js"></script>

<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }
</script>

<script>
  $(document).ready(function() {
    $("#tableSearch").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>

<script type="text/javascript">
  function addRincian(sl_coa) {
    var idf = document.getElementById("idf").value;
    stre = "<div class='form-group'  id='srow" + idf + "'><div class='controls'>";
    //stre=stre+"<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
    //stre=stre+" <div class='col-md-6 col-sm-6 col-xs-12'>";
    //stre=stre+sl_coa;
    //stre=stre+"</div>";
    stre = stre + " <div class='col-xs-4'>";
    stre = stre + "<input placeholder='Tahun' type='text' class='form-control' name='tahun[]'/>";
    stre = stre + "</div>";
    stre = stre + " <div class='col-xs-4'>";
    stre = stre + "<input placeholder='Anggaran' type='text' id='idf' class='form-control' name='anggaran[]'/>";
    stre = stre + "</div>";

    stre = stre + "<div class='col-xs-1'> <button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField(\"#srow" + idf + "\"); return false;'><i class='glyphicon glyphicon-remove'></i>X</button></div> </div>";
    $("#divAkun").append(stre);
    idf = (idf - 1) + 2;
    document.getElementById("idf").value = idf;
  }

  function addNew(sl_coa) {
    var ids = document.getElementById("ids").value;
    stre = "<div class='form-group' id='srow" + ids + "'><div class='controls'>";
    stre = stre + "<div class='col-xs-4'>";
    stre = stre + "<input placeholder='Kegiatan Baru' type='text' class='form-control' name='user_type' />";
    stre = stre + "</div>";

    stre = stre + "<div class='col-xs-1'> <button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField(\"#srow" + ids + "\"); return false;'><i class='glyphicon glyphicon-remove'></i>X</button></div> </div>";

    $("#divKeg").append(stre);
    ids = (ids - 1) + 2;
    document.getElementById("ids").value = ids;
  }

  function addFiat(sl_coa) {
    var idf3 = document.getElementById("idf3").value;
    stre = "<div class='form-group' id='srow" + idf3 + "'><div class='controls'>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>No. Fiat</label>";
    stre = stre + "<input type='text' class='form-control' name='no_fiat[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Tanggal Fiat</label>";
    stre = stre + "<input type='date' class='form-control' name='tgl_fiat[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Jumlah Fiat Bayar</label>";
    stre = stre + "<input type='text' class='form-control' name='total[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Status Cash Out</label>";
    stre = stre + "<input type='text' class='form-control' name='status_rc[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Tanggal Cash Out</label>";
    stre = stre + "<input type='date' class='form-control' name='tgl_rc[]' />";
    stre = stre + "</div>";

    stre = stre + "<div class='col-xs-1'> <button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField(\"#srow" + idf3 + "\"); return false;'><i class='glyphicon glyphicon-remove'></i>X</button></div> </div>";
    $("#divFiat").append(stre);
    idf3 = (idf3 - 1) + 2;
    document.getElementById("idf3").value = idf3;
  }

  function addFiatnonIT(sl_cow) {
    var idf5 = document.getElementById("idf5").value;
    stre = "<div class='form-group' id='srow" + idf5 + "'><div class='controls'>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>No. Fiat</label>";
    stre = stre + "<input type='text' class='form-control' name='no_fiat[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Tanggal Fiat</label>";
    stre = stre + "<input type='date' class='form-control' name='tgl_fiat[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Jumlah Fiat Bayar</label>";
    stre = stre + "<input type='text' class='form-control' name='total[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Nilai Tabanan</label>";
    stre = stre + "<input type='text' class='form-control' name='nilai_tabanan[]'/>";
    stre = stre + "</div>"
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Status Cash Out</label>";
    stre = stre + "<input type='text' class='form-control' name='status_rc[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Tanggal Cash Out</label>";
    stre = stre + "<input type='date' class='form-control' name='tgl_rc[]' />";
    stre = stre + "</div>";

    stre = stre + "<div class='col-xs-1'> <button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField(\"#srow" + idf5 + "\"); return false;'><i class='glyphicon glyphicon-remove'></i>X</button></div> </div>";
    $("#divFiatexplnonIT").append(stre);
    idf5 = (idf5 - 1) + 2;
    document.getElementById("idf5").value = idf5;
  }

  function addFiatexpl(sl_coa) {
    var idf4 = document.getElementById("idf4").value;
    stre = "<div class='form-group' id='srow" + idf4 + "'><div class='controls'>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>No. Fiat</label>";
    stre = stre + "<input type='text' class='form-control' name='no_fiat[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Tanggal Fiat</label>";
    stre = stre + "<input type='date' class='form-control' name='tgl_fiat[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Jumlah Fiat Bayar</label>";
    stre = stre + "<input type='text' class='form-control' name='total[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Status Cash Out</label>";
    stre = stre + "<input type='text' class='form-control' name='status_rc[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Tanggal Cash Out</label>";
    stre = stre + "<input type='date' class='form-control' name='tgl_rc[]' />";
    stre = stre + "</div>";

    stre = stre + "<div class='col-xs-1'> <button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField(\"#srow" + idf4 + "\"); return false;'><i class='glyphicon glyphicon-remove'></i>X</button></div> </div>";
    $("#divFiatexpl").append(stre);
    idf4 = (idf4 - 1) + 2;
    document.getElementById("idf4").value = idf4;
  }

  function addSpk(slcoa) {
    var idf2 = document.getElementById("idf2").value;
    stre = "<div class='form-group'  id='srow2" + idf2 + "'><div class='controls'>";
    //stre=stre+"<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
    //stre=stre+" <div class='col-md-6 col-sm-6 col-xs-12'>";
    //stre=stre+sl_coa;
    //stre=stre+"</div>";
    stre = stre + " <div class='col-xs-4'>";
    stre = stre + "<input placeholder='Tahun' type='text' class='form-control' name='tahun_spk[]'   />";
    stre = stre + "</div>";
    stre = stre + " <div class='col-xs-4'>";
    stre = stre + "<input placeholder='Anggaran' type='text' class='form-control' name='anggaran_spk[]'   />";
    stre = stre + "</div>";


    stre = stre + "<div class='col-xs-1'> <button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField(\"#srow2" + idf2 + "\"); return false;'><i class='glyphicon glyphicon-remove'></i>X</button></div> </div>";
    $("#divSpk").append(stre);
    idf2 = (idf2 - 1) + 2;
    document.getElementById("idf2").value = idf2;
  }

  function addSpkExpl(slcoa) {
    var idf5 = document.getElementById("idf5").value;
    stre = "<div class='form-group'  id='srow2" + idf5 + "'><div class='controls'>";
    //stre=stre+"<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
    //stre=stre+" <div class='col-md-6 col-sm-6 col-xs-12'>";
    //stre=stre+sl_coa;
    //stre=stre+"</div>";
    stre = stre + " <div class='col-xs-4'>";
    stre = stre + "<input placeholder='Tahun' type='text' class='form-control' name='tahun_spk[]'   />";
    stre = stre + "</div>";
    stre = stre + " <div class='col-xs-4'>";
    stre = stre + "<input placeholder='Anggaran' type='text' class='form-control' name='anggaran_spk[]'   />";
    stre = stre + "</div>";

    stre = stre + "<div class='col-xs-1'> <button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField(\"#srow2" + idf5 + "\"); return false;'><i class='glyphicon glyphicon-remove'></i>X</button></div> </div>";
    $("#divSpkExpl").append(stre);
    idf5 = (idf5 - 1) + 2;
    document.getElementById("idf5").value = idf5;
  }

  function removeFormField(idf) {
    $(idf).remove();
  }
</script>

<script type="text/javascript">
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });


  $('.form-check-input').on('click', function() {
    const menuID = $(this).data('menu');
    const roleID = $(this).data('role');

    $.ajax({
      url: "<?= base_url('admin/change_access'); ?>",
      type: 'POST',
      data: {
        menuID: menuID,
        roleID: roleID,
      },
      success: function() {
        document.location.href = "<?= base_url('admin/role_access/'); ?>" + roleID;
      }
    });
  });
</script>

<script type="text/javascript">
  var tableMenu;
  var tableRole;
  $(document).ready(function() {
    tableMenu = $('#tableMenu').DataTable({
      responsive: true,
      fixedHeader: true,
      dom: 'Bfrtip',
      buttons: [{
          extend: 'copy',
          className: 'btn btn-sm btn-outline-primary'
        },
        {
          extend: 'csv',
          className: 'btn btn-sm btn-outline-secondary'
        },
        {
          extend: 'excel',
          className: 'btn btn-sm btn-outline-success'
        },
        {
          extend: 'pdf',
          className: 'btn btn-sm btn-outline-danger'
        },
        {
          extend: 'print',
          className: 'btn btn-sm btn-outline-warning'
        }
      ],

      //"processing": true,
      //"serverSide": true,
      "order": [],

      "columnDefs": [{
        "targets": [0],
        "orderable": false,
      }, ],

    });
  });

  $(document).ready(function() {
    tableRole = $('#tableRole').DataTable({

      responsive: true,
      fixedHeader: true,
      lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      dom: 'Bfrtip',
      buttons: [{
          extend: 'copy',
          className: 'btn btn-sm btn-outline-primary'
        },
        {
          extend: 'csv',
          className: 'btn btn-sm btn-outline-secondary'
        },
        {
          extend: 'excel',
          className: 'btn btn-sm btn-outline-success'
        },
        {
          extend: 'pdf',
          className: 'btn btn-sm btn-outline-danger'
        },
        {
          extend: 'print',
          className: 'btn btn-sm btn-outline-warning'
        }
      ],

      //"processing": true,
      //"serverSide": true,
      "order": [],

      /*"ajax": {
        "url": "<?php //echo site_url('pengadaan_inv/ajax_list')
                ?>",
        "type": "POST"
      },*/


      "columnDefs": [{
        "targets": [0],
        "orderable": false,
      }, ],

    });
  });
</script>

<script type="text/javascript">
  var tableSubMenu;
  $(document).ready(function() {
    tableSubMenu = $('#tableSubMenu').DataTable({

      responsive: true,
      fixedHeader: true,
      lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      dom: 'Bfrtip',
      buttons: [{
          extend: 'copy',
          className: 'btn btn-sm btn-outline-primary'
        },
        {
          extend: 'csv',
          className: 'btn btn-sm btn-outline-secondary'
        },
        {
          extend: 'excel',
          className: 'btn btn-sm btn-outline-success'
        },
        {
          extend: 'pdf',
          className: 'btn btn-sm btn-outline-danger'
        },
        {
          extend: 'print',
          className: 'btn btn-sm btn-outline-warning'
        }
      ],

      //"processing": true,
      //"serverSide": true,
      "order": [],

      /*"ajax": {
        "url": "<?php //echo site_url('pengadaan_inv/ajax_list')
                ?>",
        "type": "POST"
      },*/


      "columnDefs": [{
        "targets": [0],
        "orderable": false,
      }, ],

    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#sortable').sortable();


    $('#post_sort').click(function(e) {

      var data = $('#sortable').sortable('serialize');
      $.ajax({
        data: data,
        type: 'POST',
        url: '<?php echo site_url('menu/menu_order'); ?>'
      });
      location.reload();
      //$('#hasil').text(data);

    });


  });
</script>

<script>
  $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya

    $("#kodejenisinv").change(function() { // Ketika user mengganti atau memilih data provinsi
      $("#kegiataninv").hide(); // Sembunyikan dulu combobox kota nya

      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url('user/list_kegiatan'); ?>", // Isi dengan url/path file php yang dituju
        data: {
          kode_jenis: $("#kodejenisinv").val()
        }, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response) { // Ketika proses pengiriman berhasil

          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#kegiataninv").html(response.list_kegiatan).show();
        },
        error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
    $("#kodejenisexpl").change(function() {
      $("#kategoriexpl").hide();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url('user/list_kategori_expl'); ?>",
        data: {
          kode_jenis: $("#kodejenisexpl").val()
        },
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset-UTF-8");
          }
        },
        success: function(response) {
          $("#kategoriexpl").html(response.list_kategori).show();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    });
    $("#kategoriexpl").change(function() {
      $("#kegiatanexpl").hide();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url('user/list_kegiatan_expl'); ?>",
        data: {
          kode_kategori: $("#kategoriexpl").val()
        },
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset-UTF-8");
          }
        },
        success: function(response) {
          $("#kegiatanexpl").html(response.list_kegiatan).show();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    });
  });
</script>

</body>

</html>