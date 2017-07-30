<?php
$logined_user = $this->session->userdata('logined_user');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visual Admin Dashboard - Data Visualization</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <base href="<?php echo site_url(); ?>">
    <!--
    Visual Admin Template
    http://www.templatemo.com/preview/templatemo_455_visual_admin
    -->
    <link rel="Shortcut Icon" href=web/popup/img/HS.ico>
    <link href="web/backstate/css/font-awesome.min.css" rel="stylesheet">
    <link href="web/backstate/css/bootstrap.min.css" rel="stylesheet">
    <link href="web/backstate/css/templatemo-style.css" rel="stylesheet">

    <link rel="stylesheet" href="web/backstate/kindeditor/themes/simple/simple.css"/>
    <link rel="stylesheet" href="web/backstate/kindeditor/plugins/code/prettify.css"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- Left column -->
<div class="templatemo-flex-row">
    <div class="templatemo-content col-md-2 col-sm-3">
        <header class="templatemo-site-header">

            <h1>Hs Blog</h1>
        </header>

        <!-- Search box -->
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">
            <ul>
                <li><a href="welcome/index"><i class="fa fa-home fa-fw"></i>主页</a></li>
                <li><a href="backstate/write_article"><i class="fa fa-database fa-fw"></i>发表文章</a></li>
                <li><a href="backstate/article_manage" class="active"><i class="fa fa-users fa-fw"></i>文章管理</a></li>
                <li><a href="comment.html"><i class="fa fa-sliders fa-fw"></i>评论管理</a></li>
                <li><a href="welcome/login_out"><i class="fa fa-eject fa-fw"></i>注销</a></li>
            </ul>
        </nav>
    </div>
    <!-- Main content -->
    <div class="templatemo-content light-gray-bg col-md-10 col-sm-9">
        <div class="templatemo-content-container">
            <div class="templatemo-content-widget white-bg row">
                <div style="height: 870px">
                    <div>
                        <button type="submit" class="templatemo-blue-button">全选</button>
                        <button type="submit" class="templatemo-blue-button">取消</button>
                        <button type="submit" class="templatemo-blue-button">删除选中</button>
                    </div>
                    <div class="table-responsive" style="border-radius: 10px;border: 1px solid #c8c8c8">
                        <table class="table table-bordered" >
                            <thead>
                            <tr class="info">
                                <td>#</td>
                                <td>作者</td>
                                <td>文章题目</td>
                                <td>发表时间</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="templatemo-inline-block">
                                        <input type="checkbox" name="member" id="c4" value="">
                                        <label for="c4" class="font-weight-400"><span></span></label>
                                    </div>
                                </td>
                                <td>hanshuo</td>
                                <td><a href="#">35645555555555</a></td>
                                <td>2017年3月16日</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <footer class="text-right">
                <p>Copyright &copy; 2084 Company Name
                    | Designed by <a href="" target="_parent">templatemo</a></p>
            </footer>
        </div>
    </div>


</div>

<!-- JS -->
<script type="text/javascript" src="web/backstate/js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
<!--  jQuery Migrate Plugin -->
<script type="text/javascript" src="web/backstate/js/templatemo-script.js"></script>
</body>
</html>