<div class="container">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Upload Teaching Material</h4>
			</div>
			<div class="modal-body">
				<form action="DoUpload" method="post" enctype="multipart/form-data">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="row">
								<div class="col-lg-6">課堂名稱</div>
								<div class="col-lg-6">上課日期</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-6">
									<input type="text" 
											class="form-control" 
											name="TM_title" 
											placeholder="請輸入教材名稱"
											required="required">
								</div>
								<div class="col-lg-6">	
										<input type="date" 
												class="form-control" 
												name="TM_time" 
												placeholder="日期" 
												required="required">
								</div>
							</div>
						</div>
					</div>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>上傳路徑</th>
							</tr>
						</thead>
						<tbody >
							<tr>
								<th>1</th>
								<td><input type="file" name="File1" required="required"></td>
							</tr>
							<tr>
								<th>2</th>
								<td><input type="file" name="File2"></td>
							</tr>
							<tr>
								<th>3</th>
								<td><input type="file" name="File3"></td>
							</tr>
						</tbody>
					</table>
					<div class="modal-footer">
						<button type="reset" class="btn btn-default" data-dismiss="modal">Clear</button>
						<button type="submit" class="btn btn-primary">Upload</button>
					</div>
				</form>
			</div><!-- /.modal-body -->
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>