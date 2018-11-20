<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *  PHP 5 (UTF-8)
 */
class Crypto
{
    const STRENCRYPTER_BLOCK_SIZE		= 16 ;	// 16 bytes

    private $key;
    private $initialVector;

    /*
    function __construct ()
    {
        $this->key = md5 ("axissoft", TRUE) ;
        $this->initialVector = md5 ("starplayer", TRUE) ;
        //echo 'key : ' . $this->key . ", init : ".$this->initialVector . "<br />";
    }
    */

    function __construct ($key)
    {
        if ( !is_string ($key) or $key == "" )
            throw new Exception ("The key must be a non-empty string.") ;

        //if ( !is_string ($initialVector) or $initialVector == "" )
        //	throw new Exception ("The initial vector must be a non-empty string.") ;

        $vector = "starplayer";
        // Initialize an encryption key and an initial vector.
        $this->key = md5 ($key, TRUE) ;
        $this->initialVector = md5 ($vector, TRUE) ;


    }

    public function encrypt ($value)
    {
        if ( is_null ($value) )
            $value = "" ;

        if ( !is_string ($value) )
            throw new Exception ("A non-string value can not be encrypted.") ;


        // Append padding
        $value = self::toPkcs7 ($value) ;

        //echo 'default encrypt : '. $value . '<br />';
        // Encrypt the value.
        $output = mcrypt_encrypt (MCRYPT_RIJNDAEL_128, $this->key, $value, MCRYPT_MODE_CBC, $this->initialVector) ;

        //echo 'xml : '. base64_encode ($output) . '<br />';
        // Return a base64 encoded string of the encrypted value.
        return base64_encode ($output) ;
    }

    public function decrypt ($value)
    {
        if ( !is_string ($value) or $value == "" )
            throw new Exception ("The cipher string must be a non-empty string.") ;

        // Decode base64 encoding.
        $value = base64_decode ($value) ;

        //echo 'decoded base64 : '. $value . '<br />';

        // Decrypt the value.
        $output = mcrypt_decrypt (MCRYPT_RIJNDAEL_128, $this->key, $value, MCRYPT_MODE_CBC, $this->initialVector) ;

        //echo 'origin : '. self::fromPkcs7 ($output) . '<br />';
        // Strip padding and return.
        return self::fromPkcs7 ($output) ;
    }

    private static function toPkcs7 ($value)
    {
        if ( is_null ($value) )
            $value = "" ;

        if ( !is_string ($value) )
            throw new Exception ("A non-string value can not be used to pad.") ;


        // Get a number of bytes to pad.
        $padSize = self::STRENCRYPTER_BLOCK_SIZE - (strlen ($value) % self::STRENCRYPTER_BLOCK_SIZE) ;
        // Add padding and return.
        return $value . str_repeat (chr ($padSize), $padSize) ;
    }

    private static function fromPkcs7 ($value)
    {
        if ( !is_string ($value) or $value == "" )
            throw new Exception ("The string padded by PKCS7 must be a non-empty string.") ;

        $valueLen = strlen ($value) ;

        // The length of the string must be a multiple of block size.
        if ( $valueLen % self::STRENCRYPTER_BLOCK_SIZE > 0 )
            throw new Exception ("The length of the string is not a multiple of block size.") ;


        // Get the padding size.
        $padSize = ord ($value{$valueLen - 1}) ;

        // The padding size must be a number greater than 0 and less equal than the block size.
        if ( ($padSize < 1) or ($padSize > self::STRENCRYPTER_BLOCK_SIZE) )
            throw new Exception ("The padding size must be a number greater than 0 and less equal than the block size.") ;

        // Check padding.
        for ($i = 0; $i < $padSize; $i++)
        {
            if ( ord ($value{$valueLen - $i - 1}) != $padSize )
                throw new Exception ("A padded value is not valid.") ;
        }

        // Strip padding and return.
        return substr ($value, 0, $valueLen - $padSize) ;
    }
}

?>