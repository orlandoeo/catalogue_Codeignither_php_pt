<html>
<head>
    <title>CATALOGUE</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div class="container">
        <br />
        <h3 align="center">CRUD product</h3>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title">CRUD product</h3>
                    </div>
                    <div class="col-md-6" align="right">
                        <button type="button" id="add_button" class="btn btn-info btn-xs">Add Product</button>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <span id="success_message"></span>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id Product</th>
                            <th>Product Name</th>
                            <th>Description</th>
							<th>Weight</th>
							<th>Price</th>
							<th>Categorie</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<div id="productModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="product_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Product</h4>
                </div>
                <div class="modal-body">
                    <label>Enter Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="form-control" />
                    <span id="product_name_error" class="text-danger"></span>
                    <br />
                    <label>Enter Description</label>
                    <input type="text" name="description" id="description" class="form-control" />
                    <span id="desription_error" class="text-danger"></span>
                    <br />
                    <label>Enter Weight</label>
                    <input type="number" name="weight" id="weight" min="1" class="form-control" />
                    <span id="weight_error" class="text-danger"></span>
					<br />
					<label>Enter Price</label>
                    <input type="number" name="price" id="price" min="1" class="form-control" />
                    <span id="price_error" class="text-danger"></span>
					<br />
					<label>Enter Category</label>
                    <input type="number" name="category" id="category" min="1" class="form-control" />
                    <span id="categorie_error" class="text-danger"></span>
                    <br />
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="product_id" id="product_id" />
                    <input type="hidden" name="data_action" id="data_action" value="Insert" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
    
    function fetch_data()
    {
        $.ajax({
            url:"<?php echo base_url(); ?>product_api/action",
            method:"POST",
            data:{data_action:'fetch_all'},
            success:function(data)
            {
                $('tbody').html(data);
            }
        });
    }

    fetch_data();

    $('#add_button').click(function(){
        $('#product_form')[0].reset();
        $('.modal-title').text("Add Product");
        $('#action').val('Add');
        $('#data_action').val("Insert");
        $('#productModal').modal('show');
    });

    $(document).on('submit','#product_form',function(event){
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url().'product_api/action'?>",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
                if(data.success)
                {
                    $('#product_form')[0].reset();
                    $('#productModal').modal('hide');
                    fetch_data();
                    if($('#data_action').val() == "Insert")
                    {
                        $('#success_message').html('<div class="alert alert-success">Product Inserted</div>');
                    }
                }

                if(data.error)
                {
                    $('#product_name_error').html(data.product_name_error);
                    $('desription_error').html(data.desription_error);
        			$('weight_error').html(data.weight_error);
					$('price_error').html(data.price_error);
        			$('categorie_error').html(data.categorie_error);
                }
            }
        })
    });

    $(document).on('click', '.edit', function(){
        var product_id = $(this).attr('id');
        $.ajax({
            url:"<?php echo base_url(); ?>product_api/action",
            method:"POST",
            data:{product_id:product_id, data_action:'fetch_single'},
            dataType:"json",
            success:function(data)
            {
                $('#productModal').modal('show');
                $('#product_name').val(data.product_name);
                $('#description').val(data.description);
                $('#weight').val(data.weight);
				$('#price').val(data.price);
				$('#category').val(data.category);
                $('.modal-title').text('Edit Product');
                $('#product_id').val(product_id);
                $('#action').val('Edit');
                $('#data_action').val('Edit');
            }
        })
    });

    $(document).on('click','.delete',function(){
        var product_id = $(this).attr('id');
        if(confirm("Are you sure you want to delete this product?"))
        {
            $.ajax({
                url:"<?php echo base_url(); ?>product_api/action",
                method:"POST",
                data:{product_id:product_id, data_action:'Delete'},
                dataType:"JSON",
                success:function(data)
                {
                    if(data.success)
                    {
                        $('#success_message').html('<div class="alert alert-success">Product Deleted</div>');
                        fetch_data();
                    }
                }
            })
        }
    });
    
});
</script>
