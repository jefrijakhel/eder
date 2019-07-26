<div class="container">
    <div class="row">
    <div class="col-md-12 text-uppercase">
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>employee/dapur" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        <center><h1>List Pesanan</h1></center>
    </div>
    <br><br>
    <br>
    <div class="col-md-6 col-sm-6">
    <h3>Makanan</h3>
    <div id="listpesananmakanan"></div>
    </div>
    <div class="col-md-6 col-sm-6">
    <h3>Minuman</h3>
    <div id="listpesananminuman"></div>
    </div>
    </div>
    <br>
    <br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Menu</th>
            <th scope="col">Notes</th>
            <th scope="col">Meja</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody id="listpesanan">
            
        </tbody>
    </table>
</div>