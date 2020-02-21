<?php
require_once('Models/Posts.php');
require_once('function.php');

$task = new Posts();
$tasks = $task->getAll();

session_start();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">


    <title>Mango-Diary</title>
</head>

    <body>

        <div class="header">
            <div class="header-left">
                <form id="form5" action="自分のサイトのURL">
                    <input id="sbox5"  id="s" name="s" type="text" placeholder="過去の記事を探す" />
                    <input id="sbtn5" type="submit" value="検索" />
                </form>
            </div>
            <div class="header-center">
                Mango-Diary
            </div>
            <div class="header-right">
                <a class="nav-link text-light" href="create.php">Create</a>
            </div>
        </div>


    <div class="row p-3" style="display: flex; flex-wrap: wrap; justify-content: space-around;">
            <?php foreach ($tasks as $task) : ?>
                <div class="col-sm-6 col-md-4 col-lg-3 py-3 py-3">
                    <div class="card">
                        <img src="<?= $task['image'] ?>" class="card-img-top user-img" alt="...">
                        <div class="card-body">
                            <h4 class="card-title"><?= h($task["title"]); ?></h4>
                            <p class="card-text">
                                <?= h($task["description"]); ?>
                            </p>
                      
                            <div class="button text-right d-flex justify-content-end">
                                <a href="edit.php?id=<?= h($task['id']); ?>" class=" text-success">EDIT</a>
                                <div class="button">
                                    <form action="delete.php" method="post">
                                        <input type="hidden" name="id" value="<?= h($task['id']); ?>">
                                        <button type="submit" class="btn text-danger">DELETE</button>
                                    </form>
                                </div>
                            </div>
            
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
    </div>

</body>
</html>