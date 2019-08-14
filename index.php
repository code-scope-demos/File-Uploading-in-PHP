<!DOCTYPE html>
<html>
<head>
	<title>Codescope</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.css">
</head>
<body>
	<div class="container py-5" style="max-width: 500px;">
	<div class="card">
		
		<form method="post" action="#" enctype="multipart/form-data">  	
		<div class="card-body">
	    
	    <h5 class="card-title">Upload your file</h5>
	    	
    	<div class="custom-file custom-file-sm">
		<input type="file" class="custom-file-input" name="fileInput" id="customFile">
		<label class="custom-file-label" id="custom-file-label" for="customFile">Choose file</label>
		</div>

		</div>

		<div class="card-footer">
		<button href="#" type="submit" class="card-link btn btn-primary btn-sm">Upload</button>
		</div>
		</form>
	
	</div>
	<div class="py-2">
	<?php 

	if ($_FILES) {

		$allowedExtensions = array('png','jpeg');
		$fileName = $_FILES['fileInput']['name'];
		$fileExtension = explode('.', $fileName);
		$fileExtension = end($fileExtension);
	
	

	        if (in_array($fileExtension, $allowedExtensions)) {

	        $target_path = "uploads/";
	        $target_path = $target_path . basename( $_FILES['fileInput']['name']); 

	        if(move_uploaded_file($_FILES['fileInput']['tmp_name'], $target_path)) {

	            echo "<div class='alert alert-success'>".basename($_FILES['fileInput']['name'])." uploaded.</div>";
	            echo "<div class='py-2'> 
	            		<label>Preview</label>
	            		<img class='img-fluid' src='".$target_path."' /> </div>";
	        
	        } else{

	            echo "<div class='alert alert-danger'>Internal Error. <b>Try later</b></div>";

	        }

	        } else {

	            echo "<div class='alert alert-danger'>This not an <b>PNG</b> or <b>JPEG</b> file.</div>";

	        }

	    }

	 ?>
	</div>
	</div>

	<script type="text/javascript">

	document.querySelector('.custom-file-input').addEventListener("change",function(event) {
	var file = event.target.files[0];	
	document.querySelector('.custom-file-input + .custom-file-label').innerHTML = file.name;
	});

	</script>
</body>
</html>