<?php
global $smof_data;
if ($smof_data['body_text_font'] == '' OR $smof_data['body_text_font'] == 'none') {
	$smof_data['body_text_font'] = 'PT Sans';
}

if ($smof_data['navigation_font'] == '' OR $smof_data['navigation_font'] == 'none') {
	$smof_data['navigation_font'] = 'PT Sans';
}

if ($smof_data['heading_font'] == '' OR $smof_data['heading_font'] == 'none') {
	$smof_data['heading_font'] = 'Dosis';
}

if (empty($smof_data['regular_nav_lineheight'])) {
    $smof_data['regular_nav_lineheight'] = 26;
}

if (empty($smof_data['regular_fontsize'])) {
    $smof_data['regular_fontsize'] = 16;
}

if (empty($smof_data['nav_fontsize'])) {
    $smof_data['nav_fontsize'] = 17;
}

if (empty($smof_data['h1_fontsize'])) {
    $smof_data['h1_fontsize'] = 54;
}

if (empty($smof_data['h1_lineheight'])) {
    $smof_data['h1_lineheight'] = 66;
}

if (empty($smof_data['h2_fontsize'])) {
    $smof_data['h2_fontsize'] = 44;
}

if (empty($smof_data['h2_lineheight'])) {
    $smof_data['h2_lineheight'] = 54;
}

if (empty($smof_data['h3_fontsize'])) {
    $smof_data['h3_fontsize'] = 36;
}

if (empty($smof_data['h3_lineheight'])) {
    $smof_data['h3_lineheight'] = 46;
}

if (empty($smof_data['h4_fontsize'])) {
    $smof_data['h4_fontsize'] = 30;
}

if (empty($smof_data['h4_lineheight'])) {
    $smof_data['h4_lineheight'] = 40;
}

if (empty($smof_data['h5_fontsize'])) {
    $smof_data['h5_fontsize'] = 24;
}

if (empty($smof_data['h5_lineheight'])) {
    $smof_data['h5_lineheight'] = 34;
}

if (empty($smof_data['h6_fontsize'])) {
    $smof_data['h6_fontsize'] = 20;
}

if (empty($smof_data['h6_lineheight'])) {
    $smof_data['h6_lineheight'] = 28;
}
?>
<style id="us_fonts_inline">
/* Main Text Font */

body,
p,
td {
	font-family: '<?php echo $smof_data['body_text_font']; ?>';
	}
body,
p,
td {
	font-size: <?php echo $smof_data['regular_fontsize']; ?>px;
	line-height: <?php echo $smof_data['regular_nav_lineheight']; ?>px;
	}
	

/* Navigation Text Font */

.l-subheader .w-nav-item.level_1 {
	font-family: '<?php echo $smof_data['navigation_font']; ?>';
	}
.l-subheader .w-nav-item.level_1 {
	font-size: <?php echo $smof_data['nav_fontsize']; ?>px;
	}

	
/* Heading Text Font */

h1,
h2,
h3,
h4,
h5,
h6,
.l-preloader-counter,
.w-blog.imgpos_atleft .w-blog-entry-meta-date-day,
.w-counter-number,
.w-logo-title,
.w-pricing-item-title,
.w-pricing-item-price,
.w-tabs.layout_accordion .w-tabs-section-title-text,
.w-tabs-item-title {
	font-family: '<?php echo $smof_data['heading_font']; ?>';
	}
h1 {
	font-size: <?php echo $smof_data['h1_fontsize']; ?>px;
	line-height: <?php echo $smof_data['h1_lineheight']; ?>px;
	}
h2 {
	font-size: <?php echo $smof_data['h2_fontsize']; ?>px;
	line-height: <?php echo $smof_data['h2_lineheight']; ?>px;
	}
h3 {
	font-size: <?php echo $smof_data['h3_fontsize']; ?>px;
	line-height: <?php echo $smof_data['h3_lineheight']; ?>px;
	}
h4 {
	font-size: <?php echo $smof_data['h4_fontsize']; ?>px;
	line-height: <?php echo $smof_data['h4_lineheight']; ?>px;
	}
h5 {
	font-size: <?php echo $smof_data['h5_fontsize']; ?>px;
	line-height: <?php echo $smof_data['h5_lineheight']; ?>px;
	}
h6 {
	font-size: <?php echo $smof_data['h6_fontsize']; ?>px;
	line-height: <?php echo $smof_data['h6_lineheight']; ?>px;
	}

</style>
<style id="us_colors_inline">
/*************************** HEADER ***************************/

/* Header Background color */
.l-header,
.l-subheader .w-nav-item.level_2:hover .w-nav-anchor.level_2,
.l-subheader .w-nav-item.level_2.active:hover .w-nav-anchor.level_2,
.l-subheader .w-nav-item.level_2.current-menu-item:hover .w-nav-anchor.level_2,
.l-subheader .w-nav-item.level_2.current-menu-ancestor:hover .w-nav-anchor.level_2,
.l-subheader .w-nav-item.level_3:hover .w-nav-anchor.level_3,
.l-subheader .w-nav-item.level_3.active:hover .w-nav-anchor.level_3,
.l-subheader .w-nav-item.level_3.current-menu-item:hover .w-nav-anchor.level_3,
.l-subheader .w-nav-item.level_3.current-menu-ancestor:hover .w-nav-anchor.level_3,
.l-subheader .w-nav.touch_enabled .w-nav-list.level_1 {
	background-color: <?php echo ($smof_data['header_background'] != '')?$smof_data['header_background']:'#ffff'; ?>;
	}

/* Header Alternate Background Color */
.l-subheader .w-nav-item.level_1 .w-nav-anchor.level_1:before,
.l-subheader .w-nav-list.level_2,
.l-subheader .w-nav-list.level_3 {
	background-color: <?php echo ($smof_data['header_background_alternative'] != '')?$smof_data['header_background_alternative']:'#f5f5f5'; ?>;
	}
	
/* Border Color */
.l-subheader .w-nav.touch_enabled .w-nav-anchor {
	border-color: <?php echo ($smof_data['header_border'] != '')?$smof_data['header_border']:'#e8e8e8'; ?>;
	}
	
/* Navigation Color */
.w-logo-title,
.l-subheader .w-nav-control,
.l-subheader .w-nav-anchor.level_1,
.l-subheader .w-nav-list.level_2 .w-nav-anchor,
.l-header .w-socials-item-link {
	color: <?php echo ($smof_data['header_navigation'] != '')?$smof_data['header_navigation']:'#666'; ?>;
	}
	
/* Navigation Hover Color */
.w-logo-link:hover .w-logo-title,
.l-subheader .w-nav-control:hover,
.l-subheader .w-nav-control:active,
.l-subheader .w-nav-item.level_1:hover .w-nav-anchor.level_1,
.l-subheader .w-nav-item.level_2:hover .w-nav-anchor.level_2,
.l-subheader .w-nav-item.level_3:hover .w-nav-anchor.level_3 {
	color: <?php echo ($smof_data['header_navigation_hover'] != '')?$smof_data['header_navigation_hover']:'#444'; ?>;
	}
	
/* Navigation Active Color */
.l-subheader .w-nav-item.level_1.active .w-nav-anchor.level_1,
.l-subheader .w-nav-item.level_1.current-menu-item .w-nav-anchor.level_1,
.l-subheader .w-nav-item.level_1.current-menu-ancestor .w-nav-anchor.level_1,
.l-subheader .w-nav-item.level_2.active .w-nav-anchor.level_2,
.l-subheader .w-nav-item.level_2.current-menu-item .w-nav-anchor.level_2,
.l-subheader .w-nav-item.level_2.current-menu-ancestor .w-nav-anchor.level_2,
.l-subheader .w-nav-item.level_3.active .w-nav-anchor.level_3,
.l-subheader .w-nav-item.level_3.current-menu-item .w-nav-anchor.level_3,
.l-subheader .w-nav-item.level_3.current-menu-ancestor .w-nav-anchor.level_3 {
	color: <?php echo ($smof_data['header_navigation_active'] != '')?$smof_data['header_navigation_active']:'#31c5c7'; ?>;
	}



/*************************** MAIN CONTENT ***************************/

/* Background Color */
.l-section,
.l-preloader,
.g-hr-h i,
.color_primary .g-btn.type_primary,
.w-blog.imgpos_atleft .w-blog-entry-meta-date,
.w-clients-itemgroup,
.w-clients-nav,
.w-tabs-item.active,
#supersized li,
#prevslide,
#nextslide,
.flex-direction-nav span {
	background-color: <?php echo ($smof_data['main_background'] != '')?$smof_data['main_background']:'#fff'; ?>;
	}
.w-icon.color_border.with_circle .w-icon-link,
.w-pricing-item-title {
	color: <?php echo ($smof_data['main_background'] != '')?$smof_data['main_background']:'#fff'; ?>;
	}
.w-portfolio-item-anchor:after {
	border-bottom-color: <?php echo ($smof_data['main_background'] != '')?$smof_data['main_background']:'#fff'; ?>;
	}

/* Alternate Background Color */
.l-preloader-bar,
input[type="text"],
input[type="password"],
input[type="email"],
input[type="url"],
input[type="tel"],
input[type="number"],
input[type="date"],
textarea,
select,
.g-pagination-item,
.w-actionbox,
.no-touch .w-blog.imgpos_atleft .w-blog-entry:hover,
.w-comments-item-icon,
.l-main .w-contacts-item > i,
.w-icon.with_circle .w-icon-link,
.w-portfolio-item-details-close:hover,
.w-portfolio-item-details-arrow:hover,
.w-tabs-list,
.w-tabs.layout_accordion .w-tabs-section-title:hover,
.w-tags.layout_block .w-tags-item-link,
.w-testimonial-text {
	background-color: <?php echo ($smof_data['main_background_alternative'] != '')?$smof_data['main_background_alternative']:'#f2f2f2'; ?>;
	}
.w-testimonial-person:after {
	border-top-color: <?php echo ($smof_data['main_background_alternative'] != '')?$smof_data['main_background_alternative']:'#f2f2f2'; ?>;
	}

/* Border Color */
.g-hr-h,
.w-blog.imgpos_atleft .w-blog-list,
.w-blog.imgpos_atleft .w-blog-entry,
.w-blog-entry.sticky,
.w-comments,
.w-nav-list.layout_ver .w-nav-anchor,
.w-pricing-item-h,
.w-portfolio-item-meta,
.w-shortblog-entry-meta-date,
.w-tabs.layout_accordion,
.w-tabs.layout_accordion .w-tabs-section,
#wp-calendar thead th,
#wp-calendar tbody td,
#wp-calendar tfoot td,
.widget.widget_nav_menu .menu-item a,
.widget.widget_nav_menu .menu-item a:hover {
	border-color: <?php echo ($smof_data['main_border'] != '')?$smof_data['main_border']:'#e8e8e8'; ?>;
	}
.g-btn.type_default,
.w-icon.color_border.with_circle .w-icon-link {
	background-color: <?php echo ($smof_data['main_border'] != '')?$smof_data['main_border']:'#e8e8e8'; ?>;
	}
.g-hr-h i,
.page-404 i,
.w-icon.color_border .w-icon-link {
	color: <?php echo ($smof_data['main_border'] != '')?$smof_data['main_border']:'#e8e8e8'; ?>;
	}

/* Text Color */
.l-section,
input[type="text"],
input[type="password"],
input[type="email"],
input[type="url"],
input[type="tel"],
input[type="number"],
input[type="date"],
textarea,
select,
.color_primary .g-btn.type_primary,
.l-preloader-counter,
.g-pagination-item,
.g-btn.type_default,
.w-blog.imgpos_atleft .w-blog-entry-meta-date,
.w-clients-nav,
.l-subsection.color_primary .w-clients-nav,
.l-subsection.color_primary .w-clients-nav:hover,
.l-subsection.color_dark .w-clients-nav:hover,
.l-main .w-contacts-item > i,
.w-icon-link,
.w-iconbox .w-iconbox-title,
#prevslide,
#nextslide,
.flex-direction-nav span,
#wp-calendar tbody td#today,
.widget.widget_nav_menu .menu-item.current-menu-item > a,
.widget.widget_nav_menu .menu-item.current-menu-ancestor > a {
	color: <?php echo ($smof_data['main_text'] != '')?$smof_data['main_text']:'#444'; ?>;
	}
.w-pricing-item-title {
	background-color: <?php echo ($smof_data['main_text'] != '')?$smof_data['main_text']:'#444'; ?>;
	}

/* Primary Color */
a,
.home-heading-line.type_primary,
.g-html .highlight,
.w-counter-number,
.w-icon.color_primary .w-icon-link,
.w-iconbox-icon,
.l-subsection.color_dark .w-icon-link:hover,
.w-iconbox.with_circle .w-iconbox-link:hover .w-iconbox-title,
.w-nav-list.layout_ver .w-nav-anchor:hover,
.w-nav-list.layout_ver .active .w-nav-anchor.level_1,
.w-tabs-item.active,
.w-tabs.layout_accordion .w-tabs-section.active .w-tabs-section-title,
.w-team-member-name,
.w-testimonial-person-name {
	color: <?php echo ($smof_data['main_primary'] != '')?$smof_data['main_primary']:'#31c5c7'; ?>;
	}
.l-subsection.color_primary,
.home-heading-line.type_primary_bg,
.color_primary .g-hr-h i,
.g-btn.type_primary,
input[type="submit"],
.no-touch .g-btn.type_secondary:after,
.g-pagination-item.active,
.w-actionbox.color_primary,
.w-icon.color_primary.with_circle .w-icon-link,
.w-iconbox.with_circle .w-iconbox-link:hover .w-iconbox-icon,
.w-pricing-item.type_featured .w-pricing-item-title,
.no-touch .w-team-member-links .w-team-member-links-item:hover {
	background-color: <?php echo ($smof_data['main_primary'] != '')?$smof_data['main_primary']:'#31c5c7'; ?>;
	}
.g-html blockquote,
.w-clients.columns_5 .w-clients-item:hover,
.w-tabs-item.active {
	border-color: <?php echo ($smof_data['main_primary'] != '')?$smof_data['main_primary']:'#31c5c7'; ?>;
	}
.no-touch .w-iconbox.with_circle .w-iconbox-icon:after {
	box-shadow: 0 0 0 3px <?php echo ($smof_data['main_primary'] != '')?$smof_data['main_primary']:'#31c5c7'; ?>;
	}

/* Secondary Color */
a:hover,
a:active,
.home-heading-line.type_secondary,
.w-icon.color_secondary .w-icon-link,
.w-iconbox-link:hover .w-iconbox-icon,
.w-iconbox-link:hover .w-iconbox-title,
.w-tags-item-link:hover,
.widget.widget_nav_menu .menu-item a:hover:before,
.widget.widget_tag_cloud .tagcloud a:hover {
	color: <?php echo ($smof_data['main_secondary'] != '')?$smof_data['main_secondary']:'#444'; ?>;
	}
.home-heading-line.type_secondary_bg,
.no-touch .g-btn.type_default:after,
.no-touch .g-btn.type_primary:after,
.no-touch input[type="submit"]:hover,
.g-btn.type_secondary,
.g-pagination-item:hover,
.w-icon.color_secondary.with_circle .w-icon-link,
.w-iconbox.with_circle .w-iconbox-icon,
.w-tags.layout_block .w-tags-item-link:hover {
	background-color: <?php echo ($smof_data['main_secondary'] != '')?$smof_data['main_secondary']:'#444'; ?>;
	}
	
/* Fade Elements Color */
.w-bloglist-entry:before,
.w-blogpost-meta i,
.w-blogpost-meta,
.w-comments-title i,
.w-comments-item-icon,
.w-comments-item-date,
.w-icon.color_fade .w-icon-link,
.w-links-anchor:before,
.w-socials-item-link,
.w-testimonial-person,
#wp-calendar thead th,
#wp-calendar tbody td,
.widget.widget_archive ul li:before,
.widget.widget_categories ul li:before,
.widget.widget_nav_menu .menu-item a:before,
.widget.widget_recent_entries ul li:before,
.widget.widget_rss ul li span,
.widget.widget_rss ul li cite,
.widget.widget_tag_cloud .tagcloud a {
	color: <?php echo ($smof_data['main_fade'] != '')?$smof_data['main_fade']:'#999'; ?>;
	}
input[type="text"]:focus,
input[type="password"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="tel"]:focus,
input[type="number"]:focus,
input[type="date"]:focus,
textarea:focus,
select:focus {
	box-shadow: 0 0 0 2px <?php echo ($smof_data['main_fade'] != '')?$smof_data['main_fade']:'#999'; ?>;
	}

	
	
/*************************** ALTERNATE CONTENT ***************************/

/* Background Color */
.l-subsection.color_alternate,
.color_alternate .g-hr-h i,
.color_alternate .color_primary .g-btn.type_primary,
.color_alternate .w-blog.imgpos_atleft .w-blog-entry-meta-date,
.color_alternate .w-clients-itemgroup,
.color_alternate .w-clients-nav,
.color_alternate .w-tabs-item.active {
	background-color: <?php echo ($smof_data['alt_background'] != '')?$smof_data['alt_background']:'#f2f2f2'; ?>;
	}
.color_alternate .w-pricing-item-title,
.color_alternate .w-icon.color_border.with_circle .w-icon-link {
	color: <?php echo ($smof_data['alt_background'] != '')?$smof_data['alt_background']:'#f2f2f2'; ?>;
	}
.color_alternate .w-portfolio-item-anchor:after {
	border-bottom-color: <?php echo ($smof_data['alt_background'] != '')?$smof_data['alt_background']:'#f2f2f2'; ?>;
	}

/* Alternate Background Color */
.color_alternate .g-btn.type_default,
.color_alternate input[type="text"],
.color_alternate input[type="password"],
.color_alternate input[type="email"],
.color_alternate input[type="url"],
.color_alternate input[type="tel"],
.color_alternate input[type="number"],
.color_alternate input[type="date"],
.color_alternate textarea,
.color_alternate select,
.color_alternate .g-pagination-item,
.color_alternate .w-actionbox,
.no-touch .color_alternate .w-blog.imgpos_atleft .w-blog-entry:hover,
.color_alternate .w-comments-item-icon,
.color_alternate .w-contacts-item > i,
.color_alternate .w-icon.with_circle .w-icon-link,
.color_alternate .w-portfolio-item-details-close:hover,
.color_alternate .w-portfolio-item-details-arrow:hover,
.color_alternate .w-tabs-list,
.color_alternate .w-tabs.layout_accordion .w-tabs-section-title:hover,
.color_alternate .w-tags.layout_block .w-tags-item-link,
.color_alternate .w-testimonial-text {
	background-color: <?php echo ($smof_data['alt_background_alternative'] != '')?$smof_data['alt_background_alternative']:'#fff'; ?>;
	}
.color_alternate .w-testimonial-person:after {
	border-top-color: <?php echo ($smof_data['alt_background_alternative'] != '')?$smof_data['alt_background_alternative']:'#fff'; ?>;
	}

/* Border Color */
.color_alternate .g-hr-h,
.color_alternate .w-blog.imgpos_atleft .w-blog-list,
.color_alternate .w-blog.imgpos_atleft .w-blog-entry,
.color_alternate .w-blog-entry.sticky,
.color_alternate .w-comments,
.color_alternate .w-nav-list.layout_ver .w-nav-anchor,
.color_alternate .w-pricing-item-h,
.color_alternate .w-portfolio-item-meta,
.color_alternate .w-shortblog-entry-meta-date,
.color_alternate .w-tabs.layout_accordion,
.color_alternate .w-tabs.layout_accordion .w-tabs-section,
.color_alternate #wp-calendar thead th,
.color_alternate #wp-calendar tbody td,
.color_alternate #wp-calendar tfoot td,
.color_alternate .widget.widget_nav_menu .menu-item a,
.color_alternate .widget.widget_nav_menu .menu-item a:hover {
	border-color: <?php echo ($smof_data['alt_border'] != '')?$smof_data['alt_border']:'#ddd'; ?>;
	}
.color_alternate .g-btn.type_default,
.color_alternate .w-icon.color_border.with_circle .w-icon-link {
	background-color: <?php echo ($smof_data['alt_border'] != '')?$smof_data['alt_border']:'#ddd'; ?>;
	}
.color_alternate .g-hr-h i,
.color_alternate .page-404 i,
.color_alternate .w-icon.color_border .w-icon-link {
	color: <?php echo ($smof_data['alt_border'] != '')?$smof_data['alt_border']:'#ddd'; ?>;
	}

/* Text Color */
.color_alternate,
.color_alternate input[type="text"],
.color_alternate input[type="password"],
.color_alternate input[type="email"],
.color_alternate input[type="url"],
.color_alternate input[type="tel"],
.color_alternate input[type="number"],
.color_alternate input[type="date"],
.color_alternate textarea,
.color_alternate select,
.color_alternate .g-pagination-item,
.color_alternate .g-btn.type_default,
.color_alternate .w-blog.imgpos_atleft .w-blog-entry-meta-date,
.color_alternate .w-clients-nav,
.color_alternate .w-contacts-item > i,
.color_alternate .w-icon-link,
.color_alternate .w-iconbox .w-iconbox-title,
.color_alternate  #wp-calendar tbody td#today,
.color_alternate .widget.widget_nav_menu .menu-item.current-menu-item > a,
.color_alternate .widget.widget_nav_menu .menu-item.current-menu-ancestor > a {
	color: <?php echo ($smof_data['alt_text'] != '')?$smof_data['alt_text']:'#444'; ?>;
	}
.color_alternate .w-pricing-item-title {
	background-color: <?php echo ($smof_data['alt_text'] != '')?$smof_data['alt_text']:'#444'; ?>;
	}

/* Primary Color */
.color_alternate a,
.color_alternate .home-heading-line.type_primary,
.color_alternate .g-html .highlight,
.color_alternate .w-counter-number,
.color_alternate .w-icon.color_primary .w-icon-link,
.color_alternate .w-iconbox-icon,
.color_alternate .w-iconbox.with_circle .w-iconbox-link:hover .w-iconbox-title,
.color_alternate .w-nav-list.layout_ver .w-nav-anchor:hover,
.color_alternate .w-nav-list.layout_ver .active .w-nav-anchor.level_1,
.color_alternate .w-tabs-item.active,
.color_alternate .w-tabs.layout_accordion .w-tabs-section.active .w-tabs-section-title,
.color_alternate .w-team-member-name,
.color_alternate .w-testimonial-person-name {
	color: <?php echo ($smof_data['alt_primary'] != '')?$smof_data['alt_primary']:'#31c5c7'; ?>;
	}
.color_alternate .home-heading-line.type_primary_bg,
.color_alternate .g-btn.type_primary,
.color_alternate input[type="submit"],
.no-touch .color_alternate .g-btn.type_secondary:after,
.color_alternate .g-pagination-item.active,
.color_alternate .w-actionbox.color_primary,
.color_alternate .w-icon.color_primary.with_circle .w-icon-link,
.color_alternate .w-iconbox.with_circle:hover .w-iconbox-icon,
.color_alternate .w-pricing-item.type_featured .w-pricing-item-title,
.no-touch .color_alternate .w-team-member-links .w-team-member-links-item:hover {
	background-color: <?php echo ($smof_data['alt_primary'] != '')?$smof_data['alt_primary']:'#31c5c7'; ?>;
	}
.color_alternate .g-html blockquote,
.color_alternate .w-clients.columns_5 .w-clients-item:hover,
.color_alternate .w-tabs-item.active {
	border-color: <?php echo ($smof_data['alt_primary'] != '')?$smof_data['alt_primary']:'#31c5c7'; ?>;
	}
.no-touch .color_alternate .w-iconbox.with_circle .w-iconbox-icon:after {
	box-shadow: 0 0 0 3px <?php echo ($smof_data['alt_primary'] != '')?$smof_data['alt_primary']:'#31c5c7'; ?>;
	}

/* Secondary Color */
.color_alternate a:hover,
.color_alternate a:active,
.color_alternate .home-heading-line.type_secondary,
.color_alternate .w-icon.color_secondary .w-icon-link,
.color_alternate .w-tags-item-link:hover,
.color_alternate .widget.widget_nav_menu .menu-item a:hover:before,
.color_alternate .widget.widget_tag_cloud .tagcloud a:hover {
	color: <?php echo ($smof_data['alt_secondary'] != '')?$smof_data['alt_secondary']:'#444'; ?>;
	}
.color_alternate .home-heading-line.type_secondary_bg,
.no-touch .color_alternate .g-btn.type_default:after,
.no-touch .color_alternate .g-btn.type_primary:after,
.no-touch .color_alternate input[type="submit"]:hover,
.color_alternate .g-btn.type_secondary,
.color_alternate .g-pagination-item:hover,
.color_alternate .w-icon.color_secondary.with_circle .w-icon-link,
.color_alternate .w-iconbox.with_circle .w-iconbox-icon,
.color_alternate .w-tags.layout_block .w-tags-item-link:hover {
	background-color: <?php echo ($smof_data['alt_secondary'] != '')?$smof_data['alt_secondary']:'#444'; ?>;
	}
	
/* Fade Elements Color */
.color_alternate .w-bloglist-entry:before,
.color_alternate .w-blogpost-meta i,
.color_alternate .w-blogpost-meta,
.color_alternate .w-comments-title i,
.color_alternate .w-comments-item-icon,
.color_alternate .w-comments-item-date,
.color_alternate .w-icon.color_fade .w-icon-link,
.color_alternate .w-links-anchor:before,
.color_alternate .w-socials-item-link,
.color_alternate .w-testimonial-person,
.color_alternate #wp-calendar thead th,
.color_alternate #wp-calendar tbody td,
.color_alternate .widget.widget_archive ul li:before,
.color_alternate .widget.widget_categories ul li:before,
.color_alternate .widget.widget_nav_menu .menu-item a:before,
.color_alternate .widget.widget_recent_entries ul li:before,
.color_alternate .widget.widget_rss ul li span,
.color_alternate .widget.widget_rss ul li cite,
.color_alternate .widget.widget_tag_cloud .tagcloud a {
	color: <?php echo ($smof_data['alt_fade'] != '')?$smof_data['alt_fade']:'#999'; ?>;
	}
.color_alternate input[type="text"]:focus,
.color_alternate input[type="password"]:focus,
.color_alternate input[type="email"]:focus,
.color_alternate input[type="url"]:focus,
.color_alternate input[type="tel"]:focus,
.color_alternate input[type="number"]:focus,
.color_alternate input[type="date"]:focus,
.color_alternate textarea:focus,
.color_alternate select:focus {
	box-shadow: 0 0 0 2px <?php echo ($smof_data['alt_fade'] != '')?$smof_data['alt_fade']:'#999'; ?>;
	}
	

	
/*************************** FOOTER ***************************/

/* Background Color */
.l-footer {
	background-color: <?php echo ($smof_data['footer_background'] != '')?$smof_data['footer_background']:'#333'; ?>;
	}

/* Border Color */
.l-subfooter.at_top,
.l-footer #wp-calendar thead th,
.l-footer #wp-calendar tbody td,
.l-footer #wp-calendar tfoot td,
.l-footer .widget.widget_nav_menu .menu-item a,
.l-footer .widget.widget_nav_menu .menu-item a:hover {
	border-color: <?php echo ($smof_data['footer_border'] != '')?$smof_data['footer_border']:'#444'; ?>;
	}
.l-footer input[type="text"],
.l-footer input[type="password"],
.l-footer input[type="email"],
.l-footer input[type="url"],
.l-footer input[type="tel"],
.l-footer input[type="number"],
.l-footer input[type="date"],
.l-footer textarea,
.l-footer select {
	background-color: <?php echo ($smof_data['footer_border'] != '')?$smof_data['footer_border']:'#444'; ?>;
	}

/* Text Color */
.l-footer,
.l-footer .w-socials-item-link,
.l-footer #wp-calendar thead th,
.l-footer #wp-calendar tbody td,
.l-footer #wp-calendar tbody td#today,
.l-footer .widget.widget_archive ul li:before,
.l-footer .widget.widget_categories ul li:before,
.l-footer .widget.widget_nav_menu .menu-item a:before,
.l-footer .widget.widget_recent_entries ul li:before,
.l-footer .widget.widget_rss ul li span,
.l-footer .widget.widget_rss ul li cite,
.l-footer .widget.widget_tag_cloud .tagcloud a {
	color: <?php echo ($smof_data['footer_text'] != '')?$smof_data['footer_text']:'#999'; ?>;
	}
.l-footer input[type="text"]:focus,
.l-footer input[type="password"]:focus,
.l-footer input[type="email"]:focus,
.l-footer input[type="url"]:focus,
.l-footer input[type="tel"]:focus,
.l-footer input[type="number"]:focus,
.l-footer input[type="date"]:focus,
.l-footer textarea:focus,
.l-footer select:focus {
	box-shadow: 0 0 0 2px <?php echo ($smof_data['footer_text'] != '')?$smof_data['footer_text']:'#999'; ?>;
	}

/* Link Color */
.l-footer a,
.l-footer input[type="text"],
.l-footer input[type="password"],
.l-footer input[type="email"],
.l-footer input[type="url"],
.l-footer input[type="tel"],
.l-footer input[type="number"],
.l-footer input[type="date"],
.l-footer textarea,
.l-footer select {
	color: <?php echo ($smof_data['footer_link'] != '')?$smof_data['footer_link']:'#31c5c7'; ?>;
	}

/* Link Hover Color */
.l-footer a:hover,
.l-footer a:active,
.l-footer .w-tags-item-link:hover,
.l-footer .widget.widget_nav_menu .menu-item a:hover:before,
.l-footer .widget.widget_tag_cloud .tagcloud a:hover {
	color: <?php echo ($smof_data['footer_link_hover'] != '')?$smof_data['footer_link_hover']:'#fff'; ?>;
	}

</style>
<?php if ($smof_data['custom_css'] != '') { ?>
<style>
<?php echo $smof_data['custom_css'] ?>
</style>
<?php } ?>