<div class="row" style="margin-top:10px;">
    <div class="col-md-12 text-uppercase">
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>employee/manager" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        <center><h1>Penggajian</h1></center>
    </div>
    <br><br>
    <div class="col-md-12 text-uppercase" >
        <button class="btn btn-primary" onclick="window.location='<?=base_url()?>manager/tambah-penggajian'">+ Tambah Penggajian</button>
        <br><br>
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Jumlah</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1;foreach($pengeluaran as $key=>$value): ?>
                <tr>
                <th scope="row"><?=$no?></th>
                <td><?=$value->deskripsi?></td>
                <td>Rp. <?=number_format($value->jumlah,0)?></td>
                <td><a href="<?=base_url()?>manager/gaji/detail/<?=$value->id_pengeluaran?>"><strong><i class="material-icons">keyboard_arrow_right</i></strong></a></td>
                </tr>
            <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>                    
</div>
<br>
