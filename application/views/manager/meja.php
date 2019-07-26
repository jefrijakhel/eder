<div class="row" style="margin-top:10px;">
    <div class="col-md-12 text-uppercase">
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>employee/manager" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        <center><h1>Meja</h1></center>
    </div>
    <br><br>
    <div class="col-md-12" >
        <button class="btn btn-primary" onclick="window.location='<?=base_url()?>manage-meja/add'">+ Tambah Meja</button>
        <br><br>
        <table id="example" class="table" width="100%">
            <thead class="thead-light">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Meja</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1;foreach($menu as $key=>$value): ?>
                <tr>
                <th scope="row"><?=$no?></th>
                <td><?=$value->no_meja?></td>
                <td><?=$value->username?></td>
                <td><?=$value->password?></td>
                <td>
                    <a href="<?=base_url()?>manage-meja/update/<?=$value->id_meja?>"><strong><i class="material-icons">create</i></strong></a>
                    <a href="<?=base_url()?>manage-meja/delete/<?=$value->id_meja?>" onclick="confirm('Are you sure?')"><strong><i class="material-icons">delete_sweep</i></strong></a>
                </td>
                </tr>
            <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>                    
</div>
<br>
