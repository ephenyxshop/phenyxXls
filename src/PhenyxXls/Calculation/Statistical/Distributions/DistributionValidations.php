<?php

namespace EphenyxShop\PhenyxXls\Calculation\Statistical\Distributions;

use EphenyxShop\PhenyxXls\Calculation\Exception;
use EphenyxShop\PhenyxXls\Calculation\Information\ExcelError;
use EphenyxShop\PhenyxXls\Calculation\Statistical\StatisticalValidations;

class DistributionValidations extends StatisticalValidations
{
    /**
     * @param mixed $probability
     */
    public static function validateProbability($probability): float
    {
        $probability = self::validateFloat($probability);

        if ($probability < 0.0 || $probability > 1.0) {
            throw new Exception(ExcelError::NAN());
        }

        return $probability;
    }
}
