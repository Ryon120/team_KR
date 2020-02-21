<?php

// ファイルの読み込み
require_once('Models/Posts.php');

// データの受け取り
$id = $_POST['id'];

// DBからデータの削除
$task = new Posts();
$task->delete([$id]);

// リダイレクト
header("location: index.php");
exit;