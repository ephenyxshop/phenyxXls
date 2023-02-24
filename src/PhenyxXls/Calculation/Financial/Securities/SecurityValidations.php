<?php

namespace EphenyxShop\PhenyxXls\Calculation\Financial\Securities;

use EphenyxShop\PhenyxXls\Calculation\Exception;
use EphenyxShop\PhenyxXls\Calculation\Financial\FinancialValidations;
use EphenyxShop\PhenyxXls\Calculation\Information\ExcelError;

class SecurityValidations extends FinancialValidations
{
    /**
     * @param mixed $issue
     */
    public static function validateIssueDate($issue): float
    {
        return self::validateDate($issue);
    }

    /**
     * @param mixed $settlement
     * @param mixed $maturity
     */
    public static function validateSecurityPeriod($settlement, $maturity): void
    {
        if ($settlement >= $maturity) {
            throw new Exception(ExcelError::NAN());
        }
    }

    /**
     * @param mixed $redemption
     */
    public static function validateRedemption($redemption): float
    {
        $redemption = self::validateFloat($redemption);
        if ($redemption <= 0.0) {
            throw new Exception(ExcelError::NAN());
        }

        return $redemption;
    }
}
