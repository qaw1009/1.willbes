<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'bms/book', 'bms/publisher');
    protected $helpers = array();

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
        $arr_condition = [
            'EQ' => [
                'wSaleCcd' => $this->_reqP('search_sale_ccd')
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

        $list = [];
        $count = $this->bookModel->listBook(true, $arr_condition);

        if ($count > 0) {
            $list = $this->bookModel->listBook(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['wBookIdx' => 'desc']);

            // 사용하는 코드값 조회
            $codes = $this->codeModel->getCcd('112');

            // 출판사명, 교재 이미지 경로 추가
            $list = array_map(function ($arr) use ($codes) {
                $arr['wSaleCcdName'] = $codes[$arr['wSaleCcd']];
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

        $this->load->view('bms/book/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'sale_ccd' => $codes['112'],
            'edition_ccd' => $codes['113'],
            'publishers' => $publishers,
            'authors' => $authors,
            'selected_authors' => $selected_authors,
        ]);
    }

    /**
     * 교재 등록/수정
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
            return;
        }

        $result = $this->bookModel->{$method . 'Book'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}