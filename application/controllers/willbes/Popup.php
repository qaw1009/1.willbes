<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Popup extends \app\controllers\BaseController
{
    protected $models = array('popupF');
    protected $helpers = array();
    protected $sess_controller = false;  // 세션 사용안함

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
        $data = $this->popupFModel->findPopups($arr_input['section'], $arr_input['site_code'], element('cate_code', $arr_input, 0));
        if (empty($data) === true) {
            return '';
        }

        $data = array_map(function ($row) {
            $row['PopUpImgMapData'] = empty($row['PopUpImgMapData']) === false ? json_decode($row['PopUpImgMapData'], true) : '';
            return $row;
        }, $data);

        return $this->load->view('common/popup', [
            'data' => $data
        ]);
    }
}
