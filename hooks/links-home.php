<?php
	/*
	 * You can add custom links in the home page by appending them here ...
	 * The format for each link is:
		$homeLinks[] = array(
			'url' => 'path/to/link', 
			'title' => 'Link title', 
			'description' => 'Link text',
			'groups' => array('group1', 'group2'), // groups allowed to see this link, use '*' if you want to show the link to all groups
			'grid_column_classes' => '', // optional CSS classes to apply to link block. See: http://getbootstrap.com/css/#grid
			'panel_classes' => '', // optional CSS classes to apply to panel. See: http://getbootstrap.com/components/#panels
			'link_classes' => '', // optional CSS classes to apply to link. See: http://getbootstrap.com/css/#buttons
			'icon' => 'path/to/icon' // optional icon to use with the link
		);
	 */
		$homeLinks[] = array(
			'url' => 'http://www.lairreviews.com/wp-admin/', 
			'target' => '_blank',
			'title' => 'Lair Reviews',			
			'description' => 'Lair Reviews Admin Panel',
			'groups' => array('Admins', 'sysop'), 
			'icon' => 'images/lairrev.png'
		);
		$homeLinks[] = array(
			'url' => 'https://admin.mycommerce.com/app/cp/login/affiliate',
			'target' => '_blank',
			'title' => 'RegNow',			
			'description' => 'MyCommerce/RegNow Login to control panel',
			'groups' => array('Admins', 'sysop'), 
			'icon' => 'http://www.sharewarelair.com/webicons/regnow.gif'
		);

		$homeLinks[] = array(
			'url' => 'https://cp.shareit.com/shareit/cp/login/', 
			'target' => '_blank',
			'title' => 'Share-It',			
			'description' => 'Share-It Affiliate login',
			'groups' => array('Admins', 'sysop'), 
			'icon' => 'http://www.sharewarelair.com/webicons/shareit.gif' 
		);
		$homeLinks[] = array(
			'url' => 'https://secure.avangate.com/affiliates/', 
			'target' => '_blank',
			'title' => 'Avangate',			
			'description' => 'Affiliate Login and Panel',
			'groups' => array('Admins', 'sysop'), 
			'icon' => 'http://www.sharewarelair.com/webicons/avangate.png'
		);
		$homeLinks[] = array(
			'url' => 'http://www.freewarelair.com/sysop/', 
			'target' => '_blank',
			'title' => 'FWL Admin',			
			'description' => 'Freeware Lair Admin Panel',
			'groups' => array('Admins', 'sysop'), 
			'icon' => 'images/lairrev.png'
		);
		$homeLinks[] = array(
			'url' => 'http://swldba.sharewarelair.com/', 
			'target' => '_blank',
			'title' => 'Database Admin',			
			'description' => 'Shareware Lair database Admin tools',
			'groups' => array('Admins', 'sysop'), 
			'icon' => 'images/swl.png'
		);		
	
