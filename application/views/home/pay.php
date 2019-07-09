<div class="container pt-5">
    <div class="row">
        <div class="col-md-12 text-uppercase" >
            <a class="btn btn-sm btn-primary" href="<?=base_url()?>home/main" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        </div>
        <br><br>
        <div class="col-md-1 text-uppercase"></div>
        <div class="col-md-12 text-center">
            <h1>Please select your payment method</h1>
        </div><br><br><br><br>
        <div class="col-md-12">
            <center>
            <a class="btn btn-success w-25" style="min-height:100px !important; vertical-align:middle; padding-top:35px" href="<?=base_url()?>home/pay?method=gopay" role="button">GOPAY</a>
            <a class="btn btn-warning w-25" style="min-height:100px !important; vertical-align:middle; padding-top:35px" href="<?=base_url()?>home/pay?method=ovo" role="button">OVO</a>
            <br><br>
            <a class="btn btn-info w-50" style="min-height:100px !important; vertical-align:middle; padding-top:35px" href="<?=base_url()?>home/pay?method=cash" role="button">CASH</a>
            </center>
        </div>
    </div>
</div>