<?php
include_once("../../config/database.php");

session_start();

if ($_SESSION['username'] == "") {
  header('location:../index.php');
}

$queryId = $_GET["id"];

if(isset($_POST['submit'])){
  $kat_name =$_POST['kategory'];

  if(empty($kat_name)){
    echo "<script> alert('Nama Kategory Tidak Boleh Kosong')</script>";
  }
  else{
    $inset = $pdo->prepare("INSERT INTO tb_category(nm_cat) value(:cat)");
    ($inset)->bindParam(':cat',$kat_name);
  

    if($insetr->execute()){
      echo "<script> alert('Data berhasil Di Tambah')";                     
    }
  }
}

include_once("../inc/header.php");

?>

<?php
include_once("../inc/admin_sidebar.php");
?>

<!-- Main content -->
<div class="content-wrapper">
    <?php
        $sql = "SELECT * FROM tb_category WHARE id='$queryId'";
        $stmt = $pdo->query($sql);
        while($rows = $stmt->fetch()){
          $data_nama = $rows["name"];
        }
        ?>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        


        <div class="col-md-6 mx-auto">
          <!-- Form Element sizes -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Kategori</h3>
            </div>
            <form method="POST" action="">
            <div class="card-body">
              <label for="katInput">Nama Kategori</label>
              <input class="form-control form-control-sm-2" type="text" name="kategory" id="katInput" nama="">
            </div>

            <div class="card-footer">
              <button type="submit" name="submit" class="btn btn-primary">Pembarui</button>
              <a href="index.php" class="btn btn-info">kembali</a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

  </section>
</div>




  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function() {
    bsCustomFileInput.init();
  });
</script>
</body>

</html>



<?php
include_once("../inc/footer.php");
?>