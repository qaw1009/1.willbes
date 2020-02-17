<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class BeforeLecture extends \app\controllers\BaseController
{
    protected $models = array( 'sys/wCode','sys/site','sys/code','product/on/lecture','product/off/offLecture','product/etc/beforeLecture');


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('product/etc/beforelecture/index');
    }

    /**
     * 강좌목록 추출
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'A.SiteCode' => $this->_reqP('search_site_code'),
                'A.LecType' => $this->_reqP('search_lectype_ccd'),
                'A.IsDup' => $this->_reqP('search_is_dup'),
                'A.IsUse' => $this->_reqP('search_is_use'),
            ],
        ];

        if( !empty($this->_reqP('search_type')) && !empty($this->_reqP('search_value')) ) {

                $arr_condition = array_merge($arr_condition, [
                    'ORG1' => [
                        'LKB' => [
                            'prodname_' . $this->_reqP('search_type') => $this->_reqP('search_value'),
                            'prodcode_' . $this->_reqP('search_type') => $this->_reqP('search_value')
                        ]
                    ],
                ]);

            if( $this->_reqP('search_type') === 'ess' ) {   //선택까지 검색
                $arr_condition = array_merge_recursive($arr_condition, [
                    'ORG1' => [
                        'LKB' => [
                            'prodname_cho' => $this->_reqP('search_value'),
                            'prodcode_cho' => $this->_reqP('search_value')
                        ]
                    ],
                ]);
            }
        }

        //var_dump($arr_condition);

        $list = [];
        $count = $this->beforeLectureModel->listLecture(true, $arr_condition);

        if ($count > 0) {
            $list = $this->beforeLectureModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.BlIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 강좌 등록 / 수정
     * @param array $params
     */
    public function create($params=[])
    {
        $method = 'POST';

        $blidx = null;
        $data = null;
        $data_sale_ess = [];
        $data_sale_cho = [];
        $data_product = [];

        if(empty($params[0]) === false) {
            $method='PUT';
            $blidx = $params[0];
            $data = $this->beforeLectureModel->_findBeforeLectureForModify($blidx);
            $data_sale_ess =$this->beforeLectureModel->_findBeforeLectureSaleForModify($blidx,'E');
            $data_sale_cho =$this->beforeLectureModel->_findBeforeLectureSaleForModify($blidx,'C');
            $data_product =$this->beforeLectureModel->_findBeforeLectureProductForModify($blidx);
        }

        $this->load->view('product/etc/beforelecture/create',[
            'method'=>$method
            ,'BlIdx' => $blidx
            ,'data'=>$data
            ,'data_sale_ess' => $data_sale_ess
            ,'data_sale_cho' => $data_sale_cho
            ,'data_product' => $data_product
        ]);
    }


    /**
     * 처리 프로세스
     */
    public function store()
    {
        $method = 'add';

        $rules = [

            ['field'=>'LecType', 'label' => '선수강좌유형', 'rules' => 'trim|required'],
            ['field'=>'ValidPeriodStartDate', 'label' => '유효기간', 'rules' => 'trim|required'],
            ['field'=>'ValidPeriodEndDate', 'label' => '유효기간', 'rules' => 'trim|required'],
        ];

        if(empty($this->_reqP('BlIdx',false))===true) {

            $rules = array_merge($rules,[
                ['field'=>'site_code','label'=>'운영사이트', 'rules'=>'trim|required'],
            ]);

        } else {
            $rules = array_merge($rules,[
                ['field'=>'BlIdx','label'=>'선수강코드', 'rules'=>'trim|required'],
            ]);

            $method='modify';
        }

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->beforeLectureModel->{$method.'BeforeLecture'}($this->_reqP(null));
        //var_dump($result);exit;
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 강좌 사용 수정
     */
    public function redata()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '상태값', 'rules' => 'trim|required']
        ];
        if ($this->validate($rules) === false) {
            return;
        }
        $result = $this->beforeLectureModel->_modifyLectureByColumn(json_decode($this->_reqP('params'), true));
        $this->json_result($result, '적용 되었습니다.', $result);
    }
}