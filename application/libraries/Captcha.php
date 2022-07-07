<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Captcha
{
    protected $_CI;
    protected $_img_id = 'captcha_img';
    protected $_img_width = '150';
    protected $_img_height = '50';
    protected $_img_path = STORAGEPATH . 'uploads/_captcha/';
    protected $_img_url = PUBLICURL . 'uploads/_captcha/';
    protected $_font_size = '18';
    protected $_font_path = FCPATH . 'public/fonts/NanumGothic/NanumGothic-Bold.ttf';
    protected $_expiration = '600';
    protected $_word_length = '6';
    protected $_pool_type = 'num';
    protected $_colors = [
        'background' => [255, 255, 255],
        'border' => [153, 102, 102],
        'text' => [204, 153, 153],
        'grid' => [255, 182, 182]
    ];
    protected $_supported_pools = [
        'num' => '0123456789',
        'alpha' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        'alphanum' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ];
    protected $_ck_captcha_word = 'captcha_word';   // captcha word cookie name

    public function __construct()
    {
        $this->_CI = &get_instance();
        $this->_CI->load->helper(['captcha', 'cookie']);
        $this->_CI->load->library('encrypt');
    }

    /**
     * Captcha 초기화
     * @param array $config [설정값배열]
     */
    public function initialize($config = [])
    {
        // img tag element id
        isset($config['img_id']) === true && $this->_img_id = $config['img_id'];
        // img width
        isset($config['img_width']) === true && $this->_img_width = $config['img_width'];
        // img height
        isset($config['img_height']) === true && $this->_img_height = $config['img_height'];
        // img 생성 디렉토리 경로
        isset($config['img_path']) === true && $this->_img_path = $config['img_path'];
        // img URL
        isset($config['img_url']) === true && $this->_img_url = $config['img_url'];
        // font size
        isset($config['font_size']) === true && $this->_font_size = $config['font_size'];
        // font 파일 경로
        isset($config['font_path']) === true && $this->_font_path = $config['font_path'];
        // img 자동삭제 설정시간 (초)
        isset($config['expiration']) === true && $this->_expiration = $config['expiration'];
        // captcha 문자열 길이
        isset($config['word_length']) === true && $this->_word_length = $config['word_length'];
        // captcha 문자열 생성구분 (숫자만, 영문자, 숫자+영문자)
        isset($config['pool_type']) === true && $this->_pool_type = $config['pool_type'];
        // captcha img color (백그라운드, 외곽선, 텍스트, 그리드)
        isset($config['colors']) === true && $this->_colors = $config['colors'];
    }

    /**
     * Captcha 생성
     * @param string $word_length [문자열 길이]
     * @param string $img_width [이미지 가로 사이즈]
     * @param string $img_height [이미지 세로 사이즈]
     * @param string $img_id [이미지 태그 아이디]
     * @param string $font_size [폰트 크기]
     * @param string $pool_type [문자열 생성구분 (num, alpha, alphanum)]
     * @return mixed [word => 생성문자열, time => 생성시간, image => 이미지 태그, filename => 이미지 파일명]
     */
    public function create($word_length = '', $img_width = '', $img_height = '', $img_id = '', $font_size = '', $pool_type = '')
    {
        $word_length = get_var($word_length, $this->_word_length);
        $img_width = get_var($img_width, $this->_img_width);
        $img_height = get_var($img_height, $this->_img_height);
        $img_id = get_var($img_id, $this->_img_id);
        $font_size = get_var($font_size, $this->_font_size);
        $pool_type = get_var($pool_type, $this->_pool_type);

        // captcha 생성
        $config = [
            'word' => '',
            'img_path' => $this->_img_path,
            'img_url' => $this->_img_url,
            'font_path' => $this->_font_path,
            'expiration' => $this->_expiration,
            'img_id' => $img_id,
            'img_width' => $img_width,
            'img_height' => $img_height,
            'font_size' => $font_size,
            'word_length' => $word_length,
            'pool' => element($pool_type, $this->_supported_pools, $this->_supported_pools['num']),
            'colors' => $this->_colors
        ];

        // captcha 이미지 디렉토리 생성
        $is_created_dir = $this->_createDir($this->_img_path);
        if ($is_created_dir !== true) {
            log_message('ERROR', '[Captcha] Unable to create directory (' . $this->_img_path . ')');
            return false;
        }

        // captcha 이미지 생성
        $results = create_captcha($config);

        if ($results !== false) {
            // captcha 문자열 저장
            $enc_captcha_word = $this->_CI->encrypt->encode(element('word', $results));
            set_cookie($this->_ck_captcha_word, $enc_captcha_word, 7200, '', '/', '', true, true);
            return element('image', $results);
        }

        return false;
    }

    /**
     * Captcha 문자열 비교
     * @param string $word [captcha 문자열]
     * @return bool
     */
    public function verify($word)
    {
        $dec_word = $this->_CI->encrypt->decode(get_cookie($this->_ck_captcha_word));
        
        return $word == $dec_word;
    }

    /**
     * Captcha 이미지 디렉토리 생성
     * @param string $dir
     * @return bool|string
     */
    private function _createDir($dir)
    {
        try {
            if (is_dir($dir) === false && is_null($dir) === false) {
                if (mkdir($dir, 0707, true) === false) {
                    throw new \Exception(sprintf('디렉토리 생성에 실패했습니다. (%s)', $dir));
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
