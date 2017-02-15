$(function () {
    $(document).ready(function () {
        $('.event-list').slimscroll({
            height: '305px',
            wheelStep: 20
        });

        $('.evnt-input').keypress(function (e) {
            var p = e.which;
            var inText = $('.evnt-input').val();
            if (p == 13) {
                if (inText == "") {
                    alert('Empty Field');
                } else {
                    $.ajax({
                        url: 'worker.php?method=addnotes&data=' + inText,
                        type: 'GET',
                        dataType: 'json',
                        success: function (s) {
                            if (s.status == 'success')
                                $('<li id="' + s.id + '">' + inText + '<a href="#"" class="event-close"> &#10005; </a> </li>').appendTo('.event-list');
                        },
                        error: function (e) {
                            console.log('error');
                        }
                    });
                }
                $(this).val('');
                $('.event-list').scrollTo('100%', '100%', {
                    easing: 'swing'
                });
                return false;
                e.epreventDefault();
                e.stopPropagation();
            }
        });

        $(document).on('click', '.event-close', function () {
            var id = $(this).closest("li").attr('id');
            $.ajax({
                url: 'worker.php?method=delnotes&id=' + id,
                type: 'GET',
                dataType: 'json',
                success: function (s) {
                    if (s.status == 'success')
                        $('#' + id).remove();
                },
                error: function (e) {
                    console.log('error');
                }
            });
            return false;
        });

        $.ajax({
            url: 'https://andruxnet-random-famous-quotes.p.mashape.com/',
            type: 'POST',
            dataType: 'json',
            headers: {
                "X-Mashape-Key": "Is5MxOPCbLmshY9cBjl6n98BMcFZp1PVENAjsnCqocxYwLuXL7",
                "Content-Type": "application/x-www-form-urlencoded",
                "Accept": "application/json"
            },
            success: function (s) {
                rewriteByYoda(s);
            },
            error: function (e) {
                console.log('error 1');
            }
        });
    });

    function rewriteByYoda(quote) {
        $.ajax({
            url: 'https://yoda.p.mashape.com/yoda?sentence=' + quote.quote,
            type: 'GET',
            headers: {
                "X-Mashape-Key": "Ayi6ogIWTymshWMp70B65GTNduzjp1q7NREjsnycsfFGdkaEY6",
                "Accepte": "text/plain"
            },
            success: function (s) {
                console.log(s);
                $('#quote-content p').html(s);
            },
            error: function (e) {
                console.log('error');
            }
        });
    }
});
const giphy = {
    baseURL: 'http://api.giphy.com/v1/gifs/',
    key: 'dc6zaTOxFJmzC',
    tag: 'erotic, nudity',
    type: 'random',
    rating: 'r'
};
const $gif_wrap = $('#gif-wrap');
var giphyURL = encodeURI(giphy.baseURL + giphy.type + '?api_key=' + giphy.key + '&tag=' + giphy.tag + '&rating=' + giphy.rating);
var newGif = function () {
    return $.getJSON(giphyURL, function (res) {
        $gif_wrap.css({
            'background-image': 'url("' + res.data.image_original_url + '")'
        });
        refreshRate();
    })
};
var refresh;
const duration = 5000;
var refreshRate = function () {
    clearInterval(refresh);
    refresh = setInterval(function () {
        newGif();
    }, duration);
};
newGif();
