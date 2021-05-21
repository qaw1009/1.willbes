<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Popup extends \app\controllers\BaseController
{
    protected $models = array('popupF','access/accessF');
    protected $helpers = array();
    protected $sess_controller = false;  // 세션 사용안함
    protected $sess_methods = array('click');   // 세션 사용 메소드

    // 팝업구분 공통코드 (레이어팝업, 모달팝업, 하단고정팝업)
    private $_popup_type_ccd = ['717001' => 'layer', '717002' => 'modal', '717003' => 'bnBottom'];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 팝업 노출
     * @return mixed
     */
    public function show()
    {
        $arr_input = $this->_reqG(null);

        if (empty($arr_input['site_code']) === true || empty($arr_input['section']) === true) {
            return '';
        }

        // 데이터 조회
        $data = $this->popupFModel->findPopups($arr_input['section'], $arr_input['site_code'], element('cate_code', $arr_input, null), element('campus_ccd', $arr_input, ''), element('prof_idx', $arr_input));
        if (empty($data) === true) {
            return '';
        }

        $data = array_map(function ($row) {
            $row['PopUpImgMapData'] = empty($row['PopUpImgMapData']) === false ? json_decode($row['PopUpImgMapData'], true) : '';
            return $row;
        }, $data);

        return $this->load->view('common/popup', [
            'data' => $data,
            'arr_popup_type_ccd' => $this->_popup_type_ccd
        ]);
    }

    /**
     * 팝업클릭 (접속로그 저장)
     */
    public function click()
    {
        $popup_idx = $this->_reqG('popup_idx');
        $return_url = $this->_reqG('return_url');
        $link_url_type = $this->_reqG('link_url_type'); //외부, 내부 링크 타입

        if(empty($popup_idx) === false && is_numeric($popup_idx) === true && empty($return_url) === false) {
            // 로그 저장
            $this->accessFModel->saveLog('popup', $popup_idx);

            if (empty($link_url_type) === true || $link_url_type == 'I') {
                $return_url = '//' . (strpos($return_url, config_item('base_domain')) === false ? $return_url : app_to_env_url($return_url));
            }
            redirect($return_url);
        } else {
            redirect(app_url('/home/index', 'www'));
        }
    }
}
