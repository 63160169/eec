

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- fileuploader -->
<link href="../dist/js/fileuploader/jquery.fileuploader.css" rel="stylesheet" type="text/css" />	
<script src="../dist/js/fileuploader/jquery.fileuploader.min.js"  type="text/javascript"></script>





<!-- Fileuploader script ---------------------------------- -->
<script type="text/javascript">
$(document).ready(function() {						
	// enable fileuploader plugin
	$('input[name="files"]').fileuploader({
		addMore: true,
		maxSize: 5,	//ขนาดต่อไฟล์ MB
		fileMaxSize: 20,	//ขนาดไฟล์รวม MB
	});
	
});
</script>
<!-- Fileuploader script ---------------------------------- -->



<form data-toggle="validator" role="form" Action="../php/uploader2.php" Method="Post" enctype="multipart/form-data">
	<input type="file" name="files">	
	<button type="submit" class="btn btn-primary">Submit</button>
</form>