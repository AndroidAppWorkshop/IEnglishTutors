<div class="container">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Upload Teaching Material</h4>
			</div>
			<div class="modal-body">
				<form action="DoUpload" method="post" enctype="multipart/form-data">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>教材名稱</th>
								<th>日期</th>
								<th>上傳路徑</th>
							</tr>
						</thead>
						<tbody >
							<tr>
								<th>1</th>
								<td>
									<input 
										type="text" 
										class="form-control" 
										name="TM_title[]" 
										placeholder="請輸入教材名稱"
										required="required">
								</td>
								<td>
									<input 
										type="date" 
										class="form-control" 
										name="TM_time[]" 
										placeholder="日期" 
										required="required">
								</td>
								<td><input type="file" name="File1" required="required"></td>
							</tr>
							<tr>
								<th>2</th>
								<td>
									<input type="text" 
										class="form-control" 
										name="TM_title[]" 
										placeholder="請輸入教材名稱" 
										required="required">
								</td>
								<td>
									<input 
										type="date" 
										class="form-control" 
										name="TM_time[]" 
										placeholder="日期" 
										required="required">
								</td>
								<td><input type="file" name="File2" required="required"></td>
							</tr>
							<tr>
								<th>3</th>
								<td>
									<input 
										type="text" 
										class="form-control" 
										name="TM_title[]" 
										placeholder="請輸入教材名稱" 
										required="required">
								</td>
								<td>
									<input 
										type="date" 
										class="form-control" 
										name="TM_time[]" 
										placeholder="日期" 
										required="required">
								</td>
								<td><input type="file" name="File3" required="required"></td>
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