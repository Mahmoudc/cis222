<?php
/**
 * Helper
 *
 * Helper object to hold misc functionality such as a hash function
 *
 * PHP version 5.4.45
 *
 * @author      Chad R. Banks <chadrbanks@yahoo.com>
 * @copyright   2019 CIS-222
 * @date		August 12th, 2016 10:48 PM
 *
 * @version     2019.11.12
 */

class Helper
{
    //


    public function __construct(  )
    {
        //
    }

    function hash( $p, $j = 200, $s = "Chahine_Software_Solutions" )
    {
        $n = crypt( $p, $s );

        for( $i = 0; $i < $j; ++$i )
        {
            $n = crypt( $n.$p, $s );
        }

        return $n;
    }

    function generateString( $length = 16 )
    {
        $chars = array
        (
            '0',
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            'a',
            'b',
            'c',
            'd',
            'e',
            'f',
            'g',
            'h',
            'i',
            'j',
            'k',
            'l',
            'm',
            'n',
            'o',
            'p',
            'q',
            'r',
            's',
            't',
            'u',
            'v',
            'w',
            'x',
            'y',
            'z',
        );

        $str = '';

        for( $x = 0; $x < $length; $x++ )
        {
            $str .= $chars[ rand( 0, ( count( $chars ) - 1 ) ) ];
        }

        return strtolower( $str );
    }
}