<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Cp extends \app\controllers\BaseController
{
    protected $models = array('sys/cp','sys/code');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * cp 메인/목록
     */
    public function index()
    {
        $data = $this->cpModel->listAllCp();
        $this->load->view('sys/cp/index',[
            'data'=>$data
        ]);
    }

    /**
     * cp 등록 폼
     * @param array $params
     */
    public function createModal($params = [])
    {
        $method = 'POST';
        $cpidx = null;
        $data = null;
        //$list = [];

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $cpidx = $params[0];
            $data = $this->cpModel->findCpForModify($cpidx);

        }

        //공통코드 추출 (핸폰, 전화번호 국번)
        $codes = $this->codeModel->getCcdInArray(['101','102']);

        $this->load->view('sys/cp/create_modal',[
            'method' => $method
            ,'tel_ccd' => $codes['101']
            ,'hp_ccd' => $codes['102']
            ,'cpidx' => $cpidx
            ,'data' => $data
        ]);

    }

    /**
     * cp 등록/수정 프로세스
     */
    public function store()
    {
        $method = "add";

        $rules = [
            ['field' => 'cpname', 'label' => 'CP사명', 'rules' => 'trim|required']
            ,['field' => 'cpmanagername', 'label' => '담당자명', 'rules' => 'trim|required']
        ];


        if($this->validate($rules) === false) {
            return;
        }

        if(empty($this->_reqP('cpidx',false)) === false) {
            $method = "modify";
        }

        $result = $this->cpModel->{$method.'Cp'}($this->_reqP(null,false));

        $this->json_result($result,'저장 되었습니다.', $result);
    }

}


