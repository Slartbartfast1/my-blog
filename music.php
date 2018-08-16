<?php include 'navBar.php';
require_once 'static/function.php';
$section1=myFetchAll("select * from music where album=1");
$section2=myFetchAll("select * from music where album=2");
$section3=myFetchAll("select * from music where album=3");
$section4=myFetchAll("select * from music where album=4");






 ?>
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
<link rel="stylesheet" href="static/assets/css/footer.css">

<style>

    body {
        z-index: 1;
        width: 100%;
        height: 100%;
        position: absolute;
        background: url("static/assets/img/wallhaven-3771521.jpg") no-repeat fixed;
        background-size: 100% 400px;
        transition-duration: 0s;
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

    .last {
        /*height:400px;*/
    }

    .firstBox > div {
        height: 25%;
        background-color: pink;
    }

    .disc {
        left:-100px;
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

    /*audio {*/
        /*height: 100%;*/
        /*!*width: 100%;*!*/
    /*}*/

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
        padding: 0;
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
    .footer{
        z-index: 100;
        bottom: -350px
    }

    @media screen and (min-width: 320px) and (max-width: 480px) {

        .musicSmall{
            height: 20vw;
            font-size: 16px;
        }

        .disc{
            left: 300px;
        }
        .musicSmallInfo p{
            display: inline-block;
            position:relative;
            top:-25px;
            margin-top:10px;
        }



    }

</style>
<link rel="stylesheet" href="static/assets/css/footer.css">
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
                    <?php foreach ($section1 as $item): ?>
                    <div class="mt-2 musicBox">

                        <div class="postImg">
                            <div class="shadow">
                            </div>
                            <div class="play text-center">
                                <span class="iconfont"></span>
                            </div>
                            <div class="postImgurl">
                                <img src="<?php echo $item['posterurl'] ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
    <div class="block1 pt-5">
        <h1 class="display-4 text-center">西部世界</h1>
        <hr>
        <div class="contaner">
            <div id="carousel" >
                <div class="carouselWrap">
                    <?php foreach ($section2 as $item): ?>
                    <img class="postImg" src="<?php echo $item['posterurl'] ?>" alt=""/> <span class="iconfont" style="display: none"></span>
                    <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div>
    <div class="block1">
        <h1 class="display-4 text-center">西部世界</h1>
        <hr>
        <div class="container">
            <div class="row  d-flex justify-content-around my-3">
                <?php foreach ($section3 as $item): ?>
                <div class="col-lg-3 col-xs-8 musicSmall mx-2 my-4 wow animated fadeInDown"><div class="postImg postSmall"><div class="play text-center">
                            <span class="iconfont"></span>
                        </div><img src="<?php echo $item['posterurl'] ?>" alt=""></div><div class="musicSmallInfo"><p><?php echo $item['title'] ?></p><p>by <?php echo $item['author'] ?></p></div></div>
                <?php endforeach; ?>

            </div>

        </div>

    </div>
    <div class="block1 last">
        <h1 class="display-4 text-center">西部世界</h1>
        <hr>
        <div class="container">
            <table class="table table-hover musicTable">
                <tbody>
                <?php foreach ($section4 as $item): ?>
                <tr class="wow animated fadeInDown">
                    <td><img src="<?php echo $item['posterurl'] ?>" alt="" width="100" height="120"></td>
                    <td><?php echo $item['title'] ?></td>
                    <td><?php echo $item['author'] ?></td>
                    <td> <span class="iconfont postImg"></span></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
    <div class="footer ">
        <div class="footerItem text-center">

            <div class="link">
                <div class="QR"><img src="static/assets/img/微信图片_20180815234204.jpg" alt="" class="img-fluid"></div>
                <a href="#" class="icon1 wechat"><span></span></a>
                <a href="https://blog.csdn.net/Slartibartfast" class="icon1 csdn"><span></span></a>
                <a href="https://github.com/Slartbartfast1" class="icon1 github"><span></span></a>

            </div>

            <small class="text-muted">15212068@bjtu.edu.cn</small>
            <p class="text-muted">© 2018 泛银河系含漱爆破液</p>
        </div>
    </div>

</div>


<!--================================================================================================================================-->

<!--用PHP渲染播放器信息-->
<div id="aplayer"></div>

<?php foreach ($section1 as $item): ?>
    <div class="info" style="display: none">
        <div class="title"><?php echo $item['title'] ?></div>
        <div class="author"><?php echo $item['author'] ?></div>
        <div class="posterurl"><?php echo $item['posterurl'] ?></div>
        <div class="musicurl"><?php echo $item['musicurl'] ?></div>
    </div>
<?php endforeach; ?>
<?php foreach ($section2 as $item): ?>
    <div class="info" style="display: none">
        <div class="title"><?php echo $item['title'] ?></div>
        <div class="author"><?php echo $item['author'] ?></div>
        <div class="posterurl"><?php echo $item['posterurl'] ?></div>
        <div class="musicurl"><?php echo $item['musicurl'] ?></div>
    </div>
<?php endforeach; ?>
<?php foreach ($section3 as $item): ?>
    <div class="info" style="display: none">
        <div class="title"><?php echo $item['title'] ?></div>
        <div class="author"><?php echo $item['author'] ?></div>
        <div class="posterurl"><?php echo $item['posterurl'] ?></div>
        <div class="musicurl"><?php echo $item['musicurl'] ?></div>
    </div>
<?php endforeach; ?>
<?php foreach ($section4 as $item): ?>
    <div class="info" style="display: none">
        <div class="title"><?php echo $item['title'] ?></div>
        <div class="author"><?php echo $item['author'] ?></div>
        <div class="posterurl"><?php echo $item['posterurl'] ?></div>
        <div class="musicurl"><?php echo $item['musicurl'] ?></div>
    </div>
<?php endforeach; ?>

<!--//php待渲染-->


<script src="static/assets/vendors/jQuery/jQuery.js"></script>
<script src="static/assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="static/assets/vendors/wow/wow.min.js"></script>
<script src="static/assets/js/navBar.js"></script>
<script src="static/assets/vendors/waterwheelCarousel/jquery.waterwheelCarousel.min.js"></script>
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
