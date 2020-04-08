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


