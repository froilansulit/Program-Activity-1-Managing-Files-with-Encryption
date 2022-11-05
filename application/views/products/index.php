<div class="container-fluid mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Image CRUD - Codeigniter 3.x <a href="<?= base_url('products/add') ?>" class="btn btn-dark px-5 float-right">Add New</a></h4>
        </div>
        <div class="card-body text-center">
            <table class="table table-bordered table table-striped table-responsive-lg">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Download</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $item): ?>
                    <tr>
                        <th scope="row"><?= $item->id; ?></th>
                        <td>
                            <img src="<?= base_url('images/'.$item->product_image) ?>" alt="Product Image" height="50px" width="50px">
                        </td>
                        <td><?= $item->name; ?></td>
                        <td><?= $item->description; ?></td>
                        <td><?= $item->price; ?></td>
                        <td>
                            <a href="<?= base_url('images/'.$item->product_image) ?>" class="btn btn-dark" download="<?= "Product Image(".time().")"; ?>"><i class="bi bi-download"></i></a>
                        </td>
                        <td>
                            <a href="<?= base_url('products/edit/'.$item->id) ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                        </td>
                        <td>
                            <a href="<?= base_url('products/delete/'.$item->id) ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>