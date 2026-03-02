<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\MerchantProductWidget;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;
use SprykerShop\Yves\MerchantProductWidget\Dependency\Client\MerchantProductWidgetToMerchantStorageClientBridge;
use SprykerShop\Yves\MerchantProductWidget\Dependency\Client\MerchantProductWidgetToPriceProductClientBridge;
use SprykerShop\Yves\MerchantProductWidget\Dependency\Client\MerchantProductWidgetToPriceProductStorageClientBridge;
use SprykerShop\Yves\MerchantProductWidget\Dependency\Client\MerchantProductWidgetToProductStorageClientBridge;

class MerchantProductWidgetDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const CLIENT_MERCHANT_STORAGE = 'CLIENT_MERCHANT_STORAGE';

    /**
     * @var string
     */
    public const CLIENT_PRODUCT_STORAGE = 'CLIENT_PRODUCT_STORAGE';

    /**
     * @var string
     */
    public const CLIENT_PRICE_PRODUCT_STORAGE = 'CLIENT_PRICE_PRODUCT_STORAGE';

    /**
     * @var string
     */
    public const CLIENT_PRICE_PRODUCT = 'CLIENT_PRICE_PRODUCT';

    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);

        $container = $this->addMerchantStorageClient($container);
        $container = $this->addProductStorageClient($container);
        $container = $this->addPriceProductClient($container);
        $container = $this->addPriceProductStorageClient($container);

        return $container;
    }

    protected function addMerchantStorageClient(Container $container): Container
    {
        $container->set(static::CLIENT_MERCHANT_STORAGE, function (Container $container) {
            return new MerchantProductWidgetToMerchantStorageClientBridge(
                $container->getLocator()->merchantStorage()->client(),
            );
        });

        return $container;
    }

    protected function addProductStorageClient(Container $container): Container
    {
        $container->set(static::CLIENT_PRODUCT_STORAGE, function (Container $container) {
            return new MerchantProductWidgetToProductStorageClientBridge($container->getLocator()->productStorage()->client());
        });

        return $container;
    }

    protected function addPriceProductClient(Container $container): Container
    {
        $container->set(static::CLIENT_PRICE_PRODUCT, function (Container $container) {
            return new MerchantProductWidgetToPriceProductClientBridge(
                $container->getLocator()->priceProduct()->client(),
            );
        });

        return $container;
    }

    protected function addPriceProductStorageClient(Container $container): Container
    {
        $container->set(static::CLIENT_PRICE_PRODUCT_STORAGE, function (Container $container) {
            return new MerchantProductWidgetToPriceProductStorageClientBridge(
                $container->getLocator()->priceProductStorage()->client(),
            );
        });

        return $container;
    }
}
