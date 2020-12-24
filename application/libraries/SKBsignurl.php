<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SKBsignurl
{
    // skcdn 보안 설정 url 생성

    private $key_pair_id = 'pub_hls.willbes.net';
    private $pem_text = '-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQC7Q33q3wrAqpkISvgeGq1VtFqcsop1nuzbNc+WoeQt+YhGZULv
9CZNsz8EmR4wJ/5bjuTQUXIiBuWoclfJyQ4mAYI1H1/Inv5r8jphjVtCPemt/0IE
dFkm2808ty7PIDaw9NqppF02dt7LTG0Nz8JwKVg5TRLYM7N3ZVpuzJZzlwIDAQAB
AoGAc8WtIjjUh/qwc60NqmbpxLOk1X2YFlGzs26YMVNTI41Cz+qosHqr95uamTgk
rrb7DRXRpmzD9/91mmdemNThFlUQnDDpBO+Do5iegReGPJXZ6yO3BhK0M09lvsj/
K/EvcZUxfeLN0W+PWJPS2J03Vrk0rWsa9BT7vwrGmizFoRkCQQDlZjB8Kmn+XsiJ
obfmPPFvi081rAPPi6pnMZ0xavdM2pUJjewOt6O5eNIJ/mAqTZro9sZWk2ekC834
6fiKtqLDAkEA0Pp9zQwS780ka8lVrPX3UAr/+HKw0DU6EKHtfHB98e6JtxQIctqD
VVYzxcTWs9S1M5Ij+o7jB+TZMXdZZ8q2nQJBAKHf+HrF20G6VLx6N7DqdFyH638u
QQolvjtPkWMb3iKHY//3/AluoMPydBTFQcrYNGYMLW1OWyYxhkkNoWsQ8c0CQQDI
nH6hlYKkQ3lAI7GkbSax5y1ckrUb2szX5Kp3eAHfes8nOgr2PsAu7qaapuA5F+uv
Cw6Q3BQjotPBQcJI+fedAkAefAZwhPLhHHxsjoLFj53+/E0h89HPbLYWt+7HYDEX
tceO+by8Z2AKAWpx+9OzuSsxSyDRhd6FLxKn+rOAjNzb
-----END RSA PRIVATE KEY-----'; // pem 파일 데이타, 암호화키

    public function __construct() { }

    public function getSign($url_path)
    {
        $expires = time() + 21600; // 1 day from now
        $client_ip = "0.0.0.0/0"; // 허용 IP
        $policy =
            '{'.
                '"Statement":['.
                    '{'.
                        '"Resource":"http*://hls.willbes.net/*",'.
                        '"Condition":{'.
                            '"DateLessThan":{"AWS:EpochTime":' . $expires . '},'.
                            '"IpAddress":{"AWS:SourceIp":"' . $client_ip . '"}'.
                        '}'.
                    '}'.
                ']'.
            '}'; // policy json data

        $custom_policy_stream_name = $this->get_custom_policy_stream_name($url_path, $this->key_pair_id, $policy);

        return $custom_policy_stream_name;
    }


    private function rsa_sha1_sign($policy) {
        $signature = "";
        // load the private key
        /*
        $fp = fopen($private_key_filename, "r");
        $priv_key = fread($fp, 8192);
        fclose($fp);
        $pkeyid = openssl_get_privatekey($priv_key);
        */
        $pkeyid = openssl_get_privatekey($this->pem_text);

        // compute signature
        openssl_sign($policy, $signature, $pkeyid);
        // free the key from memory
        openssl_free_key($pkeyid);

        return $signature;
    }


    private function url_safe_base64_encode($value) {
        $encoded = base64_encode($value);
        // replace unsafe characters +, = and / with the safe characters -, _ and ~
        return str_replace(
            array('+', '=', '/'),
            array('-', '_', '~'),
            $encoded);
    }


    private function url_safe_base64_encode1($value) {
        $encoded = base64_encode($value);
        // replace unsafe characters +, = and / with the safe characters -, _ and ~
        return  $encoded;
    }


    private function create_stream_name($stream, $policy, $signature, $key_pair_id, $expires){
        $path = "";
        $result = $stream;
        $separator = strpos($stream, '?') == FALSE ? '?' : '&';

        if($expires) {
            $result .= $path . $separator . "Expires=" . $expires . "&Signature=" . $signature . "&Key-Pair-Id=" . $key_pair_id . "&.m3u8";
        } else {
            $result .= $path . $separator . "Policy=" . $policy . "&Signature=" . $signature . "&Key-Pair-Id=" . $key_pair_id . "&.m3u8";
        }

        return str_replace('\n', '', $result);
    }


    private function encode_query_params($stream_name) {
        return str_replace(
            array('?', '=', '&'),
            array('?', '=', '&'),
            $stream_name);
    }


    private function get_custom_policy_stream_name($url_path, $key_pair_id, $policy) {
        $encoded_policy = $this->url_safe_base64_encode($policy);
        $signature = $this->rsa_sha1_sign($policy);
        $encoded_signature = $this->url_safe_base64_encode($signature);
        $stream_name = $this->create_stream_name($url_path, $encoded_policy, $encoded_signature, $key_pair_id, null);
        return $this->encode_query_params($stream_name);
    }
}