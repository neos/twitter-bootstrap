<?php
namespace Neos\Twitter\Bootstrap\ViewHelpers\Navigation;

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
use Neos\Twitter\Bootstrap\ViewHelpers\AbstractComponentViewHelper;

/**
 *
 * @Flow\Scope("prototype")
 */
class MenuViewHelper extends AbstractComponentViewHelper
{
    /**
     * @var array
     */
    protected $settings;

    /**
     * @param array $settings
     * @return void
     */
    public function injectSettings(array $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Render the menu
     *
     * @param array $items
     * @param array $classNames
     * @return string
     */
    public function render(array $items, array $classNames = array('nav'))
    {
        $view = $this->getView();

        $view->assignMultiple(array(
            'items' => $items,
            'settings' => $this->settings,
            'menuClasses' => implode(' ', $classNames)
        ));

        return $view->render();
    }
}
