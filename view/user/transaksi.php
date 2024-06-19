<?php
// Include header, navbar, sidebar, etc.
require('view/template/header.php');
require('view/template/navbar.php');
require('view/template/sidebar.php');

// Initialize variables
$total = 100000; // Contoh total, ini biasanya berasal dari perhitungan transaksi sebelumnya
$jumlah_bayar = 0;
$kembalian = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jumlah_bayar = floatval($_POST['jumlah_bayar']);
    $grand_total = floatval($_POST['grand_total']);
    $kembalian = $jumlah_bayar - $grand_total;
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <?php if(isset($_SESSION['message'])){if($_SESSION['message']!=''){echo $_SESSION['message'];$_SESSION['message']='';}}?>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama Pemesan</th>
                                <th>QTY</th>
                                <th>Waktu</th>
                                <th>Detail</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                            foreach($data2 as $d){?>
                                <tr>
                                    <td><?= $d['nama_pemesan']?></td>
                                    <td><?= $d['qty_total']?></td>
                                    <td><?= $d['waktu']?></td>
                                    <td align="center"><button type="button" class="btn btn-sm bg-info" data-toggle="modal" data-target="#exampleModalss<?=$i;?>"><i class="fas fa-eye"></i></button></td>
                                    <td align="center"><button type="button" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#exampleModals<?=$i;?>"><i class="fas fa-trash"></i></button></td>
                                </tr>
                                <div class="modal fade" id="exampleModals<?=$i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="post" action="index.php?delete_transaksi">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus data ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="text" value="<?= $d['id_transaksi']; ?>" name="del"style="display:none">
                                                    <input  type="submit" class="btn btn-sm bg-danger" value="DELETE">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModalss<?=$i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Pemesanan </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-1"><b>No</b></div>
                                                    <div class="col-3"><b>Menu</b></div>
                                                    <div class="col-3"><b>Harga</b></div>
                                                    <div class="col-2"><b>QTY</b></div>
                                                    <div class="col-3"><b>Subtotal</b></div>
                                                </div>
                                                <hr>
                                                <?php 
                                                $total=0;
                                                $no = 1;
                                                $p=0;
                                                foreach($d['data'] as $dd){?>
                                                    <div class="row">
                                                        <div class="col-1"><?=$no++?></div>
                                                        <div class="col-3"><?=$dd['nama_menu']?></div>
                                                        <div class="col-3"><?=$dd['harga']?></div>
                                                        <div class="col-2"><?=$dd['qty']?></div>
                                                        <div class="col-3"><?=($dd['harga']*$dd['qty'])?></div>
                                                    </div>
                                                    <hr>
                                                <?php 
                                                $total+=($dd['harga']*$dd['qty']);
                                                } ?>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h5>Grand Total: <?=$total?></h5>
                                                        <form method="post" action="" style="display: flex; gap: 10px; width: 150%;flex-direction: row;background-color: red;">
                                                            <label for="jmlbayar" style="font-size: 18px; font-weight: 600;">Jumlah Bayar</label>
                                                            <input type="text" name="jumlah_bayar" id="jmlbayar" oninput="calculateChange(<?=$total?>)" style="">
                                                            <input type="hidden" name="grand_total" value="<?=$total?>">
                                                            <button type="submit">Submit</button>
                                                        </form>
                                                        <h5>Kembalian: <span id="kembalianDisplay"><?= isset($kembalian) ? $kembalian : '' ?></span></h5>
                                                    </div>
                                                    <div class="col-4">
                                                        <h5><?=$total?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="content<?=$p?>" >
                                                <div class="container" style="border-bottom:2px solid gold">
                                                    <div class="row" style="padding-left:10%;width:80%">
                                                        <div class="col-12" align="center">
                                                            <h3>KASIRKU</h3>
                                                            <h4>Kp Lukun Rt.02/01 Ds. Cisoka Kec. Cisoka Kab. Tangerang</h4>
                                                            <h4>Telp. 089635808393</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container mt-5">
                                                    <div class="row" style="padding-left:5%;width:90%">
                                                        <div class="col-8" align="">
                                                            <p>NOTA:  </p>
                                                            <p>Kasir: <?=$_SESSION['username']?> </p>
                                                        </div>
                                                        <div class="col-4" align="">
                                                            <p>TGL: <?=explode(" ",$d['waktu'])[0]?> </p>
                                                            <p>JAM: <?=explode(" ",$d['waktu'])[1]?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container mt-5">
                                                    <div class="row" style="padding-left:5%;width:90%">
                                                        <div class="col-1" align="center">No</div>
                                                        <div class="col-4" align="center">Menu</div>
                                                        <div class="col-2" align="center">Harga</div>
                                                        <div class="col-2" align="center">Qty</div>
                                                        <div class="col-2" align="center">Subtotal</div>
                                                    </div>
                                                    <hr>
                                                    <?php 
                                                    $no = 1;
                                                    foreach($d['data'] as $dd){?>
                                                        <div class="row" style="padding-left:5%;width:90%">
                                                            <div class="col-1" align="center"><?=$no++?></div>
                                                            <div class="col-4" align="center"><?=$dd['nama_menu']?></div>
                                                            <div class="col-2" align="center"><?=$dd['harga']?></div>
                                                            <div class="col-2" align="center"><?=$dd['qty']?></div>
                                                            <div class="col-2" align="center"><?=($dd['harga']*$dd['qty'])?></div>
                                                        </div>
                                                        <hr>
                                                    <?php 
                                                    $total+=($dd['harga']*$dd['qty']);
                                                    } ?>
                                                    <hr>
                                                    <div class="row" style="padding-left:5%;width:90%">
                                                        <div class="col-2"></div>
                                                        <div class="col-4" align="center">Total</div>
                                                        <div class="col-4" align="center"><?=$total?></div>
                                                    </div>
                                                    <hr>
                                                    <div class="row" style="padding-left:5%;width:90%">
                                                        <div class="col-2"></div>
                                                        <div class="col-4" align="center">Tunai</div>
                                                        <div class="col-4" align="center"><?=$jumlah_bayar?></div>
                                                    </div>
                                                    <div class="row" style="padding-left:5%;width:90%">
                                                        <div class="col-2"></div>
                                                        <div class="col-4" align="center">Kembali</div>
                                                        <div class="col-4" align="center"><?=$kembalian?></div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="printBtn<?=$p?>" onclick="printContent(<?=$p?>)">Print</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                $i++;
                                $p++;
                                } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
function calculateChange(grandTotal) {
    var jmlbayar = parseFloat(document.getElementById('jmlbayar').value) || 0;
    var kembalian = jmlbayar - grandTotal;
    document.getElementById('kembalianDisplay').innerText = kembalian.toFixed(2); // Menampilkan kembalian dengan 2 angka di belakang koma
}
function printContent(index) {
  var content = document.getElementById('content' + index).innerHTML;
  var originalContent = document.body.innerHTML;
  document.body.innerHTML = content;
  window.print();
  document.body.innerHTML = originalContent;
}
</script>


<?php
// Include footer
require('view/template/footer.php');
?>
