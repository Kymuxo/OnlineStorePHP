<?php include "e:/serverAmpps/Ampps/www/OnlineStore/app/database/db.php";


$errMsg = [];

// Тук-Тук -- Кто там?
function userAuth($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['userroot'] = $user['userroot'];
    if($_SESSION['userroot']){
        header('location: ' . "http://localhost/OnlineStore/" . "admin/users/index.php");
    }else{
        header('location: ' . "http://localhost/OnlineStore/");
    }
}

$users = selectAll('users');

// Код для формы регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){

    $userroot = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    $adres = trim($_POST['adres']);

    if($login === '' || $email === '' || $passF === '' || $adres === '' ){
        array_push($errMsg,  "Не все поля заполнены!");
    }elseif (mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg,  "Логин должен быть более 2-х символов");
    }elseif ($passF !== $passS) {
        array_push($errMsg,  "Пароли в обеих полях должны соответствовать!");
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if($existence['email'] === $email){
            array_push($errMsg,  "Пользователь с такой почтой уже зарегистрирован!");
        }else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            $post = [
                'userroot' => $userroot,
                'username' => $login,
                'email' => $email,
                'password' => $pass,
                'adres'=> $adres
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id] );
            userAuth($user);
        }
    }
}else{
    $login = '';
    $email = '';
}

// Код для формы авторизации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){

    $email = trim($_POST['mail']);
    $pass = trim($_POST['password']);

    if($email === '' || $pass === '') {
        array_push($errMsg,  "Не все поля заполнены!");
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if($existence && password_verify($pass, $existence['password'])){
            userAuth($existence);
        }else{
            array_push($errMsg,  "Почта либо пароль введены неверно!");
        }
    }
}else{
    $email = '';
}

// Код добавления пользователя в админке
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])){


    $userroot = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    $adres = trim($_POST['adres']);

    if($login === '' || $email === '' || $passF === '' || $adres === '' ){
        array_push($errMsg,   "Не все поля заполнены!");
    }elseif (mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg,   "Логин должен быть более 2-х символов");
    }elseif ($passF !== $passS) {
        array_push($errMsg,   "Пароли в обеих полях должны соответствовать!");
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if($existence['email'] === $email){
            array_push($errMsg,   "Пользователь с такой почтой уже зарегистрирован!");
        }else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            if (isset($_POST['userroot'])) $userroot = 1;
            $user = [
                'userroot' => $userroot,
                'username' => $login,
                'email' => $email,
                'password' => $pass,
                'adres'=> $adres
            ];
            $id = insert('users', $user);
            $user = selectOne('users', ['id' => $id] );
            header('location: ' . "http://localhost/OnlineStore/" . 'admin/users/index.php');
        }
    }
}else{
    $login = '';
    $email = '';
}

// Код удаления пользователя в админке
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('users', $id);
    header('location: ' . "http://localhost/OnlineStore/" . 'admin/users/index.php');
}

// РЕДАКТИРОВАНИЕ ПОЛЬЗОВАТЕЛЯ ЧЕРЕЗ АДМИНКУ
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])){
    $user = selectOne('users', ['id' => $_GET['edit_id']]);
    #tt($user);
    $id =  $user['id'];
    $userroot =  $user['userroot'];
    $username = $user['username'];
    $email = $user['email'];
    $adres = $user['adres'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])){

    $id = $_POST['id'];
    $mail = trim($_POST['mail']);
    $login = trim($_POST['login']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    $adres = trim($_POST['adres']);
    $userroot = isset($_POST['userroot']) ? 1 : 0;

    if($login === ''){
        array_push($errMsg,   "Не все поля заполнены!");
    }elseif (mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg,   "Логин должен быть более 2-х символов");
    }elseif ($passF !== $passS) {
        array_push($errMsg,  "Пароли в обеих полях должны соответствовать!");
    }else{
        $pass = password_hash($passF, PASSWORD_DEFAULT);
        if (isset($_POST['userroot'])) $userroot = 1;
        $user = [
            'userroot' => $userroot,
            'username' => $login,
           #'email' => $mail,
            'password' => $pass,
            'adres'=> $adres
        ];

        $user = update('users', $id, $user);
        header('location: ' . "http://localhost/OnlineStore/" . 'admin/users/index.php');
    }
}

