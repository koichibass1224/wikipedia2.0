<?php
//1. POSTデータ取得
$name = $_POST["name"];
$theme = $_POST["theme"];
$url = $_POST["url"];
$memo = $_POST["memo"];
$naiyou = $_POST["naiyou"];
$img = $_POST["img"];


//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=new_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO new_an_table(id,name,theme,url,memo,naiyou,img,indate)VALUES(NULL,:a1,:a2,:a3,:a4,:a5,:a6,sysdate())");
//:a2→バインド変数
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $theme, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $memo, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a5', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a6', $img, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();
//execute：実行

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMassage:".$error[2]);
}else{

  //５．index.phpへリダイレクト
  header("Location: index.php");
}
?>
