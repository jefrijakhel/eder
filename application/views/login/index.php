<div class="row">
    <div class="col-md-12 text-center" style="margin-bottom:10px;margin-top:10px;">
        <h1>Selamat Datang</h1>
    </div>
    
    <div class="col-md-4 col-md-offset" style="float: none; margin: 0 auto;">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Login</h3>
            </div>
            <div class="col-md-12">
                <form method="post" action="<?=base_url()?>employee/auth">
                    <div class="form-group">
                        <input type="name" name="username" class="form-control" id="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <button type="submit" name="loginmeja" class="btn btn-primary col-md-12">Login</button>
                </form>
            </div>
        </div>
    </div>

</div>    