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
                <article class="bg_color type-post format-standard hentry clearfix">
                    <!-- 文章标题区域 -->
                    <h1 class="post-title"><?php echo $article->title; ?></h1>
                    <div class="post-meta clearfix">
                        <span class="date"><?php echo $article->post_date; ?></span>
                        <span class="category"><a href="#"
                                                  title="">分类:&nbsp<?php echo $article->type_name; ?></a></span>
                        <span class="comments"><a href="#" title="">评论(<?php echo $article->comment_number; ?>
                                )</a></span>
                    </div>
                    <div class="content" style="word-wrap:break-word;word-break:break-all;">
                        <?php $str = $article->content;
                        echo $str; ?>
                    </div>


                </article>

                <!--评论-->
                <section id="comments">
                    <div style="width: 100%;height: 0;border: 1px solid #FFFFFF;margin-top: 40px"></div>
                    <h3 id="comments-title">评论<strong>：</strong></h3>
                    <ul class="commentlist">
                        <li class="comment" style="display: none;">
                            <div style="width: 100%;height: 0;border: 1px solid #ddd;"></div>
                            <article>
                                <img src="web/popup/img/dog.jpg" height="60" width="60">
                                <div class="comment-meta">
                                    <h5><strong class="user"></strong>发表于&nbsp<strong
                                            class="time"></strong></h5>
                                    <div class="comment-body">
                                        <p class="content"></p>
                                    </div>
                                </div>
                            </article><!-- end of comment -->
                        </li>
                        <?php foreach ($comments as $comment) { ?>
                            <li class="comment">
                                <div style="width: 100%;height: 0;border: 1px solid #ddd;"></div>
                                <article>
                                    <img src="web/popup/img/dog.jpg" height="60" width="60">
                                    <div class="comment-meta">
                                        <h5><strong class="user"><?php echo $comment->username ?>
                                                &nbsp</strong>发表于&nbsp<strong
                                                class="time"><?php echo $comment->post_date; ?></strong></h5>
                                        <div class="comment-body">
                                            <p class="content"><?php echo $comment->content ?></p>
                                        </div>
                                    </div>
                                </article><!-- end of comment -->
                            </li>
                        <?php } ?>

                    </ul>

                    <div id="respond">
                        <form action="welcome/get_comment" method="post" id="messageBoard" onsubmit="return false;">
                            <div>
                                <p id="erro" style="color:rgba(225,0,0,0.75)"></p>
                                <textarea class="messageBoard" name="comment" id="comment" cols="48"
                                          rows="6"></textarea>
                            </div>
                            <div>
                                <input type="hidden" id="article_id" value="<?php echo $article->article_id; ?>">
                                <input id="bth" class="btn" name="submit" type="submit" id="submit" value="发表评论">
                                <span style="color:rgba(225,0,0,0.75)">文明上网,理性发言</span>
                            </div>

                        </form>
                    </div>
                </section>
            </div>

            <!--侧边显示-->
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
<script>
    $(function () {
//        乱糟糟的评论功能
        $('#bth').on('click', function () {
            var ojb = {bflog: true};
            $.post('welcome/get_comment', {
                comment: $('#comment').val(),
                article_id: $('#article_id').val()
            }, function (data) {
                if (data == 'yes') {
                    var reg = /^\s*$/g;
                    var content = $("#comment").val();
                    if (!reg.test(content)) {
                        $('.comment:eq(0)').clone().fadeIn(800).appendTo($('.commentlist'));
                        $('.comment:last').find('.time').html("<?php date_default_timezone_set("PRC"); echo $showtime = date("Y-m-d H:i:s");?>");
                        $('.comment:last').find('.user').html("<?php if ($login_user) {
                            echo $login_user->username . " ";
                        } ?>");
                        $('.comment:last').find('.content').html($('#comment').val());
                        $('.comment:last').css('display', 'inline-block');
                        $('#comment').val("");
                        $('#erro').html("");
                    } else {
                        ojb.bflog = false;
                        $('#erro').html("评论不能为空或空格且字数必须大于6");
                    }
                } else if (data == 'no') {
                    $('.error_logining').html("请登录后再发表评论!");
                    $('.cd-signin').trigger('click');

                    $('#login_submit').on('click', function () {
                        //获取当前界面url
                        var str = window.location.href;
                        //js页面跳转
                        window.location = str;
                    });

                }
            }, 'text');
            return ojb.bflog;
        })
    })

</script>
</body>
</html>