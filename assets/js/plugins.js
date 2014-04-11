// remap jQuery to $
(function ($) {

	$.fn.extend({

		// ================================================
		// jQuery.selectReplace
		// customização de select/drop-down
		// @author Ricardo Tomasi / Grifo Tecnologia
		// -
		selectReplace: function () {
			if($.browser.msie&&$.browser.version<7)
				return this;

			return this.each(function () {
				var self=$(this);
				var txt=self.find('option:selected').text();
				var span=$('<span>'+txt+'</span>');
				var focusClass="focus";
				var width=parseInt(self.outerWidth()||self.css('width'),10);

				var outer=self.wrap('<div class="select-replace"/>').parent();
				self.before(span);
				var padding=parseInt(outer.css('padding-left'),10)+parseInt(outer.css('padding-right'),10);
				var classNames=self.attr('class');
				outer
				.css({ width: width-padding+5 })
				.addClass(classNames);
				self.removeClass(classNames);
				self.css({ width: '100%',height: '100%' });
				self.bind('change keypress',function () {
					span
					.text(self.find('option:selected').text())
					.css({ opacity: 0.5 })
					.animate({ opacity: 1 },100,function () {
						this.style.filter='';
					});
				});
				self.focus(function () {
					outer.addClass(focusClass);
				}).blur(function () {
					outer.removeClass(focusClass);
				});
			});
		},
		checkboxReplace: function () {
			return this.filter('input:checkbox').each(function () {
				var c=$(this).wrap('<div class="checkbox-replace" />').parent();
				c[this.checked?'addClass':'removeClass']("checkbox-checked");
				$(this).bind("click change",function () {
					c[this.checked?'addClass':'removeClass']("checkbox-checked");
				});
			}).end();
		},
		radioReplace: function () {
			return this.filter('input:radio').each(function () {
				var c=$(this).wrap('<div class="radio-replace" />').parent();
				c[this.checked?'addClass':'removeClass']("radio-checked");
				$(this).bind("click change",function () {
					$("input[name='"+$(this).attr("name")+"']").parent().removeClass("radio-checked");
					c[this.checked?'addClass':'removeClass']("radio-checked");
				});
			}).end();
		}
	});

})(this.jQuery);
//placeholder
(function($){
	var ph = "PLACEHOLDER-INPUT";
	var phl = "PLACEHOLDER-LABEL";
	var boundEvents = false;
	var default_options = {
		labelClass: 'placeholder'
	};

	//check for native support for placeholder attribute, if so stub methods and return
	var input = document.createElement("input");
	if ('placeholder' in input) {
		$.fn.placeholder = $.fn.unplaceholder = function(){}; //empty function
		delete input; //cleanup IE memory
		return;
	};
	delete input;

	$.fn.placeholder = function(options) {
		bindEvents();

		var opts = $.extend(default_options, options)

		this.each(function(){
			var rnd=Math.random().toString(32).replace(/\./,'')
				,input=$(this)
				,label=$('<label style="position:absolute;display:none;top:0;left:0;"></label>');

			if (!input.attr('placeholder') || input.data(ph) === ph) return; //already watermarked

			//make sure the input tag has an ID assigned, if not, assign one.
			if (!input.attr('id')) input.attr('id') = 'input_' + rnd;

			label	.attr('id',input.attr('id') + "_placeholder")
					.data(ph, '#' + input.attr('id'))	//reference to the input tag
					.attr('for',input.attr('id'))
					.addClass(opts.labelClass)
					.addClass(opts.labelClass + '-for-' + this.tagName.toLowerCase()) //ex: watermark-for-textarea
					.addClass(phl)
					.text(input.attr('placeholder'));

			input
				.data(phl, '#' + label.attr('id'))	//set a reference to the label
				.data(ph,ph)		//set that the field is watermarked
				.addClass(ph)		//add the watermark class
				.after(label);		//add the label field to the page

			//setup overlay
			itemIn.call(this);
			itemOut.call(this);
		});
	};

	$.fn.unplaceholder = function(){
		this.each(function(){
			var	input=$(this),
				label=$(input.data(phl));

			if (input.data(ph) !== ph) return;

			label.remove();
			input.removeData(ph).removeData(phl).removeClass(ph);
		});
	};


	function bindEvents() {
		if (boundEvents) return;

		//prepare live bindings if not already done.
		$('.' + ph)
			.live('click',itemIn)
			.live('focusin',itemIn)
			.live('focusout',itemOut);
		bound = true;

		boundEvents = true;
	};

	function itemIn() {
		var input = $(this)
			,label = $(input.data(phl));

		label.css('display', 'none');
	};

	function itemOut() {
		var that = this;

		//use timeout to let other validators/formatters directly bound to blur/focusout work first
		setTimeout(function(){
			var input = $(that);
			$(input.data(phl))
				.css('top', input.position().top + 'px')
				.css('left', input.position().left + 'px')
				.css('display', !!input.val() ? 'none' : 'block');
		}, 200);
	};

}(jQuery));