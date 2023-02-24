<?php

namespace EphenyxShop\PhenyxXls\Writer\Ods;

use EphenyxShop\PhenyxXls\Writer\Ods;

abstract class WriterPart
{
    /**
     * Parent Ods object.
     *
     * @var Ods
     */
    private $parentWriter;

    /**
     * Get Ods writer.
     *
     * @return Ods
     */
    public function getParentWriter()
    {
        return $this->parentWriter;
    }

    /**
     * Set parent Ods writer.
     */
    public function __construct(Ods $writer)
    {
        $this->parentWriter = $writer;
    }

    abstract public function write(): string;
}
