<?php
namespace TYPO3\Twitter\Bootstrap\ViewHelpers\Navigation;

/*                                                                           *
 * This script belongs to the TYPO3 Flow package "TYPO3.Twitter.Bootstrap".  *
 *                                                                           *
 *                                                                           */

use TYPO3\Flow\Annotations as Flow;

/**
 *
 * @Flow\Scope("prototype")
 */
class MenuViewHelper extends \TYPO3\Twitter\Bootstrap\ViewHelpers\AbstractComponentViewHelper {

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
