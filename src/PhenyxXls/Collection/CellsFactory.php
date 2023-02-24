<?php

namespace EphenyxShop\PhenyxXls\Collection;

use EphenyxShop\PhenyxXls\Settings;
use EphenyxShop\PhenyxXls\Worksheet\Worksheet;

abstract class CellsFactory
{
    /**
     * Initialise the cache storage.
     *
     * @param Worksheet $worksheet Enable cell caching for this worksheet
     *
     * */
    public static function getInstance(Worksheet $worksheet): Cells
    {
        return new Cells($worksheet, Settings::getCache());
    }
}
