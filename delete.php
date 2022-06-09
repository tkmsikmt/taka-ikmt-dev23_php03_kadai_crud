<?php

/**
 * detail.phpからphp部分をコピペ
 * 
 */

 $id = $_GET['id'];

//  require_once('funcs.php');
//  $pdo = db_conn();

try {
    //ID:'root', Password: 'root'
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }


 //2.データ登録sql作成

 //２．データ登録SQL作成
$stmt = $pdo->prepare(' DELETE FROM gs_phrmcy0607 WHERE id = :id      ');
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

$view = '';
if ($status === false) {
    // sql_error($stmt);

    $error = $stmt->errorInfo();
    exit('ErrorMessage:'.$error[2]);

} else {
//    $result = $stmt->fetch();
// redirect処理にしたい
// redirect('select.php');

header('Location: select.php');
exit;

}

?>