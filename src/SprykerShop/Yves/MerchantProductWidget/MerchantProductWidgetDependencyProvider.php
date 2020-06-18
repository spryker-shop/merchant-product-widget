<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\MerchantProductWidget;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;
use SprykerShop\Yves\MerchantProductWidget\Dependency\Client\MerchantProductWidgetToMerchantProductStorageClientBridge;
use SprykerShop\Yves\MerchantProductWidget\Dependency\Client\MerchantProductWidgetToMerchantStorageClientBridge;

class MerchantProductWidgetDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_MERCHANT_PRODUCT_STORAGE = 'CLIENT_MERCHANT_PRODUCT_STORAGE';
    public const CLIENT_MERCHANT_STORAGE = 'CLIENT_MERCHANT_STORAGE';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        parent::provideDependencies($container);

        $container = $this->addMerchantProductStorageClient($container);
        $container = $this->addMerchantStorageClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addMerchantProductStorageClient(Container $container): Container
    {
        $container->set(static::CLIENT_MERCHANT_PRODUCT_STORAGE, function (Container $container) {
            return new MerchantProductWidgetToMerchantProductStorageClientBridge($container->getLocator()->merchantProductStorage()->client());
        });

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addMerchantStorageClient(Container $container): Container
    {
        $container->set(static::CLIENT_MERCHANT_STORAGE, function (Container $container) {
            return new MerchantProductWidgetToMerchantStorageClientBridge($container->getLocator()->merchantStorage()->client());
        });

        return $container;
    }
}
