<div class="container mt-5">
    <div class="mx-auto col-md-6">
        <?php if ($this->session->flashdata('error')) :  ?>
            <div class="alert alert-danger">
                <span class="font-weight-bold"><?= $this->session->flashdata('error'); ?></span>
            </div>
        <?php endif ?>
        <div class="card">
            <div class="card-header text-center">
                <h3>Access Verification</h1>
            </div>
            <div class="card-body">
                <!-- <h5>Do you want to open this file: <span class="text-primary"><?= $filename; ?></span></h5> -->
                <form action="<?= base_url('files/verify') ?>" method="post">
                    <input type="hidden" name="access_id" value="<?= $id; ?>">
                    <div class="form-group">
                        <input type="password" name="verify_key" class="form-control" placeholder="Please Enter Encryption Key">
                        <small class="text-danger font-weight-bold"><?= form_error('verify_key') ?></small>
                    </div>

                    <div class="mt-5">
                        <div class="form-group float-md-right pl-md-2">
                            <input type="submit" class="btn btn-dark btn-block px-5" value="Verify" name="file_save">
                            <!-- <input type="submit"  class="btn btn-dark px-5"> -->
                        </div>
                        <div class="form-group float-md-right">
                            <a href="<?= base_url('files') ?>" class="btn btn-outline-dark btn-block px-5">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>