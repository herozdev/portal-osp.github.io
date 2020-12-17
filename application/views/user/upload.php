<div class="container">
  <form action="<?= base_url('user/upload_pdf') ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="files[]" multiple>
    <input type="submit" value="Upload">
  </form>
  <?php
  /*if (isset($_FILES['files'])) {
    $myFile = $_FILES['files'];
    $fileCount = count($myFile["name"]);

    for ($i = 0; $i < $fileCount; $i++) {
  ?>
      <p>File #<?= $i + 1 ?>:</p>
      <p>
        Name: <?= $myFile["name"][$i] ?><br>
        Temporary file: <?= $myFile["tmp_name"][$i] ?><br>
        Type: <?= $myFile["type"][$i] ?><br>
        Size: <?= $myFile["size"][$i] ?><br>
        Error: <?= $myFile["error"][$i] ?><br>
      </p>
  <?php
    }
  }*/
  ?>
</div>