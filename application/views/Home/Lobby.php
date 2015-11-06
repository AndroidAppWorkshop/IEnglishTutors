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
	<div class="container">
		<div class="jumbotron text-center">
			<h1 data-bind="text: Teacher.Title"></h1>
			<p data-bind="text: Teacher.Content"></p>
		</div>
		<div data-bind="foreach: Teacher.Members">
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
	</div>
</section>
<section id="contactus">
	<div class="container">
		<div class="jumbotron text-center">
			<h1 data-bind="text: ContactUs.Title"></h1>
			<p data-bind="text: ContactUs.Content"></p>
		</div>
		<form class="row" data-bind="submit: SendEmail">
			<div class="col-sm-5">
				<input type="text" class="form-control" name="name" data-bind="attr: { placeholder: ContactUs.YourName }" required>
				<input type="email" class="form-control" name="email" data-bind="attr: { placeholder: ContactUs.YourEmail }" required>
				<input type="text" class="form-control" name="subject" data-bind="attr: { placeholder: ContactUs.Subject }" required>
			</div>
			<div class="col-sm-7">
				<textarea class="form-control" name="message" rows="10" data-bind="attr: { placeholder: ContactUs.YourMessage }" required></textarea>
			</div>
			<div class="col-sm-2 col-sm-push-5">
				<button type="submit" class="btn" data-bind="text: ContactUs.Send"></button>
			</div>
		</div>
	</div>
</section>
<section id="location">
	<div class="container-fluid">
		<div class="row header">
			<div class="col-sm-5 text-center">
				<i class="fa fa-map-marker"></i>
				<span data-bind="text: Location.Address"></span>
			</div>
			<div class="col-sm-3 text-center">
				<i class="fa fa-envelope-o"></i>
				<span data-bind="text: Location.Email"></span>
			</div>
			<div class="col-sm-4 text-center">
				<i class="fa fa-phone"></i>
				<span data-bind="text: Location.Phone"></span>
			</div>
		</div>
		<div class="row" id="map"></div>
	</div>
</section>
<section id="developers">
	<div class="container">
		<div class="jumbotron text-center">
			<h1 data-bind="text: Developers.Title"></h1>
			<p data-bind="text: Developers.Content"></p>
		</div>
		<div class="row" data-bind="foreach: Developers.Members">
			<div class="col-sm-3">
				<div class="thumbnail">
					<img class="img-circle img-responsive" data-bind="attr: { src: '/assets/images/Members/' + Picture + Key  }">
					<div class="caption text-center">
						<h3 class="name" data-bind="text: DisplayName"></h3>
						<hr />
						<div class="plus">
							<a data-bind="attr: { href: GitHub }" ><i class="fa fa-github fa-3x"></i></a>
							<a data-bind="attr: { href: Facebook }"><i class="fa fa-facebook-official fa-3x"></i></a>
							<a class="email" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-bind="attr: { 'data-content': Username }"><i class="fa fa-envelope fa-3x"></i></a>
						</div>
					</div>
					<p class="description" data-bind="text: Description"></p>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="copyright">
	<div class="container">
		<div class="jumbotron text-center">
			<h3 data-bind="text: Copyright"></h3>
		</div>
	</div>
</section>
<section id="extra-modal-dialog">
	<div id="send-email-success" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h2 class="modal-title" data-bind="text: Modal.SendEmailSuccessTitle"></h2>
				</div>
				<div class="modal-body">
					<h3 data-bind="text: Modal.SendEmailSuccess"></h3>
				</div>
			</div>
		</div>
	</div>
	<div id="send-email-failure" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h2 class="modal-title" data-bind="text: Modal.SendEmailFailureTitle"></h2>
				</div>
				<div class="modal-body">
					<h3 data-bind="text: Modal.SendEmailFailure"></h3>
				</div>
			</div>
		</div>
	</div>
</section>