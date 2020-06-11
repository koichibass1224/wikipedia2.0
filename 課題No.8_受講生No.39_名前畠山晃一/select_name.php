<?php
$keyword = $_POST["name"];

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=new_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt2 = $pdo->prepare("SELECT * FROM new_an_table WHERE name LIKE '%$keyword';");//keyword：曖昧検索
$status = $stmt2->execute();

//３．データ表示
$view="";
if($status==false) {
  $error = $stmt2->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  while( $result = $stmt2->fetch(PDO::FETCH_ASSOC)){ 

    /*$view .= "<p>";
    $view .= $result['name'].' '.$result['theme'].' '.$result['naiyou'].' '.$result['url'].' '.$result['memo'].' '.$result['img'].' '.$result['indate'];
    $view .= "</p>";*/
    $view_name = $result['name'];
    $view_theme = $result['theme'];
    $view_naiyou = $result['naiyou'];
    $view_url .= $result['url'];
    $view_memo .= $result['memo'];
    $view_img .= $result['img'];
    $view_indate .= $result['indate'];
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>result_keyword</title>
  <style>
    table {border-collapse: collapse;}
    td {border: solid 1px; padding: 0.5em;}
  </style>
   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <!--<div class="container jumbotron">
      <table class="table table-striped">
          < ?=$view?>
      </table>
    </div>-->
    <a href="index.php">return to top</a>
    <div class="container">
        <table class="table">
            <tbody>
                <tr>
                <th scope="row">1</th>
                <th>name</th>
                     <td><textarea style="display: inline-block;width:100%;height:50px;"><?=$view_name?></textarea></td>
                </tr>

                <tr>
                <th scope="row">2</th>
                <th>theme</th>
                <td><textarea style="display: inline-block;width:100%;height:50px;"><?=$view_theme?></textarea></td>
                </tr>

                <tr>
                <th scope="row">3</th>
                <th>URL</th>
                <td><textarea style="display: inline-block;width:100%;height:50px;"><?=$view_url?></textarea></td>
                </tr>

                <tr>
                <th scope="row">4</th>
                <th>memo</th>
                <td><textarea style="display: inline-block;width:100%;height:50px;"><?=$view_memo?></textarea></td>
                </tr>

                <tr>
                <th scope="row">5</th>
                <th>containts</th>
                   <td><textArea name="naiyou" rows="10" cols="60"><?=$view_naiyou?></textArea></td>
                </tr>

                <tr>
                <th scope="row">6</th>
                <th>image</th>
                    <td><img class="image" src="<?=$view_img?>"></td>
                </tr>

                <tr>
                <th scope="row">7</th>
                <th>indate</th>
                    <td><?=$view_indate?></td>
                </tr>

                <!--<textArea style ="display:none" name="img">< ?=$result_img?></textArea>-->
                <input class="btn btn-primary" type="submit" value="Input">
            </tbody>
    </div>

<!--bootstrap-->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
