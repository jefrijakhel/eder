<div class="row" style="margin-top:10px;">
    <div class="col-md-12 text-uppercase">
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>dapur/belanja" style="float:left"><strong><i class="material-icons">keyboard_arrow_left</i></strong></a>
        <center><h1>List Bahan Baku</h1></center>
    </div>
    <br><br>
    <div class="col-md-12">
        <br><br>
        <form method="post" action="<?=base_url()?>dapur/post-belanja">
        <div class="row form-group">
            <div class="col-md-10 col-sm-6">
                <input type="text" class="form-control" name="deskripsi" placeholder="ex: Belanja Minggu 1 januari 2019">
            </div>
            <div class="col-md-2 col-sm-2">
                <button type="submit" class="btn btn-primary" onclick="window.location='<?=base_url()?>manager/tambah-penggajian'">Submit</button>
            </div>
        </div>
        <div class="table-responsive">
        <table class="table text-center">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Bahan Baku</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Satuan</th>
                    <th scope="col" class="text-right">Jumlah Belanja</th>
                    <th scope="col"></th>
                    <th scope="col" class="text-right">Harga Kisaran</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no=1;
                        foreach($bahanbaku as $key=>$value):
                        
                    ?>
                    <tr>
                    <th scope="row"><?=$no?></th>
                    <td><?=$value->nama_bahan_baku?><input type="hidden" name="id_bahan_baku[]" value="<?=$value->id_bahan_baku?>"></td>
                    <td><?=$value->jumlah?></td>
                    <td><?=$value->satuan?></td>
                    <td class="text-right"><input type="number" class="text-right" name="jumlahbelanja[]" value="0"></td>
                    <td class="text-left"><?=$value->satuan?></td>
                    <td class="text-right"><input type="number" class="text-right" name="hargakisaran[]" value="0"></td>
                    <td class="text-left">/<?=$value->satuan?></td>
                    </tr>
                    <?php 
                        $no++;
                        endforeach;?>
                </tbody>
            </table>
        </div>
        </form>
    </<table>                    
</div>
<br>
