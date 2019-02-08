<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageCs extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'crm/cs/cs');
    protected $helpers = array();

    private $_groupCcd = '704';    //기술응대유형

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_base['issue_division_ccd'] = $this->codeModel->getCcd($this->_groupCcd);

        $this->load->view("crm/cs/index", [
            'arr_base' => $arr_base
        ]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'CS.IssueDivisionCcd' => $this->_reqP('search_issue_division_ccd'),
                'CS.IsStatus' => 'Y',
            ],
            'ORG' => [
                'LKB' => [
                    'CS.Title' => $this->_reqP('search_value'),
                    'CS.Content' => $this->_reqP('search_value')
                ]
            ]
        ];

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['CS.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $list = [];
        $count = $this->csModel->listManageCs(true, $arr_condition);

        if ($count > 0) {
            $list = $this->csModel->listManageCs(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['CS.CtmIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    public function create()
    {
        $method = 'POST';
        $data = null;
        $ctm_idx = null;

        $arr_base['issue_division_ccd'] = $this->codeModel->getCcd($this->_groupCcd);

        if (empty($params[0]) === false) {
            $column = '
            LB.BoardIdx, LB.SiteCode, LB.CampusCcd, LSC.CcdName AS CampusName, LBC.CateCode, LS.SiteName, LB.Title, LB.Content, LB.RegAdminIdx, LB.RegDatm, LB.IsBest, LB.IsUse,
            LB.ReadCnt, LB.SettingReadCnt, LBA.AttachFileIdx, LBA.AttachFilePath, LBA.AttachFileName, LBA.AttachRealFileName, ADMIN.wAdminName
            ';
            $method = 'PUT';
            $ctm_idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'CS.BoardIdx' => $ctm_idx,
                    'CS.IsStatus' => 'Y'
                ]
            ]);
            $data = $this->csModel->findCsForModify($column, $arr_condition);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view("crm/cs/create", [
            'method' => $method,
            'data' => $data,
            'ctm_idx' => $ctm_idx,
            'arr_base' => $arr_base
        ]);
    }
}