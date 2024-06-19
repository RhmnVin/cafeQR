<?php
  require('view/template/header.php');
  require('view/template/navbar.php');
  require('view/template/sidebar.php');
  require('vendor/autoload.php'); 
  use chillerlan\QRCode\QRCode; // panggil model dari user
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-users mr-1"></i>
                  Transaksi
              </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                </li>
              </ul>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="container mt-5" style="margin-left:10%;width:80%;background-color:white;border-radius:20px;padding:20px">
                <h3 align="center">MENU</h3>
                <hr>
                <form method="post" action="index.php?add_transaksi"  >
                <div style="height:100%;margin-bottom:100px">
                    <?php $strid="" ;foreach($data as $d){$strid.=$d['id_menu'].",";?>
                    <div class="row">
                        <div class="col-4">
                            <img src="uploads/<?=$d['gambar']?>" width="100%">
                        </div>
                        <div class="col-2 mt-3">
                            <span style="font-size:15px"><?=$d['nama_menu']?></span>
                        </div>
                        <div class="col-2 mt-3">
                            <span style="font-size:15px">Rp<?=$d['harga']?></span>
                        </div>
                        <div class="col-4 mt-3">
                            <input type="number" id="qty_<?=$d['id_menu']?>" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <?php }$strid = substr($strid, 0, -1);?>
                    <h5>Grand Total : <span id="grandtotal">0</span></h5>
                    
                    <div class="form-group row" >
                        <label class="col-6 col-form-label" >Nama Pemesan</label>
                        <div class="col-6">
                            <input type="" name="nama_pemesan" class="form-control" placeholder="" required>
                            <input type="hidden" name="id_pesanan" id="id_pesanan" class="form-control" placeholder="" value="<?=$strid?>" required>
                            <input type="hidden" name="qty_pesanan" id="qty_pesanan" class="form-control" placeholder="" required>
                            <input type="hidden" name="id_meja" class="form-control" value="0" placeholder="" required>
                        </div>
                        <label class="col-6 col-form-label" >jumlah pembayaran</label>
                        <div class="col-6" style="margin-top: 10px;">
                            <input type="" name="harga" class="form-control" placeholder="" required>
                            <input type="hidden" name="id_pesanan" id="id_pesanan" class="form-control" placeholder="" value="<?=$strid?>" required>
                            <input type="hidden" name="qty_pesanan" id="qty_pesanan" class="form-control" placeholder="" required>
                            <input type="hidden" name="id_meja" class="form-control" value="0" placeholder="" required>
                        </div>
                        <label class="col-6 col-form-label" >kembalian</label>
                        <label class="col-6 col-form-label" >10.000</label>
                    </div>  
                    <input type="submit" class="form-control btn btn-info" value="Order" >
                </div>
                </form>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                <script>
                $(document).ready(function(){
                    var id=[
                        
                    <?php foreach($data as $d){?>
                        <?= $d['id_menu']?>,
                    <?php }?>
                    ];
                    var qty=[
                        
                    <?php foreach($data as $d){?>
                        0,
                    <?php }?>
                    ];
                    var harga=[
                        
                    <?php foreach($data as $d){?>
                        <?= $d['harga']?>,
                    <?php }?>
                    ];
                    $("#id_pesanan").val(id.join(","));
                    $("#qty_pesanan").val(qty.join(","));
                
                    <?php $i=0; foreach($data as $d){?>
                        $("#qty_<?=$d['id_menu']?>").change(function(){
                            qty[<?=$i?>] = $(this).val();
                            $("#id_pesanan").val(id.join(","));
                            $("#qty_pesanan").val(qty.join(","));
                            var jumlah =0;
                            for(var i=0;i<harga.length;i++){
                                jumlah+=(harga[i]*qty[i]);
                            }
                            $("#grandtotal").html(jumlah);
                        });
                    <?php $i++;}?>
                });
                </script>
          </div>
              <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
  require('view/template/footer.php');