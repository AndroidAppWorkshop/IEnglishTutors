<body>
	<div class="container">
		<header>
			<h2>GMAIL SETTING</h2>
		</header>
	</div>
	<div class="container ">
		<form action="/index.php/Lab/SetGmailSMTP" method="post">
			<div class="row">
				<div class="col-md-4">
					<input 
					type="text" 
					name="GmailAccount" 
					class="form-control" 
					placeholder="Your GMAIL Account"
					required/>
				</div>
				<div class="col-md-4">
					<input 
					type="password" 
					name="GmailPassword" 
					class="form-control" 
					placeholder="Your GMAIL Password"
					required/>
				</div>
				<div class="col-md-4"><button type="submit" name="ok" class="btn btn-danger">SUBMIT</button></div>
			</div>
		</form>
	</div>
</body>