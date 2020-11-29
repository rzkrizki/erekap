/*=========================================
 * animatedModal.js: Version 1.0
 * author: AWSomplak
 * instagram: https://www.instagram.com/aw_somplak
 * email: ajiwahyusomplak@gmail.com
 * Licensed MIT 
=========================================*/

(function($){
	$.fn.awshimmer = function(options){
		var _this = this;
		var shimmer = $(_this);

		// Defaults
		var settings = $.extend({
			type: 'content',

			// Callbacks
			beforeLoad: function() {},
			onLoad: function() {},
			afterLoad: function() {}
		}, options);

		var id = shimmer.attr('id').replace('#', ''),
			type = settings.type;

		if (type == 'content'){
			
		} else if(type == 'image'){

		} else if(type == 'video'){

		}

		function beforeLoad(){
			shimmer.addClass(id+'-load');
			settings.beforeLoad();
		}

		function onLoad(){
			settings.onLoad();
		}

		function afterLoad(){
			shimmer.ajaxComplete(function(){
				shimmer.removeClass(id+'-load');
			});
		}
	}
}(jQuery));