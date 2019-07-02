<div class="jumbotron jumbotron-fluid">
  <div class="container">
  <center>
    <form method="post" action="<?=base_url()?>proses-order">
        <div class="row">
            <div class="col">
            <input type="hidden" class="form-control" name="id_transaksi" value="<?=$id_transaksi?>" required>
            <input type="number" name="waktu_penyajian" class="form-control" placeholder="10" required>
            <small> estimasi waktu (menit) </small>
            </div>
            <div class="col">
            <input type="submit" name="proceed" class="btn btn-primary btn-sm" value="Proses Order">
            </div>
        </div>
    </form>
    </center>
  </div>
</div>