<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FreebieModel extends WB_Model
{

    protected $_table = [
        'product' => 'lms_product',
        'freebie' => 'lms_product_freebie'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 사은품 리스트
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listFreebie($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {

        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'A.ProdCode,A.SiteCode,A.ProdName,A.IsUse, A.RegDatm,B.RefundSetPrice,B.Content,B.`Desc`,B.Stock ,C.SiteName,D.wAdminName as RegAdminName';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from lms_product A
                            join lms_product_freebie B ON A.ProdCode = B.ProdCode 
	                        left outer join lms_site C on A.SiteCode = C.SiteCode and C.IsStatus=\'Y\'
	                        left outer join wbs_sys_admin D on A.RegAdminIdx = D.wAdminIdx and D.wIsStatus=\'Y\' 
                    where A.IsStatus=\'Y\' ';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $result = $this->_conn->query('select '. $column .$from .$where. $order_by_offset_limit);
        //var_dump($result);exit;
        //echo $this->_conn->last_query();
        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }

    /**
     * 사은품 수정을 위한 등록 정보 추출
     * @param $prodcode
     * @return mixed
     */
    public function findFreebieForModify($prodcode)
    {
        $column = 'A.*, SA.*
                        ,B.SiteName,C.wAdminName as RegAdminName 
                        ,D.wAdminName as UpdAdminName ';
        $from = '
                    from lms_product A
                            join lms_product_freebie SA ON A.ProdCode = SA.ProdCode 
	                        left outer join lms_site B on A.SiteCode = B.SiteCode and B.IsStatus=\'Y\'
	                        left outer join wbs_sys_admin C on A.RegAdminIdx = C.wAdminIdx and C.wIsStatus=\'Y\' 
	                        left outer join wbs_sys_admin D on A.UpdAdminIdx = D.wAdminIdx and D.wIsStatus=\'Y\'
                    where A.IsStatus=\'Y\' ';
        $where = $this->_conn->makeWhere(['EQ'=>['A.ProdCode'=>$prodcode]])->getMakeWhere(true);

        $result = $this->_conn->query('select ' .$column .$from .$where)->row_array();
        //echo 'select ' .$column .$from .$where;
        return $result;
    }

    /**
     * 사은품 등록
     * @param array $input
     * @return array|bool
     */
    public function addFreebie($input=[])
    {
        $this->_conn->trans_begin();

        try {

            // 신규 상품코드 조회
            $row = $this->_conn->getFindResult($this->_table['product'], 'ifnull(max(ProdCode) + 1, 200001) as ProdCode');

            $prodcode = $row['ProdCode'];

            // 입력항목 구분
            $this->inputCommon($input, $input_product, $input_freebie);

            /*----------------          상품등록        ---------------*/
            $product_data = array_merge($input_product,[
                'ProdCode'=> $prodcode
                ,'ProdTypeCcd'=>element('ProdTypeCcd',$input)
                ,'SiteCode'=>element('site_code',$input)
                ,'RegAdminIdx'=>$this->session->userdata('admin_idx')
                ,'RegIp'=>$this->input->ip_address()
            ]);

            if($this->_conn->set($product_data)->insert($this->_table['product']) === false) {
                echo $this->_conn->last_query();
                throw new \Exception('상품 등록에 실패했습니다.');
            };

            /*----------------          사은품등록        ---------------*/
            $freebie_data = array_merge($input_freebie,[
                'ProdCode'=> $prodcode
            ]);
            if($this->_conn->set($freebie_data)->insert($this->_table['freebie']) === false) {
                throw new \Exception('사은품 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 사은품 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyFreebie($input=[])
    {
        $this->_conn->trans_begin();

        try {
            $prodcode = element('ProdCode',$input);
            
            $this->inputCommon($input, $input_product, $input_freebie);
            $product_data = array_merge($input_product,[
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ]);

            if ($this->_conn->set($product_data)->where('ProdCode', $prodcode)->update($this->_table['product']) === false) {
                throw new \Exception('상품 수정에 실패했습니다.');
            }

            if ($this->_conn->set($input_freebie)->where('ProdCode', $prodcode)->update($this->_table['freebie']) === false) {
                throw new \Exception('사은품 정보 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
            
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }


    /**
     * DB입력을 위한 INPUT 값 처리
     * @param array $input
     * @return array
     */
    public function inputCommon($input=[], &$input_product, &$input_freebie)
    {
        $SaleStartDat = get_var(element('SaleStartDat',$input),'');
        $SaleStartTime = get_var(element('SaleStartTime',$input),'');
        if($SaleStartDat === '') {
            $SaleStartDat = date("Y-m-d");
        }
        if($SaleStartTime === '') {
            $SaleStartTime = date('H');
        }
        $SaleStartDatm = $SaleStartDat.' '.$SaleStartTime.':00:00';

        $SaleEndDat = get_var(element('SaleEndDat',$input),'');
        $SaleEndTime = get_var(element('SaleEndTime',$input),'');
        if($SaleEndDat === '') {
            $SaleEndDat = "2100-12-31";
        }
        if($SaleEndTime === '') {
            $SaleEndTime = '23';
        }
        $SaleEndDatm = $SaleEndDat.' '.$SaleEndTime.':59:59';

        //상품관리 테이블 입력
        $input_product = [
            'ProdName'=>element('ProdName',$input)
            ,'SaleStartDatm'=>$SaleStartDatm
            ,'SaleEndDatm'=>$SaleEndDatm
            ,'SaleStatusCcd'=>element('SaleStatusCcd',$input,'618003')
            ,'IsCart'=>element('IsCart',$input,'N')
            ,'IsUse'=>element('IsUse',$input)
        ];

        $input_freebie = [
            'RefundSetPrice' => element('RefundSetPrice',$input)
            ,'Stock' => element('Stock',$input)
            ,'Content' => element('Content',$input)
            ,'Desc' => element('Desc',$input)
        ];

    }
}