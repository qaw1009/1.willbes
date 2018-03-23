<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WB_Encrypt extends CI_Encrypt
{
    protected $_cipher_method;

    public function __construct($_cipher_method = ['AES-128-CBC'])
    {
        $this->_cipher_method = $_cipher_method[0];

        parent::__construct();
    }

    /**
     * CI_Encrypt encode 메소드 확장
     * @param $string
     * @param string $key
     * @return string
     */
    public function encode($string, $key = '')
    {
        $iv_size = openssl_cipher_iv_length($this->_cipher_method);

        // 암호화 결과값을 암호화할 때마다 랜덤하게 생성
        //$iv = openssl_random_pseudo_bytes($iv_size);
        //$cipher_text =base64_encode($iv . openssl_encrypt($this->pkcs5_pad($string), $this->_cipher_method, $this->get_key($key), OPENSSL_RAW_DATA, $iv));

        // 암호화 결과값을 암호화할 때마다 동일하게 생성
        $iv = mb_substr($this->get_key($key), 0, $iv_size);
        $cipher_text =base64_encode(openssl_encrypt($this->pkcs5_pad($string), $this->_cipher_method, $this->get_key($key), OPENSSL_RAW_DATA, $iv));

        return $cipher_text;
    }

    /**
     * CI_Encrypt decode 메소드 확장
     * @param $string
     * @param string $key
     * @return string
     */
    public function decode($string, $key = '')
    {
        $string = base64_decode($string);
        $iv_size = openssl_cipher_iv_length($this->_cipher_method);

        // 암호화 결과값을 암호화할 때마다 랜덤하게 생성
        //$iv = mb_substr($string, 0, $iv_size, '8bit');
        //$string = mb_substr($string, $iv_size, null, '8bit');

        // 암호화 결과값을 암호화할 때마다 동일하게 생성
        $iv = mb_substr($this->get_key($key), 0, $iv_size);

        return $this->pkcs5_unpad(openssl_decrypt($string, $this->_cipher_method, $this->get_key($key), OPENSSL_RAW_DATA, $iv));
    }

    /**
     * PKCS5 Padding
     * @param $text
     * @param int $blocksize
     * @return string
     */
    public function pkcs5_pad($text, $blocksize = 16)
    {
        $pad = $blocksize - (strlen($text) % $blocksize);

        return $text . str_repeat(chr($pad), $pad);
    }

    /**
     * PKCS5 Unpadding
     * @param $text
     * @return string
     */
    public function pkcs5_unpad($text)
    {
        $pad = ord($text{strlen($text)-1});

        if ($pad > strlen($text)) {
            return $text;
        }

        if (!strspn($text, chr($pad), strlen($text) - $pad)) {
            return $text;
        }

        return substr($text, 0, -1 * $pad);
    }
}