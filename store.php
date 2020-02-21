<?php

// ファイルの読み込み
require_once('Models/Posts.php');
require_once('dbconnect.php');

// データの受け取り
$title = $_POST['title'];
$description = $_POST['description'];
$currentTime = date("Y/m/d H:i:s");
$file = $_FILES['image']['tmp_name'];
// var_dump($file);die;

if ($_FILES['image']['error'] !== 4) {
    $imgPath = 'images/' . $_FILES['image']['name'];
    // var_dump($imgPath);die;
        // 画像の保存
        // 第一引数が対象のファイル、第2引数が保存先
        move_uploaded_file($file, $imgPath);
    // そうでなければ(画像がアップロードされていない場合)
    } else {
        $imgPath = 'images/demo.png';
    }


// $imgPath ='images/demo.gif';

// DBへのデータ保存
$task = new Posts();
$task->create([$title, $description, $currentTime, $imgPath]);










// // var_dump($_FILES['image']['error']);die;

// // データの受け取り
// $name = $_POST['name'];
// // $_FILES['name属性']['tmp_name']にアップロードしたファイルが一時保存されてる
// $file = $_FILES['image']['tmp_name'];

// // 画像がアップロードされている場合は、
// // エラーコードは以下のページを参照
// // https://www.php.net/manual/ja/features.file-upload.errors.php
// if ($_FILES['image']['error'] !== 4) {
//     $imgPath = 'images/' . $_FILES['image']['name'];
//     // 画像の保存
//     // 第一引数が対象のファイル、第2引数が保存先
//     move_uploaded_file($file, $imgPath);
// // そうでなければ(画像がアップロードされていない場合)
// } else {
//     $imgPath = 'images/demo.png';
// }

// // DBへの保存
// $stmt = $dbh->prepare('INSERT INTO users (`name`, `image`) VALUES (?, ?)');
// $stmt->execute([$name, $imgPath]);

// 一覧画面にリダイレクト
header('location: index.php');
exit;