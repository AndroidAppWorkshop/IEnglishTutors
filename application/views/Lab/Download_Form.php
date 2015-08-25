<div class="container">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Download Teaching Material</h4>
			</div>
			<div class="modal-body">
				<form action="DoUpload" method="post" enctype="multipart/form-data">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>課堂名稱</th>
								<th>上課日期</th>
							</tr>
						</thead>
						<tbody>

							<tr data-toggle="collapse" role="tab">
								<th>1</th>
								<th>0802 TOEIC</th>
								<th>2015-08-02</th>
							</tr>

<?php
foreach ($course_files as $key => $course )
{
	// print_r($file['Title']);
	// echo '<BR>';
	$now = $key;
	$files = '';

	foreach ($course['Files'] as $key => $file)
	{
		// print_r($file);
		// echo '<BR>';
		$files = $files.$file['Name'].'<BR>';
	}

	$panel_body = '<div id="collapse'.$now.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$now.'">
						<div class="panel-body">
							'.$files.'
						</div>
					</div>';
	$panel_heading = '<div class="panel-heading" role="tab" id="heading'.$now.'">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$now.'" aria-expanded="true" aria-controls="collapse'.$now.'">
							'.$course['Title'].'
							</a>
						</h4>
					</div>';

	$main_panel = '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							'.$panel_heading.$panel_body.'
						</div>
					</div>';
	echo $main_panel;
}
?>

						</tbody>
					</table>
					<div class="modal-footer">
						<button type="reset" class="btn btn-default" data-dismiss="modal">Clear</button>
						<button type="submit" class="btn btn-primary">Download</button>
					</div>
				</form>
			</div><!-- /.modal-body -->
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>



