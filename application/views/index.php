<!doctype html>
<html lang="zh-hans">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="<?php echo site_url(); ?>">
    <link rel="Shortcut Icon" href=web/popup/img/HS.ico>
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
<?php include 'head.php' ?>

<!--搜索区域-->
<?php include 'srch.php' ?>

<!--左侧和右侧文章显示区域-->
<div class="page-container">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php $this->load->helper('text');
                foreach ($list as $article) { ?>
                    <article class="format-standard type-post hentry clearfix">
                        <header class="clearfix">
                            <h3 class="post-title">
                                <a href="welcome/article?id=<?php echo $article->article_id ?>"><?php $str = $article->title;
                                    echo mb_substr($str, 0, 36, 'utf-8') . '...'; ?></a>
                            </h3>
                            <div class="post-meta clearfix">
                                <span class="date"><?php echo $article->post_date ?></span>
                                <span class="category"><a href="#"
                                                          title="查看相关分类文章"><?php echo $article->type_name ?></a></span>
                                <span class="comments"><a title="用户评论">评论(<?php echo $article->comment_number ?>
                                        )</a></span>
                                <span class="glyphicon glyphicon-eye-open "
                                      style="padding-left:4px;top:2px;">(<?php echo $article->clicked ?>)</span>
                            </div>
                            <!-- end of post meta -->
                        </header>
                        <p style="word-wrap:break-word;word-break:break-all;">
                            <?php
                            $str = $article->content;
                            echo mb_substr(strip_tags($str), 0, 210, 'utf-8') . '...'; ?>

                        </p>
                    </article>
                <?php } ?>
                <div style="text-align: center">
                    <ul>
                        <?php echo $page ?>
                    </ul>
                </div>
            </div>
            <?php include 'aside.php' ?>
        </div>
    </div>
</div>

<!--底部区域-->
<?php include 'footer.php' ?>
<script src="web/bootstrap/jquery.js"></script>
<script src="web/popup/js/main.js"></script>
<script src="web/bootstrap/js/bootstrap.min.js"></script>
<script src="web/popup/js/amend.js"></script>
</body>
</html>