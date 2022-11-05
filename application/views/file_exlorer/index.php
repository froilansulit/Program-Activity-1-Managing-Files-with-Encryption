<div class="container mt-5">
    <div class="col-md-6 mx-auto">
        <?php if ($this->session->flashdata('status')) :  ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('status'); ?>
            </div>
        <?php endif ?>
        <div class="card">
            <div class="card-header">
                <h4>File Exlorer <a href="<?= base_url('files/add') ?>" class="btn btn-dark px-3 float-right"><i class="bi bi-file-earmark-plus"></i> Add New File</a></h4>
            </div>
            <div class="card-body text-center">
                <table class="table table-bordered table table-striped table-responsive-lg">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Filename</th>
                            <th scope="col">Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($files as $item) : ?>
                            <tr>
                                <th scope="row"><?= $item->filename; ?></th>
                                <td>
                                     <a href="<?= base_url('files/access/'.$item->id) ?>" class="btn btn-success"><i class="bi bi-key"></i> Access</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>