var timer_1; var timer_tabs;
$(document).ready(function(e) {

/* Слайдер jcarousel */
    $('.jcarousel')
    .jcarousel({
// Core configuration goes here
    })
    .jcarouselAutoscroll({
        interval: 5000,
        target: '+=1',
        autostart: true
    });

/* Остановка интервала при клике на любой закладке */
    $('#tabs_wrapper .sort a, #tabs_wrapper .category a').live('click', function() {
        if (timer_tabs) clearInterval(timer_tabs);
        var tab_id=$(this).attr('id');
        tabClick(tab_id);
        return false;
    });

/* Установка интервала переключения закладок */
    $(function(){
        timer_tabs = setInterval(function(){
            var elem = $('#tabs_wrapper .sort span.current'), next;
            if (elem.data('id') != '3') next = elem.next('span');
            else next = $('#tabs_wrapper .sort span.first');
            tabClick(next.children('a').attr('id'));
        }, 6000);
    });

/* Добавление товаров в корзину из таба */
    $(".pm .m").click(function(e) {
        e.preventDefault();
        var parent = $(this).parents(".pm");
        var url = parent.next("input"); if (!url.length) url = parent.prev("input");
        var count = url.attr("value");
        if (count > 0) {url.attr("value", parseInt(count)-1)}
        if (parent.hasClass('submit')) parent.parents('form').submit();
    });

    $('.basketitem input.count.submit').change(function(){
        $(this).parents('form').submit();
    })

    $(".pm .p").click(function(e) {
        e.preventDefault();
        var parent = $(this).parents(".pm");
        var url = parent.next("input"); if (!url.length) url = parent.prev("input");
        var count = url.attr("value");
        url.attr("value", parseInt(count)+1)
        if (parent.hasClass('submit')) parent.parents('form').submit();
    });

/* Каталог */
    $(".relative .btn").click(function(e) {
        var Link = $(this);
        var Window = $("+ .window",this);
        if (!Window.length || Link.parents('.window') == Window) return;
        $(".window").fadeOut(200);
        e.preventDefault();
        Window.children('small').hide();
        Window.children('form').show();
        var active = $(this).attr('data-active');
        if(active == 1) {
            Window.fadeOut(200);
            $(this).attr('data-active', '0');
        }
        else {
            Window.fadeIn(200);
            $(this).attr('data-active', '1');
        }
    });

    $(".relative .btn").mouseup(function() {
        var st = $(this).attr('data-active');
        $(".relative .btn").attr('data-active', '0');
        if(st=='1'){
            $(this).attr('data-active', '1');
        }
        else {
            $(this).attr('data-active', '0');
        }
        return false
    });

    $(".window > .close").mouseup(function() {
        $(".window").fadeOut(200);
        $(".relative .btn").attr('data-active', '0');
        $("#shadow").fadeOut();
    });

}); // конец ready

/* Функция переключения закладок */
function tabClick(tab_id) {
	if (tab_id != $('#tabs_wrapper .right a.active').attr('id') ) {
	    $('#tabs_wrapper .tabs').removeClass('active').removeClass('current');
	    $('#'+tab_id).addClass('active').parent().addClass('current');
	    $('#con_' + tab_id).addClass('active');
	}
}
