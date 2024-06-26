var $j = jQuery.noConflict();

$j(document).ready(function() {
	"use strict";

	dropDownMenu();

	languageMenu();
	
	setDropDownMenuPosition();

	dropDownMenu2();

	selectMenu();

	initAccordion();

	initAccordionFullWidth();

	accordionFullWidth();

	initAccordionContentLink();

	backToTop();

	backButtonInterval();

	fitVideo();

	initCounter();

	initToCounter();

	initDoughnutProgressBar();

	initDoughnutProgressBar2();

	initFlexSlider();

	initFullWidthHolder();

	initListAnimation();

	initMessages();

	initNiceScroll();
	
	initBlog();
	
	socialShareOpen();

	initParallax(parallax_speed);

	addPlaceholderSearchWidget();

	placeholderReplace();

	initPortfolioSlider();

	prettyPhoto();

	initProgressBars();

	initProgressBarsVertical();

	viewPort();

	loadMore();

	initCheckSafariBrowser();
	
});

$j(window).load(function(){
	"use strict";
	
	magicPanes();
	$j('header').removeClass('hide_background');
	$j('.touch .main_menu li:has(div.second)').doubleTapToGo(); // load script to close menu on youch devices
	logo_height = $j('.logo img').height();
	setLogoHeightOnLoad();
	checkLogOnSmallestSize();
	$j('.logo a').css('visibility','visible');
	initProjects();
	resetFilter();
	initElements();
	initTabs();
	setSidebarBackgroundColor();
	setBlogPortfolioListHeight();
	initPortfolioSingleInfo();
	initPortfolioHover();
});

$j(window).scroll(function() {
	"use strict";
	
	var scroll = $j(window).scrollTop();
	if($j(window).width() > 768 && $j('.no_fixed').length === 0){
		headerSize(scroll);
	}
	
});

$j(window).resize(function() {
	"use strict";
	
	initPortfolioHover();
	accordionFullWidth();
	initFullWidthHolder();
	initFullWidthSinglePortfolio();
	setSidebarBackgroundColor();
	setBlogPortfolioListHeight();
	setDropDownMenuPosition();
	checkLogOnSmallestSize();
	magicPanes();
});

function dropDownMenu(){
	"use strict";
	
	var menu_items = $j('.no-touch .drop_down > ul > li');

	menu_items.each( function(i) {

		if ($j(menu_items[i]).find('.second').length > 0) {
		
			$j(menu_items[i]).data('original_height', $j(menu_items[i]).find('.second').height() + 'px');
			$j(menu_items[i]).find('.second').hide();
			
			$j(menu_items[i]).mouseenter(function(){
				$j(menu_items[i]).find('.second').css({'visibility': 'visible','height': '0px', 'opacity': '0', 'display': 'block'});
				$j(menu_items[i]).find('.second').stop().animate({'height': $j(menu_items[i]).data('original_height'),opacity:1}, 400, function() {
					$j(menu_items[i]).find('.second').css('overflow', 'visible');
					
				});

				dropDownMenuThirdLevel();
			}).mouseleave( function(){
				$j(menu_items[i]).find('.second').stop().animate({'height': '0px'},0, function() {
					$j(menu_items[i]).find('.second').css({'overflow': 'hidden', 'visivility': 'hidden', 'display': 'none'});				
				});
			});
		}
	});
}

function languageMenu(){
	"use strict";
	
	var lang_item = $j('.header_right_widget #lang_sel > ul > li');
	
		if ($j(lang_item).find('ul').length > 0) {
			
			$j(lang_item).data('original_height', $j(lang_item).find('ul').height() + 'px');
			$j(lang_item).find('ul').hide();
			
			$j(lang_item).mouseenter(function(){
				$j(lang_item).find('ul').css({'visibility': 'visible','height': '0px', 'opacity': '0', 'display': 'block'});
				$j(lang_item).find('ul').stop().animate({'height': $j(lang_item).data('original_height'),opacity:1}, 400, function() {
					$j(lang_item).find('.second').css('overflow', 'visible');
					
				});
			}).mouseleave( function(){
				$j(lang_item).find('ul').stop().animate({'height': '0px'},0, function() {
					$j(lang_item).find('ul').css({'overflow': 'hidden', 'visivility': 'hidden', 'display': 'none'});				
				});
			});
		}
	
}

function setDropDownMenuPosition(){
	"use strict";

	var menu_items = $j(".drop_down > ul > li");
	menu_items.each( function(i) {

		var browser_width = $j(window).width()-16; // 16 is width of scroll bar
		var boxed_layout = 1150; // boxed layout width
		var menu_item_position = $j(menu_items[i]).offset().left;
		var sub_menu_width = $j('.drop_down .second .inner2 ul').width();
		var menu_item_from_left = 0;
		if($j('body').hasClass('boxed')){
			menu_item_from_left = boxed_layout - (menu_item_position - (browser_width - boxed_layout)/2) + 25; // 25 is right padding between menu elements
		} else {
			menu_item_from_left = browser_width - menu_item_position + 25; // 25 is right padding between menu elements
		}
		var sub_menu_from_left;
			
		if($j(menu_items[i]).find('li.sub').length > 0){
			sub_menu_from_left = menu_item_from_left - sub_menu_width;
		}
		
		if(menu_item_from_left < sub_menu_width || sub_menu_from_left < sub_menu_width){
			$j(menu_items[i]).find('.second').addClass('right');
			$j(menu_items[i]).find('.second .inner .inner2 ul').addClass('right');
		}
	});
}

function dropDownMenu2(){
	"use strict";
	
	var widget_width = $j('.header_right_widget').width();
	var margin = -1000 - widget_width;

	$j('.drop_down2 .second').css({'margin-left': margin, 'margin-right': margin});

	$j('.no-touch .drop_down2 > ul > li').each(function(){
		
		var height = $j(this).find('.second').height();	

		$j(this).mouseenter(function(){
			$j(this).find('.second').height(0);
			$j(this).find('.second').css({'visibility': 'visible', 'z-index': '100'});
			$j(this).find('.second').stop().animate({height:height+20},400);
		}).mouseleave(function(){
			$j(this).find('.second').css('z-index','90');
			$j(this).find('.second').stop().animate({height:0},400,function(){
				$j(this).css('visibility','hidden');
				$j(this).height(0);
			});
		});	
	});
}

function dropDownMenuThirdLevel(){
	"use strict";

	var menu_items2 = $j('.no-touch .drop_down ul li > .second > .inner > .inner2 > ul > li');
	menu_items2.each( function(i) {
		if ($j(menu_items2[i]).find('ul').length > 0) {
			var sum=0;
			$j(menu_items2[i]).find('ul li').each( function(){ sum+=$j(this).height();});
			
			$j(menu_items2[i]).data('original_height', sum + 'px');
			
			var size2 = $j(menu_items2[i]).find('ul > li').size()*10 + 100;
			$j(menu_items2[i]).mouseenter(function(){
				$j(menu_items2[i]).find('ul').css({'visibility': 'visible','height': '0px', 'opacity':'0', 'display': 'block', 'padding': '10px 0'});
				$j(menu_items2[i]).find('ul').stop().animate({'height': $j(menu_items2[i]).data('original_height'),opacity:1}, size2, function() {
					$j(menu_items2[i]).find('ul').css('overflow', 'visible');
				});
			}).mouseleave(function(){
				$j(menu_items2[i]).find('ul').stop().animate({'height': '0px'},0, function() {
					$j(menu_items2[i]).find('ul').css({'overflow': 'hidden', 'padding': '0'});
					$j(menu_items2[i]).find('.second').css('visivility', 'hidden');
				});
			});
		}
	});
}

function selectMenu(){
	"use strict";

	var $menu_select = $j("<div class='select'><ul></ul></div>");
	$menu_select.appendTo(".selectnav");
	
	if($j(".main_menu").hasClass('drop_down')){
		$j(".main_menu ul li a").each(function(){
			var menu_url = $j(this).attr("href");
			var menu_text = $j(this).text();
			if ($j(this).parents("li").length === 2) { menu_text = "&nbsp;&nbsp;&nbsp;" + menu_text; }
			if ($j(this).parents("li").length === 3) { menu_text = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + menu_text; }
			if ($j(this).parents("li").length > 3) { menu_text = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + menu_text; }
			
			var li = $j("<li />");
			var link = $j("<a />", {"href": menu_url, "html": menu_text});
			link.appendTo(li);
			li.appendTo($menu_select.find('ul'));
		});
	} else if($j(".main_menu").hasClass('drop_down2')){
		$j(".main_menu ul li a").each(function(){
			var menu_url = $j(this).attr("href");
			var menu_text = $j(this).text();
			if ($j(this).parents("div.mc").length === 1) { menu_text = "&nbsp;&nbsp;&nbsp;" + menu_text; }
			if ($j(this).hasClass('sub')) { menu_text = "&nbsp;&nbsp;&nbsp;&nbsp;" + menu_text; }
			
			var li = $j("<li />");
			var link = $j("<a />", {"href": menu_url, "html": menu_text});
			link.appendTo(li);
			li.appendTo($menu_select.find('ul'));
		});
	}
	
	$j(".selectnav_button span").click(function () {
		if ($j(".select ul").is(":visible")){
			$j(".select ul").slideUp();
		} else {
			$j(".select ul").slideDown();
		}
	});
	
	$j(".selectnav ul li a").click(function () {
		$j(".select ul").slideUp();
	});
}

function magicPanes(){
	"use strict";

	var $magicLine = $j("#magic");
	var $menulinks = $j(".main_menu > ul > li");
	if($j(".main_menu .active").length > 0){
		
		$j('body').removeClass('menuHoverOn');
		
		$magicLine.width($j(".active").outerWidth(true)).css("left", $j(".active").position().left);
		$magicLine.width($j(".active").outerWidth(true) - 30).css("left", $j(".active").position().left + 15).data("origLeft", $magicLine.position().left).data("origWidth", $magicLine.width());
		
		var $el;
		var $leftPos;
		var $newWidth;
		$menulinks.mouseenter(function() {
			$el = $j(this);
			$leftPos = $el.position().left;
			$newWidth = $el.outerWidth(true);
			
			return $magicLine.stop().animate({
				left: $leftPos,
				width: $newWidth
			},300);
			
		}).mouseleave(function() {
			
			return $magicLine.stop().animate({
				left: $magicLine.data("origLeft"),
				width: $magicLine.data("origWidth")
			}, 300);
		});
		
		$j('nav > ul > li a').each(function() {
			$j(this).click(function(){
				if($j(this).attr('href') !== "http://#" && $j(this).attr('href') !== "#"){
				
					$j('a').parent().removeClass('active');
					if($j(this).closest('.second').length === 0){
						$j(this).parent().addClass('active');
					}else{
						$j(this).closest('.second').parent().addClass('active');
					}
	
					$magicLine.data("origLeft", $leftPos + 15).data("origWidth", $newWidth - 30);
					$magicLine.stop().animate({
						left: $magicLine.data("origLeft"),
						width: $magicLine.data("origWidth")
					});
					
				}else{
					return false;
				}
			});
		});
	}else{
		$j('body').addClass('menuHoverOn');
	}
}

function initAccordion(){
	"use strict";
	
	if($j('.accordion').length){
		$j(".accordion").each(function(){
			var $this = $j(this);
			$this.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset")
			.find("h5")
			.addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom")
			.hover(function() { $j(this).toggleClass("ui-state-hover"); })
			.click(function() {

			$j(this).parent().siblings().find('.accordion_content').slideUp(300).removeClass("ui-accordion-content-active");
			$j(this).parent().siblings().find('h5').removeClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom");
			$j(this)
				.toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
				.next().toggleClass("ui-accordion-content-active").slideToggle(200);
				return false;
			})
			.next()
			.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom")
			.hide();
		});
	}
	
	if($j('.toggle').length){
		$j(".toggle").addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset")
		.find("h5")
		.addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom")
		.hover(function() { $j(this).toggleClass("ui-state-hover"); })
		.click(function() {
		$j(this)
			.toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
			.next().toggleClass("ui-accordion-content-active").slideToggle(200);
			return false;
		})
		.next()
		.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom")
		.hide();
	}
}

function initAccordionFullWidth(){
	"use strict";

	$j(".accordion.full_screen .accordion_inner").accordion({
		animate: "swing",
		collapsible: true,
		active: false,
		icons: "",
		heightStyle: "content"
	});

	$j('.accordion.full_screen .accordion_inner h2').each(function(){
	
		$j(this).click(function(){
			
			if($j('.accordion.full_screen .accordion_inner h2').hasClass('ui-state-active')){
				$j(this).find('span.arrow').addClass('animate_arrow');
			} else {
				$j(this).find('span.arrow').removeClass('animate_arrow');
			}
		});
		
	});
}

function accordionFullWidth(){
	"use strict";

	if($j('.accordion.full_screen.yes')){
		var width = $j(window).width();
		var margin = -(width-1000)/2;
		if(width > 1000 && $j('div.full_width').length === 0){
			$j('.accordion.full_screen.yes .accordion_inner').css({'width': width, 'margin-left': margin, 'margin-right': margin});
			$j('.accordion.full_screen.yes .accordion_inner .accordion_content').css('padding', '0px 50px 30px');
		} 

		if($j('div.full_width').length > 0){
			$j('.accordion.full_screen.yes .accordion_inner .accordion_content').css('padding', '0px 0px 30px');
		}
	}
}

function initAccordionContentLink(){
	"use strict";

	$j('.accordion .accordion_content a').click( function (event){

	if($j(this).attr('target') === '_blank'){
		window.open($j(this).attr('href'),'_blank');
	}else{
		window.open($j(this).attr('href'),'_self');
	}
	return false;
	});

	$j('.accordion_holder div.accordion_content_inner a').click( function (event){
	if($j(this).attr('target') === '_blank'){
		window.open($j(this).attr('href'),'_blank');
	}else{
		window.open($j(this).attr('href'),'_self');
	}
	return false;
	});
}

function totop_button(a) {
	"use strict";

	var b = $j("#back_to_top");
	b.removeClass("off on");
	if (a === "on") { b.addClass("on"); } else { b.addClass("off"); }
}

function backButtonInterval(){
	"use strict";

	window.setInterval(function () {
		var b = $j(this).scrollTop();
		var c = $j(this).height();
		var d;
		if (b > 0) { d = b + c / 2; } else { d = 1; }
		if (d < 1e3) { totop_button("off"); } else { totop_button("on"); }
	}, 300);
}

function backToTop(){
	"use strict";
	
	$j(document).on('click','#back_to_top',function(e){
		e.preventDefault();
		
		$j('body,html').animate({scrollTop: 0}, $j(window).scrollTop()/3, 'swing');
	});
}

function initBlog(){
	"use strict";

	$j('.blog_holder_inner').mixitup({
		showOnLoad: 'all',
		transitionSpeed: 600,
		minHeight: 150
	});
}

function socialShareOpen(){
	"use strict";
	
	$j('.social_share_icon').click(function() {
		if ($j(this).hasClass("open") ) {
			$j('.scoial_share_dropdown').toggle();
			$j(this).removeClass("open");
		} else{
			$j('.scoial_share_dropdown').toggle();
			$j(this).addClass("open");
		}
	});
}


(function($) {
	"use strict";

	$.fn.countTo = function(options) {
		// merge the default plugin settings with the custom options
		options = $.extend({}, $.fn.countTo.defaults, options || {});

		// how many times to update the value, and how much to increment the value on each update
		var loops = Math.ceil(options.speed / options.refreshInterval),
		increment = (options.to - options.from) / loops;

		return $(this).each(function() {
			var _this = this,
			loopCount = 0,
			value = options.from,
			interval = setInterval(updateTimer, options.refreshInterval);

			function updateTimer() {
				value += increment;
				loopCount++;
				$(_this).html(value.toFixed(options.decimals));

				if (typeof(options.onUpdate) === 'function') {
					options.onUpdate.call(_this, value);
				}

				if (loopCount >= loops) {
					clearInterval(interval);
					value = options.to;

					if (typeof(options.onComplete) === 'function') {
						options.onComplete.call(_this, value);
					}
				}
			}
		});
	};

 $.fn.countTo.defaults = {
   from: 0,  // the number the element should start at
   to: 100,  // the number the element should end at
   speed: 1000,  // how long it should take to count between the target numbers
   refreshInterval: 100,  // how often the element should be updated
   decimals: 0,  // the number of decimal places to show
   onUpdate: null,  // callback method for every time the element is updated,
   onComplete: null,  // callback method for when the element finishes updating
 };
})(jQuery);

function initToCounter(){
	"use strict";
	
	if($j('.counter.type1').length){
		$j('.counter.type1').each(function() {
			$j(this).appear(function() {
				$j(this).parent().css('opacity', '1');
				var $max = parseFloat($j(this).text());
				$j(this).countTo({
					from: 0,
					to: $max,
					speed: 1500,
					refreshInterval: 50
				});
			},{accX: 0, accY: -200});
		});
	}
}

function initCounter(){
	"use strict";
	
	if($j('.counter.type2').length){
		$j('.counter.type2').each(function() {
			
			if(!$j(this).hasClass('executed')){
				$j(this).addClass('executed');
				$j(this).appear(function() {
					$j(this).parent().css('opacity', '1');
					$j(this).absoluteCounter({
						speed: 2000,
						fadeInDelay: 1000
					});
				},{accX: 0, accY: -200});
				}
		});
	}
}

function initDoughnutProgressBar(){
	"use strict";
 
	if($j('.normal .percentage').length){
		$j('.normal .percentage').each(function() {

			var $barColor = '#000000';

			if($j(this).data('active') !== ""){
				$barColor = $j(this).data('active');
			}

			var $trackColor = '#ededed';

			if($j(this).data('noactive') !== ""){
				$trackColor = $j(this).data('noactive');
			}

			var $line_width = 10;

			if($j(this).data('linewidth') !== ""){
				$line_width = $j(this).data('linewidth');
			}
			
			var $size = 150;

			$j(this).appear(function() {
				initToCounterDoughnutProgressBar($j(this));
				$j(this).parent().css('opacity', '1');
				
				$j(this).easyPieChart({
					barColor: $barColor,
					trackColor: $trackColor,
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: $line_width,
					animate: 1500,
					size: $size
				}); 
			},{accX: 0, accY: -200});
		});
	}
}

function initDoughnutProgressBar2(){
	"use strict";
 
	if($j('.transparent .percentage').length){
		$j('.transparent .percentage').each(function() {

			var $barColor = '#000000';

			if($j(this).data('active') !== ""){
				$barColor = $j(this).data('active');
			}

			var $trackColor = 'transparent';

			var $line_width = 10;

			if($j(this).data('linewidth') !== ""){
				$line_width = $j(this).data('linewidth');
			}

			var $size = 150;

			$j(this).appear(function() {
				initToCounterDoughnutProgressBarTransparent($j(this));
				$j(this).parent().css('opacity', '1');
				
				$j(this).easyPieChart({
					barColor: $barColor,
					trackColor: $trackColor,
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: $line_width,
					animate: 1500,
					size: $size
				}); 
			},{accX: 0, accY: -200});
		});
	}
}

function initToCounterDoughnutProgressBar($this){
	"use strict";

		$j($this).css('opacity', '1');
		var $max = parseFloat($j($this).find('.tocounter').text());
		$j($this).find('.tocounter').countTo({
			from: 0,
			to: $max,
			speed: 1500,
			refreshInterval: 50
		});
}

function initToCounterDoughnutProgressBarTransparent($this){
	"use strict";
	
	$j($this).css('opacity', '1');
	var $max = parseFloat($j($this).find('.tocounter').text());
	$j($this).find('.tocounter').countTo({
		from: 0,
		to: $max,
		speed: 1500,
		refreshInterval: 50
	});
}

function initElements(){
	"use strict";

	if($j(".element_from_fade").length){
		$j('.element_from_fade').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_from_fade_on');	
			},{accX: 0, accY: -200});
		});
	}
	
	if($j(".element_from_left").length){
		$j('.element_from_left').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_from_left_on');	
			},{accX: 0, accY: -200});		
		});
	}
	
	if($j(".element_from_right").length){
		$j('.element_from_right').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_from_right_on');	
			},{accX: 0, accY: -200});
		});
	}
	
	if($j(".element_from_top").length){
		$j('.element_from_top').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_from_top_on');	
			},{accX: 0, accY: -200});
		});
	}
	
	if($j(".element_from_bottom").length){
		$j('.element_from_bottom').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_from_bottom_on');	
			},{accX: 0, accY: -200});			
		});
	}
	
	if($j(".element_transform").length){
		$j('.element_transform').each(function(){
			var $this = $j(this);
						
			$this.appear(function() {
				$this.addClass('element_transform_on');	
			},{accX: 0, accY: -200});	
		});
	}	
}

function fitVideo(){	
	"use strict";
	
	$j(".portfolio_images").fitVids();
	$j(".video_holder").fitVids();
}

function initFlexSlider(){
	"use strict";
	
	$j('.flexslider').flexslider({
		animationLoop: true,
		controlNav: false,
		useCSS: false,
		pauseOnAction: true,
		pauseOnHover: true,
		slideshow: true,
		animation: 'slides',
		animationSpeed: 600,
		slideshowSpeed: 3000,
		start: function(){
			setTimeout(function(){$j(".flexslider").fitVids();},100);
		}
	});
	
	$j('.flex-direction-nav a').click(function(e){
		e.preventDefault();
		e.stopImmediatePropagation();
		e.stopPropagation();
	});
}

function initListAnimation(){
	"use strict";
	
	$j('.animate_list').each(function(){
		$j(this).appear(function() {
			$j(this).find("li").each(function (l) {
				var k = $j(this);
				setTimeout(function () {
					k.animate({
						opacity: 1,
						top: 0
					}, 1500);
				}, 100*l);
			});
		},{accX: 0, accY: -200});
	});
}

function initMessages(){
	"use strict";

	$j('.message').each(function(){
		$j(this).find('.close').click(function(e){
			e.preventDefault();
			$j(this).parent().fadeOut(500);
		});
	});
}

function initNiceScroll(){
	"use strict";

	if($j('.smooth_scroll').length){	
		$j("html").niceScroll({ 
			scrollspeed: 60, 
			mousescrollstep: 35, 
			cursorwidth: 10, 
			cursorborder: 0, 
			cursorcolor: "#424242", 
			cursorborderradius: 7, 
			autohidemode: !1, horizrailenabled: !1 
		});
	}
}

function placeholderReplace(){
	"use strict";

	$j('[placeholder]').focus(function() {
		var input = $j(this);
		if (input.val() === input.attr('placeholder')) {
			if (this.originalType) {
				this.type = this.originalType;
				delete this.originalType;
			}
			input.val('');
			input.removeClass('placeholder');
		}
	}).blur(function() {
		var input = $j(this);
		if (input.val() === '') {
			if (this.type === 'password') {
				this.originalType = this.type;
				this.type = 'text';
			}
			input.addClass('placeholder');
			input.val(input.attr('placeholder'));
		}
	}).blur();

	$j('[placeholder]').parents('form').submit(function () {
		$j(this).find('[placeholder]').each(function () {
			var input = $j(this);
			if (input.val() === input.attr('placeholder')) {
				input.val('');
			}
		});
	});
}

function addPlaceholderSearchWidget(){
	"use strict";
	
	$j('.header_right_widget #searchform input:text').each(
		function(i,el) {
		if (!el.value || el.value === '') {
			el.placeholder = 'Search';
		}
	});
}

var $scrollHeight;
function initPortfolioSingleInfo(){
	"use strict";

	var $sidebar   = $j(".portfolio_single_follow");
	if($j(".portfolio_single_follow").length > 0){
	
		var offset = $sidebar.offset();
		$scrollHeight = $j(".portfolio_container").height();
		var $scrollOffset = $j(".portfolio_container").offset();
		var $window = $j(window);
		
		var $menuLineHeight = parseInt($j('.main_menu > ul > li > a').css('line-height'), 10);
		
		$window.scroll(function() {
			if($window.width() > 960){

				if ($window.scrollTop() + $menuLineHeight + 3 > offset.top) {
					if ($window.scrollTop() + $menuLineHeight + $sidebar.height() + 24 < $scrollOffset.top + $scrollHeight) {
						$sidebar.stop().animate({
							marginTop: $window.scrollTop() - offset.top + $menuLineHeight
						});
					} else {
						$sidebar.stop().animate({
							marginTop: $scrollHeight - $sidebar.height() - 24
						});
					}
				} else {
					$sidebar.stop().animate({
						marginTop: 0
					});
				}		
			}else{
				$sidebar.css('margin-top',0);
			}
			
		});
	}
}

function initProjects(){
	"use strict";

	$j('.filter_holder').each(function(){
		var filter_height = 0;
		$j(this).find('li.filter').each(function(){
			filter_height += $j(this).height();
		});
		
		$j(this).on('click',function(data){
			var $drop = $j(this),
			$bro = $drop.siblings('.hidden');
			
			if(!$drop.hasClass('expanded')){
				$drop.find('ul').css('z-index','100');
				$drop.find('ul').height(filter_height+35); //35 is height of first default item
				$drop.addClass('expanded');
				var label = $drop.find('.label span');
				label.text(label.attr('data-label'));
			} else {
				$drop.find('ul').height(35);
				$drop.removeClass('expanded');
				
				var $selected = $j(data.target),
				ndx = $selected.index();
				
				if($bro.length){
					$bro.find('option').removeAttr('selected').eq(ndx).attr('selected','selected').change();
				}
			}
		});
	});
	
	$j('.filter_holder .filter').on('click',function(){
		$j('.close_single_portfolio').click();
		var $this = $j(this).text();
		var dropLabels = $j('.filter_holder').find('.label span');
		dropLabels.each(function(){
			$j(this).text($this);
		});
	});
	
	
	$j('.projects_holder').mixitup({
		showOnLoad: 'all',
		transitionSpeed: 600,
		minHeight: 150,
		onMixEnd: function(){
			initPortfolioHover();
		}
	});

}

function resetFilter(){
	"use strict";

	var label = $j('.filter_holder').find('.label span');
	label.text(label.attr('data-label'));
	$j('.filter_holder').find('li.filter').removeClass('active');
}

function initPortfolioHover(){
	"use strict";

	if($j('.projects_holder.portfolio_hover article').length > 0){
		$j('.projects_holder.portfolio_hover article').each(function(){
			var $this = $j(this);

			var bottom = $this.find('.image').height();
			var bottom_text = $this.find('.text_holder').height();
			$this.find('.image_hover').css('bottom', -bottom);
			$this.find('.text_holder').css('bottom', -bottom_text);

			$this.mouseenter(function(){
				$this.find('.image_hover').css('visibility', 'visible');
				$this.find('.image').stop().animate({'top': -bottom}, 400);
				$this.find('.image_hover').stop().animate({'bottom': '0px'}, 400);
				$this.find('.text_holder').stop().animate({'bottom': '0px'}, 500);
			}).mouseleave(function(){
				$this.find('.image').stop().animate({'top': '0px'}, 300);
				$this.find('.image_hover').stop().animate({'bottom': -bottom,}, 300, function(){
					$this.find('.image_hover').css('visibility', 'hidden');
				});
				$this.find('.text_holder').stop().animate({'bottom': -bottom_text}, 300);
			});
		});
	}
}

function initProgressBars(){
	"use strict";

	if($j('.progress_bars').length){
		$j('.progress_bars').each(function() {
			$j(this).appear(function() {
				initToCounterHorizontalProgressBar($j(this));
				$j(this).find('.progress_bar').each(function() {
					var percentage = $j(this).find('.progress_content').data('percentage');
					var percent_width = $j(this).find('.progress_number').width();
					$j(this).find('.progress_content').css('width', '0%');
					$j(this).find('.progress_content').animate({'width': percentage+'%'}, 2000);
					$j(this).find('.progress_number').css('width', percent_width+'px');
				});
			},{accX: 0, accY: -200});
		});
	}
}

function initToCounterHorizontalProgressBar($this){
	"use strict";

	if($j('.progress_bars .progress_number span').length){
		$j('.progress_bars .progress_number span').each(function() {
			$j(this).parent().css('opacity', '1');
			var $max = parseFloat($j(this).text());
			$j(this).countTo({
				from: 0,
				to: $max,
				speed: 1500,
				refreshInterval: 50
			});
		});
	}
}

function initProgressBarsVertical(){
	"use strict";

	if($j('.progress_bars_vertical_holder').length){
		$j('.progress_bars_vertical_holder').each(function() {

			var progress_bar_number = 0;

			$j(this).find('.progress_bars_vertical').each(function(){
				progress_bar_number ++; 
			});

			$j(this).find('.progress_bars_vertical').css('width', 100/progress_bar_number-0.3 + '%');		

			$j(this).appear(function() {
				initToCounterVerticalProgressBar();
				$j(this).find('.progress_bars_vertical').each(function() {
					var percentage = $j(this).find('.progress_content').data('percentage');
					$j(this).find('.progress_content').css('height', '0%');
					$j(this).find('.progress_content').animate({
						height: percentage+'%'
					}, 1500);
				});
			},{accX: 0, accY: -200});
		});
	}
}

function initToCounterVerticalProgressBar(){
	"use strict";

	if($j('.progress_bars_vertical .progress_number span').length){
		$j('.progress_bars_vertical .progress_number span').each(function() {
			var $max = parseFloat($j(this).text());
			$j(this).countTo({
				from: 0,
				to: $max,
				speed: 1500,
				refreshInterval: 50
			});
		});
	}
}

function initTabs(){
	"use strict";

	var $tabsNav = $j('.tabs-nav');
	var $tabsNavLis = $tabsNav.children('li');
	$tabsNav.each(function() {
		var $this = $j(this);
		$this.next().children('.tab-content').stop(true,true).hide().first().show();
		$this.children('li').first().addClass('active').stop(true,true).show();
	});
	$tabsNavLis.on('click', function(e) {
		var $this = $j(this);
		$this.siblings().removeClass('active').end().addClass('active');
		$this.parent().next().children('.tab-content').stop(true,true).hide().siblings( $this.find('a').attr('href') ).fadeIn();
		e.preventDefault();
	}); 
}

function initFullWidthHolder(){
	"use strict";

	if($j('.full_width_holder.yes')){
		var width = $j(window).width();
		var margin = -(width-1000)/2;
		if(width > 1000 && $j('div.full_width').length === 0){
			$j('.full_width_holder.yes .full_width_content').css({'width': width, 'margin-left': margin, 'margin-right': margin});
		}
	}
}

function initFullWidthSinglePortfolio(){
	"use strict";
	
	if($j('.article_big_content:visible')){
		var width = $j(window).width();
		var width_projects_holder = $j('.projects_holder_outer').width();
		var margin_el = -(width-width_projects_holder)/2;
		var margin = -(width-1000)/2;
		if(width > 1000){
			$j('.article_big_content:visible').css({'width': width, 'margin-left': margin_el, 'margin-right': margin_el});
		} else {
			$j('.article_big_content:visible').css({'width': width, 'margin-left': margin_el, 'margin-right': margin_el});
		}
	}
	
		
	
}

function viewPort(){
	"use strict";
	
	$j('.parallax section').waypoint( function(direction) {
		var $active = $j(this).next();
		
		if (direction === "up") {
			$active = $active.prev();
		}
		if (!$active.length) {
			$active = $j(this);
		}
		
		var id = $active.attr("id");
		$j(".link").each(function(){
			var i = $j(this).attr("href").replace("#",""); 
			
			if(i === id){
				$j(this).addClass('active');
			}else{
				$j(this).removeClass('active');
			}
		});	
	}, { offset: '0%' });
}

function initParallax(speed){
	"use strict";

	if($j('html').hasClass('touch')){
		$j('.parallax section').each(function() {
			var $self = $j(this);
			var section_height = $self.data('height');
			$self.height(section_height);
			var rate = 0.5;
			
			var bpos = (- $j(this).offset().top) * rate;
			$self.css({'background-position': 'center ' + bpos  + 'px' });
			
			$j(window).bind('scroll', function() {
				var bpos = (- $self.offset().top + $j(window).scrollTop()) * rate;
				$self.css({'background-position': 'center ' + bpos  + 'px' });
			});
		});
	}else{
		$j('.parallax section').each(function() {
			var $self = $j(this);
			var section_height = $self.data('height');
			$self.height(section_height);
			var rate = (section_height / $j(document).height()) * speed;
			
			var distance = $j.elementoffset($self);
			var bpos = - (distance * rate);
			$self.css({'background-position': 'center ' + bpos  + 'px' });
			
			$j(window).bind('scroll', function() {
				var distance = $j.elementoffset($self);
				var bpos = - (distance * rate);
				$self.css({'background-position': 'center ' + bpos  + 'px' });
			});
		});
	}
	return this;
}

function parallaxPager(){
	"use strict";

	var link_holder = $j('.link_holder_parallax');
	$j('section.parallax section').each(function(){	
		var href = $j(this).attr("id");
		var title = $j(this).data("title");
		
		var link = $j("<a />", {"href": "#"+href, "class":"link", "title": title, "html": "&nbsp;"});
		link.appendTo(link_holder);
		
	});
	link_holder.css('margin-top',-link_holder.height()/2);
	
	
	$j('.link_holder_parallax .link:first-child').addClass('active');
	$j(document).on('click','a.link',function() {
	
		$j('.tooltip').fadeOut(10);
		if($j(this).hasClass('active')){
			return false;
		}
		$j('.link_holder_parallax .link').removeClass('active');
		$j(this).addClass('active');
		
		$j.scrollTo($j($j(this).attr("href")), {
			duration: 750,
			offset: {top:-1}
		});
		return false;
	});	
	
	$j(".link_holder_parallax a[title]").tooltip({
		position: "top left",
		offset: [20, -20]		 
	});
}
$j.elementoffset = function($element) {
	"use strict";
	
	var fold = $j(window).scrollTop();
	return (fold) - $element.offset().top +104;
};

function initPortfolioSlider(){
	"use strict";

	$j('.slider_small.turn_on ul').bxSlider({
		pager: false,
		auto: true,
		minSlides: 1,
		maxSlides: 4,
		slideWidth: 235,
		slideMargin: 20,
		moveSlides: 1,
		infiniteLoop: true,
		speed: 2000
	});
}

function prettyPhoto(){
	"use strict";		

	$j('a[data-rel]').each(function() {
		$j(this).attr('rel', $j(this).data('rel'));
	});

	$j("a[rel^='prettyPhoto']").prettyPhoto({
		animation_speed: 'fast', /* fast/slow/normal */
		slideshow: false, /* false OR interval time in ms */
		autoplay_slideshow: false, /* true/false */
		opacity: 0.80, /* Value between 0 and 1 */
		show_title: true, /* true/false */
		allow_resize: true, /* Resize the photos bigger than viewport. true/false */
		default_width: 500,
		default_height: 344,
		counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
		theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
		hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
		wmode: 'opaque', /* Set the flash wmode attribute */
		autoplay: true, /* Automatically start videos: True/False */
		modal: false, /* If set to true, only the close button will close the window */
		overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
		keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
		deeplinking: false,
		social_tools: false
	});
}

function setBlogPortfolioListHeight(){
	"use strict";

	var max = Math.max.apply(null, $j(".blog_holder article.mix").map(function (){
		return $j(this).height();
	}).get());
	$j(".blog_holder article.mix").each(function(){
		$j(this).height(max);
	});
}

function setSidebarBackgroundColor(){
	"use strict";
	
	var column_height1 = $j('.two_columns_66_33.background_color_sidebar > .column1').height();
	$j('.two_columns_66_33.background_color_sidebar > .column2').css('min-height', column_height1);

	var column_height2 = $j('.two_columns_75_25.background_color_sidebar > .column1').height();
	$j('.two_columns_75_25.background_color_sidebar > .column2').css('min-height', column_height2);
	
	var column_height3 = $j('.two_columns_33_66.background_color_sidebar > .column2').height();
	$j('.two_columns_33_66.background_color_sidebar > .column1').css('min-height', column_height3);
	
	var column_height4 = $j('.two_columns_25_75.background_color_sidebar > .column2').height();
	$j('.two_columns_25_75.background_color_sidebar > .column1').css('min-height', column_height4);
}

function checkLogOnSmallestSize(){
	"use strict";

	if($j(window).width() > 420 && $j(window).width() < 801){
		if(logo_height >= 80){
			$j('.logo a').height(70);
			$j('.logo').css('padding','5px 0px 5px 0px');
		}else{
			var padding = (80-logo_height)/2;
			$j('.logo').css('padding',padding+'px 0px');
		}
	} else if ($j(window).width() <= 420){
		if(logo_height >= 60){
			$j('.logo a').height(50);
			$j('.logo').css('padding','10px 0px 10px 0px');
		}else{
			var padding = (60-logo_height)/2;
			$j('.logo').css('padding',padding+'px 0px');
		}
	} else {
		$j('.logo').css('padding','0px');
	}
}


function loadMore(){
	"use strict";
	
	var i = 1;
	
	$j('.load_more a').on('click', function(e)  {
		$j('.close_single_portfolio').click();
		e.preventDefault();
		resetFilter();
		
		var link = $j(this).attr('href');
		var $content = '.projects_holder';
		var $nav_wrap = '.portfolio_paging';
		var $anchor = '.portfolio_paging .load_more a';
		var $next_href = $j($anchor).attr('href'); // Get URL for the next set of posts
		var filler_num = $j('.projects_holder .filler').length;
		$j.get(link+'', function(data){
			$j('.projects_holder .filler').slice(-filler_num).remove();
			var $new_content = $j($content, data).wrapInner('').html(); // Grab just the content
			$next_href = $j($anchor, data).attr('href'); // Get the new href
			$j('.article_big_content:last').after($new_content); // Append the new content
			
			var min_height = $j('article.mix:first').height();
			$j('article.mix').css('min-height',min_height);
			
			$j('.projects_holder').mixitup('remix','all');
			prettyPhoto();
			initPortfolioHover();
			$j('.projects_holder > .mix ').each( function() { $j(this).hoverdir(); } );
			if($j('.load_more').attr('rel') > i) {
				$j('.load_more a').attr('href', $next_href); // Change the next URL
			} else {
				$j('.load_more').remove(); 
			}
			$j('.projects_holder .portfolio_paging:last').remove(); // Remove the original navigation
			$j('article.mix').css('min-height',0);
		});
		i++;
	});
}

function initCheckSafariBrowser(){
	"use strict";

	if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
		$j('body').addClass('safari_browser');
	}
}