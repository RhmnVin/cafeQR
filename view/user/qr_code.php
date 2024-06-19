<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-image: url('bg.jpeg'); background-position: center; background-repeat: no-repeat;   background-size: cover;">



<div class="container mt-5" style="margin-left:10%;width:80%;background-color:white;border-radius:20px;padding:20px">
  <h3 align="center">MENU</h3>
  <hr>
  <form method="post" action="index.php?add_transaksisss"  >
  <div style="height:100%;margin-bottom:100px;overflow-y:scroll">
    <?php $strid="" ;foreach($data as $d){$strid.=$d['id_menu'].",";?>
    <div class="row">
        <div class="col-4">
            <img src="uploads/<?=$d['gambar']?>" width="100%">
        </div>
        <div class="col-2 mt-3">
            <span style="font-size:10px"><?=$d['nama_menu']?></span>
        </div>
        <div class="col-2 mt-3">
            <span style="font-size:10px">Rp<?=$d['harga']?></span>
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
            <input type="hidden" name="id_meja" class="form-control" value=<?=$_GET['qr_code']?> placeholder="" required>
        </div>
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
</body>
</html>
