var timer_tabs;
$(document).ready(function(e) {
/* Переключение закладок */
    $('#tabs_wrapper .sort a, #tabs_wrapper .category a').live('click', function() {
        var tab_id=$(this).attr('id');
        tabClick(tab_id);
        return false;
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
