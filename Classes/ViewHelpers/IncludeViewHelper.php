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
class IncludeViewHelper extends \Neos\FluidAdaptor\Core\ViewHelper\AbstractViewHelper {

	
	/**
	 * NOTE: This property has been introduced via code migration to ensure backwards-compatibility.
	 * @see AbstractViewHelper::isOutputEscapingEnabled()
	 * @var boolean
	 */
	protected $escapeOutput = FALSE;

	/**
	 * @var \Neos\Flow\ResourceManagement\ResourceManager
	 * @Flow\Inject
	 */
	protected $resourceManager;

	/**
	 * Get the header include code for including Twitter Bootstrap on a page. If needed
	 * the jQuery library can be included, too.
	 *
	 * Example usage:
	 * {namespace bootstrap=Neos\Twitter\Bootstrap\ViewHelpers}
	 * <bootstrap:include />
	 *
	 * @param string $version The version to use, for example "2.2", "3.0" or also "2" or "3" meaning "2.x" and "3.x" respectively
	 * @param boolean $minified If the minified version of Twitter Bootstrap should be used
	 * @param boolean $includeJQuery If enabled, also includes jQuery
	 * @param string $jQueryVersion The jQuery version to include
	 * @return string
	 */
	public function render($version, $minified = TRUE, $includeJQuery = FALSE, $jQueryVersion = '1.10.1') {
		$content = sprintf(
			'<link rel="stylesheet" href="%s" />' . PHP_EOL,
			$this->resourceManager->getPublicPackageResourceUri('Neos\Twitter.Bootstrap', $version . '/css/bootstrap' . ($minified === TRUE ? '.min' : '') . '.css')
		);

		if ($includeJQuery === TRUE) {
			$content .= sprintf(
				'<script src="%s"></script>' . PHP_EOL,
				$this->resourceManager->getPublicPackageResourceUri('Neos\Twitter.Bootstrap', 'Libraries/jQuery/jquery-' . $jQueryVersion . ($minified === TRUE ? '.min' : '') . '.js')
			);
		}

		$content .= sprintf(
			'<script src="%s"></script>' . PHP_EOL,
				$this->resourceManager->getPublicPackageResourceUri('Neos\Twitter.Bootstrap', $version . '/js/bootstrap' . ($minified === TRUE ? '.min' : '') . '.js')
		);

		return $content;
	}
}
