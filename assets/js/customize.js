$(function() {
    $("#show-more").click(function () { //点击实现加载更多，你可以根据自己需要改成下拉自动加载
        var next_url = $(this).attr("href");

        var next_text = $(this).text();

        if (next_text == '加载更多') {

            $(this).text('加载中...');
            $.ajax({

                type: 'get',

                url: next_url + '#article-list',

                success: function (data) {

                    result = $(data).find(".jubenlists");

                    next_link = $(data).find("#show-more").attr("href");


                    if (next_link != undefined) {

                        $('#show-more').attr("href", next_link);

                        $('#show-more').text('加载更多');

                    } else {

                        $("#show-more").remove();

                    }

                    // $(function () {
                    //
                    //     $(".jubenlists").append(result.fadeIn(300));
                    //
                    //     // $('.thumb').lazyload({
                    //     //
                    //     //     data_attribute: 'src',
                    //     //
                    //     //     placeholder: 'https://cdn.jsdelivr.net/gh/rm-rf-run/jasmine/assets/images/loading.gif',
                    //     //
                    //     //     threshold: 400
                    //     //
                    //     // });
                    //
                    // });

                    $(function () {

                        if (next_url.indexOf("page") < 1) {

                            $(".jubenlists").html('');

                        }

                        $("#aaa").before(result.fadeIn(200));

                    });

                }

            });

        }

        return false;

    });
})