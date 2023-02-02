<?php
class Validator
{
    /**
     * PURE FUNCTION IS FUNCTION THAT IS NOT CONTANGION OR DEPENDAD UPON OUTSIDE WORLD
     * SUCH FUNCTION CAN BE CREATED AS STATIC
     */
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
