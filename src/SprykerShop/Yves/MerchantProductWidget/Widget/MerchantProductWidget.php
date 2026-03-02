<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\MerchantProductWidget\Widget;

use Generated\Shared\Transfer\ProductViewTransfer;
use Spryker\Yves\Kernel\Widget\AbstractWidget;

/**
 * @method \SprykerShop\Yves\MerchantProductWidget\MerchantProductWidgetFactory getFactory()
 */
class MerchantProductWidget extends AbstractWidget
{
    public function __construct(
        ProductViewTransfer $productViewTransfer,
        bool $isRadioButtonVisible = false,
        bool $isChecked = true
    ) {
        $this->addMerchantProductViewParameter($productViewTransfer);
        $this->addProductViewParameter($productViewTransfer);
        $this->addIsRadioButtonVisibleParameter($isRadioButtonVisible);
        $this->addIsCheckedParameter($isChecked);
    }

    public static function getName(): string
    {
        return 'MerchantProductWidget';
    }

    public static function getTemplate(): string
    {
        return '@MerchantProductWidget/views/merchant-product-widget/merchant-product-widget.twig';
    }

    protected function addMerchantProductViewParameter(ProductViewTransfer $productViewTransfer): void
    {
        $this->addParameter(
            'merchantProductView',
            $this->getFactory()->createMerchantProductReader()->findMerchantProductView($productViewTransfer, $this->getLocale()),
        );
    }

    protected function addProductViewParameter(ProductViewTransfer $productViewTransfer): void
    {
        $this->addParameter('productView', $productViewTransfer);
    }

    protected function addIsRadioButtonVisibleParameter(bool $isRadioButtonVisible): void
    {
        $this->addParameter('isRadioButtonVisible', $isRadioButtonVisible);
    }

    protected function addIsCheckedParameter(bool $isChecked): void
    {
        $this->addParameter('isChecked', $isChecked);
    }
}
