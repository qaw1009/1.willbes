<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crypto
{
    const STRENCRYPTER_BLOCK_SIZE = 16;    // 16 bytes

    private $key;
    private $initialVector;

    public function __construct($params = [])
    {
        $key = element('license', $params);

        if (!is_string($key) or $key == "") {
            throw new Exception("The key must be a non-empty string.");
        }

        $vector = "starplayer";

        $this->key = md5($key, TRUE);
        $this->initialVector = md5($vector, TRUE);
    }

    public function encrypt($value)
    {
        if (is_null($value)) {
            $value = "";
        }

        if (!is_string($value)){
            throw new Exception("A non-string value can not be encrypted.");
        }

        $output = openssl_encrypt($value, 'AES-128-CBC', $this->key, OPENSSL_RAW_DATA, $this->initialVector);

        return base64_encode($output);
    }

    public function decrypt($value)
    {
        if( !is_string($value) or $value == "" ) {
            throw new Exception("The cipher string must be a non-empty string.");
        }

        $value = base64_decode($value) ;

        $output = openssl_decrypt($value, 'AES-128-CBC', $this->key, OPENSSL_RAW_DATA, $this->initialVector);

        return $output;
    }

}
