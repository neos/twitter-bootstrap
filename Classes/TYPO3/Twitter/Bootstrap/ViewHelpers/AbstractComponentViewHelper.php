<?php
namespace TYPO3\Twitter\Bootstrap\ViewHelpers;

/*                                                                           *
 * This script belongs to the TYPO3 Flow package "TYPO3.Twitter.Bootstrap".  *
 *                                                                           *
 *                                                                           */

use TYPO3\Flow\Annotations as Flow;

/**
 *
 * @Flow\Scope("prototype")
 */
class AbstractComponentViewHelper extends \TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper {

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
	 * @return \TYPO3\Fluid\View\StandaloneView
	 */
	protected function getView() {
		$view = new \TYPO3\Fluid\View\StandaloneView($this->controllerContext->getRequest());
		if (is_file($this->settings['viewHelpers']['templates'][get_class($this)])) {
			$view->setPartialRootPath($this->settings['viewHelpers']['partialRootPath']);
			$view->setTemplatePathAndFilename($this->settings['viewHelpers']['templates'][get_class($this)]);
		}
		return $view;
	}

}
