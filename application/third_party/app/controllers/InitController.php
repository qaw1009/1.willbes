<?php
namespace app\controllers;

defined('BASEPATH') OR exit('No direct script access allowed');

trait InitController
{
    // use models
    protected $models = array();
    // use helpers
    protected $helpers = array();
    // 컨트롤러 세션 사용 여부
    protected $sess_controller = true;
    // 세션 사용 컨트롤러 메소드 배열
    protected $sess_methods = array();

    /**
     * 컨트롤러 로드시 자동 실행
     */
    private function _init()
    {
        // 세션 라이브러리 로드
        if ($this->sess_controller === true || in_array($this->router->method, $this->sess_methods) === true) {
            $this->load->library('session');
        }

        // 모델 자동 로드
        $this->load->loadModels($this->models);

        // 헬퍼 자동 로드
        $this->load->helper($this->helpers);
    }

    /**
     * required if validation callback method (= laravel)
     * @param string $val
     * @param string $target_field [대상 필드명,대상 필드 값 (여러개의 값 중 1개의 값과 매칭되어야 할 경우 쉼표로 연결(,))]
     * @return bool
     */
    public function validateRequiredIf($val = '', $target_field = '')
    {
        $target_name = str_first_pos_before($target_field, ',');
        $target_values = explode(',', str_first_pos_after($target_field, ','));

        if (in_array($this->_reqP($target_name), $target_values) === true && empty($val) === true && strlen($val) < 1) {
            $this->form_validation->set_message(__FUNCTION__, '{field}은(는) 필수입니다.');
            return false;
        }
        return true;
    }

    /**
     * form input text validation callback method (checkbox, radio 제외)
     * @param string $val
     * @param string $field
     * @return bool
     */
    public function validateArrayRequired($val = '', $field = '')
    {
        list($field, $chk_cnt) = explode(',', $field);

        $arr_all_cnt = count($this->_reqP($field));
        $arr_empty_cnt = element('', array_count_values($this->_reqP($field)), 0);

        if (($chk_cnt == 'all' && $arr_empty_cnt != 0) || ($chk_cnt != 'all' && ($arr_all_cnt - $arr_empty_cnt < $chk_cnt))) {
            $this->form_validation->set_message(__FUNCTION__, '{field}은(는) 필수입니다.');
            return false;
        }
        return true;
    }

    /**
     * form input file validation callback method
     * @param string $val
     * @param string $field
     * @return bool
     */
    public function validateFileRequired($val = '', $field = '')
    {
        $this->form_validation->set_message(__FUNCTION__, '{field}은(는) 필수입니다.');
        return !empty($_FILES[$field]['size']);
    }

    /**
     * request 간소화 함수 (get / post 둘다 사용)
     * @param $index
     * @param bool $xss_clean
     * @return mixed
     */
    public function _req($index, $xss_clean = false)
    {
        return $this->input->get_post($index, $xss_clean);
    }

    /**
     * request 간소화 함수 (post 사용)
     * @param $index
     * @param bool $xss_clean
     * @return mixed
     */
    public function _reqP($index, $xss_clean = false)
    {
        return $this->input->post($index, $xss_clean);
    }

    /**
     * request 간소화 함수 (get 사용)
     * @param $index
     * @param bool $xss_clean
     * @return mixed
     */
    public function _reqG($index, $xss_clean = false)
    {
        return $this->input->get($index, $xss_clean);
    }

    /**
     * 캐쉬 데이터 리턴
     * @param string $driver [캐쉬명]
     * @param null|string $key [캐쉬 데이터 배열 키값]
     * @param string $site_id [캐쉬 데이터 최상위 배열 키값, 사이트 코드]
     * @return mixed
     */
    public function getCacheItem($driver, $key = null, $site_id = 'all')
    {
        is_object(@$this->caching) === false && $this->load->driver('caching');
        $this->caching->setDriver($driver);

        if (($items = $this->caching->{$driver}->get()) === false) {
            $items = [];
        }

        return $site_id == 'all' ? array_get($items, $key) : array_get(element($site_id, $items, []), $key);
    }
}
