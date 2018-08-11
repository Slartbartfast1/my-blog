<?php include 'navBar.php';
/**
 * Created by PhpStorm.
 * User: huangrui10191180
 * Date: 2018/8/11
 * Time: 20:24
 */?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="static/assets/css/main.css">
    <style>
        /*html, body{ margin:0; height:100%; }*/
        body{
            z-index: 1;
            width: 100%;
            height: 100%;
            position: absolute;

            background: url("static/assets/img/wallhaven-3771521.jpg") no-repeat fixed;
            background-size: 100% 400px;
            transition-duration:0s;
        }
        .page {


        }
        .block{
            position: relative;
            top: 400px;
            width: 100%;
            height: 100%;
            z-index: 2;
            background-color: #F4EFE9;
        }
        .block1{
            position: relative;
            top: 400px;
            width: 100%;
            height: 100%;
            z-index: 2;
            background-color: #F4EFE9;
            margin-top:400px;
        }
        /*.block1 img{*/
        /*height:100%;*/
        /*}*/
        .last{
            /*height:400px;*/
        }
        .firstBox>div{
            height:25%;
            background-color: pink;
        }
        .disc{
            width: 40vw;
            height:40vw;
            border-radius: 50%;
            /*background-color: pink;*/
            position:relative;
            background:url('static/assets/img/record.png') no-repeat ;
            background-size: 100% 100%;

        }
        .postRotate{
            animation:rotating 5s linear infinite;
        }
        .posts{
            height:40%;
            width:40%;
            position:absolute;
            left:50%;
            top:50%;
            margin-left:-20%;
            margin-top:-20%;
            background-color: pink;
            border-radius: 50%;
            overflow: hidden;
        }
        .posts img{
            height:100%;
            width:100%;
        }
        @keyframes rotating{
            from{transform:rotate(0)}
            to{transform:rotate(360deg)}
        }
        audio{
            height:100%;
            width: 100%;
        }
        @font-face {
            font-family: 'iconfont';
            src: url('static/assets/fonts/iconfont.eot');
            src: url('static/assets/fonts/iconfont.eot?#iefix') format('embedded-opentype'),
            url('static/assets/fonts/iconfont.woff') format('woff'),
            url('static/assets/fonts/iconfont.ttf') format('truetype'),
            url('static/assets/fonts/iconfont.svg#iconfont') format('svg');
        }

        .iconfont {
            font-family: "iconfont" !important;
            font-size: 40px;
            font-style: normal;
            -webkit-font-smoothing: antialiased;
            -webkit-text-stroke-width: 0.2px;
            -moz-osx-font-smoothing: grayscale;
            position: absolute;
            display: block;
            color: white;
            height: 50px;
            width:50px;
        }
        .postImg{
            position: relative;
            height:100%;
            width:25vh;
            cursor: pointer;
        }
        .postImg img{
            width:100%;
            height:100%;
        }
        .shadow{
            width: 25vh;
            height: 100%;
            background-color: rgba(0,0,0,0);
            z-index: 1;
            position: absolute;
        }
        .shadow:hover{
            background-color: rgba(0,0,0,.2)
        }
        .play{
            left:100px;
            top:100px;
            position:absolute;
            margin-left:-25px;
            margin-top:-25px;
            height:50px;
            width: 50px;
        }
        audio{
            display:none;
        }





    </style>
</head>
<body>
<div class="page">

    <div class="block pt-5">
        <h1 class="display-4 text-center">西部世界</h1>
        <hr>
        <div class="container ">
            <div class="row">
                <div class="disc">
                    <div class="posts ">
                        <img src="static/assets/img/wallhaven-3771521.jpg" alt="">
                    </div>

                </div>

                <div class="firstBox col-5">

                    <div class="mt-2 musicBox">

                        <div class="postImg">
                            <div class="shadow">

                            </div>
                            <div class="play text-center">
                                <span class="iconfont"></span>
                            </div>
                            <div class="postImgurl">
                                <img src="static/assets/img/wallhaven-665520.jpg" alt="">
                            </div>
                        </div>

                        <audio src="static/assets/music/Ramin Djawadi - Sweetwater.mp3" controls="controls" class="musicFile"></audio>

                    </div>
                    <div class="mt-2 musicBox">

                        <div class="postImg">
                            <div class="shadow">

                            </div>
                            <div class="play text-center">
                                <span class="iconfont"></span>
                            </div>
                            <div class="postImgurl">
                                <img src="static/assets/img/wallhaven-671087.jpg" alt="">
                            </div>
                        </div>

                        <audio src="static/assets/music/Ty. - 热的想吐.mp3" controls="controls" class="musicFile"></audio>

                    </div>
                    <div class="mt-2 musicBox">

                        <div class="postImg">
                            <div class="shadow">

                            </div>
                            <div class="play text-center">
                                <span class="iconfont"></span>
                            </div>
                            <div class="postImgurl">
                                <img src="static/assets/img/wallhaven-671087.jpg" alt="">
                            </div>
                        </div>

                        <audio src="static/assets/music/Ty. - 热的想吐.mp3" controls="controls" class="musicFile"></audio>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block1 pt-5">
        <h1 class="display-4 text-center">西部世界</h1>
        <hr>
        <div class="container ">
            <div class="row">
                <div class="disc">
                    <div class="posts">
                        <img src="static/assets/img/wallhaven-3771521.jpg" alt="">
                    </div>

                </div>

                <div class="firstBox col-5">

                    <div class="mt-2 musicBox">

                        <div class="postImg">
                            <div class="shadow">

                            </div>
                            <div class="play text-center">
                                <span class="iconfont"></span>
                            </div>
                            <div class="postImgurl">
                                <img src="static/assets/img/wallhaven-671087.jpg" alt="">
                            </div>
                        </div>

                        <audio src="static/assets/music/Ty. - 热的想吐.mp3" controls="controls" class="musicFile"></audio>

                    </div>
                    <div class="mt-2 musicBox">

                        <div class="postImg">
                            <div class="shadow">

                            </div>
                            <div class="play text-center">
                                <span class="iconfont"></span>
                            </div>
                            <div class="postImgurl">
                                <img src="static/assets/img/wallhaven-671087.jpg" alt="">
                            </div>
                        </div>

                        <audio src="static/assets/music/Ty. - 热的想吐.mp3" controls="controls" class="musicFile"></audio>

                    </div>
                    <div class="mt-2 musicBox">

                        <div class="postImg">
                            <div class="shadow">

                            </div>
                            <div class="play text-center">
                                <span class="iconfont"></span>
                            </div>
                            <div class="postImgurl">
                                <img src="static/assets/img/wallhaven-671087.jpg" alt="">
                            </div>
                        </div>

                        <audio src="static/assets/music/Ty. - 热的想吐.mp3" controls="controls" class="musicFile"></audio>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="block1" >
        <h1 class="display-4 text-center">西部世界</h1>
        <hr>
        <div class="container ">
            <div class="row">
                <div class="disc">
                    <div class="posts">
                        <img src="static/assets/img/wallhaven-3771521.jpg" alt="">
                    </div>

                </div>

                <div class="firstBox col-5">

                    <div class="mt-2 musicBox">

                        <div class="postImg">
                            <div class="shadow">

                            </div>
                            <div class="play text-center">
                                <span class="iconfont"></span>
                            </div>
                            <div class="postImgurl">
                                <img src="static/assets/img/wallhaven-665520.jpg" alt="">
                            </div>
                        </div>

                        <audio src="static/assets/music/Ramin Djawadi - Sweetwater.mp3" controls="controls" id="musicFile"></audio>

                    </div>
                    <div class="mt-2"></div>
                    <div class="mt-2"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="block1 last">
        <h1 class="display-4 text-center">西部世界</h1>
        <hr>
        <div class="container ">
            <div class="row">
                <div class="disc">
                    <div class="posts">
                        <img src="static/assets/img/wallhaven-3771521.jpg" alt="">
                    </div>

                </div>

                <div class="firstBox col-5">

                    <div class="mt-2 musicBox">

                        <div class="postImg">
                            <div class="shadow">

                            </div>
                            <div class="play text-center">
                                <span class="iconfont"></span>
                            </div>
                            <div class="postImgurl">
                                <img src="static/assets/img/wallhaven-665520.jpg" alt="">
                            </div>
                        </div>

                        <audio src="static/assets/music/Ramin Djawadi - Sweetwater.mp3" controls="controls" id="musicFile"></audio>

                    </div>
                    <div class="mt-2"></div>
                    <div class="mt-2"></div>
                </div>
            </div>
        </div>
    </div>




</div>







<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.js"></script>
<script src="https://cdn.bootcss.com/wow/1.1.2/wow.js"></script>
<script src="static/assets/js/navBar.js"></script>
<script>

    //视差效果
    $(function () {
        $(window).scroll(function () {
            var winTop = $(window).scrollTop(),
                height=$(window).height();
            if (winTop >= 400) {
                if (winTop >= height+800) {
                    if (winTop >= height*2+1200) {
                        $('body').css({background:"url('static/assets/img/wallhaven-53697.jpg') no-repeat fixed",backgroundSize: '100% 100%'})
                    } else
                    {$('body').css({background:"url('static/assets/img/wallhaven-50435.jpg') no-repeat fixed",backgroundSize: '100% 100%'})}
                }else{
                    $('body').css({background:"url('static/assets/img/wallhaven-665520.jpg') no-repeat fixed",backgroundSize: '100% 100%'})
                }
            }else{
                $('body').css({background:"url('static/assets/img/wallhaven-3771521.jpg') no-repeat fixed",backgroundSize: '100% 400px'})
            }
        })
    });


    //播放器按钮绑定
    $(function () {
        $('.postImg').on('click',function(){
            var index=$('.postImg').index($(this));
            console.log($('#musicFile').get(index));
            if($('.musicFile').get(index).paused){
                $('.musicFile').get(index).play();
                $('.iconfont').eq(index).fadeOut(100).text('').fadeIn();
                $('.disc').addClass('postRotate');
                $('.posts').html($('.postImgurl').eq(index).html());
            }else{
                $('.musicFile').get(index).pause();
                $('.iconfont').eq(index).fadeOut(100).text('').fadeIn();
                $('.disc').removeClass('postRotate');
            }

        })

    });

</script>

</body>
</html>
