$(document).ready(function() {
    // Fetch users
    fetchUsers(); 

    // Save user
    $('#userForm').on('submit', function(e) {
        e.preventDefault();
        let id = $('#user_id').val();
        let product_name = $('#product_name').val();
        let product_description = $('#product_description').val();
        let product_price = $('#product_price').val();
        let expiry_date = $('#expiry_date').val();
        let action = id ? 'update' : 'create';
  
        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            data: { action: action, id: id, product_name: product_name, product_description: product_description, product_price: product_price, expiry_date: expiry_date },
            success: function(response) {
                alert(response);
                $('#userForm')[0].reset();
                fetchUsers();
            }
        });
    });

    // Edit user
    $(document).on('click', '.editUser', function() {
        let id = $(this).data('id');
        let product_name = $(this).data('product_name');
        let product_description = $(this).data('product_description');
        let product_price = $(this).data('product_price');
        let expiry_date = $(this).data('expiry_date');
        $('#user_id').val(id);
        $('#product_name').val(product_name);
        $('#product_description').val(product_description);
        $('#product_price').val(product_price);
        $('#expiry_date').val(expiry_date);
    });

    // Delete user
    $(document).on('click', '.deleteUser', function() {
        if (confirm('Are you sure to delete this record?')) {
            let id = $(this).data('id');
            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                data: { action: 'delete', id: id },
                success: function(response) {
                    alert(response);
                    fetchUsers();
                }
            });
        }
    });

// Fetch users function
    function fetchUsers() {
        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            data: { action: 'read' },
            success: function(response) {
                let users = JSON.parse(response);
                let html = '';
                $.each(users, function(index, user) {
                    html += '<tr>';
                    html += '<td>' + user.id + '</td>';
                    html += '<td>' + user.product_name + '</td>';
                    html += '<td>' + user.product_description + '</td>';
                    html += '<td>' + user.product_price + '</td>';
                    html += '<td>' + user.expiry_date + '</td>';
                    html += '<td>';
                    html += '<a class="editUser" data-id="' + user.id + '" data-product_name="' + user.product_name + '" data-product_description="' + user.product_description + '" data-product_price="'+user.product_price + '" data-expiry_date="'+user.expiry_date +'"><i class="fas fa-edit"></i></a> ';
                    html += '<a class="deleteUser" data-id="' + user.id + '"><i class="fas fa-trash-alt"></i></a>';
                    html += '</td>';
                    html += '</tr>';
                });
                $('#userTable').html(html);
            }
        });
    }
});
