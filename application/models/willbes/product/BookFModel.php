<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/willbes/product/ProductFModel.php';

class BookFModel extends ProductFModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 교재목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listSalesProductBook($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $learn_pattern = 'book';    // 교재

        if (is_bool($is_count) === false || $is_count === true) {
            $column = $is_count;
        } else {
            $column = 'P.ProdCode, P.ProdName, P.SiteCode, P.CateCode, P.IsSalesAble, P.ProdPriceData 
                , P.wSaleCcd, P.wSaleCcdName, P.wAuthorNames, P.wPublName, P.wPublDate, P.wAttachImgPath, P.wAttachImgOgName
                , P.ProdCateName, P.rwSalePrice, P.rwRealSalePrice, P.rwSaleRate, P.rwSaleRateUnit';
        }

        // 수강생교재 제외 조건
        $arr_condition['RAW']['PRP.PrpIdx is'] = ' null';
        $arr_condition = array_merge_recursive($arr_condition, $this->getSalesProductCondition($learn_pattern, 'P'));

        return $this->_conn->getJoinListResult($this->_table[$learn_pattern] . ' as P', 'left', $this->_table['product_r_product'] . ' as PRP'
            , 'P.ProdCode = PRP.ProdCodeSub and PRP.IsStatus = "Y" and PRP.OptionCcd = "' . $this->_student_book_ccd . '"'
            , $column, $arr_condition, $limit, $offset, $order_by
        );
    }

    /**
     * 교재정보 조회
     * @param int $prod_code [교재상품코드]
     * @return mixed
     */
    public function findProductBookInfo($prod_code)
    {
        $column = 'P.ProdCode, P.ProdName, P.ProdPriceData, P.wSaleCcd, P.wSaleCcdName, P.wAuthorNames, P.wPublName, P.wPublDate, P.wAttachImgPath, P.wAttachImgOgName
            , VBB.wEditionSize, VBB.wPageCnt, VBB.wBookDesc, VBB.wTableDesc, SC.CateName
            , if(P.IsSaleEnd = "N" and P.IsUse = "Y" and VBB.wIsUse = "Y" and current_timestamp() between P.SaleStartDatm and P.SaleEndDatm
                and P.SaleStatusCcd = "' . $this->_available_sale_status_ccd['product'] . '"
                and VBB.wSaleCcd = "' . $this->_available_sale_status_ccd['book'] . '"
              , "Y", "N") as IsSalesAble';

        $from = '
            from ' . $this->_table['book'] . ' as P
                inner join ' . $this->_table['bms_book_combine'] . ' as VBB
                    on P.wBookIdx = VBB.wBookIdx
                left join ' . $this->_table['category'] . ' as SC
                    on P.CateCode = SC.CateCode and SC.IsStatus = "Y"
            where P.ProdCode = ?             
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$prod_code]);

        return $query->row_array();
    }

    /**
     * 교재와 연관된 온라인 단강좌/무료강좌 조회
     * @param int $prod_code [교재상품코드]
     * @param array $arr_condition [단강좌 조회 추가조건]
     * @return mixed
     */
    public function findSalesProductLectureToBook($prod_code, $arr_condition = [])
    {
        $column = '*';
        $in_column = 'LP.ProdCode, LP.ProdName, LP.CateCode';

        // 단강좌/무료강좌 조건
        $arr_condition = array_merge_recursive($arr_condition, $this->getSalesProductCondition('on_lecture', 'LP'));
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        $raw_from = /** @lang text */ '
            select distinct(PRP.ProdCode) as ProdCode
            from ' . $this->_table['product_r_product'] . ' as PRP
            where PRP.ProdCodeSub = ?
                and PRP.IsStatus = "Y"            
        ';

        $from = '
            from (
                select "only" as Pattern, ' . $in_column . '
                from (
                    ' . $raw_from . '
                ) as TP
                    inner join ' . $this->_table['on_lecture'] . ' as LP
                        on TP.ProdCode = LP.ProdCode
                ' . $where . '
                union all
                select "free" as Pattern, ' . $in_column . '
                from (
                    ' . $raw_from . '
                ) as TP
                    inner join ' . $this->_table['on_free_lecture'] . ' as LP
                        on TP.ProdCode = LP.ProdCode
                ' . $where . '                                                            
            ) U
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from, [$prod_code, $prod_code]);

        return $query->result_array();
    }

    /**
     * 온라인서점 교재 목록
     * @param bool|string $is_count
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @param string $extra_column
     * @return array|int
     */
    public function listBookStoreProduct($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $extra_column = '')
    {
        $learn_pattern = 'book';    // 교재
        $add_column = '';

        // TODO : 네이버페이 심사 (유아/어린이 카테고리 상품만 노출)
        //$arr_condition['LKR']['CateCode'] = '3133';

        if ($is_count === false) {
            // 추가 조회컬럼
            $add_column = ', ProdCateName, rwSaleTypeCcd, rwSalePrice, rwSaleRate, rwSaleRateUnit, rwSaleDiscType, rwRealSalePrice
                , wSaleCcdName, wAuthorNames, wPublName, wPublDate, wAttachImgPath, wAttachImgOgName, replace(wAttachImgOgName, "_og", "_sm") as wAttachImgSmName
                , wBookIdx' . $extra_column;
        }

        return $this->listSalesProduct($learn_pattern, $is_count, $arr_condition, $limit, $offset, $order_by, $add_column);
    }

    /**
     * 온라인서점 옵션별 상품 조회
     * @param $site_code
     * @param $option
     * @param int $limit_cnt
     * @return array|int
     */
    public function getBookStoreOptionProduct($site_code, $option, $limit_cnt = 10)
    {
        $arr_option = ['new' => 'Y', 'best' => 'Y', 'resv_sale' => '730001', 'topic' => '730002', 'today' => '730003', 'md_best' => '730004'];
        $arr_condition = ['EQ' => ['SiteCode' => $site_code]];
        $extra_column = '';

        if (array_key_exists($option, $arr_option) === false) {
            return [];
        }

        // 옵션조건 설정
        if ($arr_option[$option] == 'Y') {
            $arr_condition['EQ']['Is' . ucfirst($option)] = 'Y';
        } else {
            $arr_condition['LKB']['OptionCcds'] = $arr_option[$option];
        }

        if ($option == 'today') {
            $extra_column = ', wBookDesc';
        }

        return $this->listBookStoreProduct(false, $arr_condition, $limit_cnt, 0, ['ProdCode' => 'desc'], $extra_column);
    }

    /**
     * 온라인서점 교재정보 조회
     * @param int $prod_code
     * @return array|mixed
     */
    public function findBookStoreProductByProdCode($prod_code)
    {
        $arr_condition = ['EQ' => ['ProdCode' => get_var($prod_code, 0)]];
        $data = $this->listBookStoreProduct(false, $arr_condition, 1, 0);

        return array_get($data, '0', []);
    }

    /**
     * WBS BMS 교재정보 조회
     * @param int $wbook_idx
     * @return array
     */
    public function findBmsBookByWBookIdx($wbook_idx)
    {
        $column = 'wIsbn, wEditionSize, wPageCnt, wBookDesc, wAuthorDesc, wTableDesc';
        $arr_condition = ['EQ' => ['wBookIdx' => get_var($wbook_idx, 0)]];

        return $this->_conn->getFindResult($this->_table['bms_book_combine'], $column, $arr_condition);
    }

    /**
     * 네이버페이 상품 제공 정보 추출
     * @param array $add_condition
     * @return mixed
     */
    public function NpayListBookStoreProduct($add_condition=[])
    {
        /**
         * TODO
         * 고대윤씨 협의 2020.07.10
         * 네이버 페이 상품 DB 정보 연동시 배송료 설정 방법
         * 배송료 정책
         * 상품가격이
                1. 30000원 이상일 경우 무료
                2. 30000원 미만일경우
                - 배송료부과여부 : 유료 -> 2500
                - 배송료부과여부 : 무료 -> 0
         */
        $arr_condition = array_merge_recursive($add_condition, [
            'EQ' => [
                'A.IsSaleEnd' => 'N'
                ,'A.IsUse' => 'Y'
                ,'A.wIsUse' => 'Y'
                ,'A.wSaleCcd' => '112001'
                ,'A.SaleStatusCcd' => '618001'
                ,'A.IsFree' => 'N'      //무료 아님
            ],
            'RAW' => ['NOW() between ' => ' A.SaleStartDatm and A.SaleEndDatm ']
        ]);

        // TODO : 네이버페이 심사 (유아/어린이 카테고리 상품만 노출)
        //$arr_condition['LKR']['A.CateCode'] = '3133';
        $cur_url = config_app('SiteUrl');
        $column = 'A.ProdCode as id, A.ProdName as title, A.rwRealSalePrice as price_pc, A.rwRealSalePrice as price_mobile, A.rwSalePrice as normal_price
                        ,concat(\'https://'.$cur_url.'/bookStore/show/pattern/all/prod-code/\',A.ProdCode) as link
                        ,concat(\'https://'.$cur_url.'/m/bookStore/show/pattern/all/prod-code/\',A.ProdCode) as mobile_link
                        ,concat(\'https://'.$cur_url.'\', A.wAttachImgPath, A.wAttachImgOgName) as image_link
                        ,A.ProdCateName as category_name1
                        ,null as category_name2
                        ,null as category_name3
                        ,\'50006391\' as naver_category
                        ,\'신상품\' as \'condition\'
                        ,A.wAuthorNames as brand
                        ,A.wPublName as maker
                        ,concat(\'윌비스|willbes|willstory|윌스토리|\', replace(ifnull(A.keyword,\'\'),\' \',\'\')) as search_tag
                         ,(
                        	if(A.rwRealSalePrice >= B.DeliveryFreePrice,0, (if(A.IsFreebiesTrans=\'N\', 0, B.DeliveryPrice)))
						) as shipping
                    ';
        $from = '
                    from vw_product_book A
	                        join lms_site B on A.SiteCode = B.SiteCode
                    where 1=1 
        ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $order_by = $this->_conn->makeOrderBy(['A.ProdCode' => 'DESC'])->getMakeOrderBy();

        $result = $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
        return $result;
    }
}
