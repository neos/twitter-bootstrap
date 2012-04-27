<?php
namespace Twitter\Bootstrap\ViewHelpers;

/*                                                                        *
 * This script belongs to the FLOW3 package "Twitter.Bootstrap".          *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 *
 * @FLOW3\Scope("prototype")
 */
class IncludeViewHelper extends \TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * @var \TYPO3\FLOW3\Resource\Publishing\ResourcePublisher
	 * @FLOW3\Inject
	 */
	protected $resourcePublisher;

	/**
	 * Get the header include code for including Twitter Bootstrap on a page
	 *
	 * Example usage:
	 * {namespace bootstrap=Twitter\Bootstrap\ViewHelpers}
	 * <bootstrap:include />
	 *
	 * @param string $version
	 * @param boolean $minified
	 * @return string
	 */
	public function render($version = '2', $minified = TRUE) {
		return sprintf(
			'<link rel="stylesheet" type="text/css" href="%s" /><script type="text/javascript" src="%s"></script>',
			$this->resourcePublisher->getStaticResourcesWebBaseUri() . 'Packages/Twitter.Bootstrap/' . $version . '/css/bootstrap' . ($minified === TRUE ? '.min' : '') . '.css',
			$this->resourcePublisher->getStaticResourcesWebBaseUri() . 'Packages/Twitter.Bootstrap/' . $version . '/js/bootstrap' . ($minified === TRUE ? '.min' : '') . '.js'
		);
	}

}
?>