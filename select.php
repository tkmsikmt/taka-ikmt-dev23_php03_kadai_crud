<?php

//クロスサイトスクリプトを避ける
function h($str){
    return htmlspecialchars($str,ENT_QUOTES);

}

//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_phrmcy0607');
$status = $stmt->execute();

//３．データ表示
// 今回でいえば、87行目に,$viewが登場してくるので、、、=""


$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //成功した場合
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';

    //
    $view .='<a href="detail.php?id=  '         .$result['id'].         '   ">';

//    '         .$result['id'].         '

    $view .= h($result['date']) 
    . ':'  . h($result['patient_name'])
    . ':'  . h($result['seibetsu'])
    . ':'  . h($result['store_name'])
    . ':'  . h($result['stock'])
    . ':'  . h($result['waiting_time'])
    . ':'  . h($result['pic'])
    . ':'  . h($result['email'])
    . ':'  . h($result['tele'])
    . ':'  . h($result['memo']) ;
    $view .='</a>';

    $view .='<a href="delete.php?id='         .$result['id'].         '">';
    $view .= '【削除】';
    $view .='</a>';

    $view .= '</p>';
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>処方箋送信リプライ管理画面表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
    <!-- <a href="detail.php"></a> -->
      <?= $view ?>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>
