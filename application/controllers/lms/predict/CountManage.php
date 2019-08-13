<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CountManage extends \app\controllers\BaseController
{
    protected $models = array('predict/predict', 'predict/countManage');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = get_auth_on_off_site_codes('N', true);
        $def_site_code = key($arr_site_code);

        $condition = [
            'EQ' => [ 'PP.IsUse' => 'Y']
        ];
        list($predict_data, $predict_count) = $this->predictModel->mainList($condition);

        $this->load->view('predict/countManage/index',[
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code,
            'predict_data' => $predict_data
        ]);
    }

    public function create($params=[])
    {
        if(empty($params[0]) === true) {
            return $this->json_error('합격예측기본 정보가 없습니다.',_HTTP_NOT_FOUND);
        }

        $PredictIdx = $params[0];
        $data = $this->countManageModel->findCountManage($PredictIdx);

        $view_total = 0;
        $view_real = 0;
        $view_real_info = "0건(인증신청자) + 0건(채점자) + 0건(설문조사) + 0건(통합 프로모션PV) + 0건(소문내기 댓글) + 0건(적중 댓글) + 0건(해설강의 PV)";

        if(empty($data) == false) {
            $view_real = $data['view_real'];
            $view_total = $data['view_real'] + $data['MakeCount'];
            $view_real_info = $data['RegistCnt'].'건(인증신청자) + '.$data['ScoreCnt'].'건(채점자) + '.$data['SurveyCnt'].'건(설문조사) 
                                    + '.$data['PageViewCnt1'].'건(통합 프로모션PV) + '.$data['CommentCnt1'].'건(소문내기 댓글) + '.$data['CommentCnt2'].'건(적중 댓글) 
                                    + '.$data['PageViewCnt2'].'건(해설강의 PV)';
        }

        $this->load->view('predict/countManage/create_modal',[
            'PredictIdx' => $PredictIdx,
            'data' => $data,
            'view_total' => $view_total,
            'view_real' => $view_real,
            'view_real_info' => $view_real_info
        ]);
    }

    public function store()
    {
        $rules = [
            ['field'=>'MakeCount', 'label' => '생성수', 'rules' => 'trim|required'],
        ];

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->countManageModel->addCountManage($this->_reqP(null));
        $this->json_result($result,'저장 되었습니다.',$result);
    }

}