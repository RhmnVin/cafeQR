<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="row" style="padding-top:10px">
      <div class="col-9"><h4 align="center" style="color:lightgrey;padding-top:5px"><?=$_SESSION['nama']?></a></h4></div>
      <div class="col-3"><div style="border-radius:5px;background-color:lightgrey;padding:3px;width:40px"> <a href="index.php?profile" ><h5 align="center" style="padding:1px"><i class="fas fa-user"></i></h5></a></div></div>
    </div>
    <div align="center">
      <a href="index3.html" class="brand-link">
        <img src="dist/img/logo.png" alt="AdminLTE Logo" class="img-circle " width="50%"style="opacity: .8">
        
      </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          



		<?php if($_SESSION['role']=='admin'){?>
          <li class="nav-item">
            <a href="index.php?jenis" class="nav-link  <?php if($title=='JENIS'){echo 'active';}?>"">
              <i class="fas fa-users"></i>
              <p>Jenis</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?menu" class="nav-link  <?php if($title=='MENU'){echo 'active';}?>"">
              <i class="fas fa-users"></i>
              <p>Menu</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?nota" class="nav-link  <?php if($title=='NOTA'){echo 'active';}?>"">
              <i class="fas fa-users"></i>
              <p>Nota</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?transaksi" class="nav-link  <?php if($title=='TRANSAKSI'){echo 'active';}?>"">
              <i class="fas fa-users"></i>
              <p>Transaksi</p>
            </a>
          </li>
         
		<?php } ?> 
        
          <li class="nav-item">
            <a href="index.php?logout" class="nav-link <?php if($title=='logout'){echo 'active';}?>">
              <i class="fas fa-copy"></i>
              <p>Logout</p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>