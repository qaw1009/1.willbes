<?php
namespace app\controllers;

defined('BASEPATH') OR exit('No direct script access allowed');

trait InitController
{
    // use models
    protected $models = array();
    // use helpers
    protected $helpers = array();

    /**
     * 컨트롤러 로드시 자동 실행
     */
    private function _init()
    {
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

        if (in_array($this->_reqP($target_name), $target_values) === true && empty($val) === true) {
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
}
