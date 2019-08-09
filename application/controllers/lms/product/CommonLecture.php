<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class CommonLecture extends \app\controllers\BaseController
{
    protected $models = array( 'sys/wCode','sys/site','sys/code','sys/category','product/base/course','product/base/subject','product/base/professor'
                                    ,'product/on/lecture'
                                    ,'product/on/lectureFree'
                                    ,'product/on/packageUser'
                                    ,'product/on/packageAdmin'
                                    ,'product/on/packagePeriod'
                                    ,'sys/btob'
                                    ,'product/off/offLecture'
                                    ,'product/off/offPackageAdmin'
                                    ,'product/on/commonLecture');

    protected $helpers = array('download');

    protected $copy_prodtype = null;    //복사타입 : 각 컨트롤러에서 정의

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 마스터강의 첨부파일 다운로드
     * @param array $fileinfo
     */
    public function download($fileinfo=[])
    {
        public_download($fileinfo[0],$fileinfo[1]);
    }

    /**
     * 강좌 신규/추천/사용 수정
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
        $result = $this->commonLectureModel->_modifyLectureByColumn(json_decode($this->_reqP('params'), true));
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    /**
     * 강좌복사
     */
    public function copy()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'prodCode', 'label' => '상품코드', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }
        $prodcode = $this->_reqP('prodCode');

        $result = $this->commonLectureModel->_prodCopy($prodcode, $this->copy_prodtype);
        $this->json_result($result,'복사 되었습니다.',$result);
    }

    /**
     * 강좌 개설/접수 변경 - 단과반,종합반 사용
     */
    public function reoption()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
        ];
        if ($this->validate($rules) === false) {
            return;
        }
        $result = $this->commonLectureModel->_modifyOptionByColumn($this->_reqP('prodCode'), $this->_reqP('IsLecOpen'), $this->_reqP('AcceptStatusCcd'));
        $this->json_result($result, '저장 되었습니다.', $result);
    }


    /**
     * 리스트내 정렬순서 변경
     */
    public function reorder()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '정렬순서', 'rules' => 'trim|required']
        ];
        if ($this->validate($rules) === false) {
            return;
        }
        $result = $this->commonLectureModel->_modifyLectureByOrder(json_decode($this->_reqP('params'), true));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

}