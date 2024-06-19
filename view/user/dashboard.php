<?php
  require('view/template/header.php');
  require('view/template/navbar.php');
  require('view/template/sidebar.php');
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$title?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?=$title?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
		<?php if($_SESSION['role']=='admin'){?>
          <div class="row">
            <div class="col-4">
                <div class="card bg-primary" style="padding:10px;padding-left:20px">
                    <h5>Artikel</h5>
                    <h3><?=$data['artikel']?></h3>
                </div>
            </div>
            <div class="col-4">
                <div class="card bg-primary" style="padding:10px;padding-left:20px">
                    <h5>Anggota</h5>
                    <h3><?=$data['anggota']?></h3>
                </div>
            </div>
            <div class="col-4">
                <div class="card bg-primary" style="padding:10px;padding-left:20px">
                    <h5>Pengguna</h5>
                    <h3><?=$data['pengguna']?></h3>
                </div>
            </div>
          </div>
		<?php }?>
          
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php
  require('view/template/footer.php');
 