<header>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation" aria-expanded="false">
					<i class="fa fa-bars"></i>
				</button>
				<a class="navbar-brand" href="/" data-bind="text: Header.Brand"></a>
			</div>
			<div class="collapse navbar-collapse" id="navigation">
				<ul class="nav navbar-nav navbar-right" data-bind="foreach: Header.Nav">
					<li><a href="#" data-bind="text: Text"></a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3">123456</div>
		<div class="col-sm-3">123456</div>
		<div class="col-sm-3">123456</div>
		<div class="col-sm-3">123456</div>
	</div>
</div>