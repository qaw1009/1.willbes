<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'bms/book', 'bms/publisher');
    protected $helpers = array();
    private $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 교재 관리 인덱스
     */
    public function index()
    {
        // 사용하는 코드값 조회
        $codes = $this->codeModel->getCcd('112');

        $this->load->view('bms/book/index', [
            'sale_ccd' => $codes
        ]);
    }

    /**
     * 교재 관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->bookModel->listBook(true, $arr_condition);

        if ($count > 0) {
            $list = $this->bookModel->listBook(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy());

            // 교재 이미지 경로 추가
            $list = array_map(function ($arr) {
                $arr['wAttachImgSmName'] = str_replace($this->bookModel->_img_postfix, $this->bookModel->_thumb_postfixs['S'], $arr['wAttachImgName']);
                $arr['wAttachImgMdName'] = str_replace($this->bookModel->_img_postfix, $this->bookModel->_thumb_postfixs['M'], $arr['wAttachImgName']);
                $arr['wAttachImgLgName'] = str_replace($this->bookModel->_img_postfix, $this->bookModel->_thumb_postfixs['L'], $arr['wAttachImgName']);
                return $arr;
            }, $list);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 교재 관리 목록 조회조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        return [
            'EQ' => [
                'wSaleCcd' => $this->_reqP('search_sale_ccd'),
                'wIsPreSale' => $this->_reqP('search_is_pre_sale'),
                'wIsUse' => $this->_reqP('search_is_use'),
            ],
            'ORG1' => [
                'LKB' => [
                    'wBookIdx' => $this->_reqP('search_value'),
                    'wBookName' => $this->_reqP('search_value'),
                    'wIsbn' => $this->_reqP('search_value'),
                ]
            ],
            'ORG2' => [
                'LKB' => [
                    'wPublName' => $this->_reqP('search_publ_author'),
                    'wAuthorNames' => $this->_reqP('search_publ_author'),
                ]
            ],
        ];
    }

    /**
     * 교재 관리 목록 정렬조건 리턴
     * @return array
     */
    private function _getListOrderBy()
    {
        return ['wBookIdx' => 'desc'];
    }

    /**
     * 교재 관리 목록 엑셀다운로드
     */
    public function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $arr_condition = $this->_getListConditions();
        $column = 'wBookIdx, wBookName, wPublName, wAuthorNames, wIsbn, wOrgPrice, wStockCnt, wSaleCcdName, wIsUse, wRegAdminName, wRegDatm';
        $list = $this->bookModel->listBook($column, $arr_condition, null, null, $this->_getListOrderBy());

        $headers = ['교재코드', '교재명', '출판사', '저자', 'ISBN', '가격', '재고', '판매여부', '사용여부', '등록자', '등록일'];
        $numerics = ['wOrgPrice', 'wStockCnt'];    // 숫자형 변환 대상 컬럼
        $file_name = '교재목록(WBS)_' . $this->session->userdata('admin_idx') . '_' . date('YmdHis');

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $list, $headers, $numerics) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 교재 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $idx = null;
        $data = null;

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $idx = $params[0];
            $data = $this->bookModel->findBookForModify($idx);

            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 썸네일 이미지 명
            $data['wAttachImgSmName'] = str_replace($this->bookModel->_img_postfix, $this->bookModel->_thumb_postfixs['S'], $data['wAttachImgName']);
            $data['wAttachImgMdName'] = str_replace($this->bookModel->_img_postfix, $this->bookModel->_thumb_postfixs['M'], $data['wAttachImgName']);
            $data['wAttachImgLgName'] = str_replace($this->bookModel->_img_postfix, $this->bookModel->_thumb_postfixs['L'], $data['wAttachImgName']);

            // 교재 참조정보 조회
            $refer_data = $this->bookModel->listBookRefer($idx);
            $data['wReferStringData'] = element('S', $refer_data);  // 문자열 참조정보
            $data['wReferFileData'] = element('F', $refer_data);    // 첨부파일 참조정보
        }

        // 사용하는 코드값 조회
        $codes = $this->codeModel->getCcdInArray(['112', '113']);

        // 출판사 목록 조회
        $publishers = $this->publisherModel->getPublisherArray();

        // 저자 목록 조회
        $authors = $this->bookModel->listBookAuthor($idx);

        // 선택된 저자 목록
        $selected_authors = [];
        array_map(function ($arr) use (&$selected_authors) {
            if (empty($arr['wBAuthroIdx']) === false) {
                $selected_authors[] = $arr['wBAuthroIdx'];
            }
        }, $authors);

        // 교재참조정보 등록건수
        $refer_type_cnts = array_merge($this->bookModel->_refer_s_type, $this->bookModel->_refer_f_type);

        $this->load->view('bms/book/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'sale_ccd' => $codes['112'],
            'edition_ccd' => $codes['113'],
            'publishers' => $publishers,
            'authors' => $authors,
            'selected_authors' => $selected_authors,
            'refer_type_cnts' => $refer_type_cnts
        ]);
    }

    /**
     * 교재 등록/수정
     * @return CI_Output|null
     */
    public function store()
    {
        $rules = [
            ['field' => 'book_name', 'label' => '교재명', 'rules' => 'trim|required'],
            ['field' => 'publ_idx', 'label' => '출판사', 'rules' => 'trim|required'],
            ['field' => 'publ_date', 'label' => '출판일', 'rules' => 'trim|required'],
            ['field' => 'author_idx[0]', 'label' => '저자', 'rules' => 'trim|required'],
            ['field' => 'isbn', 'label' => 'ISBN', 'rules' => 'trim|required|numeric'],
            ['field' => 'page_cnt', 'label' => '페이지', 'rules' => 'trim|required|numeric'],
            ['field' => 'edition_ccd', 'label' => '신판여부', 'rules' => 'trim|required'],
            ['field' => 'edition_cnt', 'label' => '판', 'rules' => 'trim|required|numeric'],
            ['field' => 'print_cnt', 'label' => '쇄', 'rules' => 'trim|required|numeric'],
            ['field' => 'org_price', 'label' => '정가', 'rules' => 'trim|required|numeric'],
            ['field' => 'stock_cnt', 'label' => '재고', 'rules' => 'trim|required|numeric'],
            ['field' => 'sale_ccd', 'label' => '판매여부', 'rules' => 'trim|required'],
            ['field' => 'is_pre_sale', 'label' => '예약판매여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        if (empty($this->_reqP('idx')) === true) {
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'attach_img', 'label' => '교재이미지', 'rules' => 'callback_validateFileRequired[attach_img]'],
            ]);
        } else {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return null;
        }

        // 예약판매여부 체크
        if ($this->_reqP('sale_ccd') != '112001' && $this->_reqP('is_pre_sale') == 'Y') {
            return $this->json_error('판매여부가 판매중 일 경우만 예약판매 설정이 가능합니다.', _HTTP_BAD_REQUEST);
        }

        $result = $this->bookModel->{$method . 'Book'}($this->_reqP(null, false));

        return $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 교재 참조 첨부파일 삭제
     * @return CI_Output|null
     */
    public function destroyReferFile()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'refer_type', 'label' => '참조구분', 'rules' => 'trim|required'],
            ['field' => 'refer_idx', 'label' => '참조식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $result = $this->bookModel->removeReferFile($this->_reqP('refer_type'), $this->_reqP('refer_idx'), $this->_reqP('idx'));

        return $this->json_result($result, '저장 되었습니다.', $result);
    }
}