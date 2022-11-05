<div class="container mt-5">
    <div class="mx-auto col-md-8">
        
        <div class="card">
            <div class="card-header">
                <h4>File Exlorer with Encryption </h4>
            </div>
            <div class="card-body">
                <form action="<?php base_url('files/add') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Encryption key:</label>
                        <input type="password" name="encryption_key" class="form-control" placeholder="Enter Encryption Key" value="<?= (isset($_POST['encryption_key'])) ? $_POST['encryption_key'] : "" ?>">
                        <small class="text-danger font-weight-bold"><?= form_error('encryption_key') ?></small>
                    </div>
                    <div class="form-group">
                        <label>Confirm Encryption key:</label>
                        <input type="password" name="confirm_encryption" class="form-control" placeholder="Repeat Encryption Key" value="<?= (isset($_POST['confirm_encryption'])) ? $_POST['confirm_encryption'] : "" ?>">
                        <small class="text-danger font-weight-bold"><?= form_error('confirm_encryption') ?></small>
                    </div>
                    
                    <div class="form-group">
                        <label>Upload File: <small class="text-muted font-weight-bold">Choose and upload a file that's not more than 2MB</small></label>
                        <input type="file" name="file_data" class="form-control-file" accept="image/*, .txt, .pdf">
                        <small class="text-danger font-weight-bold"><?= (isset($fileError)) ? $fileError :"";?></small>
                        
                    </div>

                    <div class="form-group float-right mt-4">
                        <input type="submit" class="btn btn-primary px-5" value="Save" name="file_save">
                        <a href="<?= base_url('files') ?>" class="btn btn-dark px-5 ml-1 ">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>