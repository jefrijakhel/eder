<div class="row" style="margin-top:10px;">
    <div class="col-md-12 text-uppercase">
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>manage-meja" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        <center><h1>Update Meja</h1></center>
    </div>
    <br><br>
    <div class="col-md-12 card" >
        <form class="card-body" method="post" action="<?=base_url()?>manage-meja/put">
        <div class="form-group row">
            <label for="nomeja" class="col-sm-2 col-form-label">Nomor Meja</label>
            <div class="col-sm-10">
            <input type="hidden" class="form-control" name="idmeja" id="idmeja" value="<?=$meja[0]['id_meja']?>">
            <input type="number" class="form-control" name="nomeja" id="nomeja" value="<?=$meja[0]['no_meja']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="username" id="username" placeholder="username" value="<?=$meja[0]['username']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="password" id="password" placeholder="password" value="<?=$meja[0]['password']?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2" style="float:right">Update</button>
        </form>
    </div>
</div>