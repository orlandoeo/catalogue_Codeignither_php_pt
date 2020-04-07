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
        <h3 align="center">Pagination category</h3>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title">Pagination Category</h3>
                    </div>
            
                </div>
            </div>
            <div class="panel-body">
				<span id="success_message"></span>
					<table id="category" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Category Name</th>
							</tr>
						</thead>
						<tbody>
						
						</tbody>
						<?php foreach ($consulta->result() as $row) {?>
							<tr>
								<td><?php echo $row->id_category;?></td>
								<td><?php echo $row->name;?></td>
							</tr>
						<?php } ?>	
			</div>
			
					</table>	
					<div class="text-center">
				<?php echo $this->pagination->create_links(); ?>
        	</div>					
			</div>
			
    </div>

</body>
</html>

<div id="categoryModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="category_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Category</h4>
                </div>
                <div class="modal-body">
                    <label>Enter Category Name</label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <span id="name_error" class="text-danger"></span>
                    <br />
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="category_id" id="category_id" />
                    <input type="hidden" name="data_action" id="data_action" value="Insert" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

