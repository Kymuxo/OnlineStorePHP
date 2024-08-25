
<?php include ("app/controllers/users.php");?>

<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Online Store</title>
</head>
<body>

<?php include("app/include/header.php"); ?>
<!-- END HEADER -->
<!-- FORM -->
<div class="container reg_form">
    <form action="reg.php" method="post" class="row justify-content-center">
        <h2>Форма регистрации</h2>
        <div class="mb-3 col-12 col-md-4 err">
            <?php include "app/helps/errorInfo.php"; ?>
        </div>

        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Ваше имя</label>
            <input name="login" value="<?=$login?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="введите Ваше имя...">
        </div>

        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input name="mail" value="<?=$email?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="введите ваш email...">
            <div id="emailHelp" class="form-text">Ваш email адрес не будет использован для спама!</div>
        </div>

        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="введите ваш пароль...">
        </div>

        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
            <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2" placeholder="повторите ваш пароль...">
        </div>

        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputAdres" class="form-label">Ваш адрес</label>
            <input name="adres" type="text" class="form-control" id="exampleInputAdres" placeholder="введите ваш адрес...">
            <div id="adresHelp" class="form-text">На введенный адрес будут поступать заказы!</div>
        </div>

        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <button type="submit" class="buy-btn" name="button-reg">Регистрация</button>
            <a href="log.php">Войти</a>
        </div>
    </form>
</div>
<!-- END FORM -->

<!-- footer -->
<?php include("app/include/footer.php"); ?>
<!-- // footer -->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


</body>
</html>