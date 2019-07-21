<div class="row" style="margin-top:10px;">
    <div class="col-md-12 text-uppercase">
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>dapur/belanja" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        <center><h1>List Karyawan</h1></center>
    </div>
    <br><br>
    <div class="col-md-12">
        <br><br>
        <form method="post" action="<?=base_url()?>dapur/update-harga">
        <div class="table-responsive">
            <table class="table text-center">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Bahan Baku</th>
                    <th scope="col" class="text-right">Jumlah Belanja</th>
                    <th scope="col"></th>
                    <th scope="col" class="text-right">Harga Kisaran</th>
                    <th scope="col"></th>
                    <th scope="col" class="text-right">Harga Fix</th>
                    <th scope="col"></th>
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
                    <td><?=$bahanbaku[0]['nama_bahan_baku']?><input type="hidden" name="id_detail_belanja[]" value="<?=$value->id_detail_belanja?>"></td>
                    <td class="text-right"><?=$value->jumlah?><input type="hidden" name="jumlah[]" value="<?=$value->jumlah?>"></td>
                    <td class="text-left"><?=$bahanbaku[0]['satuan']?></td>
                    <td class="text-right">Rp. <?=number_format($value->harga_kisaran/$value->jumlah,0)?></td>
                    <td class="text-left">/<?=$bahanbaku[0]['satuan']?></td>
                    <td class="text-right"><input type="number" class="text-right" name="hargafix[]" value="0"></td>
                    <td class="text-left">/<?=$bahanbaku[0]['satuan']?></td>
                    </tr>
                    <?php 
                        $no++;
                        endforeach;?>
                </tbody>
            </table>
        </div>
        <input type="hidden" name="idbelanja" value="<?=$value->id_belanja?>">
        <button type="submit" class="btn btn-primary" style="float:right">Submit</button>
        </form>
    </<table>                    
</div>
<br>
