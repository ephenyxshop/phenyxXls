<?php

namespace EphenyxShop\PhenyxXls\Writer\Ods;

use EphenyxShop\PhenyxXls\Shared\XMLWriter;
use EphenyxShop\PhenyxXls\Spreadsheet;
use EphenyxShop\PhenyxXls\Worksheet\AutoFilter;
use EphenyxShop\PhenyxXls\Worksheet\Worksheet;

class AutoFilters
{
    /**
     * @var XMLWriter
     */
    private $objWriter;

    /**
     * @var Spreadsheet
     */
    private $spreadsheet;

    public function __construct(XMLWriter $objWriter, Spreadsheet $spreadsheet)
    {
        $this->objWriter = $objWriter;
        $this->spreadsheet = $spreadsheet;
    }

    /** @var mixed */
    private static $scrutinizerFalse = false;

    public function write(): void
    {
        $wrapperWritten = self::$scrutinizerFalse;
        $sheetCount = $this->spreadsheet->getSheetCount();
        for ($i = 0; $i < $sheetCount; ++$i) {
            $worksheet = $this->spreadsheet->getSheet($i);
            $autofilter = $worksheet->getAutoFilter();
            if ($autofilter !== null && !empty($autofilter->getRange())) {
                if ($wrapperWritten === false) {
                    $this->objWriter->startElement('table:database-ranges');
                    $wrapperWritten = true;
                }
                $this->objWriter->startElement('table:database-range');
                $this->objWriter->writeAttribute('table:orientation', 'column');
                $this->objWriter->writeAttribute('table:display-filter-buttons', 'true');
                $this->objWriter->writeAttribute(
                    'table:target-range-address',
                    $this->formatRange($worksheet, $autofilter)
                );
                $this->objWriter->endElement();
            }
        }

        if ($wrapperWritten === true) {
            $this->objWriter->endElement();
        }
    }

    protected function formatRange(Worksheet $worksheet, Autofilter $autofilter): string
    {
        $title = $worksheet->getTitle();
        $range = $autofilter->getRange();

        return "'{$title}'.{$range}";
    }
}
