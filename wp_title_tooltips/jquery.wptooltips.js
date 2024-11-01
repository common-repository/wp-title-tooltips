jQuery.fn.wptooltips=function(_1,_2,_3){jQuery(this).mouseover(function() {if (jQuery(_1).attr("wtt") != _2) {jQuery(".wttt-content").css({height: "60px"});jQuery(_1).attr("wtt", _2);var temp = jQuery(_2).html();jQuery(_1).css({height: "86px"}).empty().slideUp("fast").html(temp).prepend("<a class=\"wttt_class\" href=\"javascript:void(0);\" style=\"float:left; _margin-left:10px;\" onclick=\"jQuery('"+_1+"').attr('wtt', 'nowtt').slideUp('fast');\"><IMG alt=\"\" src=\""+_3+"close.gif\"></a>").slideDown("fast");return false;}})}
function wtttCallCommentList(_a,_b,_c){
var wttt = jQuery(".wp_i_tooltips #wttt-"+_a+"-content");
jQuery(".wp_i_tooltips #wttt-"+_a+"-content").html("&nbsp;&nbsp;&nbsp;Loading Recent Comments......");
jQuery.ajax({url:_c+"/wp-content/plugins/wp_title_tooltips/comments-ajax.php",dataType:"html",type:"post",data:"glll="+_a+"&email="+_b,success:function(_f){
jQuery(".wp_i_tooltips").css({height: "200px"});
jQuery(".wttt-content").css({height: "180px"});
wttt.html(_f);
},error:function(){
wttt.html("&nbsp;&nbsp;&nbsp; error - . -");
}});
}