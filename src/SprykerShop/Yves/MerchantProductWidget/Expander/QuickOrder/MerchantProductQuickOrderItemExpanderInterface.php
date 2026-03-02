<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\MerchantProductWidget\Expander\QuickOrder;

use Generated\Shared\Transfer\ItemTransfer;

interface MerchantProductQuickOrderItemExpanderInterface
{
    public function expandItem(ItemTransfer $itemTransfer, string $locale): ItemTransfer;
}
