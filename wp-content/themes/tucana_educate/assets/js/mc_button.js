(function() {
	tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
		editor.addButton( 'my_mce_button', {
			text: 'JBTSOFT Button',
			icon: 'jbrsoft-button',
			type: 'menubutton',
			menu: [
				{
					text: 'Single Product',
					menu: [
						{
							text: 'Single product shortcode',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Random Shortcode',
									body: [
										{
											type: 'textbox',
											name: 'textboxName',
											label: 'Title',
											value: ''
										},
										{
											type: 'textbox',
											name: 'multilineName',
											label: 'Text',
											value: 'Your Product Content',
											multiline: true,
											minWidth: 300,
											minHeight: 100
										},
										{
											type: 'textbox',
											name: 'multilineimage',
											label: 'Thumbnail',
											value: 'http://image/example.jpg',
											
										},
									],
									onsubmit: function( e ) {
										editor.insertContent( '[product_single title="' + e.data.textboxName + '" text="' + e.data.multilineName + '" src="' + e.data.multilineimage + '"][/product_single]');
									}
								});
							}
						}
					]
				},
				{
					text: 'Skill',
					menu: [
						{
							text: 'Skill shortcode',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Random Shortcode',
									body: [
										{
											type: 'textbox',
											name: 'textskillName',
											label: 'Title',
											value: ''
										},
									
									],
									onsubmit: function( e ) {
										editor.insertContent( '[skill title="' + e.data.textskillName + '"][/skill]');
									}
								});
							}
						}
					]
				},
				{
					text: 'Price',
					menu: [
						{
							text: 'Price shortcode',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Random Shortcode',
									body: [
										{
											type: 'textbox',
											name: 'textboxcategory',
											label: 'Category',
											value: ''
										},
										
									
									],
									onsubmit: function( e ) {
										editor.insertContent( '[price category="' + e.data.textboxcategory + '"][/price]');
									}
								});
							}
						}
					]
				},
				{
					text: 'Team author',
					menu: [
						{
							text: 'Team author shortcode',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Random Shortcode',
									body: [
										{
											type: 'textbox',
											name: 'textteamcategory',
											label: 'Category',
											value: ''
										},
										{
											type: 'textbox',
											name: 'texttitlecategory',
											label: 'Title',
											value: ''
										},
									],
									onsubmit: function( e ) {
										editor.insertContent( '[team_authority category="' + e.data.textteamcategory + '" titles="' + e.data.texttitlecategory + '"][/team_authority]');
									}
								});
							}
						}
					]
				},
				{
					text: 'Team member',
					menu: [
						{
							text: 'Team member shortcode',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Random Shortcode',
									body: [
										{
											type: 'textbox',
											name: 'textteamcategory',
											label: 'Category',
											value: ''
										},
										{
											type: 'textbox',
											name: 'texttitlecategory',
											label: 'Title',
											value: ''
										},
									],
									onsubmit: function( e ) {
										editor.insertContent( '[team_member category="' + e.data.textteamcategory + '" title="' + e.data.texttitlecategory + '"][/team_member]');
									}
								});
							}
						}
					]
				},
				{
					text: 'Client member',
					menu: [
						{
							text: 'Client member shortcode',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Random Shortcode',
									body: [
										{
											type: 'textbox',
											name: 'textteamtitle',
											label: 'Title',
											value: ''
										},
										
									],
									onsubmit: function( e ) {
										editor.insertContent( '[client title="' + e.data.textteamtitle + '"  ][/client]');
									}
								});
							}
						}
					]
				},
				{
					text: 'Testimonail',
					menu: [
						{
							text: 'Testimonail shortcode',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Random Shortcode',
									body: [
										{
											type: 'textbox',
											name: 'textteamcategory',
											label: 'Category',
											value: ''
										},
										
									],
									onsubmit: function( e ) {
										editor.insertContent( '[testimonail category="' + e.data.textteamcategory + '"][/testimonail]');
									}
								});
							}
						}
					]
				},
				{
					text: 'About',
					menu: [
						{
							text: 'About shortcode',
							onclick: function() {
								editor.windowManager.open( {
									title: 'Insert Random Shortcode',
									body: [
										{
											type: 'textbox',
											name: 'textteamcategory',
											label: 'Category',
											value: ''
										},
										
									],
									onsubmit: function( e ) {
										editor.insertContent( '[about category="' + e.data.textteamcategory + '"][/about]');
									}
								});
							}
						}
					]
				}
			]
		});
	});
})();