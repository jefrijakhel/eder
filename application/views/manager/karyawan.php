<div class="row" style="margin-top:10px;">
    <div class="col-md-12 text-uppercase">
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>employee/manager" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        <center><h1>Karyawan</h1></center>
    </div>
    <br><br>
    <div class="col-md-12" >
        <button class="btn btn-primary" onclick="window.location='<?=base_url()?>manage-karyawan/add'">+ Tambah Karyawan</button>
        <br><br>
        <table id="example" class="table" width="100%">
            <thead class="thead-light">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Posisi</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1;foreach($employee as $key=>$value): 
                $posisi = Posisi::where('id_posisi',$value->posisi)->get();
                ?>
                <tr>
                <th scope="row"><?=$no?></th>
                <td><?=$value->nama?></td>
                <td><?=$posisi[0]['nama_posisi']?></td>
                <td>
                    <a href="<?=base_url()?>manage-karyawan/update/<?=$value->id_employee?>"><strong><i class="material-icons">create</i></strong></a>
                    <a href="<?=base_url()?>manage-karyawan/delete/<?=$value->id_employee?>" onclick="confirm('Are you sure?')"><strong><i class="material-icons">delete_sweep</i></strong></a>
                </td>
                </tr>
            <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>                    
</div>
<br>
