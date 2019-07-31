<div class="row">
    <div class="col-md-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-uppercase" >
                        <a class="btn btn-sm btn-primary" href="<?=base_url()?>home/main" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
                    </div>
                    <br><br>
                    <div class="col-md-1 text-uppercase" >
                    </div>
                    
                </div>
                <br>
                <div class="tab-content" id="myTabContent">
                    <?php 
                        $no = 1;
                        $total = 0;
                        foreach($cart as $key=>$value):
                            $menu = Menu::where('id_menu',$value->id_menu)->get();
                            $subtotal = $menu[0]['harga_menu']*$value->qty;
                    ?>
                    <div class="col-md-12 col-sm-12" style="background-color:#fff; border-radius:10px;margin-bottom:5px;padding-left:5px;">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-4" style="padding-top:5px;padding-bottom:5px;">
                                    <?php
                                        if($menu[0]['foto'] == '' || $menu[0]['foto'] == NULL){?>
                                        <img src="https://doktersehat.com/wp-content/uploads/2018/08/makanan-bayi-1-tahun-doktersehat.jpg" class="img-fluid" alt="" onload="timer('demo<?=$value->id_transaksi?>','<?=$value->estimated_time?>');">
                                        <?php }else{?>
                                            <img src="<?=$menu[0]['foto']?>" class="img-fluid" alt="" onload="timer('demo<?=$value->id_transaksi?>','<?=$value->estimated_time?>');">
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-4" style="padding-top:5px;padding-bottom:5px;">
                                        <?=$menu[0]['nama_menu']?> <br>
                                        <small class="text-muted">Rp. <?=number_format($menu[0]['harga_menu'],0)?> x <?=$value->qty?></small>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-4" style="padding-top:5px;padding-bottom:5px;">
                                        <?php
                                            if($value->estimated_time != NULL && $value->status != 'close'){
                                        ?>
                                        <div id="demo<?=$value->id_transaksi?>" style="font-size:16px; font-weight:bold" class="text-center" onload="timer('<?=$value->estimated_time?>')"></div>
                                        <input type="hidden" value="<?=$value->estimated_time?>" id="countdown">
                                        <?php }else if($value->estimated_time != NULL && $value->status == 'close'){ ?>
                                        <div style="font-size:16px; font-weight:bold" class="text-center">
                                            Pesanan Telah Selesai
                                        </div>
                                        <?php }else{ ?>
                                        <div style="font-size:16px; font-weight:bold" class="text-center">
                                            Pesanan Belum diproses
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                    <?php 
                        $no++;
                        $total += $subtotal;
                        endforeach;
                    ?>
                    <div class="col-md-12" style="margin-bottom:5px;">
                        <div class="card mb-3" style="border:none ;background:cornflowerblue;padding:5px;color:#fff">
                            <div class="row no-gutters">
                                <div class="col-md-12 col-sm-12 text-right">
                                    <strong>TOTAL : Rp. <?=number_format($total,0)?></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

</div>    