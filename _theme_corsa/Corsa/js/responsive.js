jQuery(document).ready(function() {
    "use strict";

    var resizeTimer = null,
        videoInit = false,
        scrollInit = false;

    window.setVideoProportion = function() {
        jQuery('.video-background').each(function(){
            var container = jQuery(this),
                mejsContainer = container.find('.mejs-container'),
                video = container.find('video'),
                videoHeight = video.attr('height'),
                videoWidth = video.attr('width'),
                videoProportion = videoWidth / videoHeight,
                parent = container.parent(),
                parentHeight = parent.height(),
                parentWidth = parent.width(),
                parentProportion = parentWidth / parentHeight,
                proportion = parentHeight / videoHeight,
                centerX, centerY;

            if (parentProportion >= videoProportion) {
                proportion = parentWidth / videoWidth;
            }

            container.width(proportion*videoWidth);
            container.height(proportion*videoHeight);

            centerX = ((parentWidth >> 1) - (container.width() >> 1)) | 0;
            centerY = ((parentHeight >> 1) - (container.height() >> 1)) | 0;

            container.css({ 'left': centerX, 'top': centerY });

            mejsContainer.css({width: '100%', height: '100%'});
//			container.find('.video-preload').css({'display': 'none'});

        });
    };

    window.resizeHandler = function(){
        var body = jQuery('body'),
            header = jQuery('.l-header'),
            firstSection = jQuery('.l-section').first(),
            headerTop = 0,
            scrollOffsetTolerance = 0,
            H = jQuery(window).height()-0,// Browser window height
            W = jQuery(window).width()- 0,// Browser window width
            h = window.headerHeight = header.height()-0,// header height, calculated depending on window width
            hh,
            f = jQuery('.l-footer').height()-0;// footer height, affects .l-main bottom margin

        jQuery('.l-main').css('margin-bottom', f+'px');

        firstSection.css({'height': ''});
        hh = firstSection.height()- 0;

        if (body.hasClass('headerpos_top'))
        {
            if (body.hasClass('hometype_fullscreen')) {
                firstSection.css({'height': Math.max((H-h), hh)+'px'});
            }
            if (body.hasClass('headertype_sticky')) {
                firstSection.css({'margin-top': h+'px'});
            }
        }
        if (body.hasClass('headerpos_bottom'))
        {
            if (body.hasClass('hometype_fullscreen')) {
                firstSection.css({'height': Math.max((H-h), hh)+'px', 'margin-bottom': h+'px'});
                headerTop = Math.max((H-h), hh);
            } else {
                firstSection.css({'margin-bottom': h+'px'});
                headerTop = hh;
            }
        }
        if (body.hasClass('headerpos_outside'))
        {
            if (body.hasClass('hometype_fullscreen')) {
                firstSection.css({'height': Math.max(H, hh)+'px', 'margin-bottom': h+'px'});
                headerTop = Math.max(H, hh);
            } else {
                firstSection.css({'margin-bottom': h+'px'});
                headerTop = hh;
            }
        }

        header.css('top', headerTop+'px');

        if (body.hasClass('headertype_sticky')) {
            scrollOffsetTolerance = h-1;
        }

        if (window.MediaElementPlayer){
            if (videoInit) {
                window.setVideoProportion();
            } else {
                videoInit = true;

                jQuery('.video-background video').mediaelementplayer({
                    enableKeyboard: false,
                    iPadUseNativeControls: false,
                    pauseOtherPlayers: false,
                    iPhoneUseNativeControls: false,
                    AndroidUseNativeControls: false,
                    videoWidth: '100%',
                    videoHeight: '100%',
                    success: function (mediaElement, domObject) {console.log(1);
                        window.setVideoProportion();
                        jQuery(domObject).css('display', 'block');
                    }
                });
            }
        }

        var linkScroll = function(event, link) {
            event.preventDefault();
            event.stopPropagation();
//			jQuery.smoothScroll({
//				offset: -scrollOffsetTolerance,
//				scrollTarget: link.hash
//			});

            jQuery("html, body").animate({
                scrollTop: jQuery(link.hash).offset().top-scrollOffsetTolerance+"px"
            }, {
                duration: 1200,
                easing: "easeInOutQuint"
            });
        };

        jQuery('a[class="w-logo-link"][href="#"]').off('click').click(function(event) {
            event.preventDefault();
            event.stopPropagation();
            jQuery("html, body").animate({
                scrollTop: 0
            }, {
                duration: 1200,
                easing: "easeInOutQuint"
            });
        });

        jQuery('a[class="w-toplink"]').off('click').click(function(event) {
            event.preventDefault();
            event.stopPropagation();
            jQuery("html, body").animate({
                scrollTop: 0
            }, {
                duration: 1200,
                easing: "easeInOutQuint"
            });
        });

        jQuery('a[href^="#"][href!="#"]').off('click').die('click').live('click',function(event) {
            linkScroll(event, this);
        });

        if (scrollInit == false && document.location.hash && jQuery(document.location.hash).length) {
            scrollInit = true;

            jQuery("html, body").animate({
                scrollTop: jQuery(document.location.hash).offset().top-scrollOffsetTolerance+"px"
            }, {
                duration: 1200,
                easing: "easeInOutQuint"
            });
        }

        jQuery('.l-header .w-nav').each(function () {
            var nav = jQuery(this),
                navControl = nav.find('.w-nav-control'),
                navList = nav.find('.w-nav-list.level_1'),
                navSubLists = navList.find('.w-nav-item.with_sublevel .w-nav-list'),
                navAnchors = nav.find('.w-nav-anchor'),
                navRunning = false,
                mobileNavWidth = 1023;

            if (window.mobileNavWidth !== undefined) {
                mobileNavWidth = window.mobileNavWidth-0;
            }

            if (W <= mobileNavWidth) {
                var listOpen = false,
                    navSubControls = navList.find('.w-nav-item.with_sublevel .w-nav-hint');

                if (! nav.hasClass('touch_enabled')) {
                    nav.addClass('touch_enabled');
                    navList.css({display: 'none'});
                    navSubLists.css({display: 'none'});
                }

                navControl.off('click').click(function() {
                    if (! navRunning) {
                        navRunning = true;
                        if (listOpen) {
                            navList.slideUp(250, function(){
                                navRunning = false;
                            });
                            listOpen = false;
                        } else {
                            navList.slideDown(250, function(){
                                navRunning = false;
                            });
                            listOpen = true;
                        }
                    }
                });

                navSubControls.off('click').click(function() {
                    if (! navRunning) {
                        navRunning = true;
                        var subList = jQuery(this).closest('.w-nav-item-h').find('.w-nav-list').first(),
                            subListOpen = subList.data('subListOpen'),
                            currentNavItem = jQuery(this).closest('.w-nav-item');

                        if (subListOpen) {
                            subList.slideUp(250, function(){
                                navRunning = false;
                                currentNavItem.removeClass('open');
                            });
                            subListOpen = false;
                        } else {
                            subList.slideDown(250, function(){
                                navRunning = false;
                                currentNavItem.addClass('open');
                            });
                            subListOpen = true;
                        }

                        subList.data('subListOpen', subListOpen);
                    }

                    return false;
                });

                navAnchors.click(function() {
                    if (W <= mobileNavWidth) {
                        navRunning = true;
                        navList.slideUp(250, function(){
                            navRunning = false;
                        });
                        listOpen = false;
                    }
                });

            } else {
                nav.removeClass('touch_enabled');
                nav.find('.w-nav-item').removeClass('open');
                navList.css({height: '', display: ''});
                navSubLists.css({height: '', display: ''});
                navControl.off('click');

            }

        });

        var scrollTimer = false,
            scrollHandler = function(){
                var scrollPosition	= parseInt(jQuery(window).scrollTop(), 10);

                if (scrollPosition >= H) {
                    jQuery('.w-toplink').addClass('active');
                } else {
                    jQuery('.w-toplink').removeClass('active');
                }

                if (body.hasClass('headertype_sticky') && (body.hasClass('headerpos_bottom') || body.hasClass('headerpos_outside'))) {
                    if (scrollPosition > headerTop) {
                        header.css({ position: 'fixed', top: 0});

                    } else {
                        header.css({ position: '', top: headerTop});
                    }

                }


                //Move trough each menu and check its position with scroll position then add current class
                jQuery('.w-nav-item a[href^=#]').each(function() {
                    var thisHref = jQuery(this).attr('href');

                    if (jQuery(thisHref).length) {
                        var thisTruePosition = parseInt(jQuery(thisHref).offset().top, 10),
                            thisPosition = thisTruePosition - h;

                        if(scrollPosition >= thisPosition) {
                            jQuery('.w-nav-item a[href^=#]').parent().parent().removeClass('active');
                            jQuery('.w-nav-item a[href='+ thisHref +']').parent().parent().addClass('active');

                            jQuery('.w-cart').each(function(){
                                if (jQuery(this).hasClass('status_empty')) {
                                    jQuery(this).css('display', '');
                                }
                            });
                            jQuery(thisHref).find('.w-cart').css('display', 'block');
                        }
                    }
                });


                //If we're at the bottom of the page, move pointer to the lal-section-hst section
                var bottomPage	= parseInt(jQuery(document).height(), 10) - parseInt(jQuery(window).height(), 10);

                if(scrollPosition === bottomPage || scrollPosition >= bottomPage) {
                    var thisHref = jQuery('.w-nav-item a[href^=#]:last').attr('href');
                    if (jQuery(thisHref).length) {
                        jQuery('.w-nav-item a[href^=#]').parent().parent().removeClass('active');
                        jQuery('.w-nav-item a[href^=#]:last').parent().parent().addClass('active');
                    }
                }
            };

        window.clearTimeout(scrollTimer);
        scrollHandler();

        jQuery(window).scroll(function(){
            window.clearTimeout(scrollTimer);
            scrollTimer = window.setTimeout(function(){
                scrollHandler();
            }, 10);
        });

    };

    window.resizeHandler();

    jQuery(window).resize(function(){
        window.clearTimeout(resizeTimer);
        resizeTimer = window.setTimeout(function(){
            window.resizeHandler();
        }, 50);

    });


});