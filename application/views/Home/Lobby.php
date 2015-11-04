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
				<ul class="nav navbar-nav navbar-right" data-bind="foreach: Header.Nav">
					<li><a data-bind="text: Text, attr: { href: Target }"></a></li>
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
<section id="courses">courses</section>
<section id="teacher">teacher</section>
<section id="contactus">contactus</section>
<section id="location">location</section>
<section id="developers">developers</section>