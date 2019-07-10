<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookModel extends WB_Model
{
    private $_table = [
        'product' => 'lms_product',
        'product_book' => 'lms_product_book',
        'product_sale' => 'lms_product_sale',
        'product_r_category' => 'lms_product_r_category',
        'product_book_r_prof_subject' => 'lms_product_book_r_prof_subject',
        'vw_product_book_r_prof_subject' => 'vw_product_book_r_professor_subject_concat',
        'bms_book' => 'wbs_bms_book',
        'vw_bms_book' => 'wbs_bms_book_combine',
        'site' => 'lms_site',
        'code' => 'lms_sys_code',
        'category' => 'lms_sys_category',
        'subject' => 'lms_product_subject',
        'professor' => 'lms_professor',
        'pms_professor' => 'wbs_pms_professor',
        'admin' => 'wbs_sys_admin',
        'product_json_data' => 'lms_product_json_data'
    ];
    private $_prod_type_ccd = '636003'; // 상품타입 > 교재
    private $_sale_status_ccd = '618001'; // 판매상태 > 판매가능 고정값  (WBS > BMS > 판매여부 컬럼으로 판매상태 제어)
    private $_sale_type_ccd = '613001'; // 상품판매구분 > PC+모바일
    private $_point_apply_ccd = '635003'; // 포인트적용 > 교재

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
                P.ProdCode, B.wBookIdx, P.SiteCode, P.ProdName, PS.SalePrice, PS.RealSalePrice, P.IsNew, P.IsBest, P.IsUse, P.RegDatm, P.RegAdminIdx
                    , VWB.wPublName, VWB.wAuthorNames, VWB.wStockCnt, VWB.wSaleCcdName, VWB.wIsUse
                    , S.SiteName
                    , if(PC.CateName is not null, PC.CateName, C.CateName) as BCateName
                    , if(PC.CateName is not null, C.CateName, "") as MCateName                                
                    , BPS.ProfIdxs, BPS.SubjectIdxs, BPS.ProfSubjectNames
                    , A.wAdminName as RegAdminName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['product'] . ' as P
                inner join ' . $this->_table['product_book'] . ' as B
                    on P.ProdCode = B.ProdCode
                inner join ' . $this->_table['vw_bms_book'] . ' as VWB
                    on B.wBookIdx = VWB.wBookIdx
                inner join ' . $this->_table['product_sale'] . ' as PS
                    on P.ProdCode = PS.ProdCode                    
                left join ' . $this->_table['product_r_category'] . ' as BC
                    on P.ProdCode = BC.ProdCode and BC.IsStatus = "Y"                                                                        
                left join ' . $this->_table['category'] . ' as C
                    on BC.CateCode = C.CateCode and C.IsStatus = "Y"                                        
                left join ' . $this->_table['category'] . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsStatus = "Y"
                left join ' . $this->_table['vw_product_book_r_prof_subject'] . ' as BPS
                    on P.ProdCode = BPS.ProdCode
                inner join ' . $this->_table['site'] . ' as S
                    on P.SiteCode = S.SiteCode                    
                left join ' . $this->_table['admin'] . ' as A
                    on P.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
            where P.IsStatus = "Y"                
                and VWB.wIsStatus = "Y"
                and PS.IsStatus = "Y"	                
                and S.IsStatus = "Y" 
        ';

        // 상품타입 추가
        $arr_condition['EQ']['P.ProdTypeCcd'] = $this->_prod_type_ccd;
        // 사이트 권한 추가
        $arr_condition['IN']['P.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 교재 카테고리 연결 데이터 조회
     * @param $prod_code
     * @return array
     */
    public function listBookCategory($prod_code)
    {
        $column = '
            BC.CateCode, C.CateName
                , ifnull(PC.CateCode, "") as ParentCateCode, ifnull(PC.CateName, "") as ParentCateName
                , concat(if(PC.CateCode is null, "", concat(PC.CateName, " > ")), C.CateName) as CateRouteName            
        ';
        $from = '
            from ' . $this->_table['product_r_category'] . ' as BC
                inner join ' . $this->_table['category'] . ' as C
                    on BC.CateCode = C.CateCode
                left join ' . $this->_table['category'] . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsUse = "Y" and PC.IsStatus = "Y"
        ';
        $where = ' where BC.ProdCode = ? and BC.IsStatus = "Y" and C.IsUse = "Y" and C.IsStatus = "Y"';
        $order_by_offset_limit = ' order by BC.PcIdx asc';

        // 쿼리 실행
        $data = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$prod_code])->result_array();

        return array_pluck($data, 'CateRouteName', 'CateCode');
    }

    /**
     * 교재 과목/교수 연결 데이터 조회
     * @param $prod_code
     * @return mixed
     */
    public function listBookProfessorSubject($prod_code)
    {
        $column = 'BPS.ProdCode, BPS.ProfIdx, BPS.SubjectIdx
            , concat(BPS.ProfIdx, "_", BPS.SubjectIdx) as ProfSubjectIdx
            , concat(PSU.SubjectName, ">", WP.wProfName) as ProfSubjectName';

        $from = '
            from ' . $this->_table['product_book_r_prof_subject'] . ' as BPS
                inner join ' . $this->_table['professor'] . ' as PF
                    on BPS.ProfIdx = PF.ProfIdx
                inner join ' . $this->_table['pms_professor'] . ' as WP
                    on PF.wProfIdx = WP.wProfIdx
                inner join ' . $this->_table['subject'] . ' as PSU
                    on BPS.SubjectIdx = PSU.SubjectIdx
            where BPS.ProdCode = ? 
                and BPS.IsStatus = "Y"
                and PF.IsUse = "Y" and PF.IsStatus = "Y"
                and WP.wIsUse = "Y" and WP.wIsStatus = "Y"
                and PSU.IsUse = "Y" and PSU.IsStatus = "Y"';
        $order_by_offset_limit = ' order by BPS.PbIdx asc';

        // 쿼리 실행
        $data = $this->_conn->query('select ' . $column . $from . $order_by_offset_limit, [$prod_code])->result_array();

        return $data;
    }

    /**
     * 교재 코드 목록 조회
     * @param string $site_code
     * @return array
     */
    public function getBookArray($site_code = '')
    {
        $arr_condition = ['EQ' => ['ProdTypeCcd' => $this->_prod_type_ccd, 'IsUse' => 'Y', 'IsStatus' => 'Y']];
        if (empty($site_code) === false) {
            $arr_condition['EQ']['SiteCode'] = $site_code;
        } else {
            $arr_condition['IN']['SiteCode'] = get_auth_site_codes();
        }

        $data = $this->_conn->getListResult($this->_table['product'], 'SiteCode, ProdCode, ProdName', $arr_condition, null, null, [
            'SiteCode' => 'asc', 'ProdCode' => 'asc'
        ]);

        return (empty($site_code) === false) ? array_pluck($data, 'ProdName', 'ProdCode') : $data;
    }

    /**
     * 교재 정보 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findBook($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['ProdTypeCcd'] = $this->_prod_type_ccd;
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['product'], $column, $arr_condition);
    }
    
    /**
     * 교재 정보 수정 폼에 필요한 데이터 조회
     * @param $prod_code
     * @return array
     */
    public function findBookForModify($prod_code)
    {
        $column = '
            P.ProdCode, P.SiteCode, P.ProdName, P.IsPoint, P.PointSavePrice, P.PointSaveType, P.IsCoupon, P.IsNew, P.IsBest, P.IsUse, P.RegDatm, P.RegAdminIdx, P.UpdDatm, P.UpdAdminIdx
                , B.wBookIdx, B.SchoolYear, B.CourseIdx, B.DispTypeCcd, B.IsFree
                , S.SaleRate, S.SaleDiscType, S.RealSalePrice
                , VWB.wBookName, VWB.wPublName, VWB.wPublDate, VWB.wAuthorNames, VWB.wIsbn, VWB.wPageCnt, VWB.wEditionCcdName, VWB.wPrintCnt, VWB.wEditionCnt, VWB.wEditionSize
                , VWB.wSaleCcd, VWB.wSaleCcdName, VWB.wOrgPrice, VWB.wStockCnt, VWB.wBookDesc, VWB.wAuthorDesc, VWB.wTableDesc, VWB.wIsUse
                , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = P.RegAdminIdx and wIsStatus = "Y") as RegAdminName
                , if(P.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = P.UpdAdminIdx and wIsStatus = "Y")) as UpdAdminName';

        $from = '
            from ' . $this->_table['product'] . ' as P
                inner join ' . $this->_table['product_book'] . ' as B
                    on P.ProdCode = B.ProdCode
                inner join ' . $this->_table['product_sale'] . ' as S
                    on P.ProdCode = S.ProdCode
                inner join ' . $this->_table['vw_bms_book'] . ' as VWB
                    on B.wBookIdx = VWB.wBookIdx';

        $where = ' where P.ProdCode = ? and P.IsStatus = "Y" and S.IsStatus = "Y" and VWB.wIsStatus = "Y"';

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where, [$prod_code])->row_array();
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
            // 신규 상품코드 조회
            $row = $this->_conn->getFindResult($this->_table['product'], 'ifnull(max(ProdCode) + 1, 200001) as ProdCode');

            // 상품 등록
            $data = [
                'ProdCode' => $row['ProdCode'],
                'SiteCode' => element('site_code', $input),
                'ProdName' => element('book_name', $input),
                'ProdTypeCcd' => $this->_prod_type_ccd,
                'SaleStartDatm' => date('Y-m-d H') . ':00:00',
                'SaleEndDatm' => '2100-12-31 23:59:59',
                'SaleStatusCcd' => $this->_sale_status_ccd,
                'IsCoupon' => element('is_coupon', $input),
                'IsPoint' => element('is_point_saving', $input),
                'PointApplyCcd' => $this->_point_apply_ccd,
                'PointSaveType' => element('point_saving_type', $input, 'R'),
                'PointSavePrice' => element('point_saving_amt', $input, 0),
                'IsBest' => element('is_best', $input, 'N'),
                'IsNew' => element('is_new', $input, 'N'),
                'IsCart' => 'Y',
                'IsRefund' => 'Y',
                'IsFreebiesTrans' => 'Y',
                'IsDeliveryInfo' => 'Y',
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['product']) === false) {
                throw new \Exception('상품 정보 등록에 실패했습니다.');
            }

            // 상품도서 등록
            $data = [
                'ProdCode' => $row['ProdCode'],
                'wBookIdx' => element('wbook_idx', $input),
                'SchoolYear' => element('school_year', $input),
                'CourseIdx' => element('course_idx', $input),
                'DispTypeCcd' => element('disp_type_ccd', $input),
                'IsFree' => element('is_free', $input)
            ];

            if ($this->_conn->set($data)->insert($this->_table['product_book']) === false) {
                throw new \Exception('상품도서 정보 등록에 실패했습니다.');
            }

            // 판매가격 등록
            $data = [
                'ProdCode' => $row['ProdCode'],
                'SaleTypeCcd' => $this->_sale_type_ccd,
                'SalePrice' => element('org_price', $input),
                'SaleRate' => element('dc_amt', $input, 0),
                'SaleDiscType' => element('dc_type', $input, 'R'),
                'RealSalePrice' => element('sale_price', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['product_sale']) === false) {
                throw new \Exception('판매가격 정보 등록에 실패했습니다.');
            }

            // 판매가격 JSON 데이터 등록
            $query = $this->_conn->query('call sp_product_json_data_insert(?)', [$row['ProdCode']]);
            $sp_result = $query->row(0)->ReturnMsg;
            if ($sp_result != 'Success') {
                throw new \Exception('판매가격 JSON 데이터 등록에 실패했습니다.');
            }

            // 카테고리 정보 등록
            $is_book_category = $this->_replaceBookCategory($row['ProdCode'], [element('cate_code', $input)]);
            if ($is_book_category !== true) {
                throw new \Exception($is_book_category);
            }

            // 과목/교수 정보 등록
            $is_book_prof_subject = $this->_replaceBookProfessorSubject($row['ProdCode'], element('prof_subject_idx', $input));
            if ($is_book_prof_subject !== true) {
                throw new \Exception($is_book_prof_subject);
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
            $prod_code = element('idx', $input);

            // 기존 교재 기본정보 조회
            $row = $this->findBook('ProdCode', ['EQ' => ['ProdCode' => $prod_code]]);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 상품 정보 수정
            $data = [
                'ProdName' => element('book_name', $input),
                'IsCoupon' => element('is_coupon', $input),
                'IsPoint' => element('is_point_saving', $input),
                'PointSaveType' => element('point_saving_type', $input, 'R'),
                'PointSavePrice' => element('point_saving_amt', $input, 0),
                'IsBest' => element('is_best', $input, 'N'),
                'IsNew' => element('is_new', $input, 'N'),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            
            if ($this->_conn->set($data)->where('ProdCode', $prod_code)->update($this->_table['product']) === false) {
                throw new \Exception('상품 정보 수정에 실패했습니다.');
            }

            // 상품도서 수정
            $data = [
                'SchoolYear' => element('school_year', $input),
                'CourseIdx' => element('course_idx', $input),
                'DispTypeCcd' => element('disp_type_ccd', $input),
                'IsFree' => element('is_free', $input)
            ];

            if ($this->_conn->set($data)->where('ProdCode', $prod_code)->update($this->_table['product_book']) === false) {
                throw new \Exception('상품도서 정보 수정에 실패했습니다.');
            }

            // 판매가격 수정
            if ($this->_replaceBookSale($prod_code, $input) !== true) {
                throw new \Exception('판매가격 정보 수정에 실패했습니다.');
            }

            // 카테고리 정보 등록
            $is_book_category = $this->_replaceBookCategory($row['ProdCode'], [element('cate_code', $input)]);
            if ($is_book_category !== true) {
                throw new \Exception($is_book_category);
            }

            // 과목/교수 정보 수정
            $is_book_prof_subject = $this->_replaceBookProfessorSubject($prod_code, element('prof_subject_idx', $input));
            if ($is_book_prof_subject !== true) {
                throw new \Exception($is_book_prof_subject);
            }

            // 교재 포함 강좌 json data 수정
            if($this->_replaceProdJsonDataByProdBookData($prod_code) !== true) {
                throw new \Exception('강좌 JSON DATA 수정에 실패했습니다.');
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

            $admin_idx = $this->session->userdata('admin_idx');

            foreach ($params as $prod_code => $columns) {
                $this->_conn->set($columns)->set('UpdAdminIdx', $admin_idx)->where('ProdCode', $prod_code);

                if ($this->_conn->update($this->_table['product']) === false) {
                    throw new \Exception('상품 정보 수정에 실패했습니다.');
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
     * 이전 판매가격 정보 삭제 처리 후 신규 등록
     * @param $prod_code
     * @param array $input
     * @return bool|string
     */
    private function _replaceBookSale($prod_code, $input = [])
    {
        $admin_idx = $this->session->userdata('admin_idx');

        try {
            // 이전 판매가격 정보 조회
            $row = $this->_conn->getFindResult($this->_table['product_sale'], 'SalePrice, SaleRate, SaleDiscType, RealSalePrice', [
                'EQ' => ['ProdCode' => $prod_code, 'IsStatus' => 'Y']
            ]);

            if (empty($row) === true) {
                throw new \Exception('이전 판매가격 정보 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 입력값 변수 설정
            $sale_price = element('org_price', $input);
            $sale_rate = element('dc_amt', $input, 0);
            $sale_disc_type = element('dc_type', $input, 'R');
            $real_sale_price = element('sale_price', $input);

            // 입력값 비교 (데이터가 같을 경우 등록안함)
            $ori_val = $row['SalePrice'] . '::' . $row['SaleRate'] . '::' . $row['SaleDiscType'] . '::' . $row['RealSalePrice'];
            $new_val = $sale_price . '::' . $sale_rate . '::' . $sale_disc_type . '::' . $real_sale_price;
            if (strcmp($ori_val, $new_val) == 0) {
                return true;
            }

            // 이전 판매가격 정보 삭제 처리
            $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $admin_idx);
            $this->_conn->where('ProdCode', $prod_code)->where('IsStatus', 'Y');
            if ($this->_conn->update($this->_table['product_sale']) === false) {
                throw new \Exception('이전 판매가격 정보 수정에 실패했습니다.');
            }

            // 판매가격 등록
            $data = [
                'ProdCode' => $prod_code,
                'SaleTypeCcd' => $this->_sale_type_ccd,
                'SalePrice' => $sale_price,
                'SaleRate' => $sale_rate,
                'SaleDiscType' => $sale_disc_type,
                'RealSalePrice' => $real_sale_price,
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['product_sale']) === false) {
                throw new \Exception('판매가격 정보 등록에 실패했습니다.');
            }

            // 판매가격 JSON 데이터 등록
            $query = $this->_conn->query('call sp_product_json_data_insert(?)', [$prod_code]);
            $sp_result = $query->row(0)->ReturnMsg;
            if ($sp_result != 'Success') {
                throw new \Exception('판매가격 JSON 데이터 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 교재 카테고리 연결 데이터 저장
     * @param $prod_code
     * @param $arr_cate_code
     * @return bool|string
     */
    private function _replaceBookCategory($prod_code, $arr_cate_code)
    {
        $_table = $this->_table['product_r_category'];
        $arr_cate_code = (is_null($arr_cate_code) === true) ? [] : array_values(array_unique($arr_cate_code));
        $admin_idx = $this->session->userdata('admin_idx');

        try {
            // 기존 설정된 카테고리 연결 데이터 조회
            $data = $this->_conn->getListResult($_table, 'PcIdx, CateCode', ['EQ' => ['ProdCode' => $prod_code, 'IsStatus' => 'Y']]);
            if (count($data) > 0) {
                $data = array_pluck($data, 'CateCode', 'PcIdx');

                // 기존 등록된 카테고리 연결 데이터 삭제 처리 (전달된 카테고리 식별자 중에 기 등록된 카테고리 식별자가 없다면 삭제 처리)
                $arr_delete_cate_code = array_diff($data, $arr_cate_code);
                if (count($arr_delete_cate_code) > 0) {
                    $is_update = $this->_conn->set([
                        'IsStatus' => 'N',
                        'UpdAdminIdx' => $admin_idx
                    ])->where_in('PcIdx', array_keys($arr_delete_cate_code))->where('ProdCode', $prod_code)->update($_table);

                    if ($is_update === false) {
                        throw new \Exception('기 설정된 카테고리 정보 수정에 실패했습니다.');
                    }
                }
            }

            // 신규 등록 (기 등록된 카테고리 식별자 중에 전달된 카테고리 식별자가 없다면 등록 처리)
            $arr_insert_cate_code = array_diff($arr_cate_code, $data);
            foreach ($arr_insert_cate_code as $cate_code) {
                $is_insert = $this->_conn->set([
                    'ProdCode' => $prod_code,
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

    /**
     * 교재 과목/교수 연결 데이터 저장
     * @param $prod_code
     * @param $arr_prof_subject_idx
     * @return bool|string
     */
    private function _replaceBookProfessorSubject($prod_code, $arr_prof_subject_idx)
    {
        $_table = $this->_table['product_book_r_prof_subject'];
        $_arr_condition = ['ProdCode' => $prod_code, 'IsStatus' => 'Y'];

        try {
            $arr_prof_subject_idx = (is_null($arr_prof_subject_idx) === true) ? [] : array_values(array_unique($arr_prof_subject_idx));
            $admin_idx = $this->session->userdata('admin_idx');

            // 기존 설정된 교수+과목 연결 데이터 조회
            $data = $this->_conn->getListResult($_table, 'PbIdx, ProfIdx, SubjectIdx, concat(ProfIdx, "_", SubjectIdx) as ProfSubjectIdx', ['EQ' => $_arr_condition]);
            if (count($data) > 0) {
                $data = array_pluck($data, 'ProfSubjectIdx', 'PbIdx');

                // 기존 등록된 교수+과목 연결 데이터 삭제 처리 (전달된 교수_과목 식별자 중에 기 등록된 교수_과목 식별자가 없다면 삭제 처리)
                $arr_delete_prof_subject_idx = array_diff($data, $arr_prof_subject_idx);
                if (count($arr_delete_prof_subject_idx) > 0) {
                    $is_update = $this->_conn->set([
                        'IsStatus' => 'N',
                        'UpdAdminIdx' => $admin_idx
                    ])->where_in('PbIdx', array_keys($arr_delete_prof_subject_idx))->where('ProdCode', $prod_code)->update($_table);

                    if ($is_update === false) {
                        throw new \Exception('기 설정된 과목, 교수 정보 수정에 실패했습니다.');
                    }
                }
            }

            // 신규 등록 (기 등록된 교수_과목 식별자 중에 전달된 교수_과목 식별자가 없다면 등록 처리)
            $arr_insert_prof_subject_idx = array_diff($arr_prof_subject_idx, $data);
            foreach ($arr_insert_prof_subject_idx as $prof_subject_idx) {
                $_arr_prof_subject_idx = explode('_', $prof_subject_idx);

                $is_insert = $this->_conn->set([
                    'ProdCode' => $prod_code,
                    'ProfIdx' => element('0', $_arr_prof_subject_idx),
                    'SubjectIdx' => element('1', $_arr_prof_subject_idx),
                    'RegAdminIdx' => $admin_idx,
                    'RegIp' => $this->input->ip_address()
                ])->insert($_table);

                if ($is_insert === false) {
                    throw new \Exception('과목, 교수 정보 등록에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 해당교재가 포함된 강좌상품 업데이트
     * @param $prod_code
     * @return bool|string
     */
    public function _replaceProdJsonDataByProdBookData($prod_code)
    {
        try {
            if (empty($prod_code) === true) {
                throw new \Exception('교재 식별자가 없습니다.');
            }

            // 교재식별자와 연결된 강좌상품 코드 조회
            $column = 'distinct(ProdCode) as ProdLecCode';
            $from = '
                        from ' . $this->_table['product_json_data'] . ' as pjd
                        where pjd.ProdBookData LIKE ? ';
            // 쿼리 실행
            $results = $this->_conn->query('select ' . $column . $from, '%'.$prod_code.'%')->result_array();

            if (empty($results) === true) {
                return true;
            }

            foreach ($results as $row) {
                // 강좌상품 JSON 데이터 업데이트
                $query = $this->_conn->query('call sp_product_json_data_insert(?)', [$row['ProdLecCode']]);
                $sp_result = $query->row(0)->ReturnMsg;
                if ($sp_result != 'Success') {
                    throw new \Exception('강좌 상품 가격 JSON 데이터 등록에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
