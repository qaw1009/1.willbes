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
                , P.wSaleCcd, P.wSaleCcdName, P.wAuthorNames, P.wPublName, P.wPublDate, P.wAttachImgPath, P.wAttachImgOgName';
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
            , VBB.wEditionSize, VBB.wPageCnt, VBB.wBookDesc, VBB.wTableDesc, SC.CateName';
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
}
