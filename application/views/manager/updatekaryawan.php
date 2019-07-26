<div class="row" style="margin-top:10px;">
    <div class="col-md-12 text-uppercase">
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>manage-karyawan" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        <center><h1>Tambah Karyawan</h1></center>
    </div>
    <br><br>
    <div class="col-md-12 card" >
        <form class="card-body" method="post" action="<?=base_url()?>manage-karyawan/put">
        <div class="form-group row">
            <label for="posisi" class="col-sm-2 col-form-label">Posisi</label>
            <div class="col-sm-10">
            <select class="form-control" name="posisi" id="posisi">
                <option value="1">Dapur</option>
                <option value="2">Kasir</option>
                <option value="3">Pelayan</option>
            </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="namakaryawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
            <div class="col-sm-10">
            <input type="hidden" class="form-control" name="idkaryawan" id="idkaryawan" value="<?=$employee[0]['id_employee']?>">
            <input type="text" class="form-control" name="namakaryawan" id="namakaryawan" value="<?=$employee[0]['nama']?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2" style="float:right">Update</button>
        </form>
    </div>
</div>