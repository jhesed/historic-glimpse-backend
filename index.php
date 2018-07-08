<?php
// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    // should do a check here to match $_SERVER['HTTP_ORIGIN'] to a
    // whitelist of safe domains
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}
// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");         

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Historical Glimpse Manager</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

	<script type="text/javascript">
    	var url = "http://localhost/cms-glimpse/";
    </script>
    <style type="text/css">
    	.modal-dialog, .modal-content{
		z-index:1051;
		}
    </style>

    <script src="js/item-ajax.js"></script>
</head>

<body>

	<div class="container">
		<div class="row">
		    <div class="col-lg-12 margin-tb">					
		        <div class="pull-left">
		            <h2>Historical Glimpse Manager</h2>
		        </div>
		        <div class="pull-right">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
					  Create Item
				</button>
		        </div>
		    </div>
		</div>

		<div class="panel panel-primary">
			  <div class="panel-heading">Item management</div>
			  <div class="panel-body">
				<table class="table table-bordered">
					<thead>
					    <tr>
						<th>Date</th>
						<th>Title</th>
						<th>Heading</th>
						<th>Content</th>
						<th>Prayer Focus</th>
						<th>Featured Verse</th>
						<th>Featured Quote</th>
						<th>Type</th>
						<th width="100px">Action</th>
					    </tr>
					</thead>
					<tbody>
					</tbody>
				</table>

		<ul id="pagination" class="pagination-sm"></ul>
			  </div>
	  </div>

	    <!-- Create Item Modal -->
		<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Create Item</h4>
		      </div>

		      <div class="modal-body">
		      		<form data-toggle="validator" action="api/create.php" method="POST">

		      				
		      			<div class="form-group">
							<label class="control-label" for="glimpse-date">Date:</label>
							<input type="text" name="glimpse-date" class="form-control" data-error="Please enter date." required />
							<div class="help-block with-errors"></div>
						</div>
		      				
		      			<div class="form-group">
							<label class="control-label" for="title">Title:</label>
							<input type="text" name="title" class="form-control" data-error="Please enter title." required />
							<div class="help-block with-errors"></div>
						</div>
		      				
		      			<div class="form-group">
							<label class="control-label" for="heading">Heading:</label>
							<input type="text" name="heading" class="form-control" data-error="Please enter heading." required />
							<div class="help-block with-errors"></div>
						</div>
		      				
		      			<div class="form-group">
							<label class="control-label" for="content">Content:</label>
							<textarea name="content" class="form-control" data-error="Please enter content." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
		      				
		      			<div class="form-group">
							<label class="control-label" for="prayer-focus">Prayer Focus:</label>
							<textarea name="prayer-focus" class="form-control" data-error="Please enter prayer focus." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
		      				
		      			<div class="form-group">
							<label class="control-label" for="featured-verse">Featured Verse:</label>
							<textarea name="featured-verse" class="form-control" data-error="Please enter featured verse." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
		      				
		      			<div class="form-group">
							<label class="control-label" for="featured-quote">Featured Quote:</label>
							<textarea name="featured-quote" class="form-control" data-error="Please enter title." required></textarea>
							<div class="help-block with-errors"></div>
						</div>

		      			<div class="form-group">
							<label class="control-label" for="type">Type:</label>
							<input type="text" name="type" class="form-control" data-error="Please enter type." required />
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn crud-submit btn-success">Submit</button>
						</div>

		      		</form>

		      </div>
		    </div>

		  </div>
		</div>

		<!-- Edit Item Modal -->
	<!-- 	<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
		      </div>

		      <div class="modal-body">
		      		<form data-toggle="validator" action="api/update.php" method="put">
		      			<input type="hidden" name="id" class="edit-id">

		      	
		      			<div class="form-group">
							<label class="control-label" for="glimpse-date">Date:</label>
							<input type="text" name="glimpse-date" class="form-control" data-error="Please enter date." required />
							<div class="help-block with-errors"></div>
						</div>
		      				
		      			<div class="form-group">
							<label class="control-label" for="title">Title:</label>
							<input type="text" name="title" class="form-control" data-error="Please enter title." required />
							<div class="help-block with-errors"></div>
						</div>
		      				
		      			<div class="form-group">
							<label class="control-label" for="heading">Heading:</label>
							<input type="text" name="heading" class="form-control" data-error="Please enter heading." required />
							<div class="help-block with-errors"></div>
						</div>
		      				
		      			<div class="form-group">
							<label class="control-label" for="content">Content:</label>
							<textarea name="content" class="form-control" data-error="Please enter content." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
		      				
		      			<div class="form-group">
							<label class="control-label" for="prayer-focus">Prayer Focus:</label>
							<textarea name="prayer-focus" class="form-control" data-error="Please enter prayer focus." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
		      				
		      			<div class="form-group">
							<label class="control-label" for="featured-verse">Featured Verse:</label>
							<textarea name="featured-verse" class="form-control" data-error="Please enter featured verse." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
		      				
		      			<div class="form-group">
							<label class="control-label" for="featured-quote">Featured Quote:</label>
							<textarea name="featured-quote" class="form-control" data-error="Please enter title." required></textarea>
							<div class="help-block with-errors"></div>
						</div>

		      			<div class="form-group">
							<label class="control-label" for="type">Type:</label>
							<input type="text" name="type" class="form-control" data-error="Please enter type." required />
							<div class="help-block with-errors"></div>
						</div>

                       <div class="form-group">
                       		<button type="submit" class="btn btn-success crud-submit-edit">Submit</button>
                       </div>


		      		</form>

		      </div>
		    </div>
		  </div>
		</div> -->

	</div>
</body>
</html>