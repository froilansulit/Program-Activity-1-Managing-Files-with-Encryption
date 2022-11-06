<div class="container mt-5">
    <div class="mx-auto col-md-6">
        <div class="card">
            <div class="card-header text-center">
                <h4>Filename: <?= $filename ?></h1>
            </div>
            <div class="card-body text-center">
                <div class="form-group pl-md-2">
                    <a href="<?= base_url('file_storage/'.$filename) ?>" class="btn btn-dark btn-block" download><i class="bi bi-download"></i> Download</a>
                    
                    <!-- <input type="submit" class="btn btn-primary btn-block px-5" value="Save" name="file_save"> -->
                </div>
                <div class="form-group">
                    <a href="<?= base_url('files') ?>" class="btn btn-outline-dark btn-block px-5 ml-1"><i class="bi bi-box-arrow-left"></i> Back to Main</a>

                    <!-- <a href="<?= base_url('files') ?>" class="btn btn-dark btn-block px-5 ">Back</a> -->
                </div>
            </div>
        </div>
    </div>
</div>