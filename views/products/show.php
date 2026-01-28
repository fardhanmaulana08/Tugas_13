<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Product Details</h1>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo $product->name; ?></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Description:</h6>
                        <p><?php echo $product->description; ?></p>
                    </div>
                    <div class="col-md-6">
                        <h6>Price:</h6>
                        <p class="h4 text-success">Rp<?php echo number_format($product->price, 0, ',', '.'); ?></p>
                        <h6>Created At:</h6>
                        <p><?php echo $product->created_at; ?></p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="index.php?action=edit&id=<?php echo $product->id; ?>" class="btn btn-warning">Edit Product</a>
                <a href="index.php?action=delete&id=<?php echo $product->id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete Product</a>
                <a href="index.php" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
