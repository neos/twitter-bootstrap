<?php
namespace Neos\Twitter\Bootstrap\ViewHelpers;

/*                                                                           *
 * This script belongs to the TYPO3 Flow package "Neos\Twitter.Bootstrap".  *
 *                                                                           *
 *                                                                           */

use Neos\Flow\Annotations as Flow;

/**
 *
 * @Flow\Scope("prototype")
 */
class AbstractComponentViewHelper extends \Neos\FluidAdaptor\Core\ViewHelper\AbstractViewHelper {

	
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
	 * Get a StandaloneView used for rendering the component
	 *
	 * @return \Neos\FluidAdaptor\View\StandaloneView
	 */
	protected function getView() {
		$view = new \Neos\FluidAdaptor\View\StandaloneView($this->controllerContext->getRequest());
		if (is_file($this->settings['viewHelpers']['templates'][get_class($this)])) {
			$view->setPartialRootPath($this->settings['viewHelpers']['partialRootPath']);
			$view->setTemplatePathAndFilename($this->settings['viewHelpers']['templates'][get_class($this)]);
		}
		return $view;
	}

}
