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

    <link href="web/backstate/css/font-awesome.min.css" rel="stylesheet">
    <link href="web/backstate/css/bootstrap.min.css" rel="stylesheet">
    <link href="web/backstate/css/templatemo-style.css" rel="stylesheet">
    <link rel="Shortcut Icon" href=web/popup/img/HS.ico>

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
                <li><a href="welcome/index" ><i class="fa fa-home fa-fw"></i>主页</a></li>
                <li><a href="backstate/write_article" class="active"><i class="fa fa-database fa-fw"></i>发表文章</a></li>
                <li><a href="backstate/article_manage"><i class="fa fa-users fa-fw"></i>文章管理</a></li>
                <li><a href="comment.html"><i class="fa fa-sliders fa-fw"></i>评论管理</a></li>
                <li><a href="welcome/login_out"><i class="fa fa-eject fa-fw"></i>注销</a></li>
            </ul>
        </nav>
    </div>
    <!-- Main content -->
    <div class="templatemo-content light-gray-bg col-md-10 col-sm-9">
            <div class="templatemo-content-container ">
                <div class="templatemo-content-widget white-bg">
                    <form class="row" id="submit" name="add_article" method="post" action="backstate/add_article">
                        <div class="row container col-md-12 col-sm-12">
                            <div class="col-md-10 form-group">
                                <input type="text" name="article_name" class="form-control" placeholder='文章题目'>
                            </div>
                            <div class="col-md-2  ">
                                <select id="type" class="form-control form-group" name="type_id">
                                    <option value="default">选择分类</option>
                                    <?php foreach ($types as $type) { ?>
                                        <option
                                            value="<?php echo $type->type_id ?>"><?php echo $type->type_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>

                        <div class="row container col-md-12 col-sm-12">
                            <div class="col-md-12 col-sm-12 form-group">
                                <textarea name="content" style="width: 100%; height: 600px;"></textarea>
                            </div>
                        </div>

                        <div class="row container col-md-12 col-sm-12">
                            <div class="col-md-12 col-sm-12 form-group">
                                <p style="color: #999;font-weight: bold;">摘要：（默认自动提取您文章的前200字显示在博客首页作为文章摘要，您也可以在这里自行编辑 ）</p>
                                <textarea name="digest" rows="6" style="width:100%;"></textarea><br/>
                                <input type="submit" name="button" value="提交内容"/>
                            </div>
                        </div>
                    </form>
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
<script charset="utf-8" src="web/backstate/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="web/backstate/kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="web/backstate/kindeditor/plugins/code/prettify.js"></script>
<script>
    KindEditor.ready(function (K) {
        var editor1 = K.create('textarea[name="content"]', {
            themeType: 'simple',
            fileManagerJson: '../php/file_manager_json.php',
            allowFileManager: true,
            fillDescAfterUploadImage: true,
            items: [
                'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'cut', 'copy', 'paste',
                'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
                'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
                'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
                'media', 'insertfile', 'table', 'hr', 'emoticons', 'code', 'pagebreak',
                'link', 'unlink',
            ],
            resizeType: 1
        });
        prettyPrint();
    });
</script>
<script>
    $(function () {
        $('#submit').on('submit', function () {
            if ($('#type').val() == 'default') {
                alert("请选择分类!");
                return false;
            }
        })
    })
</script>
<script type="text/javascript" src="web/backstate/js/templatemo-script.js"></script>
</body>
</html>