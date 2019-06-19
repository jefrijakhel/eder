<div class="row">
    <div class="col-md-12" style="margin-bottom:10px;margin-top:10px;border-bottom:1px solid #dedede;padding:5px;">
        <div class="row">
            <div class="col-md-3">no. meja : <?=$meja?></div>
            <div class="col-md-3">atas nama : <?=$nama_pelanggan?></div>
            <div class="col-md-3">no. hp : <?=$no_hp?></div>
            <div class="col-md-3">email : <?=$email?></div>
        </div>
    </div>
    
    <div class="card col-md-12">
            <div class="card-body">
                <div class="card" style="margin-bottom:10px;">
                    <div class="card-body">
                        <em>Makanan</em>
                    </div>
                </div>
                <div class="row" style="margin-bottom:10px;">
                    <?php for($i=1;$i<7;$i++){ ?>
                        <div class="col-md-2 text-center" style="margin-bottom:5px;">
                                <div class="card">
                                <img src="https://doktersehat.com/wp-content/uploads/2018/08/makanan-bayi-1-tahun-doktersehat.jpg" class="card-img-top" style="height:inherit;" alt="...">
                                <div class="card-body">
                                    <p class="card-text">Nama Menu</p>
                                    <p class="card-text">
                                    <small id="passwordHelp" class="form-text text-muted text-center"><em>deskripsi</em></small>
                                    </p>
                                    <form method="post" action="">
                                        <input type="number" name="qty" style="border:none;border-bottom:1px solid #333;margin-bottom:3px;width:35px; !important" class="text-center" value="0"><br>
                                        <button type="submit" class="btn-info" name="addcart" style="border:none; height:15px; font-size:10px;padding:2px auto !important">add to cart </button>
                                    </form>
                                    <small id="passwordHelp" class="form-text text-muted text-right"><em>vendor</em></small>
                                </div>
                                </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="card" style="margin-bottom:10px;">
                    <div class="card-body">
                        <em>Minuman</em>
                    </div>
                </div>
                <div class="row">
                    <?php for($i=1;$i<7;$i++){ ?>
                        <div class="col-md-2 text-center" style="margin-bottom:5px;">
                            <a href="<?=base_url()?>home/login/<?=$i?>">
                                <div class="card">
                                <img src="https://doktersehat.com/wp-content/uploads/2018/08/makanan-bayi-1-tahun-doktersehat.jpg" class="card-img-top" style="height:inherit;" alt="...">
                                <div class="card-body">
                                    <p class="card-text">Nama Menu</p>
                                    <p class="card-text">
                                    <small id="passwordHelp" class="form-text text-muted text-center"><em>deskripsi</em></small>
                                    </p>
                                    <form method="post" action="">
                                    <input type="number" name="qty" style="border:none;border-bottom:1px solid #333;margin-bottom:3px;width:35px; !important" class="text-center" value="0"><br>
                                        <button type="submit" class="btn-info" name="addcart" style="border:none; height:15px; font-size:10px;padding:2px auto !important">add to cart </button>
                                    </form>
                                    <small id="passwordHelp" class="form-text text-muted text-right"><em>vendor</em></small>
                                </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
    </div>

</div>    