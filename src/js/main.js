
var GameChangersSite = {
    // All pages
    page: {
        init: function() {
        // JS here
        },
        finalize: function() { }
        },
        // Home page
    home: {

        init: function() {
            $('.slick').slick({
                autoplay: true,
                speed: 500,
                fade: true,
                autoplaySpeed: 4000,
                cssEase: 'linear'
            });

        },
        finalize: function() { }
        }
}



var UTIL = {
    fire: function(func, funcname, args) {
        var namespace = GameChangersSite;
        funcname = (funcname === undefined) ? 'init' : funcname;
        if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
            namespace[func][funcname](args);
        }
    },
    loadEvents: function() {

        UTIL.fire('common');

        $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
            UTIL.fire(classnm);
        });
        UTIL.fire('common', 'finalize');
    }
};

$(document).ready(UTIL.loadEvents);

function isiPhone(){
    return (
        (navigator.platform.indexOf("iPhone") != -1) ||
        (navigator.platform.indexOf("iPod") != -1)
    );
}

(function(){
    $('.people-select li').each(function(i, v){
        $(v).on('click', function(e){
            //console.log($(v).find('a').attr('href'));

            e.preventDefault();
            $(v).addClass('active').siblings().removeClass('active');
            var slug = $(v).find('a').attr('href');
            slug = slug.substring(1);
            if(slug == 'all'){
                $('.person').removeClass('dim');
            }else{
                slug = '.'+slug;
                $('.person').addClass('dim');
                $(slug).removeClass('dim');
            }
        });
    });
    function pageloaded(){
        if(isiPhone()){
            //dont't do resize
        }else{
            $('.divider').each(function(){
                var highestBox = 0;
                $(this).find('.block-3').each(function(){
                    if($(this).height() > highestBox) 
                       highestBox = $(this).height(); 
                });
                $(this).find('.block-3').height(highestBox);
            });
        }
    }
    $(window).load(function(){
        pageloaded();
        if(window.location.hash){
            $('html, body').animate({
                scrollTop: $( window.location.hash ).offset().top
            }, 500);
        }
    });

    $('a.autoscroll').click(function(){
        $('html, body').animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top
        }, 500);
        return false;
    });

    $('.menu-toggle').on('click', function(){
        $('#menu-menu-1').slideToggle();
    });


    var page = 2;
    $('.ajax-events').on('click', function(){
        ajax_property(page);
        page++;
    });

    function ajax_property(page){
        var path = "/wp-content/themes/game-changers/";
        console.log("Clicked");
        $.ajax({
            type: "GET",
            url: path+'ajax-people.php'+'?page='+page,
            beforeSend: function(){
                $('.more-events').html('<div class="loader"><img src="/wp-content/themes/game-changers/src/img/loader.gif" /><br />Loading Events</div>');     
            },
            success: function(response){
                console.log(response.length);
                if(response.length > 2){
                    $('.people-list').append(response);
                    
                }else{
                    $('.ajax-events').hide();
                }
                
            },
        }); 
    }

})(jQuery);

$(function() {
    $('.easy-modal').easyModal({
        top: 50,
        overlay: 0.2,
        closeOnEscape: false,
    });
    $('a[title="Recommend a Game Changer"]').click(function(e) {
        var target = $(this).attr('href');
        $(target).trigger('openModal');
        e.preventDefault();
    });
});







