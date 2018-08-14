<?php include 'navBar.php';
/**
 * Created by PhpStorm.
 * User: huangrui10191180
 * Date: 2018/8/11
 * Time: 20:24
 */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>2</title>
</head>
<link href="static/assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="static/assets/vendors/animate/animate.min.css" rel="stylesheet">
<link rel="stylesheet" href="static/assets/css/main.css">
<link href="static/assets/vendors/aplayer/APlayer.min.css" rel="stylesheet">
<style>
    /*html, body{ margin:0; height:100%; }*/
    body {
        z-index: 1;
        width: 100%;
        height: 100%;
        position: absolute;

        background: url("static/assets/img/wallhaven-3771521.jpg") no-repeat fixed;
        background-size: 100% 400px;
        transition-duration: 0s;
    }

    .page {

    }

    .block {
        position: relative;
        top: 400px;
        width: 100%;
        height: 100%;
        z-index: 2;
        background-color: #F4EFE9;
    }

    .block1 {
        position: relative;
        top: 400px;
        width: 100%;
        height: 100%;
        z-index: 2;
        background-color: #F4EFE9;
        margin-top: 400px;
    }

    /*.block1 img{*/
    /*height:100%;*/
    /*}*/
    .last {
        /*height:400px;*/
    }

    .firstBox > div {
        height: 25%;
        background-color: pink;
    }

    .disc {
        /*left:0!important;*/
        width: 40vw;
        height: 40vw;
        border-radius: 50%;
        position: relative;
        background: url('static/assets/img/record.png') no-repeat;
        background-size: 100% 100%;

    }

    .postRotate {
        animation: rotating 5s linear infinite;
    }

    .posts {
        height: 40%;
        width: 40%;
        position: absolute;
        left: 50%;
        top: 50%;
        margin-left: -20%;
        margin-top: -20%;
        background-color: pink;
        border-radius: 50%;
        overflow: hidden;
    }

    .posts img {
        height: 100%;
        width: 100%;
    }

    @keyframes rotating {
        from {
            transform: rotate(0)
        }
        to {
            transform: rotate(360deg)
        }
    }

    audio {
        height: 100%;
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
        position:relative;
        display: block;
        color: white;
        height: 50px;
        width: 50px;
        z-index: 999;
    }

    .postImg {
        position: relative;
        height: 100%;
        width: 100%;
        cursor: pointer;
        overflow: hidden;
    }

    .postImg img {
        transition: .5s ease 0s;
        width: 100%;
        height: 100%;
    }

    /*.postImg:hover img{*/
    /*transform: scale(1.05,1.05);*/
    /*}*/
    .shadow {
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0);
        z-index: 1;
        position: absolute;
    }

    .shadow:hover {
        background-color: rgba(0, 0, 0, .2)
    }

    .play {
        left: 50%;
        top: 50%;
        position: absolute;
        margin-left: -25px;
        margin-top: -25px;
        height: 50px;
        width: 50px;

    }

    #aplayer {
        position: fixed;
        bottom: 0;
        width: 100%;

    }
    #carousel {
        width:100%;
        height: 40vw;
        position: relative;
        z-index: 2;
    }
    #carousel img {
        display: none;
        width:60vw;
        height: 40vw;
        cursor: pointer;
    }
    .musicSmall{
        padding: 0!important;
        height:100px;
        width:100%;
        background-color: white;
        box-shadow: 0 0 10px 1px rgba(0,0,0,.1);
        /*text-align:center;*/
        vertical-align:middle;
        transition:.3s ease 0s;

    }
    .postSmall{
        height:100%;
        width:30%;
        background-color:pink;
        display: inline-block;
        position: absolute;
        left:0;

    }
    .musicSmallInfo{
        cursor: default;
        position: absolute;
        display: inline-block;
        width: 70%;
        height: 100%;
        left:30%;
        top:0;
        padding:5%;
    }
    .musicSmall:hover{
        box-shadow: 5px 5px 10px 2px rgba(0,0,0,.1);
    };
    .carouselWrap{
        display: inline-block;
        position:absolute;
    }



</style>
</head>
<body>
<div class="page">

    <div class="block pt-5">
        <!--        <h1 class="display-4 text-center">西部世界</h1>-->
        <!--        <hr>-->
        <div class="container ">
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <div class="disc">
                        <div class="posts ">
                            <img src="static/assets/img/wallhaven-3771521.jpg" alt="">
                        </div>

                    </div>
                </div>
                <div class="firstBox  col-lg-6 col-xs-12">

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


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block1 pt-5">
        <h1 class="display-4 text-center">西部世界</h1>
        <hr>
        <div class="contaner">
            <div id="carousel" >
                <div class="carouselWrap"><img class="postImg" src="static/assets/img/wallhaven-53697.jpg" alt="Image 2"/> <span class="iconfont"></span></div>
                <img class="postImg" src="static/assets/img/wallhaven-377152.jpg" alt="Image 3"/> <span class="iconfont"></span>
                <img class="postImg" src="static/assets/img/wallhaven-644594.jpg" alt="Image 4"/> <span class="iconfont"></span>
                <img class="postImg" src="static/assets/img/wallhaven-664064.png" alt="Image 5"/> <span class="iconfont"></span>
            </div>
        </div>
    </div>
    <div class="block1">
        <h1 class="display-4 text-center">西部世界</h1>
        <hr>
        <div class="container">
            <div class="row  d-flex justify-content-around my-3">
                <div class="col-3 musicSmall mx-2 my-4 wow animated fadeInDown"><div class="postImg postSmall"><div class="play text-center">
                            <span class="iconfont"></span>
                        </div><img src="" alt=""></div><div class="musicSmallInfo"><p>我的滑板鞋</p><p>by artist</p></div></div>
                <div class="col-3 musicSmall mx-2 my-4 wow animated fadeInDown"><div class="postImg postSmall"><div class="play text-center">
                            <span class="iconfont"></span>
                        </div><img src="" alt=""></div><div class="musicSmallInfo"><p>我的滑板鞋</p><p>by artist</p></div></div>
                <div class="col-3 musicSmall mx-2 my-4 wow animated fadeInDown"><div class="postImg postSmall"><div class="play text-center">
                            <span class="iconfont"></span>
                        </div><img src="" alt=""></div><div class="musicSmallInfo"><p>我的滑板鞋</p><p>by artist</p></div></div>
                <div class="col-3 musicSmall mx-2 my-4 wow animated fadeInDown"><div class="postImg postSmall"><div class="play text-center">
                            <span class="iconfont"></span>
                        </div><img src="" alt=""></div><div class="musicSmallInfo"><p>我的滑板鞋</p><p>by artist</p></div></div>
                <div class="col-3 musicSmall mx-2 my-4 wow animated fadeInDown"><div class="postImg postSmall"><div class="play text-center">
                            <span class="iconfont"></span>
                        </div><img src="" alt=""></div><div class="musicSmallInfo"><p>我的滑板鞋</p><p>by artist</p></div></div>
                <div class="col-3 musicSmall mx-2 my-4 wow animated fadeInDown"><div class="postImg postSmall"><div class="play text-center">
                            <span class="iconfont"></span>
                        </div><img src="" alt=""></div><div class="musicSmallInfo"><p>我的滑板鞋</p><p>by artist</p></div></div>
                <div class="col-3 musicSmall mx-2 my-4 wow animated fadeInDown"><div class="postImg postSmall"><div class="play text-center">
                            <span class="iconfont"></span>
                        </div><img src="" alt=""></div><div class="musicSmallInfo"><p>我的滑板鞋</p><p>by artist</p></div></div>
                <div class="col-3 musicSmall mx-2 my-4 wow animated fadeInDown"><div class="postImg postSmall"><div class="play text-center">
                            <span class="iconfont"></span>
                        </div><img src="" alt=""></div><div class="musicSmallInfo"><p>我的滑板鞋</p><p>by artist</p></div></div>
                <div class="col-3 musicSmall mx-2 my-4 wow animated fadeInDown"><div class="postImg postSmall"><div class="play text-center">
                            <span class="iconfont"></span>
                        </div><img src="" alt=""></div><div class="musicSmallInfo"><p>我的滑板鞋</p><p>by artist</p></div></div>

            </div>

        </div>

    </div>
    <div class="block1 last">
        <h1 class="display-4 text-center">西部世界</h1>
        <hr>
        <div class="container">
            <table class="table table-hover musicTable">
                <tbody>
                <tr class="wow animated fadeInDown">
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td> <span class="iconfont postImg"></span></td>
                </tr>
                <tr class="wow animated fadeInDown">
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td> <span class="iconfont postImg"></span></td>
                </tr>
                <tr class="wow animated fadeInDown">
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td> <span class="iconfont postImg"></span></td>
                </tr>
                <tr class="wow animated fadeInDown">
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td> <span class="iconfont postImg"></span></td>
                </tr>
                <tr class="wow animated fadeInDown">
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td> <span class="iconfont postImg"></span></td>
                </tr>
                <tr class="wow animated fadeInDown">
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td> <span class="iconfont postImg"></span></td>
                </tr>
                <tr class="wow animated fadeInDown">
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td> <span class="iconfont postImg"></span></td>
                </tr>



                </tbody>
            </table>
        </div>

    </div>


</div>

<!--================================================================================================================================-->

<!--用PHP渲染播放器信息-->
<div id="aplayer"></div>
<div class="info" style="display: none">
    <div class="title">2131231</div>
    <div class="author">3232332</div>
    <div class="posterurl">static/assets/img/wallhaven-671087.jpg</div>
    <div class="musicurl">static/assets/music/Surf RiderThe Lively Ones - Surf Rider.mp3</div>
</div>
<div class="info" style="display: none">
    <div class="title">2131231</div>
    <div class="author">3232332</div>
    <div class="posterurl">static/assets/img/wallhaven-671087.jpg</div>
    <div class="musicurl">static/assets/music/Hooked On A FeelingBlue Swede - Hooked On A Feeling.mp3</div>
</div>
<!--//php待渲染-->


<script src="static/assets/vendors/jQuery/jQuery.js"></script>
<script src="static/assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="static/assets/vendors/wow/wow.min.js"></script>
<script src="static/assets/js/navBar.js"></script>
<script src="static/assets/vendors/aplayer/APlayer.min.js"></script>
<script src="static/assets/vendors/waterwheelCarousel/jquery.waterwheelCarousel.min.js"></script>
<script>

    //视差效果
    $(function () {
        $(window).scroll(function () {
            var winTop = $(window).scrollTop(),
                height = $(window).height();
            if (winTop >= 400) {
                if (winTop >= height + 800) {

                    if (winTop >= height * 2 + 1200) {

                        $('body').css({
                            background: "url('static/assets/img/wallhaven-53697.jpg') no-repeat fixed",
                            backgroundSize: '100% 100%'
                        })
                    } else {
                        $('body').css({
                            background: "url('static/assets/img/wallhaven-50435.jpg') no-repeat fixed",
                            backgroundSize: '100% 100%'
                        })
                    }
                } else {

                    $('body').css({
                        background: "url('static/assets/img/wallhaven-665520.jpg') no-repeat fixed",
                        backgroundSize: '100% 100%'
                    });

                }
            } else {
                $('body').css({
                    background: "url('static/assets/img/wallhaven-3771521.jpg') no-repeat fixed",
                    backgroundSize: '100% 400px'
                });

            }
        })
    });


    //播放器按钮设定和和唱片旋转
    $(function () {
        let ap = new APlayer({
            container: document.getElementById('aplayer'),
            audio: [{
                preload: 'metadata',
                name: '13123',
                artist: '213123',
                url: 'static/assets/music/Ty. - 热的想吐.mp3',
                cover: 'static/assets/img/wallhaven-3771521.jpg',
            }]
        });
        let count = -1;
        $('.postImg').click(function () {
            let index = $('.postImg').index($(this));

            function aplayerPlay() {
                ap.play();
                $('.disc').addClass('postRotate');
                $('.iconfont').text('').eq(index).fadeOut(100).text('').fadeIn();
                $('.posts').html($('.postImgurl').eq(index).html());//将图片放到唱片
            }

            function aplayerPause(){
                ap.pause();
                $('.disc').removeClass('postRotate');
                $('.iconfont').eq(index).fadeOut(100).text('').fadeIn();
            }

            if (count === -1) {
                count = index;
                ap.list.remove(0);
                ap.list.add([{
                    name: $('.title').eq(index).text(),
                    artist: $('.author').eq(index).text(),
                    url: $('.musicurl').eq(index).text(),
                    cover: $('.posterurl').eq(index).text(),
                }]);
                aplayerPlay();
                return;
            }

            if (count === index) {
                if (ap.audio.paused) {
                    aplayerPlay();

                } else {
                    aplayerPause()
                }
            }

            if (count !== -1 && count !== index) {
                ap.list.remove(0);
                ap.list.add([{
                    name: $('.title').eq(index).text(),
                    artist: $('.author').eq(index).text(),
                    url: $('.musicurl').eq(index).text(),
                    cover: $('.posterurl').eq(index).text(),
                }]);
                count = index;
                aplayerPlay();

            }
        });
    });
    $(document).ready(function() {
        $("#carousel").waterwheelCarousel({

        });
    });
    $('.iconfont').on('click',function(){

    });

    new WOW().init();
</script>

</body>
</html>
