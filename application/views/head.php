<?php $login_user = $this->session->userdata('login_user');
$this->load->helper('text'); ?>
<!-- 导航栏 -->
<nav class="nav navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="navbar-header col-md-4 col-sm-3">
                <a class="navbar-brand" style="color: #FFFFFF;font-size: 30px;font-style: italic">
                    Hs<strong>Blog</strong>
                </a>
                <button class="navbar-toggle" data-toggle="collapse" data-target="#responsive-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse col-md-offset-1 col-md-5 col-sm-9" id="responsive-navbar">
                <ul class="nav navbar-nav nav-right" style="font-size: 20px;">
                    <li><a href="welcome/index">首页</a></li>
                    <li><a href="welcome/classify">文章分类</a></li>
                    <li><a href="">博主简介</a></li>
                    <li class="dropdown">
                        <a href="#" calss="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">用户选项<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">发表文章</a></li>
                            <li><a href="#">管理文章</a></li>
                            <li><a href="#">用户评论</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="profile navbar-right ">
                            <ul class="nav navbar-nav">
                                <li>
                                    <?php
                                    if (isset($ok)) {
                                        ?>
                                        <nav class="login_out">
                                            <a href="backstate/index"><strong
                                                    style="color: #FFFFFF"><?php $string = ellipsize($login_user->username, 3, 1);
                                                    echo $string; ?></strong></a>
                                            <a id="login_out" href="welcome/login_out" style="cursor: pointer;">[退出]</a>
                                        </nav>
                                    <?php } else { ?>
                                        <nav class="main_nav">
                                            <a class="cd-signin" href="" onclick="return false">登录</a>
                                            <strong>/</strong>
                                            <a class="cd-signup" href="" onclick="return false">注册</a>
                                        </nav>
                                    <?php } ?>
                                </li>
                            </ul>
                            <!--<p class="navbar-text">您好，<a href="" class="navbar-link">LaLa</a></p>-->
                        </div>
                    </li>
                </ul>


            </div>
        </div>

    </div>

</nav>


<!--弹出层-->
<div class="cd-user-modal">
    <div class="cd-user-modal-container">
        <ul class="cd-switcher">
            <li><a href="#0">用户登录</a></li>
            <li><a href="#0">注册新用户</a></li>
        </ul>

        <div id="cd-login">
            <form action="welcome/check_login" method="post" class="cd-form" onsubmit="return false" >
                <p class="fieldset">
                    <label class="image-replace cd-username" for="signin-username">用户名</label>
                    <input class="full-width has-padding has-border" name="username" id="signin-username" type="text"
                           placeholder="输入用户名">
                </p>

                <p class="fieldset">
                    <label class="image-replace cd-password" for="signin-password">密码</label>
                    <input class="full-width has-padding has-border" name="password" id="signin-password" type="text"
                           placeholder="输入密码">
                </p>
                <p class="fieldset">
                    <span class="error_logining" style="color: #f51a09"> </span>
                </p>

                <p class="fieldset">
                    <input id="login_submit" class="full-width2" type="submit" value="登 录">
                </p>
            </form>
        </div>

        <div id="cd-signup">
            <form id="submit" action="welcome/add_user" method="post" class="cd-form">
                <!-- 注册表单 -->
                <p class="fieldset">
                    <label class="image-replace cd-username" for="signup-username">用户名</label>
                    <input name="username" class="full-width has-padding has-border" id="signup-username" type="text"
                           placeholder="输入用户名"><span id="judge1"></span>
                </p>

                <p class="fieldset">
                    <label class="image-replace cd-email" for="signup-email">邮箱</label>
                    <input name="email" class="full-width has-padding has-border" id="signup-email" type="email"
                           placeholder="输入email"><span id="judge2"></span>
                </p>

                <p class="fieldset">
                    <label class="image-replace cd-password" for="password1">密码</label>
                    <input name="password" class="full-width has-padding has-border" id="password" type="text"
                           placeholder="输入密码"><span id="judge3"></span>
                </p>

                <p class="fieldset">
                    <label class="image-replace cd-password" for="signup-password">密码</label>
                    <input name="password2" class="full-width has-padding has-border" id="password2" type="text"
                           placeholder="确认密码"><span id="judge4"></span>
                </p>


                <p class="fieldset">
                    <input class="full-width2" type="submit" value="注册新用户">
                </p>
            </form>
        </div>
        <a href="#0" class="cd-close-form">关闭</a>
    </div>
</div>

<script src="web/bootstrap/jquery.js"></script>
<!--用户注册检测-->
<script>
    //    用户注册检测

    $(function () {
        $('#signup-username').on('blur', function () {
            $.get('welcome/check_username', {
                username: this.value
            }, function (data) {
                if (data == 'ok') {
                    $('#judge1').removeClass();
                    $('#judge1').addClass("glyphicon glyphicon-ok");
                } else {
                    $('#judge1').removeClass();
                    $('#judge1').addClass("glyphicon glyphicon-remove");
                    $('#submit').on('submit', function () {
                        return false;
                    })
                }
            }, 'text');
        });
//    用户登陆检测
        $('#login_submit').on('click',function(){
            $.post('welcome/check_login',{
                use:$('#signin-username').val(),
                pad:$('#signin-password').val()
            },function(data){
                if(data =='no'){
                    $('.error_logining').html("您输入的用户名或密码错误！");
                }else if(data =='yes'){
                    //获取当前界面url
                    var str=window.location.href;
                    //js页面跳转
                    window.location.href= str;
                }
            },'text') ;
        });

        $('#signup-email').on('blur', function (e, opts) {
            $email = $('#signup-email').val();
            $reg = /\w+[@]{1}\w+[.]\w+/;
            if ($reg.test($email)) {
                $('#judge2').removeClass();
            } else {
//            $('#judge2').removeClass();
                $('#judge2').addClass("glyphicon glyphicon-remove");
                opts.bSubmit = false;
            }
        });
        $('#password').on('blur', function (e, opts) {
            $('#judge3').removeClass();
            if (this.value.length < 4) {
                $('#judge3').addClass("glyphicon glyphicon-remove");
                opts.bSubmit = false;
            } else {
                $('#judge3').removeClass();
            }
        });

        $('#password2').on('blur', function (e, opts) {
            if (this.value != $('#password').val()) {
                $('#judge4').addClass("glyphicon glyphicon-remove");
                opts.bSubmit = false;
            } else {
                $('#judge4').removeClass();
            }
        });
        $('#submit').on('submit', function () {
            var opts = {
                bSubmit: true
            };
            $('#signup-email').trigger('blur', opts);
            $('#password').trigger('blur', opts);
            $('#password2').trigger('blur', opts);
            if ($('#signup-username').val() == "") {
                $('#judge1').addClass("glyphicon glyphicon-remove");
                opts.bSubmit = false;
            }
            return opts.bSubmit; //return false 是阻止默认行为，也就是阻止提交跳转页面。
        })


    })
</script>