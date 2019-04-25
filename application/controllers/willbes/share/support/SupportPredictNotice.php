<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportPredictNotice extends BaseSupport
{
    protected $models = array('support/supportBoardF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx;
    protected $_default_path;
    protected $_paging_limit = 10;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $this->load->view('support/predict/notice', [
            'arr_input' => $arr_input
        ]);
    }

    /**
     * ajax list
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $predict_idx = element('predict_idx',$arr_input);
        $promotion_code = element('promotion_code',$arr_input);

        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'IsUse' => 'Y',
                'PredictIdx' => $predict_idx,
                'PromotionCode' => $promotion_code
            ]
        ];

        $column = 'BoardIdx, IsBest, RegType';
        $column .= ',Title, Content, (ReadCnt + SettingReadCnt) as TotalReadCnt';
        $column .= ',DATE_FORMAT(RegDatm, \'%Y-%m-%d\') as RegDatm';
        $order_by = ['IsBest'=>'Desc','BoardIdx'=>'Desc'];

        $list = [];
        $total_rows = $this->supportBoardFModel->listBoard(true, $arr_condition,'');
        $paging = $this->pagination('/support/predictNotice/listAjax/',$total_rows,$this->_paging_limit,$this->_paging_count,true);

        if ($total_rows > 0) {
            $list = $this->supportBoardFModel->listBoard(false,$arr_condition,'',$column,$paging['limit'],$paging['offset'],$order_by);
        }
        return $this->response([
            'paging' => $paging,
            'ret_data' => $list,
        ]);
    }

    /**
     * @return CI_Output
     */
    public function ajaxPaging()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $predict_idx = element('predict_idx',$arr_input);
        $promotion_code = element('promotion_code',$arr_input);

        $arr_condition = [
            'EQ' => [
                'BmIdx' => $this->_bm_idx,
                'IsUse' => 'Y',
                'PredictIdx' => $predict_idx,
                'PromotionCode' => $promotion_code
            ]
        ];

        $total_rows = $this->supportBoardFModel->listBoard(true, $arr_condition, '');
        $paging = $this->pagination('/support/predictNotice/listAjax/',$total_rows,$this->_paging_limit,$this->_paging_count,true);
        return $this->response([
            'paging' => $paging,
        ]);
    }
}