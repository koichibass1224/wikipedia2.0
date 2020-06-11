<?php

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=new_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt1 = $pdo->prepare("SELECT * FROM new_an_table;");
$status = $stmt1->execute();

//３．データ表示
$view="";
if($status==false) {
  $error = $stmt1->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  while( $result = $stmt1->fetch(PDO::FETCH_ASSOC)){
    $view .= "<tr>";
    $view .= '<td>'.$result['theme'].'</td>'.'<td>'.$result['name'].'</td>';
    $view .= "</tr>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>wiki</title>
  <style>
table {
  width:100%;
	border-collapse: collapse;
}
td {
  width:50%;
	border: solid 1px;
	padding: 0.5em;
}
.input{
  margin-bottom:100px;
}
</style>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<form method="post" action="select_name.php">
  <div class="jumbotron">
  <a href="index.php">return to top</a>
   <fieldset class="input">
    <legend>Database_KEYWORD</legend>
    <label>Keyword：<input type="text" name="name"></label><br>
    <input class="btn btn-primary" type="submit" value="Input">
    </fieldset>

    <fieldset>
    <legend>Database_Graph.chart</legend>
    <input class="btn btn-primary" type="button" onclick="location.href='chart.php'" value="input">
    </fieldset>
  </div>
</form>


<div class="container jumbotron">
    <table class="table table-striped"><?=$view?></table></div>

<!--bootstrap-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
