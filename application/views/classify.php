<!doctype html>
<html lang="zh-hans">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="<?php echo site_url(); ?>">
    <link rel = "Shortcut Icon" href=web/popup/img/HS.ico>
    <link rel="stylesheet" href="web/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="web/popup/css/style.css"/>
    <link rel="stylesheet" href="web/popup/css/amend.css"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!--在使用前必须引用bootstrap，meta是自适应功能，添加后可以在移动端使用-->
    <title>HsBlog</title>
</head>
<body>
<!--导航部分-->
<?php include 'head.php'?>

<!--搜索区域-->
<?php include 'srch.php'?>
<!--左侧和右侧文章显示区域-->
<div class="page-container">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 page-content">
                <!-- Basic Home Page Template -->
                <div class="row separator">
                    <section class="col-md-6 col-sm-6 articles-list">
                        <h3>啊撒大苏打撒旦</h3>
                        <ul class="articles">
                            <li class="article-entry standard">
                                <h4><a href="single.html">啊实打实大苏打撒旦飒飒大苏打上</a></h4>
                                <span class="article-meta">2017年3月13日
                                    <a href="#" title="">&nbsp&nbsp&nbsp分类:1</a></span>
                            </li>

                        </ul>
                    </section>

                    <section class="col-md-6 col-sm-6 articles-list">
                        <h3>啊实打实大苏打实打实上的</h3>
                        <ul class="articles">
                            <li class="article-entry standard">
                                <h4><a href="single.html">啊实打实大苏打实打实大苏打飒飒</a></h4>
                                <span class="article-meta">2017年3月13日<a href="#" title="">&nbsp&nbsp&nbsp分类:2</a></span>
                            </li>

                        </ul>
                    </section>
                </div>







            </div>
            <aside class="col-md-4 col-sm-4 page-sidebar">
                <section class="widget">
                    <div class="support-widget">
                        <h3 class="title">需要帮助？</h3>
                        <p class="intro">需要更多的支持?如果你没有找到一个答案,联系博主得到进一步的帮助。</p>
                    </div>
                </section>

                <section class="widget">
                    <h3 class="title">特别推荐</h3>
                    <ul class="articles">
                        <li class="article-entry standard">
                            <h4><a href="single.html">Integrating WordPress with Your Website</a></h4>
                            <span class="article-meta">2017年3月13日&nbsp&nbsp&nbsp分类:<a href="#" title="">前端</a></span>

                        </li>
                    </ul>
                </section>
                <section class="widget"><h3 class="title">分类</h3>
                    <ul>
                        <li><a href="#" title="web前端">前端</a></li>
                        <li><a href="#" title="后台服务器端">后端</a></li>
                        <li><a href="#" title="编程工具分享">工具</a></li>
                    </ul>
                </section>
            </aside>
        </div>
    </div>
</div>
<!--底部区域-->
<?php include 'footer.php'?>

<script src="web/bootstrap/jquery.js"></script>
<script src="web/popup/js/main.js"></script>
<script src="web/bootstrap/js/bootstrap.min.js"></script>
<script src="web/popup/js/amend.js"></script>
</body>
</html>
</html>