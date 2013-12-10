// US g-alert
(function ($) {
	"use strict";

	$.fn.gAlert = function () {

		return this.each(function () {
			var alert = $(this),
				alertClose = alert.find('.g-alert-close');

			if (alertClose) {
				alertClose.click(function(){
					alert.animate({ height: '0', margin: 0}, 400, function(){
						alert.css('display', 'none');
					});
				});
			}
		});
	};
})(jQuery);

jQuery(document).ready(function() {
	"use strict";

	jQuery('.g-alert').gAlert();
});

// US w-tabs
(function ($) {
	"use strict";

	$.fn.wTabs = function () {


		return this.each(function () {
			var tabs = $(this),
				items = tabs.find('.w-tabs-item'),
				sections = tabs.find('.w-tabs-section'),
				resizeTimer = null,
				itemsWidth = 0,
				running = false;

			items.each(function(){
				itemsWidth += $(this).outerWidth(true);
			});

			function tabs_resize(){
				if ( ! (tabs.hasClass('layout_accordion') && ! tabs.data('accordionLayoutDynamic'))) {
					if (itemsWidth > tabs.width()) {
						tabs.data('accordionLayoutDynamic', true);
						if ( ! tabs.hasClass('layout_accordion')) {
							tabs.addClass('layout_accordion');
						}
					} else {
						if (tabs.hasClass('layout_accordion')) {
							tabs.removeClass('layout_accordion');
						}
					}
				}
			}

			tabs_resize();

			$(window).resize(function(){
				window.clearTimeout(resizeTimer);
				resizeTimer = window.setTimeout(function(){
					tabs_resize();
				}, 50);

			});

			sections.each(function(index){
				var item = $(items[index]),
					section = $(sections[index]),
					section_title = section.find('.w-tabs-section-title'),
					section_content = section.find('.w-tabs-section-content');

				if (section.hasClass('active')) {
					section_content.slideDown();
				}

				section_title.click(function(){
					if (tabs.hasClass('type_toggle')) {
						if ( ! running) {
							if (section.hasClass('active')) {
								running = true;
								if (item) {
									item.removeClass('active');
								}
								section_content.slideUp(null, function(){
									section.removeClass('active');
									running = false;
								});
							} else {
								running = true;
								if (item) {
									item.addClass('active');
								}
								section_content.slideDown(null, function(){
									section.addClass('active');
									running = false;
								});
							}
						}


					} else if (( ! section.hasClass('active')) && ( ! running)) {
						running = true;
						items.each(function(){
							if ($(this).hasClass('active')) {
								$(this).removeClass('active');
							}
						});
						if (item) {
							item.addClass('active');
						}

						sections.each(function(){
							if ($(this).hasClass('active')) {
								$(this).find('.w-tabs-section-content').slideUp();
							}
						});

						section_content.slideDown(null, function(){
							sections.each(function(){
								if ($(this).hasClass('active')) {
									$(this).removeClass('active');
								}
							});
							section.addClass('active');
							running = false;
						});

					}

				});

				if (item)
				{
					item.click(function(){
						section_title.click();
					});
				}


			});

		});
	};
})(jQuery);

jQuery(document).ready(function() {
	"use strict";

	jQuery('.w-tabs').wTabs();
});

// US w-portfolio
(function ($) {
	"use strict";

	$.fn.wPortfolio = function () {

		return this.each(function () {
			var portfolio = $(this),
				items = portfolio.find('.w-portfolio-item'),
				running = false,
				activeIndex;

			items.each(function(itemIndex, item){
				var anchor = $(item).find('.w-portfolio-item-anchor'),
					details = $(item).find('.w-portfolio-item-details'),
					detailsClose = details.find('.w-portfolio-item-details-close'),
					detailsNext = details.find('.w-portfolio-item-details-arrow.to_next'),
					detailsPrev = details.find('.w-portfolio-item-details-arrow.to_prev'),
					nextItem = $(item).next(),
					prevItem = $(item).prev();

				anchor.click(function(){
					if ( ! $(item).hasClass('active') && ! running){
						running = true;

						var activeItem = portfolio.find('.w-portfolio-item.active');

						if (activeItem.length && parseInt($(item).offset().top, 10) === parseInt(activeItem.offset().top, 10)) {
							activeItem.find('.w-portfolio-item-details').fadeOut();
							activeItem.removeClass('active').css('margin-bottom', '');
							details.fadeIn(300, function() {

                                var sliderContainer = details.find('.flexslider');
                                if (sliderContainer.length) {
                                    var slider = sliderContainer.data('flexslider');
                                    if (slider === undefined) {
                                        sliderContainer.flexslider({
                                            directionalNav: true,
                                            controlNav: false,
                                            smoothHeight: true,
                                            start: function() {
                                                sliderContainer.removeClass("flex-loading");
                                                $(item).animate({'margin-bottom': details.height()+'px'}, 100);
                                            },
                                            after: function() {
                                                $(item).animate({'margin-bottom': details.height()+'px'}, 100);
                                            }
                                        });
                                    }

                                }
                            });
							$(item).css('margin-bottom', details.height()+'px');
						} else {
							if (activeItem.length){
								activeItem.find('.w-portfolio-item-details').hide();
								activeItem.removeClass('active').css({'margin-bottom': ''});

							}

							$(item).animate({'margin-bottom': details.height()+'px'}, 300);

							details.slideDown(300, function() {
								$(item).css({'margin-bottom': details.height()+'px'});

                                var sliderContainer = details.find('.flexslider');
                                if (sliderContainer.length) {
                                    var slider = sliderContainer.data('flexslider');
                                    if (slider === undefined) {
                                        sliderContainer.flexslider({
                                            directionalNav: true,
                                            controlNav: false,
                                            smoothHeight: true,
                                            start: function() {
                                                sliderContainer.removeClass("flex-loading");
                                                $(item).animate({'margin-bottom': details.height()+'px'}, 100);
                                            },
                                            after: function() {
                                                $(item).animate({'margin-bottom': details.height()+'px'}, 100);
                                            }
                                        });
                                    }

                                }
							});

						}

						jQuery("html, body").animate({
							scrollTop: $(item).offset().top+0.7*anchor.height()+1-window.headerHeight+"px"
						}, {
							duration: 1000,
							easing: "easeInOutQuad"
						});

						$(item).addClass('active');
						activeIndex = itemIndex;
						running = false;

					}
				});

				detailsClose.off('click').click(function(){
					details.slideUp();
					$(item).removeClass('active').animate({'margin-bottom': 0}, 300);
				});

				if (nextItem.length) {
					detailsNext.off('click').click(function(){
						nextItem.find('.w-portfolio-item-anchor').click();
					});
				} else {
					detailsNext.hide();
				}

				if (prevItem.length) {
					detailsPrev.off('click').click(function(){
						prevItem.find('.w-portfolio-item-anchor').click();
					});
				} else {
					detailsPrev.hide();
				}

			});
		});
	};
})(jQuery);

jQuery(document).ready(function() {
	"use strict";

	jQuery('.w-portfolio').wPortfolio();
});