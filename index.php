<?php
require_once 'models/Product.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$product = new Product();

switch ($action) {
    case 'index':
        try {
            $stmt = $product->read();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $products = [];
        }
        include 'views/products/index.php';
        break;

    case 'show':
        $product->id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
        $product->readOne();
        $product_show = [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'created_at' => $product->created_at
        ];
        include 'views/products/show.php';
        break;

    case 'create':
        include 'views/products/create.php';
        break;

    case 'store':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product->name = $_POST['name'];
            $product->description = $_POST['description'];
            $product->price = $_POST['price'];

            if ($product->create()) {
                header('Location: index.php?message=Product created successfully.');
            } else {
                header('Location: index.php?message=Unable to create product.');
            }
        }
        break;

    case 'edit':
        $product->id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
        $product->readOne();
        $product_data = [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price
        ];
        include 'views/products/edit.php';
        break;

    case 'update':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product->id = $_GET['id'];
            $product->name = $_POST['name'];
            $product->description = $_POST['description'];
            $product->price = $_POST['price'];

            if ($product->update()) {
                header('Location: index.php?message=Product updated successfully.');
            } else {
                header('Location: index.php?message=Unable to update product.');
            }
        }
        break;

    case 'delete':
        $product->id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

        if ($product->delete()) {
            header('Location: index.php?message=Product deleted successfully.');
        } else {
            header('Location: index.php?message=Unable to delete product.');
        }
        break;

    default:
        include 'views/products/index.php';
        break;
}
