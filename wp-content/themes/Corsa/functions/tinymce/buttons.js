/**
 * Rows with columns
 */
(function() {
	tinymce.create('tinymce.plugins.columns', {
		init : function(ed, url) {
			// TODO fix this
			window.columnsImageUrl = url;
		},
		createControl : function(n, cm) {
			switch (n) {
				case 'columns':
					var c = cm.createMenuButton('columns', {
						title : 'Add a row with columns',
						image : window.columnsImageUrl+'/columns.png',
						icons : false
					});

					c.onRenderMenu.add(function(c, m) {

						var sub2 = m.addMenu({title : '2 columns', alt: '...'});

						sub2.add({title : '[____1/2____][____1/2____]', onclick : function() {
							tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[row]<br />[one_half] ... [/one_half]<br />[one_half] ... [/one_half]<br />[/row]');
						}});

						sub2.add({title : '[__1/3__][______2/3______]', onclick : function() {
							tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[row]<br />[one_third] ... [/one_third]<br />[two_third] ... [/two_third]<br />[/row]');
						}});

						sub2.add({title : '[______2/3______][__1/3__]', onclick : function() {
							tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[row]<br />[two_third] ... [/two_third]<br />[one_third] ... [/one_third]<br />[/row]');
						}});

						sub2.add({title : '[_1/4_][_______3/4_______]', onclick : function() {
							tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[row]<br />[one_quarter] ... [/one_quarter]<br />[three_quarter] ... [/three_quarter]<br />[/row]');
						}});

						sub2.add({title : '[_______3/4_______][_1/4_]', onclick : function() {
							tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[row]<br />[three_quarter] ... [/three_quarter]<br />[one_quarter] ... [/one_quarter]<br />[/row]');
						}});


						var sub3 = m.addMenu({title : '3 columns'});

						sub3.add({title : '[__1/3__][__1/3__][__1/3__]', /*icon: 'columns-one_third-one_third-one_third', */onclick : function() {
							tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[row]<br />[one_third] ... [/one_third]<br />[one_third] ... [/one_third]<br />[one_third] ... [/one_third]<br />[/row]');
						}});

						sub3.add({title : '[____1/2____][_1/4_][_1/4_]', onclick : function() {
							tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[row]<br />[one_half] ... [/one_half]<br />[one_quarter] ... [/one_quarter]<br />[one_quarter] ... [/one_quarter]<br />[/row]');
						}});

						sub3.add({title : '[_1/4_][_1/4_][____1/2____]', onclick : function() {
							tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[row]<br />[one_quarter] ... [/one_quarter]<br />[one_quarter] ... [/one_quarter]<br />[one_half] ... [/one_half]<br />[/row]');
						}});

						sub3.add({title : '[_1/4_][____1/2____][_1/4_]', onclick : function() {
							tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[row]<br />[one_quarter] ... [/one_quarter]<br />[one_half] ... [/one_half]<br />[one_quarter] ... [/one_quarter]<br />[/row]');
						}});

						m.add({title : '4 columns', onclick : function() {
							tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[row]<br />[one_quarter] ... [/one_quarter]<br />[one_quarter] ... [/one_quarter]<br />[one_quarter] ... [/one_quarter]<br />[one_quarter] ... [/one_quarter]<br />[/row]');
						}});
					});

					// Return the new menu button instance
					return c;
			}

			return null;

		}
	});


	tinymce.PluginManager.add('columns', tinymce.plugins.columns);
})();

(function() {
	tinymce.create('tinymce.plugins.typography', {
		init : function(ed, url) {
			// TODO fix this
			window.typographyImageUrl = url;
		},
		createControl : function(n, cm) {
			switch (n) {
				case 'typography':
					var c = cm.createMenuButton('typography', {
						title : 'Typography ',
						image : window.typographyImageUrl+'/type.png',
						icons : false
					});

					c.onRenderMenu.add(function(c, m) {
						m.add({title : 'Subtitle', onclick : function() {
							tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[subtitle] ... [/subtitle]');
						}});
						m.add({title : 'Big Paragraph', onclick : function() {
							tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[paragraph_big] ... [/paragraph_big]');
						}});
						m.add({title : 'Highlight', onclick : function() {
							tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[highlight] ... [/highlight]');
						}});
						m.add({title : 'Home Heading', onclick : function() {
							tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
								title: 'Home Heading',
								identifier: 'home_heading'
							});
						}});
					});

					// Return the new menu button instance
					return c;
			}

			return null;

		}
	});


	tinymce.PluginManager.add('typography', tinymce.plugins.typography);
})();


/**
 * Team
 */
(function() {
	tinymce.create('tinymce.plugins.team', {
		init : function(ed, url) {
			ed.addButton('team', {
				title : 'Add Team Members',
				image : url+'/team.png',
				onclick : function() {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Team',
						identifier: 'team'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('team', tinymce.plugins.team);
})();
/**
 * Button
 */
(function() {
	tinymce.create('tinymce.plugins.button', {
		init : function(ed, url) {
			ed.addButton('button', {
				title : 'Add Button',
				image : url+'/button.png',
				onclick : function() {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Button',
						identifier: 'button'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('button', tinymce.plugins.button);
})();
/**
 * Separator
 */
(function() {
	tinymce.create('tinymce.plugins.separator_btn', {
		init : function(ed, url) {
			ed.addButton('separator_btn', {
				title : 'Add Separator',
				image : url+'/separator.png',
				onclick : function() {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Separator',
						identifier: 'separator'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('separator_btn', tinymce.plugins.separator_btn);
})();

/**
 * Icon
 */
(function() {
	tinymce.create('tinymce.plugins.icon', {
		init : function(ed, url) {
			ed.addButton('icon', {
				title : 'Add Icon',
				image : url+'/icon.png',
				onclick : function() {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Icon',
						identifier: 'icon'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('icon', tinymce.plugins.icon);
})();

/**
 * Iconbox
 */
(function() {
	tinymce.create('tinymce.plugins.iconbox', {
		init : function(ed, url) {
			ed.addButton('iconbox', {
				title : 'Add Iconbox',
				image : url+'/iconbox.png',
				onclick : function() {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'IconBox',
						identifier: 'iconbox'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('iconbox', tinymce.plugins.iconbox);
})();
/**
 * Testimonial
 */
(function() {
	tinymce.create('tinymce.plugins.testimonial', {
		init : function(ed, url) {
			ed.addButton('testimonial', {
				title : 'Add Testimonial',
				image : url+'/testimonials.png',
				onclick : function() {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Testimonial',
						identifier: 'testimonial'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('testimonial', tinymce.plugins.testimonial);
})();

/**
 * Portfolio
 */
(function() {
	tinymce.create('tinymce.plugins.portfolio', {
		init : function(ed, url) {
			ed.addButton('portfolio', {
				title : 'Add Portfolio',
				image : url+'/projects.png',
				onclick : function() {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Portfolio',
						identifier: 'portfolio'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('portfolio', tinymce.plugins.portfolio);
})();

/**
 * Blog
 */
(function() {
	tinymce.create('tinymce.plugins.blog', {
		init : function(ed, url) {
			ed.addButton('blog', {
				title : 'Add Blog',
				image : url+'/blog.png',
				onclick : function() {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Blog',
						identifier: 'blog'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('blog', tinymce.plugins.blog);
})();

/**
 * Gallery
 */
(function() {
	tinymce.create('tinymce.plugins.gallery', {
		init : function(ed, url) {
			ed.addButton('gallery', {
				title : 'Add Gallery',
				image : url+'/gallery.png',
				onclick : function() {
					ed.selection.setContent('[gallery type="xs, s, m, l or masonry" include=""]');

				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('gallery', tinymce.plugins.gallery);
})();

/**
 * Simple Slider
 */
(function() {
	tinymce.create('tinymce.plugins.simple_slider', {
		init : function(ed, url) {
			ed.addButton('simple_slider', {
				title : 'Add Simple Slider',
				image : url+'/slider2.png',
				onclick : function () {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Simple Slider',
						identifier: 'simple_slider'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('simple_slider', tinymce.plugins.simple_slider);
})();

/**
 * FullScreen Slider
 */
(function() {
	tinymce.create('tinymce.plugins.fullscreen_slider', {
		init : function(ed, url) {
			ed.addButton('fullscreen_slider', {
				title : 'Add FullScreen Slider',
				image : url+'/slider.png',
				onclick : function () {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'FullScreen Slider',
						identifier: 'fullscreen_slider'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('fullscreen_slider', tinymce.plugins.fullscreen_slider);
})();

/**
 * Subsection
 */
(function() {
	tinymce.create('tinymce.plugins.subsection', {
		init : function(ed, url) {
			ed.addButton('subsection', {
				title : 'Add Subsection',
				image : url+'/sections.png',
				onclick : function() {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Subsection',
						identifier: 'subsection'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('subsection', tinymce.plugins.subsection);
})();

/**
 * Horizontal Blocks
 */
(function() {
	tinymce.create('tinymce.plugins.horizontal_blocks', {
		init : function(ed, url) {
			ed.addButton('horizontal_blocks', {
				title : 'Add Horizontal Blocks',
				image : url+'/block.png',
				onclick : function () {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Horizontal Blocks',
						identifier: 'horizontal_blocks'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('horizontal_blocks', tinymce.plugins.horizontal_blocks);
})();



/**
 * Contacts
 */
(function() {
	tinymce.create('tinymce.plugins.contacts', {
		init : function(ed, url) {
			ed.addButton('contacts', {
				title : 'Add Contacts',
				image : url+'/contact.png',
				onclick : function () {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Contacts',
						identifier: 'contacts'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('contacts', tinymce.plugins.contacts);
})();

/**
 * Contact Form
 */
(function() {
	tinymce.create('tinymce.plugins.contacts_form', {
		init : function(ed, url) {
			ed.addButton('contacts_form', {
				title : 'Add Contact Form',
				image : url+'/form.png',
				onclick : function() {
					ed.selection.setContent('[contacts_form]');

				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('contacts_form', tinymce.plugins.contacts_form);
})();

/**
 * Bottom Buttons
 */
(function() {
	tinymce.create('tinymce.plugins.bottom_buttons', {
		init : function(ed, url) {
			ed.addButton('bottom_buttons', {
				title : 'Add Bottom Buttons\' Container',
				image : url+'/bottom.png',
				onclick : function() {
					ed.selection.setContent('[bottom_buttons] ... [/bottom_buttons]');

				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('bottom_buttons', tinymce.plugins.bottom_buttons);
})();

/**
 * Shop
 */
(function() {
	tinymce.create('tinymce.plugins.shop', {
		init : function(ed, url) {
			ed.addButton('shop', {
				title : 'Add Shop',
				image : url+'/store.png',
				onclick : function() {
					ed.selection.setContent('[shop]');

				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('shop', tinymce.plugins.shop);
})();

/**
* Pricing Table
*/
(function() {
	tinymce.create('tinymce.plugins.pricing_table', {
		init : function(ed, url) {
			ed.addButton('pricing_table', {
				title : 'Add Pricing Table',
				image : url+'/pricing.png',
				onclick : function() {
					ed.selection.setContent('[pricing_table]<br>[pricing_column title="Standard" type="" price="$10" time="per month"]<br>[pricing_row]Feature 1[/pricing_row]<br>[pricing_row]Feature 2[/pricing_row]<br>[pricing_footer url="" type="default" size="small, big or leave blank for normal"]Signup[/pricing_footer]<br>[/pricing_column]<br><br>[pricing_column title="Business" type="featured" price="$20" time="per month"]<br>[pricing_row]Feature 1[/pricing_row]<br>[pricing_row]Feature 2[/pricing_row]<br>[pricing_footer url="" type="primary" size="small, big or leave blank for normal"]Signup[/pricing_footer]<br>[/pricing_column]<br>[/pricing_table]');

				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('pricing_table', tinymce.plugins.pricing_table);
})();

/**
 * Tabs
 */
(function() {
	tinymce.create('tinymce.plugins.tabs', {
		init : function(ed, url) {
			ed.addButton('tabs', {
				title : 'Add Tabs',
				image : url+'/tabs.png',
				onclick :  function () {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Tabs',
						identifier: 'tabs'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('tabs', tinymce.plugins.tabs);
})();
/**
 * Accordion
 */
(function() {
	tinymce.create('tinymce.plugins.accordion', {
		init : function(ed, url) {
			ed.addButton('accordion', {
				title : 'Add Accordion',
				image : url+'/accordion.png',
				onclick : function () {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Accordion',
						identifier: 'accordion'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('accordion', tinymce.plugins.accordion);
})();
/**
 * Toggle
 */
(function() {
	tinymce.create('tinymce.plugins.toggle', {
		init : function(ed, url) {
			ed.addButton('toggle', {
				title : 'Add a Toggles',
				image : url+'/toggle.png',
				onclick : function() {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Toggle',
						identifier: 'toggle'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('toggle', tinymce.plugins.toggle);
})();

/**
 * Youtube
 */
(function() {
	tinymce.create('tinymce.plugins.video', {
		init : function(ed, url) {
			ed.addButton('video', {
				title : 'Add a Video',
				image : url+'/video.png',
				onclick : function() {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Video',
						identifier: 'video'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('video', tinymce.plugins.video);
})();

/**
 * Google Maps
 */
(function() {
	tinymce.create('tinymce.plugins.gmaps', {
		init : function(ed, url) {
			ed.addButton('gmaps', {
				title : 'Add Google Maps',
				image : url+'/map.png',
				onclick : function () {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Google Maps',
						identifier: 'gmaps'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('gmaps', tinymce.plugins.gmaps);
})();

/**
 * Social Links
 */
(function() {
	tinymce.create('tinymce.plugins.social_links', {
		init : function(ed, url) {
			ed.addButton('social_links', {
				title : 'Social Links',
				image : url+'/social.png',
				onclick : function() {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Social Links',
						identifier: 'social_links'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('social_links', tinymce.plugins.social_links);
})();

/**
 * Actionbox
 */
(function() {
	tinymce.create('tinymce.plugins.actionbox', {
		init : function(ed, url) {
			ed.addButton('actionbox', {
				title : 'Add ActionBox',
				image : url+'/actionbox.png',
				onclick : function() {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'ActionBox',
						identifier: 'actionbox'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('actionbox', tinymce.plugins.actionbox);
})();


/**
 * Counter
 */
(function() {
	tinymce.create('tinymce.plugins.counter', {
		init : function(ed, url) {
			ed.addButton('counter', {
				title : 'Add a Counter',
				image : url+'/counter.png',
				onclick : function() {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Counter',
						identifier: 'counter'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('counter', tinymce.plugins.counter);
})();

/**
 * Message Box
 */
(function() {
	tinymce.create('tinymce.plugins.message_box', {
		init : function(ed, url) {
			ed.addButton('message_box', {
				title : 'Add Message Box',
				image : url+'/alert.png',
				onclick : function () {
					tinyMCE.activeEditor.execCommand("us_zillaPopup", false, {
						title: 'Message Box',
						identifier: 'message_box'
					});
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('message_box', tinymce.plugins.message_box);
})();

/**
 * Clients
 */
(function() {
	tinymce.create('tinymce.plugins.clients', {
		init : function(ed, url) {
			ed.addButton('clients', {
				title : 'Add Client Logos',
				image : url+'/clients.png',
				onclick : function() {
					ed.selection.setContent('[clients]');

				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('clients', tinymce.plugins.clients);
})();