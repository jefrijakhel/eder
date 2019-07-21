<div class="row" style="margin-top:10px;">
    <div class="col-md-12 text-uppercase">
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>employee/dapur" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        <center><h1>Daftar Belanja</h1></center>
    </div>
    <br><br>
    <div class="col-md-1 text-uppercase" >
    </div>
    <br>
    <div class="col-md-12" >
        <button class="btn btn-primary" onclick="window.location='<?=base_url()?>dapur/add-belanja'">+ Belanja Baru</button>
        <br><br>
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Permintaan Biaya</th>
                <th scope="col">Biaya Fix</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1;
            if(count($belanja)==0){
                ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data</td>
                </tr>
                <?php
            }
            else{
            foreach($belanja as $key=>$value): ?>
                <tr>
                <th scope="row"><?=$no?></th>
                <td><?=$value->deskripsi?></td>
                <td>Rp. <?=number_format($value->permintaan_biaya,0)?></td>
                <td>Rp. <?=number_format($value->biaya_fix,0)?></td>
                <td><?=$value->status?></td>
                <td><a href="<?=base_url()?>dapur/detail-belanja/<?=$value->id_belanja?>"><strong><i class="material-icons">keyboard_arrow_right</i></strong></a></td>
                </tr>
            <?php $no++; endforeach; }?>
            </tbody>
        </table>
    </div>                         
</div>
<br>
