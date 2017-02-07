<?php
namespace Neos\Twitter\Bootstrap\ViewHelpers;

/*
 * This file is part of the Neos.Twitter.Bootstrap package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\Flow\Annotations as Flow;
use Neos\FluidAdaptor\Core\ViewHelper\AbstractViewHelper;

/**
 * Bootstrap Include View Helper
 */
class IncludeViewHelper extends AbstractViewHelper
{
    /**
     * @var \Neos\Flow\ResourceManagement\ResourceManager
     * @Flow\Inject
     */
    protected $resourceManager;

    /**
     * @var bool
     */
    protected $escapeOutput = false;

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
    public function render($version, $minified = TRUE, $includeJQuery = FALSE, $jQueryVersion = '1.10.1')
    {
        $content = sprintf(
            '<link rel="stylesheet" href="%s" />' . PHP_EOL,
            $this->resourceManager->getPublicPackageResourceUri('Neos.Twitter.Bootstrap', $version . '/css/bootstrap' . ($minified === TRUE ? '.min' : '') . '.css')
        );

        if ($includeJQuery === TRUE) {
            $content .= sprintf(
                '<script src="%s"></script>' . PHP_EOL,
                $this->resourceManager->getPublicPackageResourceUri('Neos.Twitter.Bootstrap', 'Libraries/jQuery/jquery-' . $jQueryVersion . ($minified === TRUE ? '.min' : '') . '.js')
            );
        }

        $content .= sprintf(
            '<script src="%s"></script>' . PHP_EOL,
            $this->resourceManager->getPublicPackageResourceUri('Neos.Twitter.Bootstrap', $version . '/js/bootstrap' . ($minified === TRUE ? '.min' : '') . '.js')
        );

        return $content;
    }
}
