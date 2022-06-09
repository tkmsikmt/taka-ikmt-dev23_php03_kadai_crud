<?php

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */


//1. POSTデータ取得
//直接sql文に突っ込むと悪さする文字列が入る可能性があるが、まずは、ポストでデータを受け取る
$patient_name = $_POST['patient_name'];

$seibetsu = $_POST['seibetsu'];
$store_name = $_POST['store_name'];
$stock = $_POST['stock'];
$waiting_time = $_POST['waiting_time'];
$pic = $_POST['pic'];
$email = $_POST['email'];
$tele = $_POST['tele'];
$memo = $_POST['memo'];

var_dump($patient_name);


//2. DB接続します
// 接続できない場合、トライキャッチでエラーが受け取ったらと言う構文
// エグジットしてエラー文書を表示する
// スモールeはエラー文字列
// new PDO関数がコマンド（データベースを使えるようにするコマンド）
// sqlソフトを定める
// データベース名を決める
//アドレスのサーバー名とサーバーidとパスワード入れる（ローカルの場合も外部サーバーの場合もある）

try {
  //ID:'root', Password: 'root'
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成

// 1. SQL文を用意

// insert into コマンドで””に挟まれた文字列をデータをsql文にする
// データベースのフィールドのカラム項目に、バリューズの後に代する。ただし、渡されるデータは、後で、セキュリティ工夫する）
// db テーブル名をINSERT INToの後に置く

$sql = "INSERT INTO gs_phrmcy0607 (
                          id, 
                          patient_name,
                          seibetsu,
                          store_name, 
                          stock,
                          waiting_time,
                          pic,
                          email, 
                          tele,
                          memo, 
                          date
                      ) VALUES (
                            NULL, 
                            :patient_name, 
                            :seibetsu, 
                            :store_name, 
                            :stock,
                            :waiting_time,
                            :pic,
                            :email,
                            :tele,
                            :memo,
                            sysdate()
                      ) " ;



// pdoの中のprepare関数に渡す、stmt関数にさらに渡すことで、セキュリティ処理をする
$stmt = $pdo->prepare($sql);

//  2. バインド変数を用意　関連づけて、ハッキングの無効化
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':patient_name', $patient_name, PDO::PARAM_STR);
$stmt->bindValue(':seibetsu', $seibetsu, PDO::PARAM_STR);
$stmt->bindValue(':store_name', $store_name, PDO::PARAM_STR);
$stmt->bindValue(':stock', $stock, PDO::PARAM_STR);
$stmt->bindValue(':waiting_time', $waiting_time, PDO::PARAM_STR);
$stmt->bindValue(':pic', $pic, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':tele', $tele, PDO::PARAM_STR);
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);

//  3. 実行

// //statusはエグゼキュートで最後に実行する全てを代入し切った変数
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  //エラーインフォ関数でエラーの値をstmtから取り出して、$error変数（配列）の２番目の読む
  //エグジットで処理を止めて、クエリエラーが表示し、配列の中身が表示される
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  //５．index.phpへリダイレクト処理
  //フォールスでなければエルス以下を実行即ち、ヘッダー関数（phpの場合はリダイレクト）処理する
// Location ころん で場所を指定するとそこに自動で飛ぶ・ロケートする
//半角スペースに注意！
 header('Location: index.php');
 exit;

}
?>
