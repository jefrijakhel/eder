<div class="row" style="margin-top:10px;">
    <div class="col-md-12 text-uppercase">
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>manager/gaji" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        <center><h1>Detail Penggajian</h1></center>
    </div>
    <br><br>
    <div class="col-md-12">
        <br><br>
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
                    <th scope="col">Gaji Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no=1;
                        foreach($detailpenggajian as $key=>$value):
                        $employee = Employee::where('id_employee',$value->id_employee)->get();
                        $posisi = Posisi::where('id_posisi',$employee[0]['posisi'])->get();
                    ?>
                    <tr>
                    <th scope="row"><?=$no?></th>
                    <td><?=$employee[0]['nama']?></td>
                    <td><?=$posisi[0]['nama_posisi']?></td>
                    <td>Rp. <?=number_format($posisi[0]['gaji'],0)?></td>
                    <td>Rp. <?=number_format($value->punishment,0)?></td>
                    <td><?=$value->detail_punishment?></td>
                    <td>Rp. <?=number_format($value->total_gaji,0)?></td>
                    </tr>
                    <?php 
                        $no++;
                        endforeach;?>
                </tbody>
            </table>
        </div>
    <table>                    
</div>
<br>
