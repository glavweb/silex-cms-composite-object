<?php

/*
 * This file is part of the GLAVWEB.cms SilexCmsCompositeObject package.
 *
 * (c) Andrey Nilov <nilov@glavweb.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Glavweb\SilexCmsCompositeObject\Provider;

use Glavweb\CmsCompositeObject\Helper\MarkupFixtureHelper;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Glavweb\CmsCompositeObject\Service\CompositeObjectService;

/**
 * CompositeObjectServiceProvider
 *
 * @package Glavweb\SilexCmsCompositeObject
 * @author Andrey Nilov <nilov@glavweb.ru>
 */
class CompositeObjectServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $app)
    {
        $app['composite_object_service'] = function () use ($app) {
            $markupFixtureHelper = new MarkupFixtureHelper($app['base_path']);

            return new CompositeObjectService(
                $app['cms_rest_client'],
                $markupFixtureHelper,
                $app['markup_mode'],
                $app['fixture_objects']
            );
        };
    }
}
