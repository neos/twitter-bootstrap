============================================
TYPO3.Twitter.Bootstrap - packaged as Flow Package
============================================

Description
===========

This Flow Package brings Twitter's awesome Bootstrap framework into your project. The package contains Bootstrap and
jQuery together with a few nifty view helpers that will make your life easier.


Including Bootstrap in your Layout
==================================

Usually you'll add the bootstrap css and js files to your layout, so that they are included on each and every
view/template of your application.

Add the namespace declaration to the top of your layout::

	{namespace bootstrap=TYPO3\Twitter\Bootstrap\ViewHelpers}

Then add the following line to your <head> section at an approriate place::

	<bootstrap:include />

Options
-------
You can further tweak, what exactly and how Bootstrap is included by adding parameters from the following list:

version:
	defaults to "2" which means the most current version of 2.x.x from Bootstrap is included, should be pinned to a
	specific branch by using e.g. "2.1" which will include the latest version of 2.1.x (use the default with care -
	since the default will automatically be updated to the most current major version)
minified:
	defaults to "TRUE", can be set to "FALSE" to get the original files included during development
includeJQuery:
	defaults to "FALSE", can be set to "TRUE" to get jQuery included (useful if not already included)


Alternative way to include Bootstrap
------------------------------------

Instead of using the view helpers, you can also include the needed CSS or JavaScript files with the following lines
in your Fluid Template::

	<link href="{f:uri.resource(path: '2/css/bootstrap.min.css', package: 'TYPO3.Twitter.Bootstrap')}" media="screen" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="{f:uri.resource(path: '2/js/bootstrap.min.js', package: 'TYPO3.Twitter.Bootstrap')}"></script>

Navigation ViewHelper
=====================

The navigation view helper takes an array of menu items and renders a proper HTML structure out of that which is styled
by the Bootstrap CSS and enhanced with JavaScript. Often this view helper is added to the *.navbar* container to get an
application-wide navigation.

Define the menu items
---------------------

First you have to define your menu items in your controller and hand that array over to your view::

	$this->view->assign('navigationItems', array(
		array(
			'id' => 'navProjects',
			'label' => 'Projects',
			'items' => array(
				array(
					'label' => 'Show projects',
					'href' => $this->uriBuilder->uriFor('index', array(), 'Project')
				),
				array(
					'divider' => TRUE
				),
				array(
					'label' => 'New Project',
					'href' => $this->uriBuilder->uriFor('new', array(), 'Project')
				)
			)
		),
		array(
			'id' => 'navTasks',
			'label' => 'Tasks',
			'href' => $this->uriBuilder->uriFor('index', array(), 'Task')
		)
	));


Add icons to your menu items
----------------------------

If your menu items should show a nice icon next to them, you can use the Bootstrap Glyphicons for this. Just define an iconClass for a menu item and it will be shown right in front of the menu item::

	$navigationArray = array(
		'id' => 'navProjects',
		'label' => 'Projects',
		'iconClass' => 'icon-folder-open',
		'invertIcon' => TRUE
	);

You can find a list of all available icons and their class name at http://twitter.github.com/bootstrap/base-css.html#icons

Setting invertIcon to TRUE will show them in white instead of black.


Adding the navigation items to all views
----------------------------------------

In case you want to have the same array globally for all actions, you can put the above array declaration like this::

	/**
	 * @param \TYPO3\Flow\Mvc\View\ViewInterface $view
	 * @return void
	 */
	public function initializeView(\TYPO3\Flow\Mvc\View\ViewInterface $view) {
			// Declare navigation items, will be available in all views from all actions if not overridden
		$navigationItems = array(PUT_YOUR_ITEMS_HERE);
		$view->assign($navigationItems);
	}

Add the view helper to your layout
----------------------------------

Place the following line to the appropriate place in your template or layout:

	<bootstrap:navigation.menu items="{navigationItems}" />

Options
-------

classNames:
	By default, the generated <ul> will have the class "nav". By giving an array to this option that contains one or
	more class names, these classes will be used instead. ::

		<bootstrap:navigation.menu items="{navigationItems}" classNames="{0: 'nav', 1: 'your-custom-class'}" />