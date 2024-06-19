<?php 
    $d = $data[0];
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<div id="content" >
                                    <div class="container" style="border-bottom:2px solid gold">
                                        <div class="row" >
                                            <div class="col-12" align="center">
                                                <h3>KASIRKU</h3>
                                                <h4>Kp Lukun Rt.02/01 Ds. Cisoka Kec. Cisoka Kab. Tangerang</h4>
                                                <h4>Telp. 089635808393</h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="container mt-5">
                                        <div class="row" style="padding-left:5%;width:100%">
                                            <div class="col-10" align="">
                                                <p>NOTA:  </p>
                                                <p>Kasir: <?=$_SESSION['username']?> </p>
                                            </div>
                                            <div class="col-2" align="">
                                                <p>TGL: <?=explode(" ",$d['waktu'])[0]?> </p>
                                                <p>JAM: <?=explode(" ",$d['waktu'])[1]?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container mt-5" style="padding-left:5%;">
                                        <br><br>
                                        <div class="row mt-5" style="margin-top:100px">
                                            <div class="col-1" style="border:1px solid black" align="center">
                                                <b>No</b>
                                            </div>
                                            <div class="col-3" style="border:1px solid black" align="center">
                                                <b>Menu</b>
                                            </div>
                                            <div class="col-3" style="border:1px solid black" align="center">
                                                <b>Harga</b>
                                            </div>
                                            <div class="col-2" style="border:1px solid black" align="center">
                                                <b>QTY</b>
                                            </div>
                                            <div class="col-3" style="border:1px solid black" align="center">
                                                <b>Subtotal</b>
                                            </div>
                                    <?php $nomor=1;$total=0; foreach($d['data'] as $dd){?>
                                            <div class="col-1" style="border:1px solid black" align="center">
                                                <?=$nomor++?>
                                            </div>
                                            <div class="col-3" style="border:1px solid black" align="center">
                                                <?=$dd['nama_menu']?>
                                            </div>
                                            <div class="col-3" style="border:1px solid black" align="center">
                                                <?=$dd['harga']?>
                                            </div>
                                            <div class="col-2" style="border:1px solid black" align="center">
                                                <?=$dd['qty']?>
                                            </div>
                                            <div class="col-3" style="border:1px solid black" align="center">
                                                <?=($dd['harga']*$dd['qty'])?>
                                                <?php $total+=($dd['harga']*$dd['qty']);?>
                                            </div>
                                    <?php }?>
                                            <div class="col-2"  align="">
                                                <b>Grand Total</b>
                                            </div>
                                            <div class="col-3"  align="center">
                                            </div>
                                            <div class="col-2"  align="center">
                                            </div>
                                            <div class="col-2"  align="center">
                                            </div>
                                            <div class="col-3"  align="center">
                                                <div style="border-bottom:1px solid black"><b>( <?=$total?> )</b></div>

                                            </div>
                                    </div>
                                    </div>
                                    </div>
                                    <br><br><br>
                                    <div class="container" align="left"><button type="button" class="btn btn-success form-control" onclick="printContent('content')" >Print</button></div>
<script>
        function printContent(elementId) {
            var printContents = document.getElementById(elementId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;

            location.reload(); // To reload the page to its original state
        }
    </script>