<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>set Gmail</title>

    <!-- Bootstrap and CSS-->
    <link href="/assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
  	<div class="container">
		<header>
			<h2>GMAIL SETTING</h2>
		</header>
	</div>
	<div class="container ">
		<form action="Lab/SetGmail" method="post">
			<div class="row">
				<div class="col-md-4"><input type="text" name="Your Gmail account" class="form-control" placeholder="Your Name"></div>
				<div class="col-md-4"><input type="text" name="Your Gmail password" class="form-control" placeholder="Your Email"></div>
				<div class="col-md-4"><button type="submit" name="ok" class="btn btn-danger">SEND MESSAGE</button></div>
			</div>
		</form>
	</div>

    <!-- jQuery (Bootstrap 所有外掛均需要使用) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- 依需要參考已編譯外掛版本（如下），或各自獨立的外掛版本 -->
    <script src="/assets/lib/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>