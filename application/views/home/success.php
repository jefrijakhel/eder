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
                    <select class="form-control" name="q1">
                    <option value="1">&#xf005;</option>
                    <option value="2">&#xf005;&#xf005;</option>
                    <option value="3">&#xf005;&#xf005;&#xf005;</option>
                    <option value="4">&#xf005;&#xf005;&#xf005;&#xf005;</option>
                    <option value="5">&#xf005;&#xf005;&#xf005;&#xf005;&#xf005;</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Bagaimana suasana di Kafe Elther?</label>
                    <select class="form-control" name="q2">
                    <option value="1">&#xf005;</option>
                    <option value="2">&#xf005;&#xf005;</option>
                    <option value="3">&#xf005;&#xf005;&#xf005;</option>
                    <option value="4">&#xf005;&#xf005;&#xf005;&#xf005;</option>
                    <option value="5">&#xf005;&#xf005;&#xf005;&#xf005;&#xf005;</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Bagaimana pelayanan di Kafe Elther?</label>
                    <select class="form-control" name="q3">
                    <option value="1">&#xf005;</option>
                    <option value="2">&#xf005;&#xf005;</option>
                    <option value="3">&#xf005;&#xf005;&#xf005;</option>
                    <option value="4">&#xf005;&#xf005;&#xf005;&#xf005;</option>
                    <option value="5">&#xf005;&#xf005;&#xf005;&#xf005;&#xf005;</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" onclick="window.location='<?=base_url()?>'" class="btn btn-primary">Skip</button>
            </form>
            </center>
        </div>
    </div>
</div>