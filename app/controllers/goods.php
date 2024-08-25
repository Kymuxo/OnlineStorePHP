<?php
include "../../path.php";
include '../../app/database/db.php';

$errMsg = [];
$id = '';
$title = '';
$price = '';
$content = '';
$img = '';
$topic = '';

$topics = selectAll('topics');
$goods = selectAll('goods');
$goodsAdm = selectAllFromGoodsWithTopics('goods', 'topics');

// Код для формы создания товара
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_good'])){

    if (!empty($_FILES['img']['name'])){
   $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\assets\images\products\\" . $imgName;


        if (strpos($fileType, 'image') === false) {
            array_push($errMsg, "Подгружаемый файл не является изображением!");
        }else{
            $result = move_uploaded_file($fileTmpName, $destination);

            if ($result){
                $_POST['img'] = $imgName;
            }else{
                array_push($errMsg, "Ошибка загрузки изображения на сервер");
            }
        }
    }else{
        array_push($errMsg, "Ошибка получения картинки");
    }
   
    $title = trim($_POST['title']);
    $price = trim($_POST['price']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    

    if($title === '' || $price === '' || $content === '' || $topic === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($title, 'UTF8') < 3){
        array_push($errMsg, "Название товара должно быть более 3-х символов");
    }else{
        $good = [
            'title' => $title,
            'price'=> $price,
            'content' => $content,
            'img' => $_POST['img'],
            'id_topic' => $topic
        ];

        $good = insert('goods', $good);
        $good = selectOne('goods', ['id' => $id] );
        header('location: ' . "http://localhost/OnlineStore/" . 'admin/goods/index.php');
    }


}else{
    $id = '';
    $title = '';
    $price = '';
    $content = '';
    $publish = '';
    $topic = '';
}


// АПДЕЙТ СТАТЬИ
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $good = selectOne('goods', ['id' => $_GET['id']]);
    #tt($good);
    $id =  $good['id'];
    $title =  $good['title'];
    $price =  $good['price'];
    $content = $good['content'];
    $topic = $good['id_topic'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_good'])){
    $id =  $_POST['id'];
    $title = trim($_POST['title']);
    $price = trim($_POST['price']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);

    if (!empty($_FILES['img']['name'])){
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\assets\images\products\\" . $imgName;


        if (strpos($fileType, 'image') === false) {
            array_push($errMsg, "Подгружаемый файл не является изображением!");
        }else{
            $result = move_uploaded_file($fileTmpName, $destination);

            if ($result){
                $_POST['img'] = $imgName;
            }else{
                array_push($errMsg, "Ошибка загрузки изображения на сервер");
            }
        }
    }else{
        array_push($errMsg, "Ошибка получения картинки");
    }


    if($title === '' || $price === '' || $content === '' || $topic === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($title, 'UTF8') < 7){
        array_push($errMsg, "Название статьи должно быть более 7-ми символов");
    }else{
        $good = [
            'title' => $title,
            'price'=> $price,
            'content' => $content,
            'img' => $_POST['img'],
            'id_topic' => $topic
        ];

        $good = update('goods', $id, $good);
        header('location: ' . "http://localhost/OnlineStore/" . 'admin/goods/index.php');
    }
}


// Удаление статьи
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('goods', $id);
    header('location: ' . "http://localhost/OnlineStore/" . 'admin/goods/index.php');
}