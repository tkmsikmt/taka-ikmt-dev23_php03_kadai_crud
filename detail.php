<?php

/**
 * １．PHP
 * [ここでやりたいこと]
 * まず、クエリパラメータの確認 = GETで取得している内容を確認する
 * イメージは、select.phpで取得しているデータを一つだけ取得できるようにする。
 * →select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * ※SQLとデータ取得の箇所を修正します。
 */

 $id = $_GET['id'];

 //＊関数は後でやる
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
$stmt = $pdo->prepare('SELECT * FROM gs_phrmcy0607 WHERE id = :id ');
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

$view = '';
if ($status === false) {

     //＊関数は後でやる
    // sql_error($stmt);

    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));

} else {
   $result = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST"  action= "update.php">


    <!-- <form action="write.php" method = "POST"> -->

        <div class="jumbotron">
            <!-- <fieldset> -->
                <!-- <legend>更新画面
                </legend>
                <label>患者名前：<input type="text" name="patient_name" value= "<?= $result['patient_name']?>"></label><br>
                <label>薬局名：<input type="text" name="store_name" value= "<?= $result['store_name']?>"></label><br>
                <label>在庫有り無し：<input type="text" name="stock" value= "<?= $result['stock']?>"></label><br>
                <label>待ち時間：<input type="text" name="waiting_time" value= "<?= $result['waiting_time']?>"></label><br>
                <label>入力者：<input type="text" name="pic" value= "<?= $result['pic']?>"></label><br>
                <label>Email:<input type="text" name="email" value= "<?= $result['email']?>"></label><br>
                <label>電話番号:<input type="text" name="tele" value= "<?= $result['tele']?>"></label><br>
                <label>
                    <textArea name="memo" rows="4" cols="40"><?= $result['memo']?></textArea>
                </label><br> -->

            <fieldset>
            <legend>処方箋送信リプライ</legend>
            患者名前：
            <input type="text" name="patient_name" value= "<?= $result['patient_name']?>" size="30"><br>
            性別：
            <!-- <input type="text" name="seibetsu" value= "<?= $result['seibetsu']?>">←checked -->
            <?= $result['seibetsu']?>←checked/
            <input type="radio" name="seibetsu" value="m">男
            <input type="radio" name="seibetsu" value="w">女←to be updated <br>
            薬局名：
            <input type="text" name="store_name" value= "<?= $result['store_name']?>" size="30"><br>
            在庫有り無し：
            <!-- <input type="text" name="stock" value= "<?= $result['stock']?>">←checked -->
            <?= $result['stock']?>←checked/ 
            <input type="radio" name="stock" value="有り">有り
            <input type="radio" name="stock" value="無し">無し←to be updated<br>
            待ち時間:
            <!-- <input type="text" name="waiting_time" value= "<?= $result['waiting_time']?>">←checked -->
            <?= $result['waiting_time']?>←checked/
            <input type="radio" name="waiting_time" value="0">今すぐ
            <input type="radio" name="waiting_time" value="10">10分
            <input type="radio" name="waiting_time" value="20">20分
            <input type="radio" name="waiting_time" value="30">30分
            <input type="radio" name="waiting_time" value="40">40分
            <input type="radio" name="waiting_time" value="50">50分
            <input type="radio" name="waiting_time" value="60">1時間以上 ←to be updated<br>
            入力者：
            <input type="text" name="pic" value= "<?= $result['pic']?>" size="30"><br>
            Email：
            <input type="text" name="email" value= "<?= $result['email']?>" size="30"><br>
            電話番号：
            <input type="text" name="tele" value= "<?= $result['tele']?>" size="30"><br>
            備考：<br>
             <textarea name="memo" rows="4" cols="40">
            
             <?= $result['memo']?></textarea>

             </fieldset>
                <input type="hidden" name="id" value= "<?= $result['id']?>"><br>

                <input type="submit" value="更新">
                <input type="reset" value="リセット">
            <!-- </fieldset> -->
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>


<!-- $member_selection .= '<option value=' . $result['name'] . ' selected>' . $result['name'] . '</option>'; -->
<!-- 
<input type="radio" name="waiting_time" value="0">今すぐ
            <input type="radio" name="waiting_time" value="10">10分
            <input type="radio" name="waiting_time" value="20" checked>20分
            <input type="radio" name="waiting_time" value="30">30分
            <input type="radio" name="waiting_time" value="40">40分
            <input type="radio" name="waiting_time" value="50">50分
            <input type="radio" name="waiting_time" value="60">1時間以上 -->