<?php

namespace duncan3dc\Sonos;

/**
 * Provides helper functions for the classes.
 */
class Helper
{

    /**
     * Create a mode array from the mode text value.
     *
     * @param string $mode
     *
     * @return array Mode data containing the following boolean elements (shuffle, repeat)
     */
    public static function getMode($mode)
    {
        $options = [
            "shuffle"   =>  false,
            "repeat"    =>  false,
        ];

        if (in_array($mode, ["REPEAT_ALL", "SHUFFLE"])) {
            $options["repeat"] = true;
        }
        if (in_array($mode, ["SHUFFLE_NOREPEAT", "SHUFFLE"])) {
            $options["shuffle"] = true;
        }

        return $options;
    }


    /**
     * Create a mode string from a mode array.
     *
     * @param array $options An array with 2 boolean elements (shuffle and repeat)
     *
     * @return string
     */
    public static function setMode(array $options)
    {
        if ($options["shuffle"]) {
            if (!$options["repeat"]) {
                return "SHUFFLE_NOREPEAT";
            }
            return "SHUFFLE";
        }

        if ($options["repeat"]) {
            return "REPEAT_ALL";
        }

        return "NORMAL";
    }
}
