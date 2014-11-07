
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
            $('.slick').slick();

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
    $('.divider').each(function(){
        var highestBox = 0;
        $(this).find('.block-3').each(function(){
            if($(this).height() > highestBox) 
               highestBox = $(this).height(); 
        });
        $(this).find('.block-3').height(highestBox);
    });

    $('.subnav a').click(function(){
        $('html, body').animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top
        }, 500);
        return false;
    });


})(jQuery);

$(function() {
    $('.easy-modal').easyModal({
        top: 200,
        overlay: 0.2
    });
    $('#site-navigation a[title="Recommend a Game Changer"]').click(function(e) {
        var target = $(this).attr('href');
        $(target).trigger('openModal');
        e.preventDefault();
    });
});







