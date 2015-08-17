<div class="container">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Upload Teaching Material</h4>
			</div>
			<div class="modal-body">
				<form action="DoUpload" method="post" enctype="multipart/form-data">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>教材名稱</th>
								<th>上傳路徑</th>
							</tr>
						</thead>
						<tbody class="table-striped">
							<tr>
								<th>1</th>
								<td><input type="text" class="form-control" id="" placeholder="請輸入教材名稱"></td>
								<td><input type="file" name="File1"></td>
							</tr>
							<tr>
								<th>2</th>
								<td><input type="text" class="form-control" id="" placeholder="請輸入教材名稱"></td>
								<td><input type="file" name="File2"></td>
							</tr>
							<tr>
								<th>3</th>
								<td><input type="text" class="form-control" id="" placeholder="請輸入教材名稱"></td>
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