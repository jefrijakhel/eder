<div class="row">
    <div class="card col-md-12 text-center" style="margin-bottom:10px;margin-top:10px;">
    <div class="card-body">
        <h1>Meja <?=$meja?></h1>
    </div>
    </div>
    
    <div class="col-md-4 col-md-offset" style="float: none; margin: 0 auto;">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Login</h3>
            </div>
            <div class="col-md-12">
                <form method="post" action="<?=base_url()?>home/auth">
                    <div class="form-group">
                        <input type="name" name="nama_pelanggan" class="form-control" id="nama_pelanggan" placeholder="Nama Pelanggan">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email (optional)">
                    </div>
                    <div class="form-group">
                        <input type="number" name="no_hp" class="form-control" id="no_hp" placeholder="No. Handphone (optional)">
                    </div>
                    <button type="submit" name="logincustomer" class="btn btn-primary col-md-12">Pesan Sekarang</button>
                </form>
            </div>
        </div>
    </div>

</div>    