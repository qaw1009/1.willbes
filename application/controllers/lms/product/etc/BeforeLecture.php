<?
defined('BASEPATH') OR exit('No direct script access allowed');

Class BeforeLecture extends \app\controllers\BaseController
{
    protected $models = array( 'sys/wCode','sys/site','sys/code','product/on/lecture','product/off/offlecture','product/etc/beforelecture');


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
        $count = $this->beforelectureModel->listLecture(true, $arr_condition);

        if ($count > 0) {
            $list = $this->beforelectureModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.BlIdx' => 'desc']);
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
        $data_sale_ess = null;
        $data_sale_cho = null;
        $data_product = null;

        if(empty($params[0]) === false) {
            $method='PUT';
            $blidx = $params[0];
            $data = $this->beforelectureModel->_findBeforeLectureForModify($blidx);
            $data_sale_ess =$this->beforelectureModel->_findBeforeLectureSaleForModify($blidx,'E');
            $data_sale_cho =$this->beforelectureModel->_findBeforeLectureSaleForModify($blidx,'C');
            $data_product =$this->beforelectureModel->_findBeforeLectureProductForModify($blidx);

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

        $result = $this->beforelectureModel->{$method.'BeforeLecture'}($this->_reqP(null));
        //var_dump($result);exit;
        $this->json_result($result, '저장 되었습니다.', $result);
    }


}