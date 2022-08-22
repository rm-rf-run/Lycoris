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

    // 获取QQ头像与名称
    $('#author_qq').on('blur', function () {
        var qq = $('#author_qq').val();
        $reg = /^[1-9]\d{4,9}$/;
        if ($reg.test(qq)) {
            $('#email').val($.trim(qq) + '@qq.com');
            // ajax方法获取昵称
            $.ajax({
                type: 'get',
                //本地调试使用绝对路径
                url: '/wp-content/themes/Lycoris/inc/get_qqInfo.php?type=getqqnickname&qq=' + qq, // func_getqqinfo.php是后端处理文件，注意路径
                dataType: 'jsonp',
                jsonp: 'callback',
                jsonpCallback: 'portraitCallBack',
                success: function (data) {
                    $('#author').val(data[qq][6]); // 将返回的qq昵称填入到昵称input表单上
                },
                error: function () {
                    $('#author_qq,#author,#email').val(''); // 如果获取失败则清空表单
                }
            });
            // 获取头像
            $.ajax({
                type: 'get',
                url: '/wp-content/themes/Lycoris/inc/get_qqInfo.php?type=getqqavatar&qq=' + qq, // func_getqqinfo.php是后端处理文件，注意路径，127.0.0.1 改成你自己的域名！
                dataType: 'jsonp',
                jsonp: 'callback',
                jsonpCallback: 'qqavatarCallBack',
                success: function (data) {
                    $('#author_img').attr('src', data[qq]); // 将返回的qq头像设置到你评论表单区域显示头像的节点上
                },
                error: function () {
                    $('#author_qq,#author,#email').val(''); // 清空表单
                }
            });
        }
    });


})