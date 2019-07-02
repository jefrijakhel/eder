<div class="row">
    <div class="card col-md-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-uppercase" >
                        <a class="btn btn-sm btn-primary" href="<?=base_url()?>home/check" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
                    </div>
                    <br><br>
                    <div class="col-md-1 text-uppercase" >
                    </div>
                    
                </div>
                <br>
                <div class="tab-content" id="myTabContent" style="border:1px #dedede solid; padding:10px; border-radius:5px;">
                    <div class="text-center">
                        <strong><i class="material-icons"style="font-size:80px;">access_time</i></strong>
                    </div>
                    <div style="font-size:26px; font-weight:bold" class="text-center">
                        <?=$menu[0]['nama_menu']?> <br>
                        <small style="font-size:20px; font-weight:bold;"><?=$menu[0]['deskripsi_menu']?> </small><br>
                        x <?=$transaksi[0]['qty']?><br>
                        <small style="font-size:20px; font-weight:bold;"><?=$transaksi[0]['notes']?> </small><br>
                    </div>
                    <?php
                        if($transaksi[0]['estimated_time'] != NULL){
                    ?>
                    <div id="demo" style="font-size:26px; font-weight:bold" class="text-center"></div>
                    <input type="hidden" value="<?=$transaksi[0]['estimated_time']?>" id="countdown">
                    <?php }else{ ?>
                    <div style="font-size:26px; font-weight:bold" class="text-center">
                        Pesanan Belum diproses
                    </div>
                    <div style="font-size:16px; font-weight:bold" class="text-center">
                        status: <?=$transaksi[0]['status']?>
                    </div>
                    <?php } ?>
                </div>
            </div>
    </div>

</div>    