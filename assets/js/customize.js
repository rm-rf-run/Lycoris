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
})