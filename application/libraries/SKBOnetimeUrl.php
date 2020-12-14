<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SKBOnetimeUrl
{
    // skcdn 와우자서비스 원타임 url 생성 라이브러리
    private $key = 'wlive201207';

    public function __construct(){ }

    public function getUrl($domain, $filename){
        $domain = str_replace('https://', '', $domain);
        $filename = str_replace('/playlist.m3u8', '', $filename);
        // builder class 생성
        $builder_obj = new SKBStreamUriBuilder($this->key);
        $builder_obj->domainAddress($domain);
        $builder_obj->streamName($filename);
        $builder_obj->ttl(1);
        $builder_obj->previewDuration(0);

        // builder class 를 이용해서 uri class 생성
        $uri_obj = new SKBStreamUri($builder_obj);
        $url = $uri_obj->getHlsUri();

        $uri_obj = null;
        $builder_obj = null;

        return $url;
    }
}



class SKBStreamUriBuilder
{
    private $key;
    private $streamName;
    private $domain;
    private $expire = 0;
    private $ttl = 0;
    private $contentType = 'vod';
    private $previewDuration = 0;
    private $payload;

    // Stream URL Encoding add. prefix add
    private $prefixName;
    private $encodingYN = false;

    public function __construct($k = false)
    {
        if ($k) $this->key = $k;
    }


    public function secretKey($k)
    {
        $this->key = $k;

        if( strlen($this->key) > 16 ){
            $this->key = substr($this->key, 0, 16);
        }

        return $this;
    }


    public function getKey()
    {
        return $this->key;
    }


    // 기존에 domain 이었는데 안쓰는듯 다른 SDK 와 맞추기 위해서 domainAddress 로 통일
    public function domain($d)
    {
        $this->domain = $d;
        return $this;
    }


    public function domainAddress($d)
    {
        /*앞뒤로 / 가 나오면 빼는 부분에 대한 코드 추가 */
        while((substr($d,0,1)=="/"))
        {
            $d=substr($d,1,strlen($d));
        }

        // 뒤에 / 제거
        while((substr($d,strlen($d)-1,strlen($d))=="/"))
        {
            $d=substr($d,0,strlen($d)-1);
        }

        $this->domain = $d;
        return $this;
    }


    public function getDomain()
    {
        return $this->domain;
    }


    public function streamName($f)
    {
        /*앞뒤로 / 가 나오면 빼는 부분에 대한 코드 추가 */
        while((substr($f,0,1)=="/"))
        {
            $f=substr($f,1,strlen($f));
        }

        // 뒤에 / 제거
        while((substr($f,strlen($f)-1,strlen($f))=="/"))
        {
            $f=substr($f,0,strlen($f)-1);
        }

        $this->streamName = $f;
        return $this;
    }


    public function getStreamName()
    {
        return $this->streamName;
    }


    public function expire($t)
    {
        $this->expire = $t;
        return $this;
    }


    public function getExpire()
    {
        return $this->expire;
    }


    public function ttl($t)
    {
        $this->ttl = $t;
        return $this;
    }


    public function getTTL()
    {
        return $this->ttl;
    }


    public function contentType($type)
    {
        $this->contentType = $type;
        return $this;
    }


    public function getContentType()
    {
        return $this->contentType;
    }


    public function previewDuration($duration)
    {
        $this->previewDuration = $duration;
        return $this;
    }


    public function getPreviewDuration()
    {
        return $this->previewDuration;
    }


    public function addPayloadValue($key, $value)
    {
        $this->payload[$key] = $value;
        return $this;
    }


    public function payload($payload)
    {
        $this->payload = $payload;
        return $this;
    }


    public function getPayload()
    {
        if (count($this->payload) == 0)
            return false;

        return json_encode($this->payload);
    }


    function prefixName($prefix)
    {
        /*앞뒤로 / 가 나오면 빼는 부분에 대한 코드 추가 */
        while((substr($prefix,0,1)=="/"))
        {
            $prefix=substr($prefix,1,strlen($prefix));
        }

        // 뒤에 / 제거
        while((substr($prefix,strlen($prefix)-1,strlen($prefix))=="/"))
        {
            $prefix=substr($prefix,0,strlen($prefix)-1);
        }

        $this->prefixName = $prefix;
        return $this;
    }


    function getprefixName()
    {
        return $this->prefixName;
    }


    function setURLEncoding($use_yn)
    {
        if ($use_yn == 'Y' || $use_yn == 'y')
            $this->encodingYN = true;
        return $this;
    }


    function getURLEncoding()
    {
        return $this->encodingYN;
    }


    public function build()
    {
        return new SKBStreamUri($this);
    }

}

class SKBStreamUri
{
    const DELIMITER = "\t";

    private $crypter;
    private $streamName;
    private $domain;
    private $expire;
    private $ttl;
    private $contentType;
    private $previewDuration;
    private $payload;
    private $encrypted;

    // Stream URL Encoding add. prefix add
    private $prefixName;
    private $useEncoding = false;

    static function createBuilder($s = false)
    {
        return new SKBStreamUriBuilder($s);
    }


    public function __construct(SKBStreamUriBuilder $b)
    {
        $key = $b->getKey();
        $this->crypter = new CryptoUtil($key);
        $this->domain = $b->getDomain();
        $this->streamName = $b->getStreamName();
        $this->expire = $b->getExpire();
        $this->ttl = $b->getTTL();
        $this->contentType = $b->getContentType();
        $this->previewDuration = $b->getPreviewDuration();
        // todo : 오류
        //$this->payload = $b->getPayload();

        $this->prefixName = $b->getprefixName();
        $this->useEncoding = $b->getURLEncoding();
    }


    private function getEncryptedStream()
    {
        $result = array();

        if ($this->useEncoding) {
            $stream_tmp = rawurlencode($this->streamName);
        } else {
            $stream_tmp = $this->streamName;
        }

        if (strlen($this->prefixName) > 0) {
            $stream_data = $this->prefixName . "/" . $stream_tmp;
        } else {
            if ($stream_tmp[0] == "/") {
                $stream_data = substr($stream_tmp, 1);
            } else {
                $stream_data = $stream_tmp;
            }
        }

        array_push($result, $stream_data);

        $timestamp = time();

        if ($this->ttl){ $timestamp += $this->ttl; }
        if ($this->expire){ $timestamp = $this->expire; }

        array_push($result, $timestamp);
        array_push($result, $this->contentType);
        array_push($result, $this->previewDuration);

        if ($this->payload) {
            array_push($result, $this->payload);
        }

        $stream_info = implode(self::DELIMITER, $result);

        $this->encrypted = $this->crypter->encrypt($stream_info);
        return $this->encrypted;
    }


    public function getRtmpUri()
    {
        return 'rtmp://' . $this->domain . '/' . $this->getEncryptedStream();
    }


    public function getHlsUri()
    {
        return 'https://' . $this->domain . '/' . $this->getEncryptedStream() . '/playlist.m3u8';
    }


    public function getMpegDashUri()
    {
        return 'http://' . $this->domain . '/' . $this->getEncryptedStream() . '/manifest.mpd';
    }


    public function getRtspUri()
    {
        return 'rtsp://' . $this->domain . '/' . $this->getEncryptedStream();
    }


    public function getDecryptStr()
    {
        $decrypted = $this->crypter->decrypt($this->encrypted);
        return $decrypted;
    }
}

class CryptoUtil
{
    private $iv;
    private $key;

    public function __construct($k)
    {
        $this->key = $k;
        $this->iv = $this->null_pad($k, 16);
    }


    public function encrypt($str)
    {
        $encrypted = openssl_encrypt($str, 'AES-128-CBC', $this->key, OPENSSL_RAW_DATA, $this->iv);
        return bin2hex($encrypted);
    }


    public function decrypt($code)
    {
        $code = $this->hex2bin($code);
        $decrypted = openssl_decrypt($code, 'AES-128-CBC', $this->key, OPENSSL_RAW_DATA, $this->iv);
        return utf8_encode(trim($decrypted));
    }


    protected function hex2bin($hexdata)
    {
        $bindata = '';
        for ($i = 0; $i < strlen($hexdata); $i += 2) {
            $bindata .= chr(hexdec(substr($hexdata, $i, 2)));
        }
        return $bindata;
    }


    private function null_pad($text, $len)
    {
        return str_pad($text, $len, "\x00");
    }
}



