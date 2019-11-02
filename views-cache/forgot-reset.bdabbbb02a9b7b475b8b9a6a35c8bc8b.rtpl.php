<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
  <title>E&Q Online: Redefinir Senha</title>

</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-5 mx-auto">
        <div class="myform">

          <div class="mb-3">
            <div class="col-md-12 text-center">
              <h1>Redefinir Senha</h1>
            </div>
          </div>

          <form action="/admin/forgot/reset" method="post">

            <div class="col-md-12 text-center">
              <p>Olá! Digite uma nova senha:</p>
            </div>

            <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Senha">
            </div>

            <div class="col-md-12 text-center">
              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Trocar Senha</button>
            </div>

            <div class="form-group">
              <p class="text-center">Ou faça <a href="/admin/login">login </a> como outro usuário.</p>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>

</body>

</html>