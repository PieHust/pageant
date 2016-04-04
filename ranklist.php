<!DOCTYPE html>
<html>
    <head>
         <title>FACEBABA SELECT</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatibl\e" content="IE=edge">
  <meta content="FACEBAB寻找华科菜园最帅男神。" name="description">
  <meta content="FACEBABA,华科菜园男神" name="keywords">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link href='http://api.youziku.com/webfont/CSS/56fe4e22f629d808d0181348' rel='stylesheet' type='text/css' />
  <style>
    #logo:first-letter{
  color:red;
  font-size: 28px;
}
    .row{
        overflow: hidden;
        position: relative;
    }
  .row div{
    height:400px;
    overflow:hidden;
  }
    .row .xixi{
        position: absolute;
        color:red;
        top:50%;
        left:50%;
        margin-top:-60px;
        margin-left: -10px;
        font-family:'DarkBlack2768a7fc252ab';
        transform: rotate(-60deg);
    }

  </style>
  <script src="js/jquery.js"></script>
    </head>
    <body>
    <div class="wrapper" id="wrapper">
    <nav class="navbar navbar-default navbar-static-top">
      <a class="navbar-brand" href="/"  id="logo"style="font-family:'DarkBlack2768a7fc252ab';">FACEBABA</a>
      <a class="navbar-brand"  href="/select.html">Select</a>
      <a class="navbar-brand" style="color:red;" href="/ranklist.html">Ranklist</a>
    </nav>
    <div class="container ranklist">
    <?php
        require("DB.class.php");
        $db = DB::getInstance();
        $sql = 'select * from stu order by score desc limit 3';
        $result = $db->query($sql);
        $arr =[];
        while($row = $result->fetch_array()){
            $arr[] = $row;
        }
    ?>
    <div class="row">
        <div class="col-lg-4" style="position: relative;">
            <img height=100%  src="<?=$arr[1]['beauti']?>" />
            <div class="xixi">NUMBER TWO</div>

        </div>
        <div class="col-lg-4" style="position: relative;">
            <img height=100%  src="<?=$arr[0]['beauti']?>" />
            <div class="xixi">NUMBER ONE</div>

        </div>
        <div class="col-lg-4" style="position: relative;">
            <img height=100%  src="<?=$arr[2]['beauti']?>" />
            <div class="xixi">NUMBER THREE</div>

        </div>



    </div>
    </div>
    </div>
    <script src="js/bootstrap.js"></script>
    </body>
</html>