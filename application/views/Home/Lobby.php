<header>
	<nav class="navbar navbar-default navbar-fixed-top" id="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
					<i class="fa fa-bars"></i>
				</button>
				<a class="navbar-brand" href="/" data-bind="text: Header.Brand"></a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span data-bind="text: Header.Language"></span><span class="caret"></span></a>
						<ul class="dropdown-menu" data-bind="foreach: Preference.langs">
							<li><a href="#" data-bind="text: $data, click: $parent.ChangeLang.bind($data)"></a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right" data-bind="foreach: Header.Nav">
					<li><a data-bind="text: Text, attr: { href: $parent.NavTarget(Target) }"></a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<section id="aboutus">
	<div class="container-fluid">
		<div class="jumbotron text-center">
			<h1 data-bind="text: AboutUs.Title"></h1>
			<p data-bind="text: AboutUs.Content"></p>
			<p><a class="btn btn-primary btn-lg" href="#courses" data-bind="text: AboutUs.Button"></a></p>
		</div>
	</div>
</section>
<section id="courses">
	<div class="container">
		<div class="jumbotron text-center">
			<h1 data-bind="text: Courses.Title"></h1>
			<p data-bind="text: Courses.Content"></p>
		</div>
		<div class="row" data-bind="foreach: Courses.Classes">
			<div class="col-sm-3">
				<div class="panel panel-default">
				<div class="panel-heading text-center">
					<h2 data-bind="text: Title"></h3>
				</div>
				<div class="panel-body text-center">
					<h3 data-bind="text: Price"></h2>
				</div>
				<ul class="list-group" data-bind="foreach: Detail">
					<li class="list-group-item text-center" data-bind="text: $data"></li>
				</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="teacher">
	<div class="container" data-bind="foreach: Teacher">
		<div class="media">
			<div class="media-left">
				<img class="media-object img-circle" data-bind="attr: { src: '/assets/images/Members/' + Picture + Key  }">
			</div>
			<div class="media-body">
				<h1 class="media-heading"><strong data-bind="text: DisplayName"></strong></h2>
				<h3 data-bind="text: Description"></h4>
			</div>
		</div>
	</div>
</section>
<section id="contactus">contactus</section>
<section id="location">location</section>
<section id="developers">developers</section>