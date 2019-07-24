<div class="row">
    <div class="col-md-12">
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
                            <h6>Makanan Favorite</h6>
                            <?php foreach($topma as $key2=>$value2): ?>
                            <div class="col-md-12 col-sm-12" style="background-color:#fff; border-radius:10px;margin-bottom:5px;padding-left:5px;">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-4" style="padding-top:5px;padding-bottom:5px;">
                                        <?php
                                        if($value2->foto == '' || $value2->foto == NULL){?>
                                        <img src="https://doktersehat.com/wp-content/uploads/2018/08/makanan-bayi-1-tahun-doktersehat.jpg" class="img-fluid" alt="">
                                        <?php }else{?>
                                            <img src="<?=$value2->foto?>" class="img-fluid" alt="">
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-4" style="padding-top:5px;padding-bottom:5px;">
                                        <?=$value2->nama_menu?> <br>
                                        <small class="text-muted">Rp. <?=number_format($value2->harga_menu,0)?></small>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-4" style="padding-top:5px;padding-bottom:5px;">
                                        <form class="form-inline" method="post" action="<?=base_url()?>order">
                                            <input type="hidden" name="id_menu" class="form-control" value2="<?=$value2->id_menu?>">
                                            <input type="number" name="qty" class="form-control mb-2 mr-sm-2 form-control-sm" id="inlineFormInputName2" placeholder="qty">
                                            <input type="name" name="notes" class="form-control mb-2 mr-sm-2 form-control-sm" id="inlineFormInputName2" placeholder="notes">
                                            <button type="submit" class="btn btn-primary mb-2 btn-sm" name="addcart">Order</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <h6>Makanan Lengkap</h6>
                            <?php foreach($makanan as $key=>$value): ?>
                            <div class="col-md-12 col-sm-12" style="background-color:#fff; border-radius:10px;margin-bottom:5px;padding-left:5px;">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-4" style="padding-top:5px;padding-bottom:5px;">
                                    <?php
                                        if($value->foto == '' || $value->foto == NULL){?>
                                        <img src="https://doktersehat.com/wp-content/uploads/2018/08/makanan-bayi-1-tahun-doktersehat.jpg" class="img-fluid" alt="">
                                        <?php }else{?>
                                            <img src="<?=$value->foto?>" class="img-fluid" alt="">
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-4" style="padding-top:5px;padding-bottom:5px;">
                                        <?=$value->nama_menu?> <br>
                                        <small class="text-muted">Rp. <?=number_format($value->harga_menu,0)?></small>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-4" style="padding-top:5px;padding-bottom:5px;">
                                        <form class="form-inline" method="post" action="<?=base_url()?>order">
                                            <input type="hidden" name="id_menu" class="form-control" value="<?=$value->id_menu?>">
                                            <input type="number" name="qty" class="form-control mb-2 mr-sm-2 form-control-sm" id="inlineFormInputName2" placeholder="qty">
                                            <input type="name" name="notes" class="form-control mb-2 mr-sm-2 form-control-sm" id="inlineFormInputName2" placeholder="notes">
                                            <button type="submit" class="btn btn-primary mb-2 btn-sm" name="addcart">Order</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="minuman" role="tabpanel" aria-labelledby="minuman-tab">
                        <div class="row" style="margin-bottom:10px;">
                            <h6>Minuman Favorite</h6>
                            <?php foreach($topmi as $key2=>$value2): ?>
                            <div class="col-md-12 col-sm-12" style="background-color:#fff; border-radius:10px;margin-bottom:5px;padding-left:5px;">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-4" style="padding-top:5px;padding-bottom:5px;">
                                    <?php
                                        if($value2->foto == '' || $value2->foto == NULL){?>
                                        <img src="https://doktersehat.com/wp-content/uploads/2018/08/makanan-bayi-1-tahun-doktersehat.jpg" class="img-fluid" alt="">
                                        <?php }else{?>
                                            <img src="<?=$value2->foto?>" class="img-fluid" alt="">
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-4" style="padding-top:5px;padding-bottom:5px;">
                                        <?=$value2->nama_menu?> <br>
                                        <small class="text-muted">Rp. <?=number_format($value2->harga_menu,0)?></small>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-4" style="padding-top:5px;padding-bottom:5px;">
                                        <form class="form-inline" method="post" action="<?=base_url()?>order">
                                            <input type="hidden" name="id_menu" class="form-control" value2="<?=$value2->id_menu?>">
                                            <input type="number" name="qty" class="form-control mb-2 mr-sm-2 form-control-sm" id="inlineFormInputName2" placeholder="qty">
                                            <input type="name" name="notes" class="form-control mb-2 mr-sm-2 form-control-sm" id="inlineFormInputName2" placeholder="notes">
                                            <button type="submit" class="btn btn-primary mb-2 btn-sm" name="addcart">Order</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <h6>Minuman Lengkap</h6>
                            <?php foreach($minuman as $key=>$value): ?>
                            <div class="col-md-12 col-sm-12" style="background-color:#fff; border-radius:10px;margin-bottom:5px;padding-left:5px;">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-4" style="padding-top:5px;padding-bottom:5px;">
                                    <?php
                                        if($value->foto == '' || $value->foto == NULL){?>
                                        <img src="https://doktersehat.com/wp-content/uploads/2018/08/makanan-bayi-1-tahun-doktersehat.jpg" class="img-fluid" alt="">
                                        <?php }else{?>
                                            <img src="<?=$value->foto?>" class="img-fluid" alt="">
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-4" style="padding-top:5px;padding-bottom:5px;">
                                        <?=$value->nama_menu?> <br>
                                        <small class="text-muted">Rp. <?=number_format($value->harga_menu,0)?></small>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-4" style="padding-top:5px;padding-bottom:5px;">
                                        <form class="form-inline" method="post" action="<?=base_url()?>order">
                                            <input type="hidden" name="id_menu" class="form-control" value="<?=$value->id_menu?>">
                                            <input type="number" name="qty" class="form-control mb-2 mr-sm-2 form-control-sm" id="inlineFormInputName2" placeholder="qty">
                                            <input type="name" name="notes" class="form-control mb-2 mr-sm-2 form-control-sm" id="inlineFormInputName2" placeholder="notes">
                                            <button type="submit" class="btn btn-primary mb-2 btn-sm" name="addcart">Order</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
    </div>

</div>    