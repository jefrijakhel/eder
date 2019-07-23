<center id="printarea"><br><br>
    <div class="card col-md-6 col-sm-12">
        <div class="card-body">
            <h6 class="card-title">INVOICE</h6>
            <p class="card-text" style="font-size:12px;font-weight:bold;">Elther Cafe
            <br>Jl. Telekomunikasi Bandung, No.1
            <br> Telp. 102948029 
            </p>
            <p class="card-text">
            <ul class="invoice-list-group font-weight-bold">
                <li>
                    <ul>
                        <li>ID</li>
                        <li>:</li>
                        <li>&nbsp;<?=$meja[0]['active_transaction']?></li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>Kasir</li>
                        <li>:</li>
                        <li>&nbsp;<?=$emsess['username']?></li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>Tanggal</li>
                        <li>:</li>
                        <li>&nbsp;<?=date('d-m-Y H:i')?></li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>No. Meja</li>
                        <li>:</li>
                        <li>&nbsp;<?=$meja[0]['no_meja']?></li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>Pelanggan</li>
                        <li>:</li>
                        <li>&nbsp;<?=$meja[0]['nama_customer']?></li>
                    </ul>
                </li>
                
            </ul>
            </p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item text-left font-weight-bold">Pesanan</li>
        <?php 
            $orderan = Transaksi::where('transaksi_fk',$meja[0]['active_transaction'])
                                ->groupBy('id_menu')
                                ->selectRaw('*, sum(qty) as qty')
                                ->get();
            $total = 0;
            $payment = Payment::where('id_transaksi',$meja[0]['active_transaction'])->get();
            if(count($payment)>0){
            if($payment[0]['metode'] == ''){
                $payments = 'Pelanggan belum menentukann metode pembayaran';
            }else{
                $payments = $payment[0]['metode'];
            }}else{
                $payments = 'Pelanggan belum menentukan metode pembayaran';
            }
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
        <li class="list-group-item text-left" style="margin-top:10px;padding-top:5px;padding-bottom:5px;">Metode Pembayaran<span class="float-right text-uppercase font-weight-bold">
        
        <?=$payments?>
        
        </span></li>
    </ul>
    <center>
    <?php if($payments == 'ovo'){ ?>    
        <img src="<?=base_url()?>assets/ovoqr.jpg" style="width:100px;">
    <?php }else if($payments == 'gopay'){ ?> 
        <img src="<?=base_url()?>assets/goqr.jpg" style="width:100px;">
    <?php }else{?> 
    <?php }?> 
    </center>
    </div>
    </center>
    <center>
    <div class="card col-md-6 col-sm-12" style="border:none;">
        <div class="card-body">
            <a href="<?=base_url()?>employee/kasir" class="card-link align-middle" style="float:left"><i class="material-icons align-middle">keyboard_arrow_left</i>Back</a>
            <a href="#" id="printbtn" onclick="printpage()" class="card-link align-middle"style="float:left"><i class="material-icons align-middle">local_printshop</i>Print</>
            <a href="<?=base_url()?>close-table?id=<?=$meja[0]['no_meja']?>" class="card-link align-middle"style="float:right"><i class="material-icons align-middle">close</i>Close Table</a>
        </div>
    </div>
</center>