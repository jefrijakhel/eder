<div class="row">
    <div class="card col-md-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-uppercase" >
                        <a class="btn btn-sm btn-primary" href="<?=base_url()?>home/main" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
                        <?php if($countcart == 0){?>
                            <a class="btn btn-sm btn-primary" href="<?=base_url()?>home/cart" style="float:right"><strong><i class="material-icons">shopping_cart</i><span class="badge badge-primary align-top" style="font-size:12px;"><?=$countcart?></span></strong></a>
                        <?php }else{?>
                            <a class="btn btn-sm btn-primary" href="<?=base_url()?>home/cart" style="float:right"><strong><i class="material-icons">shopping_cart</i><span class="badge badge-danger align-top" style="font-size:12px;"><?=$countcart?></span></strong></a>
                        <?php } ?>
                    </div>
                    <br><br>
                    <div class="col-md-1 text-uppercase" >
                    </div>
                    <div class="col-md-10" style="margin-bottom:10px;">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="makanan-tab" data-toggle="tab" href="#makanan" role="tab" aria-controls="makanan" aria-selected="true">Makanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="minuman-tab" data-toggle="tab" href="#minuman" role="tab" aria-controls="minuman" aria-selected="false">Minuman</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <br>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="makanan" role="tabpanel" aria-labelledby="makanan-tab">
                        <div class="row" style="margin-bottom:10px;">
                            <?php foreach($makanan as $key=>$value): ?>
                                <div class="col-md-12 text-center" style="margin-bottom:5px;">
                                    <div class="card mb-3" style="border:none">
                                    <div class="row no-gutters">
                                        <div class="col-md-2">
                                        <img src="https://doktersehat.com/wp-content/uploads/2018/08/makanan-bayi-1-tahun-doktersehat.jpg" class="card-img" style="" alt="">
                                        </div>
                                        <div class="col-md-8 text-left">
                                        <div class="card-body"style="">
                                            <h5 class="card-title"><?=$value->nama_menu?></h5>
                                            <p class="card-text"><?=$value->deskripsi_menu?></p>
                                            <p class="card-text">Rp. <?=number_format($value->harga_menu,0)?></p>
                                            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="card-body" style="background:cornflowerblue; border-radius:10px">
                                                <form method="post" action="<?=base_url()?>order">
                                                    <center>
                                                    <input type="hidden" name="id_menu" class="form-control" value="<?=$value->id_menu?>">
                                                    <input type="number" name="qty" class="form-control" value="0"><br>
                                                    <input type="name" name="notes" class="form-control" placeholder="notes"><br>
                                                    <button type="submit" class="form-control btn btn-info" name="addcart" style="">order</button>
                                                    </center>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="minuman" role="tabpanel" aria-labelledby="minuman-tab">
                        <div class="row" style="margin-bottom:10px;">
                            <?php foreach($minuman as $key=>$value): ?>
                                <div class="col-md-12 text-center" style="margin-bottom:5px;">
                                    <div class="card mb-3" style="border:none">
                                    <div class="row no-gutters">
                                        <div class="col-md-2">
                                        <img src="https://doktersehat.com/wp-content/uploads/2018/08/makanan-bayi-1-tahun-doktersehat.jpg" class="card-img" style="" alt="">
                                        </div>
                                        <div class="col-md-8 text-left">
                                        <div class="card-body"style="">
                                            <h5 class="card-title"><?=$value->nama_menu?></h5>
                                            <p class="card-text"><?=$value->deskripsi_menu?></p>
                                            <p class="card-text">Rp. <?=number_format($value->harga_menu,0)?></p>
                                            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="card-body" style="background:cornflowerblue; border-radius:10px">
                                                <form method="post" action="<?=base_url()?>order">
                                                    <center>
                                                    <input type="hidden" name="id_menu" class="form-control" value="<?=$value->id_menu?>">
                                                    <input type="number" name="qty" class="form-control" value="0"><br>
                                                    <input type="name" name="notes" class="form-control" placeholder="notes"><br>
                                                    <button type="submit" class="form-control btn btn-info" name="addcart" style="">order</button>
                                                    </center>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="cart" role="tabpanel" aria-labelledby="cart-tab">
                        <div class="row" style="margin-bottom:10px;">
                            <?php for($i=1;$i<7;$i++){ ?>
                                <div class="col-md-12 text-center" style="margin-bottom:5px;">
                                    <div class="card mb-3" style="border:none">
                                    <div class="row no-gutters">
                                        <div class="col-md-2">
                                        <img src="https://doktersehat.com/wp-content/uploads/2018/08/makanan-bayi-1-tahun-doktersehat.jpg" class="card-img" style="" alt="">
                                        </div>
                                        <div class="col-md-8 text-left">
                                        <div class="card-body"style="">
                                            <h5 class="card-title">Nama Minuman</h5>
                                            <p class="card-text">Deskripsi Minuman</p>
                                            <p class="card-text">Rp. 50.000</p>
                                            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            <?php } ?>
                                <div class="col-md-12 text-center" style="margin-bottom:5px;">
                                    <button type="button" class="btn btn-primary">Confirm Order</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

</div>    