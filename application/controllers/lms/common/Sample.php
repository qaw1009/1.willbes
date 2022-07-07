<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sample extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 샘플 인덱스
     */
    public function index()
    {
        $this->load->library('captcha');
        $captcha = $this->captcha->create();

        $this->load->view('/common/sample', [
            'captcha' => $captcha
        ]);
    }

    /**
     * Captcha 인증번호 검증
     * @return CI_Output|null
     */
    public function captchaVerify()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'captcha_num', 'label' => '인증번호', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $this->load->library('captcha');
        $result = $this->captcha->verify($this->_reqP('captcha_num'));

        if ($result !== true) {
            return $this->json_error('인증번호가 일치하지 않습니다.', _HTTP_CONFLICT);
        }

        return $this->json_result($result, '인증 되었습니다.', $result);
    }

    /**
     * Base64 인코딩 이미지 업로드
     * @return CI_Output|null
     */
    public function uploadEncImg()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'enc_string', 'label' => '인코딩이미지', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $this->load->helper('string');
        $file_name = time() . '_' . random_string();
        $sub_dir = '_tmp';

        $this->load->library('upload');
        $results = $this->upload->uploadEncImg('enc_string', $file_name, $sub_dir);
        if (is_array($results) === false) {
            return $this->json_error($results);
        }

        if (empty($results[0]) === true) {
            return $this->json_error('업로드 이미지가 없습니다.');
        }

        return $this->json_result(true, '업로드 되었습니다.', [], ['upload_img' => $results[0]['full_url']]);
    }

    /**
     * 파일 업로드
     * @return CI_Output|null
     */
    public function uploadFile()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'attach_file', 'label' => '첨부파일', 'rules' => 'callback_validateFileRequired[attach_file]'],
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $file_name = 'attach_' . time();
        $sub_dir = '_tmp';

        // 이미지 업로드
        $this->load->library('upload');
        $uploaded = $this->upload->uploadFile('img', ['attach_file'], [$file_name], $sub_dir, 'overwrite:false');
        if (is_array($uploaded) === false) {
            return $this->json_error($uploaded);
        }

        if (empty($uploaded[0]) === true) {
            return $this->json_error('업로드 파일이 없습니다.');
        }

        return $this->json_result(true, '업로드 되었습니다.', [], $uploaded);
    }

    /**
     * 페이지 캐시 생성 및 로드
     * @return void|null
     */
    public function pageCache()
    {
        $this->load->library('pageCache');

        if ($this->pagecache->cache() !== false) {
            return null;
        }

        echo '페이지 캐시 파일 생성시간 ==> ' . time();
    }

    /**
     * 타 URL 페이지 캐시 생성 및 로드
     * @return void|null
     */
    public function urlCache()
    {
        $this->load->library('pageCache');

        $url = 'https://www.dev.willbes.net/home/index';

        if ($this->pagecache->cache(600, $url) !== false) {
            return null;
        }

        echo '외부 URL 페이지 캐시 파일 생성에 실패했습니다.';
    }

    /**
     * 타 URL 페이지 캐시 생성
     */
    public function createCache()
    {
        $this->load->library('pageCache');

        $url = 'https://www.dev.willbes.net/home/index';
        $file_path = 'home_2000.php';

        $cache_file = $this->pagecache->create($url, $file_path);

        if ($cache_file === false) {
            echo '페이지 캐시 파일 생성에 실패했습니다.';
        }

        echo '페이지 캐시 파일 생성에 성공했습니다.';
    }

    /**
     * 페이지 캐시파일 로드
     */
    public function loadCache()
    {
        $this->load->library('pageCache');

        $file_path = 'home_2000.php';

        $this->pagecache->load($file_path);
    }

    /**
     * 페이지 캐시파일 제거
     */
    public function removeCache()
    {
        $this->load->library('pageCache');

        $file_path = 'home_2000.php';

        $is_removed = $this->pagecache->remove($file_path);

        if ($is_removed === false) {
            echo '페이지 캐시 파일 삭제에 실패했습니다.';
        }

        echo '페이지 캐시 파일 삭제에 성공했습니다.';
    }
}
