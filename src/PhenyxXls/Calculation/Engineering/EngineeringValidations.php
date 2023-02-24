<?php

namespace EphenyxShop\PhenyxXls\Calculation\Engineering;

use EphenyxShop\PhenyxXls\Calculation\Exception;
use EphenyxShop\PhenyxXls\Calculation\Information\ExcelError;

class EngineeringValidations
{
    /**
     * @param mixed $value
     */
    public static function validateFloat($value): float
    {
        if (!is_numeric($value)) {
            throw new Exception(ExcelError::VALUE());
        }

        return (float) $value;
    }

    /**
     * @param mixed $value
     */
    public static function validateInt($value): int
    {
        if (!is_numeric($value)) {
            throw new Exception(ExcelError::VALUE());
        }

        return (int) floor((float) $value);
    }
}
