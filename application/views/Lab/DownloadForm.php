<div class="container">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Download Teaching Material</h4>
			</div>
			<div class="modal-body">
				<form action="DoUpload" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-6">
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>課程名稱</th>
										<th>上課日期</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($course_files as $index => $course) : ?>
										<tr id="motherBtn<?=$index?>">
											<th><?=$index+1?></th>
											<th><?=$course['Title']?></th>
											<th><?=$course['Time']?><span class="badge" style="float:right"><?=count($course['Files'])?></span></th>
										</tr>
									<?php endforeach ; ?>
								</tbody>
							</table>
						</div>
						<div class="col-lg-6">
							<?php foreach($course_files as $index => $course) : ?>
								<div id="childPanel<?=$index?>" class="panel panel-default" style="display:none">
									<div class="panel-heading">
										<h3 class="panel-title"><?=$course['Title']?></h3>
									</div>
									<div class="panel-body list-group">
										<?php foreach ($course['Files'] as $key => $file) : ?>
											<li class="list-group-item">
												<a href="http://localhost:9101/download.php?f=<?=$file['Name']?>"><?=$file['Name']?></a>
											</li>
										<?php endforeach ;?>
									</div>
								</div>
							<?php endforeach ;?>
						</div>
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-default" data-dismiss="modal">Clear</button>
						<button type="submit" class="btn btn-primary">Download</button>
					</div>
				</form>
			</div><!-- /.modal-body -->
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
