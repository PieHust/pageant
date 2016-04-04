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
  <script src="js/jquery.js"></script>
  <style type="text/css">
      .rank img{
      width:30em;
      height:29px;
      border:1px gray solid;
      }
      .col_2  {
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
  width: 50%;
  float: left;
}
.rank img{width: 30em;}
.rankimg span{
    top: -7em;
    font-size: 3em;
}
@media (max-width: 598px){
.rankimg span {
  top:-3em;
  font-size: 2em;
}
}
@media (max-width: 506px){
.rankimg span {
  top:-4em;
  font-size: 1em;
}
}
.rankimg span{
  position: relative;
  z-index: 5;
  color: rgb(240, 20, 20);
  font-weight: bold;
  left: 1em;
  opacity: 0.6;
  background: rgb(199, 190, 190);

}
#form input{
  float: left;
}
#logo:first-letter{
  color:red;
  font-size: 28px;
}
.col_2 img{
  height:400px;
}
</style>
<link href='http://api.youziku.com/webfont/CSS/56fe4e22f629d808d0181348' rel='stylesheet' type='text/css' />
</head>
<body>
  <div class="wrapper" id="wrapper">
    <nav class="navbar navbar-default navbar-static-top">
      <a class="navbar-brand" href="/"  id="logo"style="font-family:'DarkBlack2768a7fc252ab';">FACEBABA</a>
      <a class="navbar-brand" style="color:red;" href="/select.html">Select</a>
      <a class="navbar-brand"  href="/ranklist.html">Ranklist</a>
    </nav>
    <div class="container rank">
      <div class="alert alert-info alert-dismissible" role="alert" style="display:none;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> <strong>!</strong>
        Of the two boys, who do you think is more handsome~
      </div>
      <?php
        require("DB.class.php");
        $db = DB::getInstance();
        $i=0;
        $sql="select * from stu order by rand() limit 2";
        $result=$db->
      query($sql);
        while($row=$result->fetch_array())
        {
          $i++;
        ?>
      <div class="col_2 rankimg<?php echo $i;?>
        rankimg">
        <input type="hidden" value="<?php echo $row["id"];?>
        ">
        <a  href="#">
          <img id=ranka<?php echo $i;?> src="<?php echo $row["beauti"];?>" class="img-responsive img-rounded" alt="<?php echo $row["stu"];?>image"></a>
        <span>
          <?php echo $row["stu"];?></span>
      </div>
      <?php }?></div>
    <div  style="margin:0 auto;">
      <div class="row col-lg-2"></div>
      <form class="form-inline col-lg-8" action="/util.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label class="sr-only" for="pwd">pwd</label>
          <input type="text" class="form-control" id="pwd" name="pwd"placeholder="邀请码"></div>
        <div class="form-group">
          <label class="sr-only" for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name"placeholder="Name"></div>
        <div class="form-group">
          <label class="sr-only" for="file">File</label>
          <input type="file" class="form-control" id="file" placeholder="File" name="myfile"></div>
        <button type="submit" class="btn btn-danger">Submit</button>
      </form>
    </div>

  </div>
  <script src="js/bootstrap.js"></script>
  <script type="text/javascript">
    $("#ranka1").on("click",function(){
        alert("jj");
        $("#ranka2").hide();
        rank(1);
    });
    $("#ranka2").on("click",function(){
        rank(0);
        $("#ranka1").hide();
    });
    function rank(i){
        $.ajax({
            url: '/Rank.class.php',
            data: '&stu1=' + $(".rankimg1 input").val()+ "&stu2=" + $(".rankimg2 input").val()+"&id="+i,
            type: 'post',
            error: function () {},
            success: function (msg) {
               window.location.reload();
            }
        })
    }

    </script>
</body>
</html>