<div class="container pt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Welcome <?=$sess['username']?></h1>
        </div><br><br><br><br>
        <div class="col-md-12">
            <center>
            <a class="btn btn-primary w-25" style="min-height:100px !important; vertical-align:middle; padding-top:35px" href="<?=base_url()?>dapur/list-pesanan" role="button">List Pesanan</a>
            <a class="btn btn-secondary w-25" style="min-height:100px !important; vertical-align:middle; padding-top:35px" href="<?=base_url()?>dapur/belanja" role="button">Belanja</a>
            <br><br>
            <a class="btn btn-danger w-50" style="min-height:100px !important; vertical-align:middle; padding-top:35px" href="<?=base_url()?>employee/logout" role="button">Logout</a>
            </center>
        </div>
    </div>
</div>