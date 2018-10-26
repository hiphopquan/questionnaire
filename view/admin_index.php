<?php
header('Content-type:text/html; charset=utf-8');
// 开启Session，存储cookie
session_start();

// 首先判断Cookie是否有记住了用户信息
if (isset($_COOKIE['username']) && isset($_COOKIE['email'])) {
    # 若记住了用户信息,则直接传给Session
    echo "1111";
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['email'] = $_COOKIE['email'];
    $_SESSION['islogin'] = 1;
}
if (!isset($_SESSION['islogin']))header("refresh:3;url=./login.php");
?>


<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>问卷管理</title>

    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">

    <!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <link rel="icon" type="image/png" href="../assets/i/favicon.png">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="32x32" href="../assets/i/app-icon72x72@2x.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="apple-touch-icon-precomposed" href="../assets/i/app-icon72x72@2x.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="assets/i/app-icon72x72@2x.png">
    <meta name="msapplication-TileColor" content="#0e90d2">

    <link rel="stylesheet" href="../assets/css/amazeui.min.css">
    <link rel="stylesheet" href="../assets/css/app.css">

</head>



<body  style="background-color: #e9e9e9">

<div class="am-g">
    <br>
    <div class="am-u-sm-1"></div>
    <div class="am-u-sm-3 am-u-sm-offset-8"><i class="am-icon-github am-icon-fw am-u-sm-left "></i>
        <a href="https://github.com/rgzhang2018/questionnaire">GitHub</a>
    </div>
    <br>
    <br>
</div>

<div class="am-animation-scale-up  am-u-sm-4 am-u-sm-centered" >
    <ul class="am-nav am-nav-tabs">
        <li ><a href="../index.php">首页</a></li>
        <li class="am-active"><a href="./admin_index.php">控制台</a></li>
        <li><a href="message.php">留言板</a></li>
        <div class="am-fr">
            <?php if (isset($_SESSION['islogin'])){
                echo "欢迎您,{$_SESSION['username']} &nbsp;&nbsp;<a href=\"../control/logout.php\" >|注销|</a>";
            }else {
                echo "<a href=\"./login.php\" >|点击登录|</a>";
            } ?>
        </div>
    </ul>
</div>




<!--  here  -->
<div class="am-u-md-4 am-u-md-centered" style="background-color: #ffffff ;box-shadow: 10px 10px 5px"  >

    <form  action="#" method="post" class="am-form am-form-horizontal">
        <div class="am-form-group" style="text-align:center">
            <br>
            <?php
            if (isset($_SESSION['islogin'])) {
                // 若已经登录
                echo "你好! ".$_SESSION['username'].' ,欢迎来到个人中心!<br>';
            } else {
                // 若没有登录
                echo "您还没有登录！三秒后转跳到<a href='./login.php'>登录</a>界面";
            }
            ?>
            <hr>
        </div>

        <div class="am-form-group">
            <a href="admin_questionnaire.php"><button type="button" class="am-u-sm-12 am-btn am-btn-primary  am-round" >发布问卷</button>
            </a>
        </div>
        <div class="am-form-group"></div>
        <div class="am-form-group">
            <a href="./admin_form.php"><button type="button" class="am-u-sm-12 am-btn am-btn-primary  am-round">我的问卷</button>
            </a>
        </div>
        <div class="am-form-group"></div>
        <div class="am-form-group">
            <a href="../control/logout.php"><button type="button" class="am-u-sm-12 am-btn am-btn-primary  am-round">退出登录</button></a>
        </div>

        <div class="am-form-group">
            <hr><br>
        </div>


    </form>
</div>




<!--[if (gte IE 9)|!(IE)]><!-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="../assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="../assets/js/amazeui.min.js"></script>
</body>
</html>