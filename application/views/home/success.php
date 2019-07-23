<div class="container pt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Thank you</h1>
        </div><br><br><br><br>
        <div class="col-md-12">
            <center>
            <form method="post" action="<?=base_url()?>submit-feedback">
            <div class="form-group">
                    <label for="exampleInputEmail1">Bagaimana makanan di Kafe Elther?</label>
                    <input type="text" id="rating-input" name="q1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Bagaimana suasana di Kafe Elther?</label>
                    <input type="text" id="rating-input2" name="q2">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Bagaimana pelayanan di Kafe Elther?</label>
                    <input type="text" id="rating-input3" name="q3">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Komentar</label>
                    <input type="text" name="q4" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" onclick="window.location='<?=base_url()?>'" class="btn btn-primary">Skip</button>
            </form>
            </center>
        </div>
    </div>
</div>