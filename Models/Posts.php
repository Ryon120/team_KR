<?php

require_once('Model.php');

class Posts extends Model
{
    // プロパティ
    protected $table = 'posts';

    public function create($data)
    {
        // DBに保存
        // このクラスのインスタンスの
        // db_managerプロパティの
        // DbManagerクラスのインスタンス
        // dbhプロパティの
        // PDOのインスタンス
        // prepareメソッドを実行
        // INSERT INTO (カラム名, ,) VALUES (値, 値, 値,)
        $stmt = $this->db_manager->dbh->prepare('INSERT INTO ' . $this->table . ' (title, description, `created at`, image ) VALUES (?, ?, ?, ?)');
        $stmt->execute($data);
    }

    public function update($data)
    {
        // データの更新
        $stmt = $this->db_manager->dbh->prepare('UPDATE ' . $this->table . ' SET title = ?, contents = ? WHERE id = ?');
        $stmt->execute($data);
    }
}