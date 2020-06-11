<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>wiki</title>
  <style>
* {
box-sizing: border-box;
margin: 0;
padding: 0;
}
/*necesarry for scroll*/
.box{
  background-image: url("img/top.jpeg");
  background-size: cover;
  background-position: center 60%;
}
p{font-size:20px;}
.jumbotron {
  background-color:gray;
}
.header{
  width:100%;
  height:50px;
  position:fixed;
  background-color:white;
  z-index: 10;
  opacity:0.6;
}
.header ul{
  display:flex;
  list-style: none; 
  font-family:'Futura';
}
.header li{
  padding:0 30px;
}
.pagetop{
  width:140px;
  height:30px;
  position:fixed;
  right:0;
  bottom:0;
}
.pagetop a{
  padding:15px;
  display:block;
  font-size:12px;
  background:#000;
  color:#fff;
}
  </style>
   <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
<header class="header">
    <ul class="navi">
      <li><a href="#section1">Record</a></li>
      <li><a href="#section2">Keyword</a></li>
      <li><a href="#section3">Theme</a></li>
      <li><a href="#section4">Search_all</a></li>
      <li><a href="#section5">Chart_graph</a></li>
    </ul>
  </header>

<!--入力フォーム-->
<section class="box section1" id="section1">
<form method="post" action="result.php">
  <div class="jumbotron">
   <fieldset>
    <legend>What you search today ? _record</legend>
    <label>keyword：<input type="text" name="name"></label><br>
     <input class="btn btn-primary" type="submit" value="Input">
    </fieldset>
  </div>
</form>
</section>

<section class="box section2" id="section2">
<form method="post" action="select_name.php">
  <div class="jumbotron">
   <fieldset>
    <legend>Database_KEYWORD</legend>
    <label>Keyword：<input type="text" name="name"></label><br>
    <input class="btn btn-primary" type="submit" value="Input">
    </fieldset>
  </div>
</form>
</section>

<section class="box section3" id="section3">
<form method="post" action="select_theme.php">
  <div class="jumbotron">
   <fieldset>
    <legend>Database_THEME</legend>
    <label>Theme：<input type="text" name="name"></label><br>
    <input class="btn btn-primary" type="submit" value="Input">
    </fieldset>
  </div>
</form>
</section>

<section class="box section4" id="section4">
<form method="post" action="select_all.php">
  <div class="jumbotron">
   <fieldset>
    <legend>Database_ALL</legend>
    <input class="btn btn-primary" type="submit" value="Input">
    </fieldset>
  </div>
</form>
</section>

<section class="box section5" id="section5">
  <div class="jumbotron">
   <fieldset>
    <legend>Database_Graph.chart</legend>
    <input class="btn btn-primary" type="button" onclick="location.href='chart.php'" value="input">
    <!--画面遷移のinput-->
    </fieldset>
  </div>
</section>

<div class="pagetop">
    <a href="#section1">▲ to page TOP </a>
  </div>

<!--bootstrap-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <!-- JQuery for scroll  -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-scrollify@1/jquery.scrollify.min.js"></script>

<script>$.scrollify({section:".box"});</script>

  <!-- JQuery for scroll_action  -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script src="scroll.js"></script>

</body>
</html>