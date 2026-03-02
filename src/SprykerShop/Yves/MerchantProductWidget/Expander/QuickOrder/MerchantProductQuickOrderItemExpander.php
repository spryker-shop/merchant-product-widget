<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\MerchantProductWidget\Expander\QuickOrder;

use Generated\Shared\Transfer\ItemTransfer;
use SprykerShop\Yves\MerchantProductWidget\Reader\MerchantProductReaderInterface;

class MerchantProductQuickOrderItemExpander implements MerchantProductQuickOrderItemExpanderInterface
{
    /**
     * @var \SprykerShop\Yves\MerchantProductWidget\Reader\MerchantProductReaderInterface
     */
    protected $merchantProductReader;

    public function __construct(MerchantProductReaderInterface $merchantProductReader)
    {
        $this->merchantProductReader = $merchantProductReader;
    }

    public function expandItem(ItemTransfer $itemTransfer, string $locale): ItemTransfer
    {
        /** @var string $sku */
        $sku = $itemTransfer->getSku();

        if (!$sku) {
            return $itemTransfer;
        }

        $merchantReference = $this->merchantProductReader
            ->findMerchantReferenceByConcreteSku(
                $sku,
                $locale,
            );

        if (!$merchantReference) {
            return $itemTransfer;
        }

        return $itemTransfer->setMerchantReference($merchantReference);
    }
}
