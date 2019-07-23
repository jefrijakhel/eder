<div class="container pt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Welcome <?=$sess['username']?></h1>
        </div><br><br><br><br>
        <div class="col-md-12">
            <center>
            <a class="btn btn-primary w-25" style="min-height:100px !important; vertical-align:middle; padding-top:35px" href="<?=base_url()?>manager/dashboard" role="button">Dashboard</a>
            <a class="btn btn-secondary w-25" style="min-height:100px !important; vertical-align:middle; padding-top:35px" href="<?=base_url()?>manager/gaji" role="button">Gaji</a>
            <br><br>
            <a class="btn btn-info w-25" style="min-height:100px !important; vertical-align:middle; padding-top:35px" href="<?=base_url()?>manager/list-belanja" role="button">Daftar Belanja</a>
            <a class="btn btn-warning w-25" style="min-height:100px !important; vertical-align:middle; padding-top:35px" href="<?=base_url()?>manager/feedback" role="button">Feedback</a>
            <br><br>
            <a class="btn btn-danger w-50" style="min-height:100px !important; vertical-align:middle; padding-top:35px" href="<?=base_url()?>employee/logout" role="button">Logout</a>
            </center>
        </div>
    </div>
</div>