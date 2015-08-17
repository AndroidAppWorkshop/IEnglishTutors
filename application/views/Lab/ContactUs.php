<header>
	<div class="container">
		<div class="row ">
			<div class="col-md-4"></div>
			<div class="col-md-4 text-center"><h1>GET IN TOUCH</h1></div>
			<div class="col-md-4"></div>
		</div>
		
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">Have any question? Drop us a message. We will get back to you in 24 hours.</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</header>

<div class="mainBody">
	<div class="container">
		<form action="SendEmail" method="post">
			<div class="row">
				<div class="col-md-4">
					<input 
						type="text" 
						name="YourName" 
						class="form-control" 
						placeholder="Your Name"
						required/>
				</div>
				<div class="col-md-4">
					<input 
						type="text" 
						name="YourEmail" 
						class="form-control" 
						placeholder="Your Email"
						required/>
				</div>
				<div class="col-md-4">
					<input 
						type="text" 
						name="YourSubject" 
						class="form-control" 
						placeholder="Your Subject"
						required/>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<textarea class="form-control" name="YourMessage" rows="8" placeholder="Your Message"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<button type="submit" name="ok" class="btn btn-block btn-danger">SEND MESSAGE</button>
				</div>
			</div>
		</form>
	</div>
</div>