<div class="row" style="margin-top:10px;">
    <div class="col-md-12 text-uppercase">
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>employee/manager" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        <center><h1>Menu</h1></center>
    </div>
    <br><br>
    <div class="col-md-12" >
        <button class="btn btn-primary" onclick="window.location='<?=base_url()?>manage-menu/add'">+ Tambah Menu</button>
        <br><br>
        <table id="example" class="table" width="100%">
            <thead class="thead-light">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Jenis</th>
                <th scope="col">Harga</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1;foreach($menu as $key=>$value): ?>
                <tr>
                <th scope="row"><?=$no?></th>
                <td><?=$value->nama_menu?></td>
                <td><?=$value->deskripsi_menu?></td>
                <td><?=$value->jenis_menu?></td>
                <td>Rp. <?=number_format($value->harga_menu,0)?></td>
                <td>
                    <a href="<?=base_url()?>manage-menu/update/<?=$value->id_menu?>"><strong><i class="material-icons">create</i></strong></a>
                    <a href="<?=base_url()?>manage-menu/delete/<?=$value->id_menu?>" onclick="confirm('Are you sure?')"><strong><i class="material-icons">delete_sweep</i></strong></a>
                </td>
                </tr>
            <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>                    
</div>
<br>
