<div class="row" style="margin-top:10px;">
    <div class="col-md-12 text-uppercase">
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>manage-meja" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        <center><h1>Tambah Meja</h1></center>
    </div>
    <br><br>
    <div class="col-md-12 card" >
        <form class="card-body" method="post" action="<?=base_url()?>manage-meja/post">
        <div class="form-group row">
            <label for="nomeja" class="col-sm-2 col-form-label">Nomor Meja</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="nomeja" id="nomeja">
            </div>
        </div>
        <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="username" id="username" placeholder="username">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="password" id="password" placeholder="password">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2" style="float:right">Tambah</button>
        </form>
    </div>
</div>