<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    switch ($action) {
        case 'create':
            $product_name = $_POST['product_name'];
            $product_description = $_POST['product_description'];
            $product_price = $_POST['product_price'];
            $expiry_date = $_POST['expiry_date'];
            $stmt = $conn->prepare("INSERT INTO products (product_name, product_description, product_price, expiry_date) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssds", $product_name, $product_description, $product_price, $expiry_date);
            // Execute the statement
            if ($stmt->execute()) {
                echo "Product created successfully";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
            break;

        case 'read':
            $sql = "SELECT * FROM products ORDER BY id desc";
            $result = $conn->query($sql);
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode($data);
            break;

        case 'update':
            $id = $_POST['id'];
            $product_name = $_POST['product_name'];
            $product_description = $_POST['product_description'];
            $product_price = $_POST['product_price'];
            $expiry_date = $_POST['expiry_date'];
            $sql = "UPDATE products SET product_name='$product_name', product_description='$product_description', product_price='$product_price', expiry_date='$expiry_date' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "Product updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            break;

        case 'delete':
            $id = $_POST['id'];
            $sql = "DELETE FROM products WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "Product deleted successfully";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            break;
    }
}
?>
