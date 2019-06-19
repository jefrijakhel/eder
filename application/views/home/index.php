<div class="row">
    <div class="card col-md-12 text-center" style="margin-bottom:10px;margin-top:10px;">
    <div class="card-body">
        <h1>Pilih Meja</h1>
    </div>
    </div>
    
    <?php for($i=1;$i<11;$i++){ ?>
        <div class="col-md-2 text-center" style="margin-bottom:5px;">
            <a href="<?=base_url()?>home/login/<?=$i?>">
                <div class="card">
                <img src="https://doktersehat.com/wp-content/uploads/2018/08/makanan-bayi-1-tahun-doktersehat.jpg" class="card-img-top" style="height:inherit;" alt="...">
                <div class="card-body">
                    <p class="card-text"><h2><?=$i?></h2></p>
                </div>
                </div>
            </a>
        </div>
    <?php } ?>

</div>    