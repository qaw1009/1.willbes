<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CountManager extends \app\controllers\BaseController
{
    protected $models = array('predict/predict');
    protected $helpers = array();
    private $_cnt_type = [1,2,3];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //합격예측데이터 조회
        list($predict_data, $predict_count) = $this->_getPredictData();

        $arr_condition_1 = ['EQ' => ['CntType' => $this->_cnt_type[0]]];
        $arr_condition_2 = ['EQ' => ['CntType' => $this->_cnt_type[1]]];
        $arr_condition_3 = ['EQ' => ['CntType' => $this->_cnt_type[2]]];
        $data1 = $this->predictModel->findPredictCnt($arr_condition_1);
        $data2 = $this->predictModel->findPredictCnt($arr_condition_2);
        $data3 = $this->predictModel->findPredictCnt($arr_condition_3);

        $arr_data = [
            $this->_cnt_type[0] => [
                'real_count' => '1000',
                'cnt_idx' => $data1['PcIdx'],
                'add_count' => $data1['AddCnt'],
                'predict_idx' => $data1['PredictIdx'],
                'cnt_rule' => '500명(사전예약) + 800명(채점) +100건(소문) + 100건(랜덤) + 100건 (PV)'
            ],
            $this->_cnt_type[1] => [
                'real_count' => '2000',
                'cnt_idx' => $data2['PcIdx'],
                'add_count' => $data2['AddCnt'],
                'predict_idx' => $data2['PredictIdx'],
                'cnt_rule' => '500명(사전예약) + 800명(채점) + 100건(소문) + 100건(LIVE) + 100건(적중) + 100건(설문) +<br> 
                               100건(해설강의) + 100건(봉투모의고사) + 100건(최신판례특강) + 100건(시크릿다운) +<br>
                               100건(랜덤) + 100건 (PV)'
            ],
            $this->_cnt_type[2] => [
                'real_count' => '3000',
                'cnt_idx' => $data3['PcIdx'],
                'add_count' => $data3['AddCnt'],
                'predict_idx' => $data3['PredictIdx'],
                'cnt_rule' => '500명(사전예약) + 800명(채점) + 100건(소문) +100건(적중) + 100건(설문) + 100건(해설강의) +<br> 
                               100건(봉투모의고사) + 100건(최신판례특강) + 100건(시크릿다운) + 100건(랜덤) + 100건 (PV)'
            ]
        ];

        $this->load->view("predict/countManager/index", [
            'arr_predict_data' => $predict_data,
            'arr_data' => $arr_data
        ]);
    }

    public function store()
    {
        $method = 'add';
        $idx = '';

        $rules = [
            ['field' => 'predict_idx', 'label' => '합격예측기본데이터', 'rules' => 'trim|required|integer'],
            ['field' => 'add_count', 'label' => '생성', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('idx');
        }

        //_addBoard, _modifyBoard
        $result = $this->predictModel->{$method . 'PredictCnt'}($this->_reqP(null, false), $idx);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 합격예측정보데이터 조회
     * @return array
     */
    private function _getPredictData()
    {
        $condition = [
            'EQ' => [
                'PP.IsUse' => 'Y'
            ]
        ];
        return $this->predictModel->mainList($condition);
    }
}