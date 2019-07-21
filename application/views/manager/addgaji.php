<div class="row" style="margin-top:10px;">
    <div class="col-md-12 text-uppercase">
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>manager/gaji" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        <center><h1>List Karyawan</h1></center>
    </div>
    <br><br>
    <div class="col-md-12">
        <br><br>
        <form method="post" action="<?=base_url()?>manager/post-gaji">
        <div class="table-responsive">
            <table class="table text-center">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Posisi</th>
                    <th scope="col">Gaji</th>
                    <th scope="col">Punishment</th>
                    <th scope="col">Detail Punishment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no=1;
                        foreach($employee as $key=>$value):
                        $posisi = Posisi::where('id_posisi',$value->posisi)->get();
                    ?>
                    <tr>
                    <th scope="row"><?=$no?></th>
                    <td><?=$value->nama?><input type="hidden" name="id_employee[]" value="<?=$value->id_employee?>"></td>
                    <td><?=$posisi[0]['nama_posisi']?></td>
                    <td>Rp. <?=number_format($posisi[0]['gaji'],0)?></td>
                    <td><input type="number" class="text-right" name="punishment[]" value="0">
                    <input type="hidden" class="text-right" name="gaji[]" value="<?=$posisi[0]['gaji']?>"></td>
                    <td><input type="text" name="detail_punishment[]"></td>
                    </tr>
                    <?php 
                        $no++;
                        endforeach;?>
                </tbody>
            </table>
        </div>
        <div class="row form-group">
            <input type="text" class="form-control col-md-10 col-sm-6" name="deskripsi" placeholder="ex: Penggajian untuk bulan X">
            <button type="submit" class="btn btn-primary col-md-2 col-sm-2">Submit</button>
        </div>
        </form>
    </<table>                    
</div>
<br>
