<?php
namespace Neos\Twitter\Bootstrap\ViewHelpers\Navigation;

/*                                                                           *
 * This script belongs to the TYPO3 Flow package "Neos\Twitter.Bootstrap".  *
 *                                                                           *
 *                                                                           */

use Neos\Flow\Annotations as Flow;

/**
 *
 * @Flow\Scope("prototype")
 */
class MenuViewHelper extends \Neos\Twitter\Bootstrap\ViewHelpers\AbstractComponentViewHelper {

	
	/**
	 * NOTE: This property has been introduced via code migration to ensure backwards-compatibility.
	 * @see AbstractViewHelper::isOutputEscapingEnabled()
	 * @var boolean
	 */
	protected $escapeOutput = FALSE;

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
