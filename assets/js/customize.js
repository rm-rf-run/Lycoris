$(function() {
    $("#show-more").click(function() { //点击实现加载更多，你可以根据自己需要改成下拉自动加载
        const next_url = $(this).attr("href");
        const next_text = $(this).text();
        if (next_text == '加载更多') {
            NProgress.start();
            $(this).text('加载中...');
            $.ajax({
                type: 'get',
                url: next_url + '#article-list',
                success: function(data) {
                    let result = $(data).find(".jubenlists");
                    let next_link = $(data).find("#show-more").attr("href");
                    if (next_link != undefined) {
                        $('#show-more').attr("href", next_link);
                        $('#show-more').text('加载更多');
                    } else {
                        $("#show-more").remove();
                    }
                    $(function() {
                        if (next_url.indexOf("page") < 1) {
                            $(".jubenlists").html('');
                        }
                        $("#aaa").before(result.fadeIn(200));
                    });
                    NProgress.done();
                },
                error: function (){
                    NProgress.done();
                }
            });
        }
        return false;
    });

    var t = $(window).height(),
        e = $(".to-top"),
        n = this;
    n.keyframes = 0;
    n.isVisible = false;
    n.isClick = false;
    $(window).off("scroll.toTop").on("scroll.toTop", (function () {
        var i = $(window).scrollTop();
        i - n.lastTrace > 0 ? (n.isClick && e.removeClass("transition"), i >= t / 2 && (!n.isVisible && e.stop().fadeIn(100), n.isVisible = !0, n.keyframes = 0, e.css("background-position-x", "-40px")), n.isClick = !1) : i < t / 2 && (n.isVisible && e.stop().fadeOut(100), n.isVisible = !1);
        n.lastTrace = i
    }))

    //点击回到顶部
    $('.to-top').click(function (event) {
        var t = 0,
            e = $(".to-top");
        Mt = setInterval((function () {
            t++,
                e.css({
                    "background-position-x": -(143 * t + 40) + "px"
                }),
            5 === t && e.addClass("transition"),
            6 === t && (t = 0, clearInterval(Mt), $("html, body").stop().animate({
                scrollTop: 0
            }, "fast"))
        }), 100)
    });

})