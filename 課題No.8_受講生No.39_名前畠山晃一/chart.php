<?php
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=new_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt1 = $pdo->prepare("SELECT theme FROM new_an_table;");
$status = $stmt1->execute();

//３．データ表示
$view='';
if($status==false) {
  $error = $stmt1->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
    //while( $result = $stmt1->fetch(PDO::FETCH_ASSOC)){  
  while( $result [] = $stmt1->fetch(PDO::FETCH_ASSOC)){  
    $json = json_encode($result);
    //jsへ配列渡しする為にjson_encodeする。
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
<title>graph_pie</title> 

<style>
body{
  background-image: url("img/top_img.jpg");
  background-size: cover;
  background-position: top;
  background-repeat: no-repeat;
}
</style>

</head>
<body>
<a href="index.php">return to top</a>
  <canvas id="myPieChart"></canvas>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

  <script>
const data = JSON.parse('<?=$json?>');
//console.log(data);//この時点で配列だが、必要データだけでスリムにさせたい。
var arr = data

//キーワードの重複を消す＋入力数をカウント（アンケートなどにも展開できる）
var group = arr.reduce(function (result, current) {
  var element = result.find(function (p) {
    return p.theme === current.theme//最新データで上書き。重複しない。
  });
  if (element) {
    element.count ++;
  } else {
    result.push({
      count: 1,
      theme: current.theme,//自分で決める。そのまま配列になる。
    });
  }
  return result;
}, []);
console.log(group);
//groupの中にスリム化した配列（連想配列）がある

//連想配列の抽出仕方！！連想配列だと欲しい情報の抽出が難しい。。

//theme
var array = [];
for (var key in group) {
//console.log( group[key].theme )
array.unshift(group[key].theme)//push（末尾に追加）でもok
};
console.log(array);

//count
var array2 = [];
for (var key in group) {
console.log(group[key].count)
array2.unshift(group[key].count)
};
console.log(array2);


  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'pie',//円グラフ
    data: {
    //labels & datasets
      labels: array,//配列なので[]必要なかった。
      //labels: [group[1]],
      datasets: [{
        //datasetsでは、data、backgroundColorの2つの項目を設定。
          backgroundColor: [
              "#C11432",
              "#009ADA",
              "#66A64F",
              "#FDD10A",
              "#F08838",
              "#1D4D9F",
              "#F1EC7A",
              "#F6A7B8",
              "#8CABD9",
              //あるだけ記載しておく。後半は同じ色になる。。
          ],
          //data: [38, 31, 21, 10]
          data: array2//配列なので[]必要ない。
      }]
    },
    options: {
      //optionsでは、title項目を設定。
      title: {
        display: true,
        text: 'propotion'
      }
    }
  });

  </script>
</body>
</html>