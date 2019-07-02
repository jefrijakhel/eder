<div class="row">
    <div class="card col-md-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-uppercase" >
                        <a class="btn btn-sm btn-primary" href="<?=base_url()?>home/menu" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
                        <a class="btn btn-sm btn-primary" href="<?=base_url()?>home/cart" style="float:right"><strong><i class="material-icons">shopping_cart</i><span class="badge badge-danger align-top" style="font-size:12px;"><?=$countcart?></span></strong></a>
                    </div>
                    <br><br>
                    <div class="col-md-1 text-uppercase" >
                    </div>
                    
                </div>
                <br>
                <div class="tab-content" id="myTabContent">
                    <?php 
                        $no = 1;
                        $total = 0;
                        foreach($cart as $key=>$value):
                            $menu = Menu::where('id_menu',$value->id_menu)->get();
                            $subtotal = $menu[0]['harga_menu']*$value->qty;
                    ?>
                    <div class="col-md-12 text-center" style="margin-bottom:5px;">
                        <div class="card mb-3" style="border:none">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <img src="https://doktersehat.com/wp-content/uploads/2018/08/makanan-bayi-1-tahun-doktersehat.jpg" class="card-img" style="" alt="">
                                </div>
                                <div class="col-md-8 text-left">
                                    <div class="card-body" style="">
                                        <h5 class="card-title"><?=$menu[0]['nama_menu']?></h5>
                                        <p class="card-text"><?=$menu[0]['deskripsi_menu']?></p>
                                        <p class="card-text">Rp. <?=number_format($menu[0]['harga_menu'],0)?> x <?=$value->qty?></p>
                                        <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card-body" style="background:crimson; border-radius:10px">
                                        <form method="post" action="<?=base_url()?>update">
                                            <center>
                                                <input type="hidden" name="id_menu" class="form-control" value="<?=$value->id_menu?>">
                                                <input type="number" name="qty" class="form-control" value="<?=$value->qty?>"><br>
                                                <input type="name" name="notes" class="form-control" placeholder="notes" value="<?=$value->notes?>"><br>
                                                <button type="submit" class="form-control btn btn-info" name="addcart" style="">update</button>
                                            </center>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $no++;
                        $total += $subtotal;
                        endforeach;
                    ?>
                    <div class="col-md-12" style="margin-bottom:5px;">
                        <div class="card mb-3" style="border:none ;background:cornflowerblue;padding:5px;color:#fff">
                            <div class="row no-gutters">
                                <div class="col-md-10 col-sm-4 text-right">
                                    <strong>TOTAL : Rp. <?=number_format($total,0)?></strong>
                                </div>
                                <div class="col-md-2 col-sm-4 text-right">
                                    <a class="btn btn-primary" href="<?=base_url()?>checkout">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

</div>    