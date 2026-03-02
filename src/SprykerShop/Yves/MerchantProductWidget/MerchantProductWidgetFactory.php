<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\MerchantProductWidget;

use Spryker\Yves\Kernel\AbstractFactory;
use SprykerShop\Yves\MerchantProductWidget\Dependency\Client\MerchantProductWidgetToMerchantStorageClientInterface;
use SprykerShop\Yves\MerchantProductWidget\Dependency\Client\MerchantProductWidgetToPriceProductClientInterface;
use SprykerShop\Yves\MerchantProductWidget\Dependency\Client\MerchantProductWidgetToPriceProductStorageClientInterface;
use SprykerShop\Yves\MerchantProductWidget\Dependency\Client\MerchantProductWidgetToProductStorageClientInterface;
use SprykerShop\Yves\MerchantProductWidget\Expander\MerchantProductExpander;
use SprykerShop\Yves\MerchantProductWidget\Expander\MerchantProductExpanderInterface;
use SprykerShop\Yves\MerchantProductWidget\Expander\MerchantProductOfferCollectionExpander;
use SprykerShop\Yves\MerchantProductWidget\Expander\MerchantProductOfferCollectionExpanderInterface;
use SprykerShop\Yves\MerchantProductWidget\Expander\QuickOrder\MerchantProductQuickOrderItemExpander;
use SprykerShop\Yves\MerchantProductWidget\Expander\QuickOrder\MerchantProductQuickOrderItemExpanderInterface;
use SprykerShop\Yves\MerchantProductWidget\Mapper\MerchantProductMapper;
use SprykerShop\Yves\MerchantProductWidget\Reader\MerchantProductReader;
use SprykerShop\Yves\MerchantProductWidget\Reader\MerchantProductReaderInterface;
use SprykerShop\Yves\MerchantProductWidget\Resolver\ShopContextResolver;
use SprykerShop\Yves\MerchantProductWidget\Resolver\ShopContextResolverInterface;

class MerchantProductWidgetFactory extends AbstractFactory
{
    public function createMerchantProductReader(): MerchantProductReaderInterface
    {
        return new MerchantProductReader(
            $this->getProductStorageClient(),
            $this->getPriceProductClient(),
            $this->getPriceProductStorageClient(),
            $this->getMerchantStorageClient(),
            $this->createMerchantProductMapper(),
        );
    }

    public function createMerchantProductExpander(): MerchantProductExpanderInterface
    {
        return new MerchantProductExpander(
            $this->createMerchantProductReader(),
        );
    }

    public function createMerchantProductMapper(): MerchantProductMapper
    {
        return new MerchantProductMapper();
    }

    public function createMerchantProductQuickOrderItemExpander(): MerchantProductQuickOrderItemExpanderInterface
    {
        return new MerchantProductQuickOrderItemExpander(
            $this->createMerchantProductReader(),
        );
    }

    public function createShopContextResolver(): ShopContextResolverInterface
    {
        return new ShopContextResolver($this->getContainer());
    }

    public function getMerchantStorageClient(): MerchantProductWidgetToMerchantStorageClientInterface
    {
        return $this->getProvidedDependency(MerchantProductWidgetDependencyProvider::CLIENT_MERCHANT_STORAGE);
    }

    public function getProductStorageClient(): MerchantProductWidgetToProductStorageClientInterface
    {
        return $this->getProvidedDependency(MerchantProductWidgetDependencyProvider::CLIENT_PRODUCT_STORAGE);
    }

    public function getPriceProductClient(): MerchantProductWidgetToPriceProductClientInterface
    {
        return $this->getProvidedDependency(MerchantProductWidgetDependencyProvider::CLIENT_PRICE_PRODUCT);
    }

    public function getPriceProductStorageClient(): MerchantProductWidgetToPriceProductStorageClientInterface
    {
        return $this->getProvidedDependency(MerchantProductWidgetDependencyProvider::CLIENT_PRICE_PRODUCT_STORAGE);
    }

    public function createMerchantProductOfferCollectionExpander(): MerchantProductOfferCollectionExpanderInterface
    {
        return new MerchantProductOfferCollectionExpander(
            $this->getMerchantStorageClient(),
            $this->createMerchantProductReader(),
            $this->createShopContextResolver(),
        );
    }
}
