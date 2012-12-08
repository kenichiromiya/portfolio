$(document).ready(function () {

	$(function() {
		$(window).bottom({proximity: 0.05});
		$(window).on('bottom', function() {
			var obj = $(this);
			if (!obj.data('loading')) {
				obj.data('loading', true);
				if (!obj.data('start')) {
					obj.data('start',$("#container").children().size());
				}
				$.ajax({
					url: "?start="+obj.data('start'),
					cache: false,
					success: function(html){
						$("#container").append(html);
						var state = $("#container").html();
						obj.data('start', obj.data('start')+10);
						obj.data('loading', false);
						history.replaceState(state, "", "");
					}
				});
			}
		});
		$(window).on('popstate', function(jqevent) {
			if(jqevent.originalEvent.state){
				$("#container").children().remove();
				$("#container").append(jqevent.originalEvent.state);
			}
		});
	});

});
