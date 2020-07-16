jQuery(document).ready(function($) {
	var _this = $(".entry")
	var nav = $("#quick_navigation");

	if($(nav).is(":empty")){
	    $(_this).find("h3").each( function(index,value){
			$(nav).append("<a class=\"anchor_link\" href=\"#anchor-" + index + "\">" + $(this).html() + "</a>");
			$(this).html("<a class=\"anchor\" name=\"anchor-" + index +"\"></a>" + $(this).html());
		});
	}
});