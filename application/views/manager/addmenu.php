<div class="row" style="margin-top:10px;">
    <div class="col-md-12 text-uppercase">
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>manage-menu" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        <center><h1>Tambah Menu</h1></center>
    </div>
    <br><br>
    <div class="col-md-12 card" >
        <form class="card-body" method="post" action="<?=base_url()?>manage-menu/post">
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
            <select class="form-control hidden" name="submenu" id="minuman">
                <option value="hot coffee">Hot Coffee</option>
                <option value="ice coffee">Ice Coffee</option>
                <option value="beverages">Beverages</option>
                <option value="tea">Tea</option>
                <option value="air mineral">Air Mineral</option>
                <option value="mojito">Mojito</option>
                <option value="juice">Juice</option>
                <option value="milkshake">Milkshake</option>
            </select>

            <select class="form-control" name="submenu" id="makanan">
                <option value="rice bowl">Rice Bowl</option>
                <option value="main course">Main Course</option>
                <option value="noodle">Noodle</option>
                <option value="steak">Steak</option>
            </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="namaMenu" class="col-sm-2 col-form-label">Nama Menu</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="namamenu" id="namaMenu" placeholder="nama menu">
            </div>
        </div>
        <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="harga" id="harga">
            </div>
        </div>
        <div class="form-group row">
            <label for="linkfoto" class="col-sm-2 col-form-label">Link Foto</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="linkfoto" id="linkfoto" placeholder="http:// or https://">
            </div>
        </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="deskripsi">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2" style="float:right">Tambah</button>
        </form>
    </div>
</div>