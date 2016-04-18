<?php


namespace ExpandOnline\KlipfolioApi\Util;

use Exception;
use InvalidArgumentException;
use ReflectionClass;

/**
 * Class Enum
 * @package ExpandOnline\KlipfolioApi\Util
 */
class Enum {

    /**
     * Validates whether the element is a valid enum value.
     * @param $elem
     *
     * @throws InvalidArgumentException if an invalid argument is passed.
     */
    public static function validate($elem) {
        static::validateArray(array($elem));
    }


    /**
     * Validates whether all elements in the array are valid Enum values
     * @param array $array
     *
     * @throws InvalidArgumentException if an invalid argument is passed.
     */
    public static function validateArray(array $array) {
        $reflection =  new ReflectionClass(get_called_class());
        $allowedValues = $reflection->getConstants();
        foreach($array as $element) {
            if (!in_array($element, $allowedValues)) {
                throw new InvalidArgumentException(sprintf(
                    '%s is not a valid %s',
                    $element,
                    get_called_class()
                ));
            }
        }
    }

    /**
     * @param $elem
     *
     * @return bool
     */
    public static function isValid($elem) {
        return static::isValidArray(array($elem));
    }

    /**
     * @param $array
     *
     * @return bool
     */
    public static function isValidArray($array) {
        try {
            static::validateArray($array);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
}