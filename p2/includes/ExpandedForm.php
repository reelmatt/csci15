<?php

namespace Thomas;

use DWA\Form;

class ExpandedForm extends Form
{
    /**
     * Additional numeric processing to accept decimal numbers
     * Returns boolean is given value contains only numbers
     */
    protected function decimal($value)
    {
        # Check if value (sans decimals) is numeric
        $numeric = ctype_digit(str_replace([' ', '.'], '', $value));

        # A valid number should have either 0 or 1 decimals
        $oneOrNoneDecimal = in_array(substr_count($value, '.'), [0, 1]);

        return $numeric and $oneOrNoneDecimal;
    }
}