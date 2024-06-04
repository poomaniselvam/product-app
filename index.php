<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Product Application</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="form-div">
            <form style="    padding: 40px 300px;background: #7faed7;border-radius: 8px;margin-top: 50px;"  id="userForm">
        <h4 style="width:100%;text-align:center;padding:10px 0;">Add Product</h4>
                <input type="hidden" id="user_id">
                <div class="form-group">
                    <label for="product name">Product Name</label>
                    <input type="text" class="form-control" id="product_name" required>
                </div>  
                <div class="form-group">
                    <label for="product description">Product description</label>
                    <input type="text" class="form-control" id="product_description" required>
                </div>
                <div class="form-group">
                    <label for="product price">Product price</label>
                    <input type="text" class="form-control" id="product_price" required>
                </div>
                <div class="form-group">
                    <label for="expiry date">Expiry date</label>
                    <input type="date" class="form-control" id="expiry_date" required>
                </div>
                <button style="width: 120px;text-align: center;margin-left: 175px;margin-top: 20px;" type="submit" class="btn btn-primary" id="saveUser">Save</button>
            </form>
        </div>
        </div>
        <div class="col-md-12 mt-5">
            <h4>Products</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th> PRODUCT Name</th>
                        <th>PRODUCT DESCRIPTION</th>
                        <th>PRODUCT PRICE</th>
                        <th>EXPIRY DATE</th>
                        <th>Actions</th>
                    </tr>
                </thead> 
                <tbody id="userTable"></tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
