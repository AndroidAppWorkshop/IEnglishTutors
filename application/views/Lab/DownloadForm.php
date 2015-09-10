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
										<th>課堂名稱</th>
										<th>上課時間</th>
									</tr>
								</thead>
								<tbody data-bind="foreach : course">
									<tr data-bind="attr : { 'data-target':'#heading'+($index()),
															'data-toggle':'collapse',
															'aria-expanded':'true'}">
										
										<th data-bind="text : ($index()+1)"></th>
										<th data-bind="text : Title"></th>
										<th data-bind="text : Date"></th>
									</tr>
								</tbody>
							</table>
						</div>
						<div data-bind="foreach : course"  class="col-lg-6">
							
							<div class="panel panel-default collapse"  
								data-bind="attr : { id:'heading'+($index())}">
								<div class="panel-heading">
									<h3 data-bind="text : Title" class="panel-title"></h3>
								</div>
								<div data-bind="foreach : Files" class="panel-body list-group">
									<li data-bind="text : Name" class="list-group-item"></li>
								</div>
							</div>
						
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>
<script><?=$ViewModel?></script>

