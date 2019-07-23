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
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form class="form-inline" method="get" action="">
                    <label class="my-1 mr-2" for="inlineFormInputName2">From</label>
                    <input type="date" class="form-control mb-2 mr-sm-2 form-control-sm" name="from" id="inlineFormInputName2" placeholder="Jane Doe">
                    <label class="my-1 mr-2" for="inlineFormInputName2">To</label>
                    <input type="date" class="form-control mb-2 mr-sm-2 form-control-sm" name="to" id="inlineFormInputName2" placeholder="Jane Doe">
                    <button type="submit" class="btn btn-primary mb-2 btn-sm">Submit</button>
                </form>
                <canvas id="transaksi"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Metode Pembayaran
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">OVO : <?=$ovo?></li>
                <li class="list-group-item">GOPAY : <?=$gopay?></li>
                <li class="list-group-item">CASH : <?=$cash?></li>
            </ul>
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
</div>
