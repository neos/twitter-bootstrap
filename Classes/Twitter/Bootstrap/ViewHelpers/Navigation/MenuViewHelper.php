<?php
namespace Twitter\Bootstrap\ViewHelpers\Navigation;

/*                                                                        *
 * This script belongs to the FLOW3 package "Twitter.Bootstrap".          *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 *
 * @FLOW3\Scope("prototype")
 */
class MenuViewHelper extends \Twitter\Bootstrap\ViewHelpers\AbstractComponentViewHelper {

	/**
	 * @var array
	 */
	protected $settings;

	/**
	 * @param array $settings
	 * @return void
	 */
	public function injectSettings(array $settings) {
		$this->settings = $settings;
	}

	/**
	 * Render the menu
	 *
	 * @param array $items
	 * @param array $classNames
	 * @return string
	 */
	public function render(array $items, array $classNames = array('nav')) {
		$view = $this->getView();

		$view->assignMultiple(array(
			'items' => $items,
			'settings' => $this->settings,
			'menuClasses' => implode(' ', $classNames)
		));

		return $view->render();
	}

}
?>