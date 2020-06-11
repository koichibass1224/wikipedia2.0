<?php
$keyword = $_POST["name"];

/*PHP-query→wikipediaのスクレイピング。
scraypingはpython+celeniumが王道でかなわないので、今回は精度を掘り下げない。*/

    //require
    require_once('phpQuery-onefile.php');

    //ページ取得
    $url = "https://ja.wikipedia.org/wiki/$keyword";
    $html = file_get_contents($url);

    //var_dump($html);

    //DOM取得
    $doc = phpQuery::newDocument($html);

    //要素取得
    //echo $doc["title"]->text();//通常のテキスト抽出
    //echo $doc[".btn:eq(1)"]->text();//クラスは.でidは#から抽出。eq(1)は段落。
    $result =  $doc[".mw-parser-output"]->find("p:eq(1),p:eq(2),p:eq(3),p:eq(4)")->text();
    //入れすぎるとゴチャゴチャすす。p:eq(4)までで。

    //$result_img =  $doc[".thumbinner"]->find("img")->attr("src");
    //$result_img =  $doc[".mw-parser-output"]->find("img")->attr("src");
    //$result_img =  $doc[".image"]->find("img")->attr("src");
    $result_img =  $doc[".infobox"]->find("img")->attr("src");
    //試した中でこれが一番正確かと
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>result & record</title>
    <style>
        .jumbotron img{width:300px;}
        .image{width:100%;}
    </style>
     <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<form method="post" action="insert.php">
  <div class="jumbotron">
  <a href="index.php">return to top</a>
    <legend>record？</legend>
    <div class="container">
        <table class="table">
            <tbody>
                <tr>
                <th scope="row">1</th>
                <th>name</th>
                     <td><textarea name="name" style="display: inline-block;width:100%;height:50px;"><?=$keyword?></textarea></td>
                </tr>

                <tr>
                <th scope="row">2</th>
                <th>theme</th>
                   <td><textarea name="theme" style="display: inline-block;width:100%;height:50px;">default:none</textarea></td>
                </tr>

                <tr>
                <th scope="row">3</th>
                <th>URL</th>
                   <td><textarea name="url" style="display: inline-block;width:100%;height:50px;"><?=$url?></textarea></td>
                </tr>

                <tr>
                <th scope="row">4</th>
                <th>memo</th>
                   <td><textarea name="memo" style="display: inline-block;width:100%;height:50px;">default:none</textarea></td>
                </tr>

                <tr>
                <th scope="row">5</th>
                <th>containts</th>
                   <td><textArea name="naiyou" rows="10" cols="60"><?=$result?></textArea></td>
                </tr>

                <tr>
                <th scope="row">6</th>
                <th>image</th>
                    <td><img class="image" src="<?=$result_img?>"></td>
                </tr>

                <textArea style ="display:none" name="img"><?=$result_img?></textArea>
                <input class="btn btn-primary" type="submit" value="Input">
            </tbody>
    </div>
</form>

<!--bootstrap-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
</body>
</html>