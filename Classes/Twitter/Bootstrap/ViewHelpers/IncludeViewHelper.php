<?php
namespace Twitter\Bootstrap\ViewHelpers;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Twitter.Bootstrap".     *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 *
 * @Flow\Scope("prototype")
 */
class IncludeViewHelper extends \TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * @var \TYPO3\Flow\Resource\Publishing\ResourcePublisher
	 * @Flow\Inject
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