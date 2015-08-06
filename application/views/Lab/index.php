<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Practice send E-mail</title>

    <!-- Bootstrap and CSS-->
    <link href="/asset/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/asset/css/sendMail.css">
  </head>

  <body>
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
	
	<div class="mainBody test1">
		<div class="container ">
			<form action="Lab/ClickSend" method="post">
				<div class="row">
					<div class="col-md-4"><input type="text" name="YourName" class="form-control" placeholder="Your Name"></div>
					<div class="col-md-4"><input type="text" name="YourEmail" class="form-control" placeholder="Your Email"></div>
					<div class="col-md-4"><input type="text" name="YourSubject" class="form-control" placeholder="Text Subject"></div>
				</div>
				<div class="row">
					<textarea class="form-control" name="YourMessage" rows="8" placeholder="Your Message"></textarea>
				</div>
			
				<div class="row text-center">
					<div class="col-md-2 col-md-offset-10">
						<button type="submit" name="ok" class="btn btn-danger">SEND MESSAGE</button>
					</div>
				</div>
			</form>
		</div>
	</div>

    <!-- jQuery (Bootstrap 所有外掛均需要使用) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- 依需要參考已編譯外掛版本（如下），或各自獨立的外掛版本 -->
    <script src="/asset/js/bootstrap.min.js"></script>
  </body>
</html>