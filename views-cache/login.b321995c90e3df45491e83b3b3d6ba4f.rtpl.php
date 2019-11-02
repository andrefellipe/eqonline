<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<!-- Link for the favicon of the website. -->
	<link rel="icon" href="../resources/site/images/favicon.ico" type="image/x-icon">

	<!-- CSS stylesheet to specify the design of the elements of the page. -->
	<link href="../../resources/login/css/style.css" type="text/css" rel="stylesheet">

	<!-- Title of the website. -->
	<title>E&Q Online: Login</title>

</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-5 mx-auto">
				<div class="myform">

					<div class="mb-3">
						<div class="col-md-12 text-center">
							<h1>E&Q Online: Login</h1>
						</div>
					</div>

					<form action="/admin/login" method="post">

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-user"></i></span>
								</div>
								<input type="text" name="login" class="form-control" placeholder="Login" name="login">
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-lock"></i></span>
								</div>
								<input type="password" name="password" id="password"  class="form-control" placeholder="Senha" name="password">
							</div>
						</div>

						<div class="col-md-12 text-center ">
							<button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Entrar</button>
						</div>

					</form>

				</div>
			</div>
		</div>
	</div>

</body>

</html>