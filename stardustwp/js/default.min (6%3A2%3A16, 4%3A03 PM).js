function dropDownMenu(){"use strict";var e=$j(".no-touch .drop_down > ul > li");e.each(function(t){if($j(e[t]).find(".second").length>0){$j(e[t]).data("original_height",$j(e[t]).find(".second").height()+"px");$j(e[t]).find(".second").hide();$j(e[t]).mouseenter(function(){$j(e[t]).find(".second").css({visibility:"visible",height:"0px",opacity:"0",display:"block"});$j(e[t]).find(".second").stop().animate({height:$j(e[t]).data("original_height"),opacity:1},400,function(){$j(e[t]).find(".second").css("overflow","visible")});dropDownMenuThirdLevel()}).mouseleave(function(){$j(e[t]).find(".second").stop().animate({height:"0px"},0,function(){$j(e[t]).find(".second").css({overflow:"hidden",visivility:"hidden",display:"none"})})})}})}function languageMenu(){"use strict";var e=$j(".header_right_widget #lang_sel > ul > li");if($j(e).find("ul").length>0){$j(e).data("original_height",$j(e).find("ul").height()+"px");$j(e).find("ul").hide();$j(e).mouseenter(function(){$j(e).find("ul").css({visibility:"visible",height:"0px",opacity:"0",display:"block"});$j(e).find("ul").stop().animate({height:$j(e).data("original_height"),opacity:1},400,function(){$j(e).find(".second").css("overflow","visible")})}).mouseleave(function(){$j(e).find("ul").stop().animate({height:"0px"},0,function(){$j(e).find("ul").css({overflow:"hidden",visivility:"hidden",display:"none"})})})}}function setDropDownMenuPosition(){"use strict";var e=$j(".drop_down > ul > li");e.each(function(t){var n=$j(window).width()-16;var r=1150;var i=$j(e[t]).offset().left;var s=$j(".drop_down .second .inner2 ul").width();var o=0;if($j("body").hasClass("boxed")){o=r-(i-(n-r)/2)+25}else{o=n-i+25}var u;if($j(e[t]).find("li.sub").length>0){u=o-s}if(o<s||u<s){$j(e[t]).find(".second").addClass("right");$j(e[t]).find(".second .inner .inner2 ul").addClass("right")}})}function dropDownMenu2(){"use strict";var e=$j(".header_right_widget").width();var t=-1e3-e;$j(".drop_down2 .second").css({"margin-left":t,"margin-right":t});$j(".no-touch .drop_down2 > ul > li").each(function(){var e=$j(this).find(".second").height();$j(this).mouseenter(function(){$j(this).find(".second").height(0);$j(this).find(".second").css({visibility:"visible","z-index":"100"});$j(this).find(".second").stop().animate({height:e+20},400)}).mouseleave(function(){$j(this).find(".second").css("z-index","90");$j(this).find(".second").stop().animate({height:0},400,function(){$j(this).css("visibility","hidden");$j(this).height(0)})})})}function dropDownMenuThirdLevel(){"use strict";var e=$j(".no-touch .drop_down ul li > .second > .inner > .inner2 > ul > li");e.each(function(t){if($j(e[t]).find("ul").length>0){var n=0;$j(e[t]).find("ul li").each(function(){n+=$j(this).height()});$j(e[t]).data("original_height",n+"px");var r=$j(e[t]).find("ul > li").size()*10+100;$j(e[t]).mouseenter(function(){$j(e[t]).find("ul").css({visibility:"visible",height:"0px",opacity:"0",display:"block",padding:"10px 0"});$j(e[t]).find("ul").stop().animate({height:$j(e[t]).data("original_height"),opacity:1},r,function(){$j(e[t]).find("ul").css("overflow","visible")})}).mouseleave(function(){$j(e[t]).find("ul").stop().animate({height:"0px"},0,function(){$j(e[t]).find("ul").css({overflow:"hidden",padding:"0"});$j(e[t]).find(".second").css("visivility","hidden")})})}})}function selectMenu(){"use strict";var e=$j("<div class='select'><ul></ul></div>");e.appendTo(".selectnav");if($j(".main_menu").hasClass("drop_down")){$j(".main_menu ul li a").each(function(){var t=$j(this).attr("href");var n=$j(this).text();if($j(this).parents("li").length===2){n="&nbsp;&nbsp;&nbsp;"+n}if($j(this).parents("li").length===3){n="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+n}if($j(this).parents("li").length>3){n="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+n}var r=$j("<li />");var i=$j("<a />",{href:t,html:n});i.appendTo(r);r.appendTo(e.find("ul"))})}else if($j(".main_menu").hasClass("drop_down2")){$j(".main_menu ul li a").each(function(){var t=$j(this).attr("href");var n=$j(this).text();if($j(this).parents("div.mc").length===1){n="&nbsp;&nbsp;&nbsp;"+n}if($j(this).hasClass("sub")){n="&nbsp;&nbsp;&nbsp;&nbsp;"+n}var r=$j("<li />");var i=$j("<a />",{href:t,html:n});i.appendTo(r);r.appendTo(e.find("ul"))})}$j(".selectnav_button span").click(function(){if($j(".select ul").is(":visible")){$j(".select ul").slideUp()}else{$j(".select ul").slideDown()}});$j(".selectnav ul li a").click(function(){$j(".select ul").slideUp()})}function magicPanes(){"use strict";var e=$j("#magic");var t=$j(".main_menu > ul > li");if($j(".main_menu .active").length>0){$j("body").removeClass("menuHoverOn");e.width($j(".active").outerWidth(true)).css("left",$j(".active").position().left);e.width($j(".active").outerWidth(true)-30).css("left",$j(".active").position().left+15).data("origLeft",e.position().left).data("origWidth",e.width());var n;var r;var i;t.mouseenter(function(){n=$j(this);r=n.position().left;i=n.outerWidth(true);return e.stop().animate({left:r,width:i},300)}).mouseleave(function(){return e.stop().animate({left:e.data("origLeft"),width:e.data("origWidth")},300)});$j("nav > ul > li a").each(function(){$j(this).click(function(){if($j(this).attr("href")!=="http://#"&&$j(this).attr("href")!=="#"){$j("a").parent().removeClass("active");if($j(this).closest(".second").length===0){$j(this).parent().addClass("active")}else{$j(this).closest(".second").parent().addClass("active")}e.data("origLeft",r+15).data("origWidth",i-30);e.stop().animate({left:e.data("origLeft"),width:e.data("origWidth")})}else{return false}})})}else{$j("body").addClass("menuHoverOn")}}function initAccordion(){"use strict";if($j(".accordion").length){$j(".accordion").each(function(){var e=$j(this);e.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset").find("h5").addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom").hover(function(){$j(this).toggleClass("ui-state-hover")}).click(function(){$j(this).parent().siblings().find(".accordion_content").slideUp(300).removeClass("ui-accordion-content-active");$j(this).parent().siblings().find("h5").removeClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom");$j(this).toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom").next().toggleClass("ui-accordion-content-active").slideToggle(200);return false}).next().addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide()})}if($j(".toggle").length){$j(".toggle").addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset").find("h5").addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom").hover(function(){$j(this).toggleClass("ui-state-hover")}).click(function(){$j(this).toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom").next().toggleClass("ui-accordion-content-active").slideToggle(200);return false}).next().addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide()}}function initAccordionFullWidth(){"use strict";$j(".accordion.full_screen .accordion_inner").accordion({animate:"swing",collapsible:true,active:false,icons:"",heightStyle:"content"});$j(".accordion.full_screen .accordion_inner h2").each(function(){$j(this).click(function(){if($j(".accordion.full_screen .accordion_inner h2").hasClass("ui-state-active")){$j(this).find("span.arrow").addClass("animate_arrow")}else{$j(this).find("span.arrow").removeClass("animate_arrow")}})})}function accordionFullWidth(){"use strict";if($j(".accordion.full_screen.yes")){var e=$j(window).width();var t=-(e-1e3)/2;if(e>1e3&&$j("div.full_width").length===0){$j(".accordion.full_screen.yes .accordion_inner").css({width:e,"margin-left":t,"margin-right":t});$j(".accordion.full_screen.yes .accordion_inner .accordion_content").css("padding","0px 50px 30px")}if($j("div.full_width").length>0){$j(".accordion.full_screen.yes .accordion_inner .accordion_content").css("padding","0px 0px 30px")}}}function initAccordionContentLink(){"use strict";$j(".accordion .accordion_content a").click(function(e){if($j(this).attr("target")==="_blank"){window.open($j(this).attr("href"),"_blank")}else{window.open($j(this).attr("href"),"_self")}return false});$j(".accordion_holder div.accordion_content_inner a").click(function(e){if($j(this).attr("target")==="_blank"){window.open($j(this).attr("href"),"_blank")}else{window.open($j(this).attr("href"),"_self")}return false})}function totop_button(e){"use strict";var t=$j("#back_to_top");t.removeClass("off on");if(e==="on"){t.addClass("on")}else{t.addClass("off")}}function backButtonInterval(){"use strict";window.setInterval(function(){var e=$j(this).scrollTop();var t=$j(this).height();var n;if(e>0){n=e+t/2}else{n=1}if(n<1e3){totop_button("off")}else{totop_button("on")}},300)}function backToTop(){"use strict";$j(document).on("click","#back_to_top",function(e){e.preventDefault();$j("body,html").animate({scrollTop:0},$j(window).scrollTop()/3,"swing")})}function initBlog(){"use strict";$j(".blog_holder_inner").mixitup({showOnLoad:"all",transitionSpeed:600,minHeight:150})}function socialShareOpen(){"use strict";$j(".social_share_icon").click(function(){if($j(this).hasClass("open")){$j(".scoial_share_dropdown").toggle();$j(this).removeClass("open")}else{$j(".scoial_share_dropdown").toggle();$j(this).addClass("open")}})}function initToCounter(){"use strict";if($j(".counter.type1").length){$j(".counter.type1").each(function(){$j(this).appear(function(){$j(this).parent().css("opacity","1");var e=parseFloat($j(this).text());$j(this).countTo({from:0,to:e,speed:1500,refreshInterval:50})},{accX:0,accY:-200})})}}function initCounter(){"use strict";if($j(".counter.type2").length){$j(".counter.type2").each(function(){if(!$j(this).hasClass("executed")){$j(this).addClass("executed");$j(this).appear(function(){$j(this).parent().css("opacity","1");$j(this).absoluteCounter({speed:2e3,fadeInDelay:1e3})},{accX:0,accY:-200})}})}}function initDoughnutProgressBar(){"use strict";if($j(".normal .percentage").length){$j(".normal .percentage").each(function(){var e="#000000";if($j(this).data("active")!==""){e=$j(this).data("active")}var t="#ededed";if($j(this).data("noactive")!==""){t=$j(this).data("noactive")}var n=10;if($j(this).data("linewidth")!==""){n=$j(this).data("linewidth")}var r=150;$j(this).appear(function(){initToCounterDoughnutProgressBar($j(this));$j(this).parent().css("opacity","1");$j(this).easyPieChart({barColor:e,trackColor:t,scaleColor:false,lineCap:"butt",lineWidth:n,animate:1500,size:r})},{accX:0,accY:-200})})}}function initDoughnutProgressBar2(){"use strict";if($j(".transparent .percentage").length){$j(".transparent .percentage").each(function(){var e="#000000";if($j(this).data("active")!==""){e=$j(this).data("active")}var t="transparent";var n=10;if($j(this).data("linewidth")!==""){n=$j(this).data("linewidth")}var r=150;$j(this).appear(function(){initToCounterDoughnutProgressBarTransparent($j(this));$j(this).parent().css("opacity","1");$j(this).easyPieChart({barColor:e,trackColor:t,scaleColor:false,lineCap:"butt",lineWidth:n,animate:1500,size:r})},{accX:0,accY:-200})})}}function initToCounterDoughnutProgressBar(e){"use strict";$j(e).css("opacity","1");var t=parseFloat($j(e).find(".tocounter").text());$j(e).find(".tocounter").countTo({from:0,to:t,speed:1500,refreshInterval:50})}function initToCounterDoughnutProgressBarTransparent(e){"use strict";$j(e).css("opacity","1");var t=parseFloat($j(e).find(".tocounter").text());$j(e).find(".tocounter").countTo({from:0,to:t,speed:1500,refreshInterval:50})}function initElements(){"use strict";if($j(".element_from_fade").length){$j(".element_from_fade").each(function(){var e=$j(this);e.appear(function(){e.addClass("element_from_fade_on")},{accX:0,accY:-200})})}if($j(".element_from_left").length){$j(".element_from_left").each(function(){var e=$j(this);e.appear(function(){e.addClass("element_from_left_on")},{accX:0,accY:-200})})}if($j(".element_from_right").length){$j(".element_from_right").each(function(){var e=$j(this);e.appear(function(){e.addClass("element_from_right_on")},{accX:0,accY:-200})})}if($j(".element_from_top").length){$j(".element_from_top").each(function(){var e=$j(this);e.appear(function(){e.addClass("element_from_top_on")},{accX:0,accY:-200})})}if($j(".element_from_bottom").length){$j(".element_from_bottom").each(function(){var e=$j(this);e.appear(function(){e.addClass("element_from_bottom_on")},{accX:0,accY:-200})})}if($j(".element_transform").length){$j(".element_transform").each(function(){var e=$j(this);e.appear(function(){e.addClass("element_transform_on")},{accX:0,accY:-200})})}}function fitVideo(){"use strict";$j(".portfolio_images").fitVids();$j(".video_holder").fitVids()}function initFlexSlider(){"use strict";$j(".flexslider").flexslider({animationLoop:true,controlNav:false,useCSS:false,pauseOnAction:true,pauseOnHover:true,slideshow:true,animation:"slides",animationSpeed:600,slideshowSpeed:8e3,start:function(){setTimeout(function(){$j(".flexslider").fitVids()},100)}});$j(".flex-direction-nav a").click(function(e){e.preventDefault();e.stopImmediatePropagation();e.stopPropagation()})}function initListAnimation(){"use strict";$j(".animate_list").each(function(){$j(this).appear(function(){$j(this).find("li").each(function(e){var t=$j(this);setTimeout(function(){t.animate({opacity:1,top:0},1500)},100*e)})},{accX:0,accY:-200})})}function initMessages(){"use strict";$j(".message").each(function(){$j(this).find(".close").click(function(e){e.preventDefault();$j(this).parent().fadeOut(500)})})}function initNiceScroll(){"use strict";if($j(".smooth_scroll").length){$j("html").niceScroll({scrollspeed:60,mousescrollstep:35,cursorwidth:10,cursorborder:0,cursorcolor:"#424242",cursorborderradius:7,autohidemode:!1,horizrailenabled:!1})}}function placeholderReplace(){"use strict";$j("[placeholder]").focus(function(){var e=$j(this);if(e.val()===e.attr("placeholder")){if(this.originalType){this.type=this.originalType;delete this.originalType}e.val("");e.removeClass("placeholder")}}).blur(function(){var e=$j(this);if(e.val()===""){if(this.type==="password"){this.originalType=this.type;this.type="text"}e.addClass("placeholder");e.val(e.attr("placeholder"))}}).blur();$j("[placeholder]").parents("form").submit(function(){$j(this).find("[placeholder]").each(function(){var e=$j(this);if(e.val()===e.attr("placeholder")){e.val("")}})})}function addPlaceholderSearchWidget(){"use strict";$j(".header_right_widget #searchform input:text").each(function(e,t){if(!t.value||t.value===""){t.placeholder="Search"}})}function initPortfolioSingleInfo(){"use strict";var e=$j(".portfolio_single_follow");if($j(".portfolio_single_follow").length>0){var t=e.offset();$scrollHeight=$j(".portfolio_container").height();var n=$j(".portfolio_container").offset();var r=$j(window);var i=parseInt($j(".main_menu > ul > li > a").css("line-height"),10);r.scroll(function(){if(r.width()>960){if(r.scrollTop()+i+3>t.top){if(r.scrollTop()+i+e.height()+24<n.top+$scrollHeight){e.stop().animate({marginTop:r.scrollTop()-t.top+i})}else{e.stop().animate({marginTop:$scrollHeight-e.height()-24})}}else{e.stop().animate({marginTop:0})}}else{e.css("margin-top",0)}})}}function initProjects(){"use strict";$j(".filter_holder").each(function(){var e=0;$j(this).find("li.filter").each(function(){e+=$j(this).height()});$j(this).on("click",function(t){var n=$j(this),r=n.siblings(".hidden");if(!n.hasClass("expanded")){n.find("ul").css("z-index","100");n.find("ul").height(e+35);n.addClass("expanded");var i=n.find(".label span");i.text(i.attr("data-label"))}else{n.find("ul").height(35);n.removeClass("expanded");var s=$j(t.target),o=s.index();if(r.length){r.find("option").removeAttr("selected").eq(o).attr("selected","selected").change()}}})});$j(".filter_holder .filter").on("click",function(){$j(".close_single_portfolio").click();var e=$j(this).text();var t=$j(".filter_holder").find(".label span");t.each(function(){$j(this).text(e)})});$j(".projects_holder").mixitup({showOnLoad:"all",transitionSpeed:600,minHeight:150,onMixEnd:function(){initPortfolioHover()}})}function resetFilter(){"use strict";var e=$j(".filter_holder").find(".label span");e.text(e.attr("data-label"));$j(".filter_holder").find("li.filter").removeClass("active")}function initPortfolioHover(){"use strict";if($j(".projects_holder.portfolio_hover article").length>0){$j(".projects_holder.portfolio_hover article").each(function(){var e=$j(this);var t=e.find(".image").height();var n=e.find(".text_holder").height();e.find(".image_hover").css("bottom",-t);e.find(".text_holder").css("bottom",-n);e.mouseenter(function(){e.find(".image_hover").css("visibility","visible");e.find(".image").stop().animate({top:-t},400);e.find(".image_hover").stop().animate({bottom:"0px"},400);e.find(".text_holder").stop().animate({bottom:"0px"},500)}).mouseleave(function(){e.find(".image").stop().animate({top:"0px"},300);e.find(".image_hover").stop().animate({bottom:-t},300,function(){e.find(".image_hover").css("visibility","hidden")});e.find(".text_holder").stop().animate({bottom:-n},300)})})}}function initProgressBars(){"use strict";if($j(".progress_bars").length){$j(".progress_bars").each(function(){$j(this).appear(function(){initToCounterHorizontalProgressBar($j(this));$j(this).find(".progress_bar").each(function(){var e=$j(this).find(".progress_content").data("percentage");var t=$j(this).find(".progress_number").width();$j(this).find(".progress_content").css("width","0%");$j(this).find(".progress_content").animate({width:e+"%"},2e3);$j(this).find(".progress_number").css("width",t+"px")})},{accX:0,accY:-200})})}}function initToCounterHorizontalProgressBar(e){"use strict";if($j(".progress_bars .progress_number span").length){$j(".progress_bars .progress_number span").each(function(){$j(this).parent().css("opacity","1");var e=parseFloat($j(this).text());$j(this).countTo({from:0,to:e,speed:1500,refreshInterval:50})})}}function initProgressBarsVertical(){"use strict";if($j(".progress_bars_vertical_holder").length){$j(".progress_bars_vertical_holder").each(function(){var e=0;$j(this).find(".progress_bars_vertical").each(function(){e++});$j(this).find(".progress_bars_vertical").css("width",100/e-.3+"%");$j(this).appear(function(){initToCounterVerticalProgressBar();$j(this).find(".progress_bars_vertical").each(function(){var e=$j(this).find(".progress_content").data("percentage");$j(this).find(".progress_content").css("height","0%");$j(this).find(".progress_content").animate({height:e+"%"},1500)})},{accX:0,accY:-200})})}}function initToCounterVerticalProgressBar(){"use strict";if($j(".progress_bars_vertical .progress_number span").length){$j(".progress_bars_vertical .progress_number span").each(function(){var e=parseFloat($j(this).text());$j(this).countTo({from:0,to:e,speed:1500,refreshInterval:50})})}}function initTabs(){"use strict";var e=$j(".tabs-nav");var t=e.children("li");e.each(function(){var e=$j(this);e.next().children(".tab-content").stop(true,true).hide().first().show();e.children("li").first().addClass("active").stop(true,true).show()});t.on("click",function(e){var t=$j(this);t.siblings().removeClass("active").end().addClass("active");t.parent().next().children(".tab-content").stop(true,true).hide().siblings(t.find("a").attr("href")).fadeIn();e.preventDefault()})}function initFullWidthHolder(){"use strict";if($j(".full_width_holder.yes")){var e=$j(window).width();var t=-(e-1e3)/2;if(e>1e3&&$j("div.full_width").length===0){$j(".full_width_holder.yes .full_width_content").css({width:e,"margin-left":t,"margin-right":t})}}}function initFullWidthSinglePortfolio(){"use strict";if($j(".article_big_content:visible")){var e=$j(window).width();var t=$j(".projects_holder_outer").width();var n=-(e-t)/2;var r=-(e-1e3)/2;if(e>1e3){$j(".article_big_content:visible").css({width:e,"margin-left":n,"margin-right":n})}else{$j(".article_big_content:visible").css({width:e,"margin-left":n,"margin-right":n})}}}function viewPort(){"use strict";$j(".parallax section").waypoint(function(e){var t=$j(this).next();if(e==="up"){t=t.prev()}if(!t.length){t=$j(this)}var n=t.attr("id");$j(".link").each(function(){var e=$j(this).attr("href").replace("#","");if(e===n){$j(this).addClass("active")}else{$j(this).removeClass("active")}})},{offset:"0%"})}function initParallax(e){"use strict";if($j("html").hasClass("touch")){$j(".parallax section").each(function(){var e=$j(this);var t=e.data("height");e.height(t);var n=.5;var r=-$j(this).offset().top*n;e.css({"background-position":"center "+r+"px"});$j(window).bind("scroll",function(){var t=(-e.offset().top+$j(window).scrollTop())*n;e.css({"background-position":"center "+t+"px"})})})}else{$j(".parallax section").each(function(){var t=$j(this);var n=t.data("height");t.height(n);var r=n/$j(document).height()*e;var i=$j.elementoffset(t);var s=-(i*r);t.css({"background-position":"center "+s+"px"});$j(window).bind("scroll",function(){var e=$j.elementoffset(t);var n=-(e*r);t.css({"background-position":"center "+n+"px"})})})}return this}function parallaxPager(){"use strict";var e=$j(".link_holder_parallax");$j("section.parallax section").each(function(){var t=$j(this).attr("id");var n=$j(this).data("title");var r=$j("<a />",{href:"#"+t,"class":"link",title:n,html:"&nbsp;"});r.appendTo(e)});e.css("margin-top",-e.height()/2);$j(".link_holder_parallax .link:first-child").addClass("active");$j(document).on("click","a.link",function(){$j(".tooltip").fadeOut(10);if($j(this).hasClass("active")){return false}$j(".link_holder_parallax .link").removeClass("active");$j(this).addClass("active");$j.scrollTo($j($j(this).attr("href")),{duration:750,offset:{top:-1}});return false});$j(".link_holder_parallax a[title]").tooltip({position:"top left",offset:[20,-20]})}function initPortfolioSlider(){"use strict";$j(".slider_small.turn_on ul").bxSlider({pager:false,auto:true,minSlides:1,maxSlides:4,slideWidth:235,slideMargin:20,moveSlides:1,infiniteLoop:true})}function prettyPhoto(){"use strict";$j("a[data-rel]").each(function(){$j(this).attr("rel",$j(this).data("rel"))});$j("a[rel^='prettyPhoto']").prettyPhoto({animation_speed:"fast",slideshow:false,autoplay_slideshow:false,opacity:.8,show_title:true,allow_resize:true,default_width:500,default_height:344,counter_separator_label:"/",theme:"pp_default",hideflash:false,wmode:"opaque",autoplay:true,modal:false,overlay_gallery:false,keyboard_shortcuts:true,deeplinking:false,social_tools:false})}function setBlogPortfolioListHeight(){"use strict";var e=Math.max.apply(null,$j(".blog_holder article.mix").map(function(){return $j(this).height()}).get());$j(".blog_holder article.mix").each(function(){$j(this).height(e)})}function setSidebarBackgroundColor(){"use strict";var e=$j(".two_columns_66_33.background_color_sidebar > .column1").height();$j(".two_columns_66_33.background_color_sidebar > .column2").css("min-height",e);var t=$j(".two_columns_75_25.background_color_sidebar > .column1").height();$j(".two_columns_75_25.background_color_sidebar > .column2").css("min-height",t);var n=$j(".two_columns_33_66.background_color_sidebar > .column2").height();$j(".two_columns_33_66.background_color_sidebar > .column1").css("min-height",n);var r=$j(".two_columns_25_75.background_color_sidebar > .column2").height();$j(".two_columns_25_75.background_color_sidebar > .column1").css("min-height",r)}function checkLogOnSmallestSize(){"use strict";if($j(window).width()>420&&$j(window).width()<801){if(logo_height>=80){$j(".logo a").height(70);$j(".logo").css("padding","5px 0px 5px 0px")}else{var e=(80-logo_height)/2;$j(".logo").css("padding",e+"px 0px")}}else if($j(window).width()<=420){if(logo_height>=60){$j(".logo a").height(50);$j(".logo").css("padding","10px 0px 10px 0px")}else{var e=(60-logo_height)/2;$j(".logo").css("padding",e+"px 0px")}}else{$j(".logo").css("padding","0px")}}function loadMore(){"use strict";var e=1;$j(".load_more a").on("click",function(t){$j(".close_single_portfolio").click();t.preventDefault();resetFilter();var n=$j(this).attr("href");var r=".projects_holder";var s=".portfolio_paging";var o=".portfolio_paging .load_more a";var u=$j(o).attr("href");var a=$j(".projects_holder .filler").length;$j.get(n+"",function(t){$j(".projects_holder .filler").slice(-a).remove();var n=$j(r,t).wrapInner("").html();u=$j(o,t).attr("href");$j(".article_big_content:last").after(n);var s=$j("article.mix:first").height();$j("article.mix").css("min-height",s);$j(".projects_holder").mixitup("remix","all");prettyPhoto();initPortfolioHover();$j(".projects_holder > .mix ").each(function(){$j(this).hoverdir()});if($j(".load_more").attr("rel")>e){$j(".load_more a").attr("href",u)}else{$j(".load_more").remove()}$j(".projects_holder .portfolio_paging:last").remove();$j("article.mix").css("min-height",0)});e++})}function initCheckSafariBrowser(){"use strict";if(navigator.userAgent.indexOf("Safari")!=-1&&navigator.userAgent.indexOf("Chrome")==-1){$j("body").addClass("safari_browser")}}var $j=jQuery.noConflict();$j(document).ready(function(){"use strict";dropDownMenu();languageMenu();setDropDownMenuPosition();dropDownMenu2();selectMenu();initAccordion();initAccordionFullWidth();accordionFullWidth();initAccordionContentLink();backToTop();backButtonInterval();fitVideo();initCounter();initToCounter();initDoughnutProgressBar();initDoughnutProgressBar2();initFlexSlider();initFullWidthHolder();initListAnimation();initMessages();initNiceScroll();initBlog();socialShareOpen();initParallax(parallax_speed);addPlaceholderSearchWidget();placeholderReplace();initPortfolioSlider();prettyPhoto();initProgressBars();initProgressBarsVertical();viewPort();loadMore();initCheckSafariBrowser()});$j(window).load(function(){"use strict";magicPanes();$j("header").removeClass("hide_background");$j(".touch .main_menu li:has(div.second)").doubleTapToGo();logo_height=$j(".logo img").height();setLogoHeightOnLoad();checkLogOnSmallestSize();$j(".logo a").css("visibility","visible");initProjects();resetFilter();initElements();initTabs();setSidebarBackgroundColor();setBlogPortfolioListHeight();initPortfolioSingleInfo();initPortfolioHover()});$j(window).scroll(function(){"use strict";var e=$j(window).scrollTop();if($j(window).width()>768&&$j(".no_fixed").length===0){headerSize(e)}});$j(window).resize(function(){"use strict";initPortfolioHover();accordionFullWidth();initFullWidthHolder();initFullWidthSinglePortfolio();setSidebarBackgroundColor();setBlogPortfolioListHeight();setDropDownMenuPosition();checkLogOnSmallestSize();magicPanes()});(function(e){"use strict";e.fn.countTo=function(t){t=e.extend({},e.fn.countTo.defaults,t||{});var n=Math.ceil(t.speed/t.refreshInterval),r=(t.to-t.from)/n;return e(this).each(function(){function a(){o+=r;s++;e(i).html(o.toFixed(t.decimals));if(typeof t.onUpdate==="function"){t.onUpdate.call(i,o)}if(s>=n){clearInterval(u);o=t.to;if(typeof t.onComplete==="function"){t.onComplete.call(i,o)}}}var i=this,s=0,o=t.from,u=setInterval(a,t.refreshInterval)})};e.fn.countTo.defaults={from:0,to:100,speed:1e3,refreshInterval:100,decimals:0,onUpdate:null,onComplete:null}})(jQuery);var $scrollHeight;$j.elementoffset=function(e){"use strict";var t=$j(window).scrollTop();return t-e.offset().top+104}