<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\MerchantProductWidget\Mapper;

use Generated\Shared\Transfer\MerchantProductViewTransfer;

class MerchantProductMapper implements MerchantProductMapperInterface
{
    /**
     * @phpstan-param array<string, mixed> $productAbstractStorageData
     *
     * @param array $productAbstractStorageData
     * @param \Generated\Shared\Transfer\MerchantProductViewTransfer $merchantProductViewTransfer
     *
     * @return \Generated\Shared\Transfer\MerchantProductViewTransfer
     */
    public function mapProductAbstractStorageDataToMerchantProductViewTransfer(
        array $productAbstractStorageData,
        MerchantProductViewTransfer $merchantProductViewTransfer
    ): MerchantProductViewTransfer {
        return $merchantProductViewTransfer->fromArray($productAbstractStorageData, true);
    }
}
