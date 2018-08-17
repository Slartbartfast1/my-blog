//轮播图按钮
$(function () {

    var size = $('.inTheaterMovie').length,
        count = 0;
    $('.pageCount').text(count + 1 + '/' + size / 5);
    var width=$('.inTheaterMovie').width()*1.2;
    $('.iTSlideBox').css({width: size * width});
    $('.next').on('click', function () {
        count++;
        pageCount();
        slider();
    });
    $('.prev').on('click', function () {
        count--;
        pageCount();
        slider();
    });

    //轮播图主体
    function slider() {
        if (count == -1) {
            count = 0;
            $('.pageCount').text(count + 1 + '/' + size / 5);
            return;
        }
        if (count >= size / 5) {
            count = (size / 5) - 1;
            return;
        }
        $('.iTSlideBox').animate({left: -count * 5*width}, 300);
    }

    function pageCount() {
        if (count >= size / 5) {
            $('.pageCount').text(count + '/' + size / 5);

        } else {
            $('.pageCount').text(count + 1 + '/' + size / 5);
        }
    }
});
//正在热映
function inTheaterMovies(res) {
    var html = $('#movieInTheater').render({movies: res.subjects});
    $('.iTSlideBox').html(html);
}

//新片榜
function newMovies(res) {
    var html = $('#newMovies').render({newMovies: res.subjects});
    $('.newMovies tbody').html(html);
}

//北美票房榜
function usBox(res) {
    var html = $('#usBox').render({usBox: res.subjects});
    $('.usBox tbody').html(html);
}

//一周口碑榜
function weekly(res){
    var html = $('#weekly').render({weekly: res.subjects});
    $('.weekly tbody').html(html);
}

function top10(res){
    var html = $('#top10').render({top10: res.subjects});
    $('.top10 tbody').html(html);
}