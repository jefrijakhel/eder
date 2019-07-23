<div class="container pt-5">
    <div class="row">
        <div class="col-md-12 text-uppercase" >
            <a class="btn btn-sm btn-primary" href="<?=base_url()?>home/main" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        </div>
        <br><br>
        <div class="col-md-1 text-uppercase"></div>
        <div class="col-md-12 text-center">
            <h4>Please select your payment method</h4>
        </div><br><br><br><br>
        
        <!-- invoice -->
        <div class="col-md-12">
        <center>
            <div class="card col-md-6 col-sm-12 col-12">
                <div class="card-body">
                    <h6 class="card-title">INVOICE</h6>
                    <p class="card-text" style="font-size:12px;font-weight:bold;">Elther Cafe
                    <br>Jl. Telekomunikasi Bandung, No.1
                    <br> Telp. 102948029 
                    </p>
                    <p class="card-text">
                    <ul class="invoice-list-group font-weight-bold text-left" style="font-size:9px">
                        <li>
                            <ul >
                                <li class="align-top">ID</li>
                                <li class="align-top">:</li>
                                <li class="text-right col-6">&nbsp;<?= $this->session->userdata('id_transaksi')?></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="align-top">Tanggal</li>
                                <li class="align-top">:</li>
                                <li class="text-right col-6">&nbsp;<?=date('d-m-Y H:i')?></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="align-top">No. Meja</li>
                                <li class="align-top">:</li>
                                <li class="text-right col-6">&nbsp;<?=$meja?></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="align-top">Pelanggan</li>
                                <li class="align-top">:</li>
                                <li class="text-right col-6">&nbsp;<?=$nama_pelanggan?></li>
                            </ul>
                        </li>
                        
                    </ul>
                    </p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-left font-weight-bold">Pesanan</li>
                <?php 
                    $orderan = Transaksi::where('transaksi_fk',$this->session->userdata('id_transaksi'))
                                        ->groupBy('id_menu')
                                        ->selectRaw('*, sum(qty) as qty')
                                        ->get();
                    $total = 0;
                    foreach($orderan as $key=>$value):
                        $menu = Menu::where('id_menu',$value->id_menu)->get();
                        $subtotal = $value->qty*$menu[0]['harga_menu'];
                        $total += $subtotal;
                        
                ?>
                    <li class="list-group-item text-left" style="border:none;padding-top:0;padding-bottom:0;font-weight:bold;font-size:12px">x<?=$value->qty?> <?=$menu[0]['nama_menu']?><span class="float-right">Rp. <?=number_format($subtotal,0)?></span></li>
                <?php 
                endforeach;
                ?>
                <li class="list-group-item text-left" style="margin-top:10px;padding-top:5px;padding-bottom:5px;">Total<span class="float-right">Rp. <?=number_format($total,0)?></span></li>
                </span></li>
            </ul>
        </center>
        <!-- eninvoice -->
        </div>
        
        <div class="col-md-12 col-sm-12 col-12">
            <center>
                <button type="button" class="btn btn-success" onclick="window.location='<?=base_url()?>home/pay?method=gopay'">Gopay</button>
                <button type="button" class="btn btn-warning" onclick="window.location='<?=base_url()?>home/pay?method=ovo'">OVO</button>
                <button type="button" class="btn btn-info" onclick="window.location='<?=base_url()?>home/pay?method=cash'">CASH</button>        
            </center>
        </div>
        
    </div>
</div>