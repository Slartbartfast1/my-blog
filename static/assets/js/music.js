
//视差效果
$(function () {
    $(window).scroll(function () {
        var winTop = $(window).scrollTop(),
            height = $(window).height();
        if (winTop >= 400) {
            if (winTop >= height + 800) {

                if (winTop >= height * 2 + 1200) {

                    $('body').css({
                        background: "url('http://i2.bvimg.com/658595/2145b0347f9bc4b9.jpg') no-repeat fixed",
                        backgroundSize: '100% 100%'
                    })
                } else {
                    $('body').css({
                        background: "url('http://i2.bvimg.com/658595/33c2f13b53fe7f61.jpg') no-repeat fixed",
                        backgroundSize: '100% 100%'
                    })
                }
            } else {

                $('body').css({
                    background: "url('http://i2.bvimg.com/658595/6b17fafa502c1748.jpg') no-repeat fixed",
                    backgroundSize: '100% 100%'
                });

            }
        } else {
            $('body').css({
                background: "url('http://i2.bvimg.com/658595/f55f995f51507939.jpg') no-repeat fixed",
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
            let url=$('.posterurl').eq(index).text();
            let html="<img src='"+url+"'"+'>';
            $('.posts').html(html);//将图片放到唱片
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