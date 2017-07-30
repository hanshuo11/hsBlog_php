/**
 * Created by HS on 2017/3/11.
 */

$(function(){
    $('.cd-signin').on('click',function(){
        if($(window).width()<770&&$('.error_logining').html()!="请登录后再发表评论!"){
            console.log($('.error_logining').html());
            $('.navbar-toggle').trigger('click');
        }
    });
    $('.cd-signup').on('click',function(){
        if($(window).width()<770){
            $('.navbar-toggle').trigger('click');
        }
    })
});