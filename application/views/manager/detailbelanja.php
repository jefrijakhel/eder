<div class="row" style="margin-top:10px;">
    <div class="col-md-12 text-uppercase">
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>manager/list-belanja" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        <center><h1>Detail Belanja</h1></center>
    </div>
    <br><br>
    <div class="col-md-12">
        <br><br>
        <div class="table-responsive">
            <table class="table text-center">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Bahan Baku</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Harga Kisaran</th>
                    <th scope="col">Harga Fix</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no=1;
                        foreach($detailbelanja as $key=>$value):
                        $bahanbaku = Bahanbaku::where('id_bahan_baku',$value->id_bahan_baku)->get();
                    ?>
                    <tr>
                    <th scope="row"><?=$no?></th>
                    <td><?=$bahanbaku[0]['nama_bahan_baku']?></td>
                    <td><?=$value->jumlah?></td>
                    <td><?=$bahanbaku[0]['satuan']?></td>
                    <td>Rp. <?=number_format($value->harga_kisaran,0)?></td>
                    <td>Rp. <?=number_format($value->harga_fix,0)?></td>
                    </tr>
                    <?php 
                        $no++;
                        endforeach;?>
                </tbody>
            </table>
            <button class="btn btn-primary" onclick="window.location='<?=base_url()?>manager/approvebelanja/<?=$idbelanja?>'" style="float:right">Setujui</button>
        </div>
    <table>                    
</div>
<br>
