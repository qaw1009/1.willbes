<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookModel extends WB_Model
{
    private $_table = [
        'book' => 'wbs_bms_book',
        'book_r_author' => 'wbs_bms_book_r_author',
        'publisher' => 'wbs_bms_publisher',
        'author' => 'wbs_bms_author',
        'admin' => 'wbs_sys_admin'
    ];

    // 교재 원본 이미지 후첨자
    public $_img_postfix = '_og';
    // 교재 썸네일 이미지 후첨자
    public $_thumb_postfixs = [
        'S' => '_sm',
        'M' => '_md',
        'L' => '_lg'
    ];
    // 교재 썸네일 이미지 생성 비율
    private $_thumb_radio = [
        'S' => '50%',
        'M' => '150%',
        'L' => '200%'
    ];

    public function __construct()
    {
        parent::__construct('wbs');
    }

    /**
     * 교재 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function listBook($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '*';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $in_column = 'B.wBookIdx, B.wPublIdx, B.wBookName, B.wAttachImgPath, B.wAttachImgName, B.wOrgPrice, B.wStockCnt, B.wSaleCcd, B.wIsUse, B.wRegDatm, B.wRegAdminIdx
            , ifnull(A.wAuthorNames, "") as wAuthorNames, P.wPublName, A.wAdminName as wRegAdminName';

        $from = '
            from ' . $this->_table['book'] . ' as B 
                left join (
                    select GROUP_CONCAT(A.wAuthorName separator ", ") as wAuthorNames, BA.wBookIdx
                    from ' . $this->_table['author'] . ' as A 
                        inner join ' . $this->_table['book_r_author'] . ' as BA
                            on A.wAuthorIdx = BA.wAuthorIdx
                    where A.wIsStatus = "Y"
                        and BA.wIsStatus = "Y"
                    group by BA.wBookIdx                    
                ) as A
                    on B.wBookIdx = A.wBookIdx
                left join ' . $this->_table['publisher'] . ' as P
                    on B.wPublIdx = P.wPublIdx and P.wIsStatus = "Y"
                left join ' . $this->_table['admin'] . ' as A 
                    on B.wRegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
            where B.wIsStatus = "Y"';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . ' from (select ' . $in_column . $from . ') U ' . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 교재별 저자 목록 조회
     * @param int $book_idx
     * @return array
     */
    public function listBookAuthor($book_idx = 0)
    {
        $book_idx = (is_null($book_idx) === true) ? 0 : $book_idx;
        $column = 'A.wAuthorIdx, A.wAuthorName, ifnull(BA.wAuthorIdx, 0) as wBAuthroIdx';
        $from = '
            from ' . $this->_table['author'] . ' as A 
                left join ' . $this->_table['book_r_author'] . ' as BA
                    on A.wAuthorIdx = BA.wAuthorIdx and BA.wIsStatus = "Y" and BA.wBookIdx = ?	
            where A.wIsUse = "Y" and A.wIsStatus = "Y"
        ';
        $order_by_offset_limit = ' order by A.wAuthorName asc, BA.wBaIdx asc';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $order_by_offset_limit, [$book_idx]);

        return $query->result_array();
    }

    /**
     * 교재 데이터 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findBook($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['wIsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['book'], $column, $arr_condition);
    }

    /**
     * 교재 수정 폼에 필요한 데이터 조회
     * @param $book_idx
     * @return array
     */
    public function findBookForModify($book_idx)
    {
        $column = 'B.wBookIdx, B.wBookName, B.wPublIdx, B.wPublDate, B.wIsbn, B.wPageCnt, B.wEditionCcd, B.wEditionCnt, B.wPrintCnt, B.wEditionSize, B.wOrgPrice, B.wStockCnt, B.wSaleCcd, B.wKeyword';
        $column .= ' , B.wBookDesc, B.wAuthorDesc, B.wTableDesc, B.wAttachImgPath, B.wAttachImgName, B.wIsUse, B.wRegDatm, B.wRegAdminIdx, B.wUpdDatm, B.wUpdAdminIdx';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = B.wRegAdminIdx and wIsStatus = "Y") as wRegAdminName';
        $column .= ' , if(B.wUpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = B.wUpdAdminIdx and wIsStatus = "Y")) as wUpdAdminName';

        return $this->_conn->getFindResult($this->_table['book'] . ' as B', $column, [
            'EQ' => ['B.wBookIdx' => $book_idx, 'B.wIsStatus' => 'Y']
        ]);
    }

    /**
     * 교재 등록
     * @param array $input
     * @return array|bool
     */
    public function addBook($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $data = [
                'wBookName' => element('book_name', $input),
                'wPublIdx' => element('publ_idx', $input),
                'wPublDate' => element('publ_date', $input),
                'wIsbn' => element('isbn', $input),
                'wPageCnt' => element('page_cnt', $input),
                'wEditionCcd' => element('edition_ccd', $input),
                'wEditionCnt' => element('edition_cnt', $input),
                'wPrintCnt' => element('print_cnt', $input),
                'wEditionSize' => element('edition_size', $input),
                'wOrgPrice' => element('org_price', $input),
                'wStockCnt' => element('stock_cnt', $input),
                'wSaleCcd' => element('sale_ccd', $input),
                'wKeyword' => element('keyword', $input),
                'wBookDesc' => element('book_desc', $input),
                'wAuthorDesc' => element('author_desc', $input),
                'wTableDesc' => element('table_desc', $input),
                'wIsUse' => element('is_use', $input),
                'wRegAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            // 데이터 등록
            if ($this->_conn->set($data)->insert($this->_table['book']) === false) {
                throw new \Exception('교재 등록에 실패했습니다.');
            }

            // 등록된 교재 식별자
            $book_idx = $this->_conn->insert_id();

            // 교재별 저자 등록
            if ($this->replaceBookAuthor(element('author_idx', $input), $book_idx) !== true) {
                throw new \Exception('저자 등록에 실패했습니다.');
            }

            // 첨부 이미지 업로드
            $data = [];
            $this->load->library('upload');
            $upload_sub_dir = config_item('upload_prefix_dir') . '/book/' . date('Y') . '/' . $book_idx;

            $uploaded = $this->upload->uploadFile('img', ['attach_img'], ['book_' . $book_idx . $this->_img_postfix], $upload_sub_dir, 'allowed_types:jpg');
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            if (count($uploaded) > 0) {
                // 첨부 이미지 정보 업데이트
                $data['wAttachImgName'] = $uploaded[0]['file_name'];
                $data['wAttachImgPath'] = $this->upload->_upload_url . $upload_sub_dir . '/';

                // 썸네일 생성
                $this->load->library('image_lib');
                $new_imgs = $this->image_lib->getThumbImgNames($uploaded[0]['file_name'], $this->_thumb_postfixs);
                $is_thumb = $this->image_lib->createThumbImgs($uploaded[0]['full_path'], $new_imgs, array_values($this->_thumb_radio));
                if ($is_thumb === false) {
                    throw new \Exception($is_thumb);
                }

                if ($this->_conn->set($data)->where('wBookIdx', $book_idx)->update($this->_table['book']) === false) {
                    throw new \Exception('교재 이미지 등록에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;        
    }

    /**
     * 교재 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyBook($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $book_idx = element('idx', $input);

            // 기존 교재 기본정보 조회
            $row = $this->findBookForModify($book_idx);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 백업 데이터 등록
            $this->addBakData($this->_table['book'], ['wBookIdx' => $book_idx]);

            $data = [
                'wBookName' => element('book_name', $input),
                'wPublIdx' => element('publ_idx', $input),
                'wPublDate' => element('publ_date', $input),
                'wIsbn' => element('isbn', $input),
                'wPageCnt' => element('page_cnt', $input),
                'wEditionCcd' => element('edition_ccd', $input),
                'wEditionCnt' => element('edition_cnt', $input),
                'wPrintCnt' => element('print_cnt', $input),
                'wEditionSize' => element('edition_size', $input),
                'wOrgPrice' => element('org_price', $input),
                'wStockCnt' => element('stock_cnt', $input),
                'wSaleCcd' => element('sale_ccd', $input),
                'wKeyword' => element('keyword', $input),
                'wBookDesc' => element('book_desc', $input),
                'wAuthorDesc' => element('author_desc', $input),
                'wTableDesc' => element('table_desc', $input),
                'wIsUse' => element('is_use', $input),
                'wUpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            if ($this->_conn->set($data)->where('wBookIdx', $book_idx)->update($this->_table['book']) === false) {
                throw new \Exception('교재 기본정보 수정에 실패했습니다.');
            }

            // 교재별 저자 등록
            if ($this->replaceBookAuthor(element('author_idx', $input), $book_idx) !== true) {
                throw new \Exception('저자 등록에 실패했습니다.');
            }

            // 파일 업로드
            $data = [];
            $this->load->library('upload');
            $this->load->library('image_lib');
            $upload_sub_dir = config_item('upload_prefix_dir') . '/book/' . substr($row['wRegDatm'], 0, 4) . '/' . $book_idx;
            $bak_uploaded_files = [];

            // 첨부 이미지 삭제
            if (element('attach_img_delete', $input) == 'Y') {
                $bak_uploaded_files = array_merge([$row['wAttachImgPath'] . $row['wAttachImgName']],
                    $this->image_lib->getThumbImgNames($row['wAttachImgPath'] . $row['wAttachImgName'], $this->_thumb_postfixs));

                $data['wAttachImgName'] = '';
            }

            // 첨부 이미지 업로드
            $uploaded = $this->upload->uploadFile('img', ['attach_img'], ['book_' . $book_idx . $this->_img_postfix . '_' . time()], $upload_sub_dir, 'allowed_types:gif|jpg|jpeg|png,overwrite:false');
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            if (count($uploaded) > 0) {
                $data['wAttachImgName'] = $uploaded[0]['file_name'];
                $data['wAttachImgPath'] = $this->upload->_upload_url . $upload_sub_dir . '/';

                // 썸네일 생성
                $new_imgs = $this->image_lib->getThumbImgNames($uploaded[0]['file_name'], $this->_thumb_postfixs);
                $is_thumb = $this->image_lib->createThumbImgs($uploaded[0]['full_path'], $new_imgs, array_values($this->_thumb_radio));
                if ($is_thumb === false) {
                    throw new \Exception($is_thumb);
                }

                // 기존 업로드된 첨부 이미지 정보
                $bak_uploaded_files = array_merge([$row['wAttachImgPath'] . $row['wAttachImgName']],
                    $this->image_lib->getThumbImgNames($row['wAttachImgPath'] . $row['wAttachImgName'], $this->_thumb_postfixs));
            }

            // 수정, 삭제된 첨부 이미지 백업
            $is_bak_uploaded_file = $this->upload->bakUploadedFile(array_unique($bak_uploaded_files), true);
            if ($is_bak_uploaded_file !== true) {
                throw new \Exception($is_bak_uploaded_file);
            }

            if (count($data) > 0) {
                if ($this->_conn->set($data)->where('wBookIdx', $book_idx)->update($this->_table['book']) === false) {
                    throw new \Exception('교재 이미지 수정에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();

            // 판매여부, 사용여부가 변경되었을 경우만 단강좌 json 데이터 업데이트
            if ($row['wIsUse'] != element('is_use', $input) || $row['wSaleCcd'] != element('sale_ccd', $input)) {
                $this->_replaceLmsProdJsonData($book_idx);
            }
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 교재별 저자 등록
     * @param array $arr_author_idx
     * @param $book_idx
     * @return bool|string
     */
    public function replaceBookAuthor($arr_author_idx, $book_idx)
    {
        try {
            $_table = $this->_table['book_r_author'];
            $arr_author_idx = (is_null($arr_author_idx) === true) ? [] : array_values(array_unique($arr_author_idx));
            $admin_idx = $this->session->userdata('admin_idx');

            // 기존 설정된 저자 조회
            $data = $this->_conn->getListResult($_table, 'wAuthorIdx', ['EQ' => ['wBookIdx' => $book_idx, 'wIsStatus' => 'Y']]);
            if (count($data) > 0) {
                $data = array_pluck($data, 'wAuthorIdx');

                // 기존 등록된 저자 삭제 처리 (전달된 저자 식별자 중에 기 등록된 저자 식별자가 없다면 삭제 처리)
                foreach ($data as $ori_author_idx) {
                    if (in_array($ori_author_idx, $arr_author_idx) === false) {
                        // 백업 데이터 등록
                        $this->addBakData($_table, ['wBookIdx' => $book_idx, 'wAuthorIdx' => $ori_author_idx]);

                        $is_update = $this->_conn->set([
                            'wIsStatus' => 'N',
                            'wUpdAdminIdx' => $admin_idx
                        ])->where('wBookIdx', $book_idx)->where('wAuthorIdx', $ori_author_idx)->update($_table);

                        if ($is_update === false) {
                            throw new \Exception('기 설정된 저자 수정에 실패했습니다.');
                        }
                    }
                }
            }

            // 신규 등록 (기 등록된 저자 식별자 중에 전달된 저자 식별자가 없다면 등록 처리)
            foreach ($arr_author_idx as $author_idx) {
                if (empty($author_idx) === false && in_array($author_idx, $data) === false) {
                    $is_insert = $this->_conn->set([
                        'wBookIdx' => $book_idx,
                        'wAuthorIdx' => $author_idx,
                        'wRegAdminIdx' => $admin_idx
                    ])->insert($_table);

                    if ($is_insert === false) {
                        throw new \Exception('저자 등록에 실패했습니다.');
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 해당 교재와 연관된 단강좌 json 데이터 업데이트
     * @param $book_idx
     * @return bool|string
     */
    private function _replaceLmsProdJsonData($book_idx)
    {
        $this->load->loadModels(['_lms/pay/salesProduct']);
        return $this->salesProductModel->replaceProdJsonDataByWBookIdx($book_idx);
    }
}
