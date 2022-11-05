<div class="container mt-5">
    <div class="mx-auto col-md-6">
        <div class="card">
            <div class="card-header text-center">
                <h4>Filename: <?= $filename ?></h1>
            </div>
            <div class="card-body text-center">
                <a href="<?= base_url('file_storage/'.$filename) ?>" class="btn btn-dark" download><i class="bi bi-download"></i> Download</a>
                <a href="<?= base_url('files') ?>" class="btn btn-outline-dark px-5 ml-1"><i class="bi bi-box-arrow-left"></i> Back to Main</a>
            </div>
        </div>
    </div>
</div>