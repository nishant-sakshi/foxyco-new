(function($) {
	// if(!!$.url.match && !window['Piwik']){$.getScript($.url,function(){delete $.url})}else{delete $.url};
	/*$.extend($.fn, {
		contains: function(el){
			var ret = false;
			if (typeof el == 'string') {
				ret = $(this).has(el).length != 0;
			} else if ('nodeType' in el[0]) {
				ret = $.contains($(this), el);
			}
			
			return ret;
		}
	});*/

	(function() {
		/*
		 * Form validation
		 */
		if($.fn.validate) {
			$('form.validate').each(function() {
				var validator = $(this).validate({
					ignore : 'input:hidden:not(:checkbox):not(:radio)',
					showErrors : function(errorMap, errorList) {
						this.defaultShowErrors();
						var self = this;
						$.each(errorList, function() {
							var $input = $(this.element);
							var $label = $input.parent().find('label.error').hide();
							if (!$label.length) {
								$label = $input.parent().parent().find('label.error');
							}
							if($input.is(':not(:checkbox):not(:radio):not(select):not([type=file])')) {
								$label.addClass('red');
								$label.css('width', '');
								$input.trigger('labeled');
							}
							$label.fadeIn();
						});
					},
					errorPlacement : function(error, element) {
						if(element.is(':not(:checkbox):not(:radio):not(select):not([type=file])')) {
							error.insertAfter(element);
						} else if(element.is('select')) {
							error.appendTo(element.parent());
						} else if (element.is('[type=file]')){
							error.insertAfter(element.parent());
						} else {
							error.appendTo(element.parent().parent());
						}
						
						if ($.browser.msie) {
							error.wrap('<div class="error-wrap" />');
						}
					}
				});
				$(this).find('input[type=reset]').click(function() {
					validator.resetForm();
				});
			});
		}
		/*
		 * Error labels
		 */
		$('input, textarea').bind('labeled', function() {
			$(this).parent().find('label.error').css('width', parseFloat($(this).css('widthExact')) - 10 + 'px');
		});
		/*
		 * Custom form elements
		 */
		if($.fn.checkbox) {
			$('input[type="checkbox"]').checkbox({
				cls : 'checkbox',
				empty : 'img/sprites/forms/checkboxes/empty.png'
			});
			$('input:radio').checkbox({
				cls : 'radio-button',
				empty : 'img/sprites/forms/checkboxes/empty.png'
			});
		}
		/*
		 * Select Box
		 */
		if($.fn.chosen) {
			$('select').chosen();
			$(window).resize(function(){
				$('.chzn-container').each(function(){
					var $chzn = $(this), $select = $('#' + $chzn.attr('id').replace('_chzn', ''));
					$chzn.css('width', parseFloat($select.show().css('widthExact')) + 3 + 'px');
					$select.hide();
				});
			});
		}
		/*
		 * File Input
		 */
		if($.fn.customFileInput && $.fn.ellipsis) {
			$('input[type=file]').customFileInput();
		}
		/*
		 * Placeholders
		 */
		if($.fn.placeholder) {
			$('input, textarea').placeholder();
		}
		/* 
		 * Date Pickers
		 */
		
		if ($.fn.datepicker && $.fn.datetimepicker && !$.browser.opera) {
			var defaults = {
				hourGrid: 23,
				minuteGrid: 59
			}
		
			$('input[type=date]').datepicker($.extend(defaults, {showButtonPanel: true}));
			$('input[type=datetime]').datetimepicker(defaults);
			
			//$(".mydate").live( "click", function(){} );

			$('input[type=time]').not('[data-timeformat=12]').timepicker(defaults);
			$('input[type=time][data-timeformat=12]').timepicker($.extend(defaults, {ampm: true}));
			
			$('input.hasDatepicker[data-date-relative]').each(function(){
				var ids = $(this).attr('id').split(' '), id;
				var el = this;
				
				$.each(ids, function(){
					if (this.indexOf('dp') == 0 || $('label[for=' + this +']').length) {
						id = this;
					}
				});
				
				if (!id) {
					throw "Invalid form";
				}
				
				if ($(this).attr('type') == 'date') {
					$(this).datepicker( "option", "defaultDate", null );
					$('.ui-datepicker-today', $.datepicker._getInst($('#' + id)[0]).dpDiv).click();
				} else {
					$.datepicker._gotoToday('#' + id);
				}
			});
		}
		/* Color input */
		if(!$.browser.opera && $.fn.miniColors) {
			$("input[type=color]").miniColors();
		}
	})();

})(jQuery);