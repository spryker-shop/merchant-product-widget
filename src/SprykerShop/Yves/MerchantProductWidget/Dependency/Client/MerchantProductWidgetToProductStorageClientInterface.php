<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\MerchantProductWidget\Dependency\Client;

interface MerchantProductWidgetToProductStorageClientInterface
{
    /**
     * @param string $mappingType
     * @param string $identifier
     * @param string $localeName
     *
     * @return array<mixed>|null
     */
    public function findProductConcreteStorageDataByMapping(string $mappingType, string $identifier, string $localeName): ?array;

    /**
     * @param int $idProductAbstract
     * @param string $localeName
     *
     * @return array<mixed>|null
     */
    public function findProductAbstractStorageData(int $idProductAbstract, string $localeName): ?array;
}
