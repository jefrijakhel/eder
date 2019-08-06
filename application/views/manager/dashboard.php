<div class="row" style="margin-top:10px;">
    <div class="col-md-12 text-uppercase">
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>employee/manager" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        <center><h1>Grafik Penjualan</h1></center>
    </div>
    <br><br>
    <div class="col-md-1 text-uppercase" >
    </div>                    
</div>
<br>
<div class="row" style=" padding-bottom:20px;">
<div class="col-md-2">
        <div class="card">
            <div class="card-header text-center">
                <span style="font-size:24px;font-weight:bold"><?=$penjualan?></span>
                <small class="form-text text-muted">Penjualan</small>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card">
            <div class="card-header text-center">
            <span style="font-size:24px;font-weight:bold"><?=$menu?></span>
                <small class="form-text text-muted">Menu</small>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card">
            <div class="card-header text-center">
                <span style="font-size:24px;font-weight:bold"><?=$karyawan?></span>
                <small class="form-text text-muted">Karyawan</small>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card">
            <div class="card-header text-center">
                <span style="font-size:24px;font-weight:bold"><?=$ratingmenu?></span>/5
                <small class="form-text text-muted">Rating Menu</small>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card">
            <div class="card-header text-center">
                <span style="font-size:24px;font-weight:bold"><?=$ratingpelayanan?></span>/5
                <small class="form-text text-muted">Rating Pelayanan</small>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card">
            <div class="card-header text-center">
                <span style="font-size:24px;font-weight:bold"><?=$ratingsuasana?></span>/5
                <small class="form-text text-muted">Rating Suasana</small>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="margin-top:20px;">
        <div class="card">
            <div class="card-body">
                <form class="form-inline" method="get" action="#">
                    <label class="my-1 mr-2" for="inlineFormInputName2">From</label>
                    <input type="date" class="form-control mb-2 mr-sm-2" name="from" value="<?=$from?>" id="inlineFormInputName2">
                    <label class="my-1 mr-2" for="inlineFormInputName2">To</label>
                    <input type="date" class="form-control mb-2 mr-sm-2 form-control-sm" name="to" value="<?=$to?>" id="inlineFormInputName2">
                    <button type="submit" class="btn btn-primary mb-2 btn-sm">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6" style="margin-top:20px;">
        <div class="card">
            <div class="card-body">
                <canvas id="transaksi"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6" style="margin-top:20px;">
        <div class="card">
            <div class="card-header">
                Metode Pembayaran
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">OVO : Rp. <?=number_format($ovo,0)?></li>
                <li class="list-group-item">GOPAY : Rp. <?=number_format($gopay,0)?></li>
                <li class="list-group-item">CASH : Rp. <?=number_format($cash,0)?></li>
            </ul>
        </div>
    </div>
    <div class="col-md-6" style="margin-top:20px;">
        <div class="card">
            <div class="card-body">
                <canvas id="pendapatan"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6" style="margin-top:20px;">
        <div class="card">
            <div class="card-body">
                <canvas id="pengeluaran"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6" style="margin-top:10px;">
        <div class="card">
            <div class="card-body">
                <canvas id="topmakanan"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6" style="margin-top:10px;">
        <div class="card">
            <div class="card-body">
                <canvas id="topminuman"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="margin-top:20px;">
        <div class="card">
            <div class="card-body">
                <canvas id="feedback1"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="margin-top:20px;">
        <div class="card">
            <div class="card-body">
                <canvas id="feedback2"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="margin-top:20px;">
        <div class="card">
            <div class="card-body">
                <canvas id="feedback3"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6" style="margin-top:20px">
        <table id="example" class="table" width="100%">
            <thead class="thead-light">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">No HP</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1;foreach($pelanggan as $key=>$value):
                ?>
                <tr>
                <th scope="row"><?=$no?></th>
                <td><?=$value->nama_customer?></td>
                <td><?=$value->email?></td>
                <td><?=$value->no_hp?></td>
                </tr>
            <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-6" style="margin-top:20px">
        <table id="example2" class="table" width="100%">
            <thead class="thead-light">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Menu</th>
                <th scope="col">Sub Menu</th>
                <th scope="col">Jenis Menu</th>
                <th scope="col">Terjual</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1;foreach($transaksi as $key=>$value): 
                $menu = Menu::where('id_menu',$value->id_menu)->get();
                $submenu = Submenu::where('id_submenu',$menu[0]['sub_menu'])->get();
                ?>
                <tr>
                <th scope="row"><?=$no?></th>
                <td><?=$menu[0]['nama_menu']?></td>
                <td><?=$submenu[0]['nama_submenu']?></td>
                <td><?=$menu[0]['jenis_menu']?></td>
                <td><?=$value->qty?></td>
                </tr>
            <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
