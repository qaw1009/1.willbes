<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/boardMaster');
    protected $helpers = array();
    private $bmType_groupCcd = '601';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 게시판생성관리 인덱스 (리스트페이지)
     */
    public function index()
    {
        //게시판타입
        $bmType_list = $this->codeModel->getCcd($this->bmType_groupCcd);

        $data = $this->boardMasterModel->listAllBoardMaster('');
        $this->load->view('sys/board/index',[
            'bmType_list' => $bmType_list,
            'data' => $data
        ]);
    }

    /**
     * 게시판 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $bmidx = null;
        $data = null;
        //일방향옵션셋팅
        $set_onewayoptions = [
            '1' => '로그인필수',
            '2' => '댓글 적용'
        ];
        //쌍방향옵션셋팅
        $set_twowayoptions = [
            '1' => '1:1게시'
        ];
        $onewayoptions = [];
        $twowayoptions = [];

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $bmidx = $params[0];
            $data = $this->boardMasterModel->findBoardMasterForModify($bmidx);

            //일방향,쌍방향 데이터 배열선언
            $onewayoptions = explode(',', $data['OneWayOption']);
            $twowayoptions = explode(',', $data['TwoWayOption']);
        }

        //게시판타입
        $bmType_list = $this->codeModel->getCcd($this->bmType_groupCcd);

        $this->load->view('sys/board/create', [
            'method' => $method,
            'bm_idx' => $bmidx,
            'data' => $data,
            'bmType_list' => $bmType_list,
            'set_onewayoptions' => $set_onewayoptions,
            'set_twowayoptions' => $set_twowayoptions,
            'data_onewayoptions' => $onewayoptions,
            'data_twowayoptions' => $twowayoptions
        ]);
    }

    /**
     * 게시판타입 등록/수정 처리
     */
    public function store()
    {
        $method = 'add';
        /*$rules = [
            ['field'=>'bm_type_ccd','label'=>'게시판타입','rules'=>'trim|required'],
            ['field'=>'bm_name','label'=>'게시판명','rules'=>'required'],
        ];

        if($this->validate($rules) === false) {
            return;
        }*/

        if(empty($this->_reqP('bm_idx',false)) === false) {
            $method = 'modify';
        }

        $result = $this->boardMasterModel->{$method.'BoardMaster'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}