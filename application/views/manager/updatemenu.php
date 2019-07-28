<div class="row" style="margin-top:10px;">
    <div class="col-md-12 text-uppercase">
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>manage-menu" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        <center><h1>Update Menu</h1></center>
    </div>
    <br><br>
    <div class="col-md-12 card" >
        <form class="card-body" method="post" action="<?=base_url()?>manage-menu/put">
        <div class="form-group row">
            <label for="jenisMenu" class="col-sm-2 col-form-label">Jenis Menu</label>
            <div class="col-sm-10">
            <select class="form-control" name="jenismenu" id="jenismenu">
                <option value="makanan" selected>Makanan</option>
                <option value="minuman">Minuman</option>
            </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="subMenu" class="col-sm-2 col-form-label">Sub Menu</label>
            <div class="col-sm-10">
            <select class="form-control" name="submenu" id="submenu">
                <?=$subma?>
            </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="namaMenu" class="col-sm-2 col-form-label">Nama Menu</label>
            <div class="col-sm-10">
            <input type="hidden" class="form-control" name="idmenu" id="idmenu" value="<?=$menu[0]['id_menu']?>">
            <input type="text" class="form-control" name="namamenu" id="namaMenu" value="<?=$menu[0]['nama_menu']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="harga" id="harga" value="<?=$menu[0]['harga_menu']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="linkfoto" class="col-sm-2 col-form-label">Link Foto</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="linkfoto" name="linkfoto" id="linkfoto" value="<?=$menu[0]['foto']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?=$menu[0]['deskripsi_menu']?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2" style="float:right">Update</button>
        </form>
    </div>
</div>