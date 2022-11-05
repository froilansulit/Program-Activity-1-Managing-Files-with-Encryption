<div class="container mt-5">
    <div class="mx-auto col-md-8">
        <?php if ($this->session->flashdata('status')):  ?>
                <div class="alert alert-success">
                    <?=$this->session->flashdata('status'); ?>
                </div>
        <?php endif ?>
        <div class="card">
        
            <div class="card-header">
                <h4>Insert Image - Product Data in CodeIgniter 3.x </h4>
                <a href="<?= base_url('products') ?>" class="btn btn-dark px-5">Back</a>
            </div>
            <div class="card-body">
                <form action="<?php base_url('products/add') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Product Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Product Name" value="<?= (isset($_POST['name'])) ? $_POST['name'] : "" ?>">
                        <small class="text-danger"><?php echo form_error('name') ?></small>
                    </div>
                    <div class="form-group">
                        <label>Product Description:</label>
                        <input type="text" name="description" class="form-control" placeholder="Enter Product Description" value="<?= (isset($_POST['description'])) ? $_POST['description'] : "" ?>">
                        <small class="text-danger"><?php echo form_error('description') ?></small>
                    </div>
                    <div class="form-group">
                        <label>Product Price:</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter Product Price" value="<?= (isset($_POST['price'])) ? $_POST['price'] : "" ?>">
                        <small class="text-danger"><?php echo form_error('price') ?></small>
                    </div>
                    <div class="form-group">
                        <label>Product Image: <small class="text-muted font-weight-bold">* ONLY JPG/PNG FILE IS ALLOWED</small></label>
                        <input type="file" name="product_image" class="form-control-file">
                        <small class="text-danger"><?php if (isset($imageError)) { echo $imageError; } ?></small>
                        <!-- <small class="text-danger"><?php echo form_error('product_image') ?></small> -->
                        
                    </div>
                    <div class="form-group float-right">
                        <input type="submit" class="btn btn-primary px-5" value="Save" name="product_save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
