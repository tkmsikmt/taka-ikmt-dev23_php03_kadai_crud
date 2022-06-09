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
    <form method="POST"  action= "insert2.php">


    <!-- <form action="write.php" method = "POST"> -->

        <div class="jumbotron">
            <!-- <fieldset>
                <legend>処方箋送信リプライ</legend>
                <label>患者名前：<input type="text" name="patient_name"></label><br>
                <label>薬局名：<input type="text" name="store_name"></label><br>
                <label>在庫有り無し：<input type="text" name="stock"></label><br>
                <label>待ち時間：<input type="text" name="waiting_time"></label><br>
                <label>入力者：<input type="text" name="pic"></label><br>
                <label>Email:<input type="text" name="email"></label><br>
                <label>電話番号:<input type="text" name="tele"></label><br>
                <label><textArea name="memo" rows="4" cols="40"></textArea></label><br>
                <input type="submit" value="送信">
            </fieldset> -->

            <fieldset>
            <legend>処方箋送信リプライ</legend>
            患者名前：
            <input type="text" name="patient_name" size="30"><br>
            性別：
            <input type="radio" name="seibetsu" value="m">男
            <input type="radio" name="seibetsu" value="w">女<br>
            薬局名：
            <input type="text" name="store_name" size="30"><br>
            在庫有り無し：
            <input type="radio" name="stock" value="有り">有り
            <input type="radio" name="stock" value="無し">無し
            待ち時間
            <input type="radio" name="waiting_time" value="0">今すぐ
            <input type="radio" name="waiting_time" value="10">10分
            <input type="radio" name="waiting_time" value="20">20分
            <input type="radio" name="waiting_time" value="30">30分
            <input type="radio" name="waiting_time" value="40">40分
            <input type="radio" name="waiting_time" value="50">50分
            <input type="radio" name="waiting_time" value="60">1時間以上
            入力者：
            <input type="text" name="pic" size="30"><br>
            Email：
            <input type="text" name="email" size="30"><br>
            電話番号：
            <input type="text" name="tele" size="30"><br>
            備考：<br>
             <textarea name="memo" rows="4" cols="40">
             その他があれば書いて下さい。
            </textarea>

             </fieldset>

             <!-- <fieldset>
             <legend>アンケート</legend>
            採点：
             <select name="point">
             <option value="1">非常に良い</option>
             <option value="2">良い</option>
             <option value="3">普通</option>
             <option value="4">良くない</option>
             <option value="5">非常に良くない</option>
             </select><br>
             感想：<br>
             <textarea name="kanso" rows="4" cols="40">
             感想があれば是非書いて下さい。
            </textarea>
            </fieldset> -->

             <input type="submit" value="送信">
             <input type="reset" value="リセット">

        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
