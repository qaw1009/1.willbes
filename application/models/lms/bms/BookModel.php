<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'code' => 'lms_sys_code',
        'category' => 'lms_sys_category',
        'subject' => 'lms_product_subject',
        'professor' => 'lms_professor',
        'pms_professor' => 'wbs_pms_professor',
        'book' => 'lms_book',
        'bms_book' => 'wbs_bms_book',
        'vw_bms_book' => 'vw_wbs_bms_book_list',
        'book_r_category' => 'lms_book_r_category',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 교재관리 목록 조회
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
            $column = '
                B.BookIdx, B.wBookIdx, B.SiteCode, B.BookName, B.SalePrice, B.IsNew, B.IsBest, B.IsUse, B.RegDatm, B.RegAdminIdx
                    , VWB.wPublName, VWB.wAuthorNames, VWB.wStockCnt, VWB.wSaleCcdName, VWB.wIsUse
                    , S.SiteName, C.CateName as BCateName, ifnull(MC.CateName, "") as MCateName, PS.SubjectName, WP.wProfName
                    , A.wAdminName as RegAdminName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['book'] . ' as B
                inner join ' . $this->_table['vw_bms_book'] . ' as VWB
                    on B.wBookIdx = VWB.wBookIdx
                inner join ' . $this->_table['site'] . ' as S
                    on B.SiteCode = S.SiteCode
                left join ' . $this->_table['book_r_category'] . ' as BC
                    on B.BookIdx = BC.BookIdx and BC.IsStatus = "Y"
                left join ' . $this->_table['category'] . ' as C
                    on BC.CateCode = C.CateCode and C.CateDepth = 1 and C.IsStatus = "Y"
                left join ' . $this->_table['category'] . ' as MC
                    on C.CateCode = MC.GroupCateCode and MC.CateDepth = 2 and MC.IsStatus = "Y"
                left join ' . $this->_table['subject'] . ' as PS
                    on B.SiteCode = PS.SiteCode and B.SubjectIdx = PS.SubjectIdx and PS.IsStatus = "Y"
                left join ' . $this->_table['professor'] . ' as P
                    on B.SiteCode = P.SiteCode and B.ProfIdx = P.ProfIdx and P.IsStatus = "Y"
                left join ' . $this->_table['pms_professor'] . ' as WP
                    on P.wProfIdx = WP.wProfIdx	and WP.wIsStatus = "Y"
                left join ' . $this->_table['admin'] . ' as A
                    on B.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
            where B.IsStatus = "Y"	
                and VWB.wIsStatus = "Y"	                
                and S.IsStatus = "Y" 
        ';

        // 사이트 권한 추가
        $arr_condition['IN']['B.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 교재 카테고리 연결 데이터 조회
     * @param $book_idx
     * @return array
     */
    public function listBookCategory($book_idx)
    {
        $column = '
            BC.CateCode, C.CateName
                , ifnull(PC.CateCode, "") as ParentCateCode, ifnull(PC.CateName, "") as ParentCateName
                , concat(if(PC.CateCode is null, "", concat(PC.CateName, " > ")), C.CateName) as CateRouteName            
        ';
        $from = '
            from ' . $this->_table['book_r_category'] . ' as BC
                inner join ' . $this->_table['category'] . ' as C
                    on BC.CateCode = C.CateCode
                left join ' . $this->_table['category'] . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsUse = "Y" and PC.IsStatus = "Y"
        ';
        $where = ' where BC.BookIdx = ? and BC.IsStatus = "Y" and C.IsUse = "Y" and C.IsStatus = "Y"';
        $order_by_offset_limit = ' order by BC.BcIdx asc';

        // 쿼리 실행
        $data = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$book_idx])->result_array();

        return array_pluck($data, 'CateRouteName', 'CateCode');
    }

    /**
     * 교재 코드 목록 조회
     * @param string $site_code
     * @return array
     */
    public function getBookArray($site_code = '')
    {
        $arr_condition = ['EQ' => ['IsUse' => 'Y', 'IsStatus' => 'Y']];
        if (empty($site_code) === false) {
            $arr_condition['EQ']['SiteCode'] = $site_code;
        } else {
            $arr_condition['IN']['SiteCode'] = get_auth_site_codes();
        }

        $data = $this->_conn->getListResult($this->_table['book'], 'SiteCode, BookIdx, BookName', $arr_condition, null, null, [
            'SiteCode' => 'asc', 'BookIdx' => 'asc'
        ]);

        return (empty($site_code) === false) ? array_pluck($data, 'BookName', 'BookIdx') : $data;
    }

    /**
     * 교재 정보 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findBook($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['book'], $column, $arr_condition);
    }
    
    /**
     * 교재 정보 수정 폼에 필요한 데이터 조회
     * @param $book_idx
     * @return array
     */
    public function findBookForModify($book_idx)
    {
        $column = '
            B.BookIdx, B.wBookIdx, B.SiteCode, B.BookName, B.PrepareYear, B.CourseIdx, B.SubjectIdx, B.ProfIdx, B.DispTypeCcd, B.IsFree, B.SalePrice, B.DcAmt, B.DcType
                , B.IsPointSaving, B.PointSavingAmt, B.PointSavingType, B.IsCoupon, B.IsNew, B.IsBest, B.IsUse, B.RegDatm, B.RegAdminIdx, B.UpdDatm, B.UpdAdminIdx
                , VWB.wBookName, VWB.wPublName, VWB.wPublDate, VWB.wAuthorNames, VWB.wIsbn, VWB.wPageCnt, VWB.wEditionCcdName, VWB.wPrintCnt, VWB.wEditionCnt, VWB.wEditionSize
                , VWB.wSaleCcd, VWB.wSaleCcdName, VWB.wOrgPrice, VWB.wStockCnt, VWB.wBookDesc, VWB.wAuthorDesc, VWB.wTableDesc, VWB.wIsUse  
                , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = B.RegAdminIdx and wIsStatus = "Y") as RegAdminName
                , if(B.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = B.UpdAdminIdx and wIsStatus = "Y")) as UpdAdminName        
        ';

        return $this->_conn->getJoinFindResult($this->_table['book'] . ' as B', 'inner', $this->_table['vw_bms_book'] . ' as VWB'
            , 'B.wBookIdx = VWB.wBookIdx'
            , $column, ['EQ' => ['B.BookIdx' => $book_idx, 'B.IsStatus' => 'Y', 'VWB.wIsStatus' => 'Y']]);
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
                'wBookIdx' => element('wbook_idx', $input),
                'SiteCode' => element('site_code', $input),
                'BookName' => element('book_name', $input),
                'PrepareYear' => element('prepare_year', $input),
                'CourseIdx' => element('course_idx', $input),
                'SubjectIdx' => element('subject_idx', $input),
                'ProfIdx' => element('prof_idx', $input),
                'DispTypeCcd' => element('disp_type_ccd', $input),
                'IsFree' => element('is_free', $input),
                'SalePrice' => element('sale_price', $input),
                'DcAmt' => element('dc_amt', $input, 0),
                'DcType' => element('dc_type', $input, 'R'),
                'IsPointSaving' => element('is_point_saving', $input),
                'PointSavingAmt' => element('point_saving_amt', $input, 0),
                'PointSavingType' => element('point_saving_type', $input, 'R'),
                'IsCoupon' => element('is_coupon', $input),
                'IsNew' => element('is_new', $input, 'N'),
                'IsBest' => element('is_best', $input, 'N'),
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            // 데이터 등록
            if ($this->_conn->set($data)->insert($this->_table['book']) === false) {
                throw new \Exception('교재 정보 등록에 실패했습니다.');
            }

            // 등록된 교재 식별자
            $book_idx = $this->_conn->insert_id();

            // 카테고리 정보 등록
            $is_book_category = $this->_replaceBookCategory([element('cate_code', $input)], $book_idx);
            if ($is_book_category !== true) {
                throw new \Exception($is_book_category);
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 교재 수정 (카테고리 정보 수정 불가)
     * @param array $input
     * @return array|bool
     */
    public function modifyBook($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $book_idx = element('idx', $input);

            // 기존 교재 기본정보 조회
            $row = $this->findBook('BookIdx', ['EQ' => ['BookIdx' => $book_idx]]);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $data = [
                'BookName' => element('book_name', $input),
                'PrepareYear' => element('prepare_year', $input),
                'CourseIdx' => element('course_idx', $input),
                'SubjectIdx' => element('subject_idx', $input),
                'ProfIdx' => element('prof_idx', $input),
                'DispTypeCcd' => element('disp_type_ccd', $input),
                'IsFree' => element('is_free', $input),
                'SalePrice' => element('sale_price', $input),
                'DcAmt' => element('dc_amt', $input, 0),
                'DcType' => element('dc_type', $input, 'R'),
                'IsPointSaving' => element('is_point_saving', $input),
                'PointSavingAmt' => element('point_saving_amt', $input, 0),
                'PointSavingType' => element('point_saving_type', $input, 'R'),
                'IsCoupon' => element('is_coupon', $input),
                'IsNew' => element('is_new', $input, 'N'),
                'IsBest' => element('is_best', $input, 'N'),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            // 데이터 수정
            if ($this->_conn->set($data)->where('BookIdx', $book_idx)->update($this->_table['book']) === false) {
                throw new \Exception('교재 정보 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 컬럼별 교재 리스트 수정
     * @param array $params
     * @return array|bool
     */
    public function modifyBooksByColumn($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            foreach ($params as $book_idx => $columns) {
                $this->_conn->set($columns)->set('UpdAdminIdx', $this->session->userdata('admin_idx'))->where('BookIdx', $book_idx);

                if ($this->_conn->update($this->_table['book']) === false) {
                    throw new \Exception('데이터 수정에 실패했습니다.');
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
     * 교재 카테고리 연결 데이터 저장
     * @param $arr_cate_code
     * @param $book_idx
     * @return bool|string
     */
    private function _replaceBookCategory($arr_cate_code, $book_idx)
    {
        $_table = $this->_table['book_r_category'];
        $arr_cate_code = (is_null($arr_cate_code) === true) ? [] : array_values(array_unique($arr_cate_code));
        $admin_idx = $this->session->userdata('admin_idx');

        try {
            // 기존 설정된 카테고리 연결 데이터 조회
            $data = $this->_conn->getListResult($_table, 'BcIdx, CateCode', ['EQ' => ['BookIdx' => $book_idx, 'IsStatus' => 'Y']]);
            if (count($data) > 0) {
                $data = array_pluck($data, 'CateCode', 'BcIdx');

                // 기존 등록된 카테고리 연결 데이터 삭제 처리 (전달된 카테고리 식별자 중에 기 등록된 카테고리 식별자가 없다면 삭제 처리)
                $arr_delete_cate_code = array_diff($data, $arr_cate_code);
                if (count($arr_delete_cate_code) > 0) {
                    $is_update = $this->_conn->set([
                        'IsStatus' => 'N',
                        'UpdAdminIdx' => $admin_idx
                    ])->where_in('BcIdx', array_keys($arr_delete_cate_code))->where('BookIdx', $book_idx)->update($_table);

                    if ($is_update === false) {
                        throw new \Exception('기 설정된 카테고리 정보 수정에 실패했습니다.');
                    }
                }
            }

            // 신규 등록 (기 등록된 카테고리 식별자 중에 전달된 카테고리 식별자가 없다면 등록 처리)
            $arr_insert_cate_code = array_diff($arr_cate_code, $data);
            foreach ($arr_insert_cate_code as $cate_code) {
                $is_insert = $this->_conn->set([
                    'BookIdx' => $book_idx,
                    'CateCode' => $cate_code,
                    'RegAdminIdx' => $admin_idx,
                    'RegIp' => $this->input->ip_address()
                ])->insert($_table);

                if ($is_insert === false) {
                    throw new \Exception('카테고리 정보 등록에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
