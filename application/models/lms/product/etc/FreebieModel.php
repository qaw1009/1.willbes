<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FreebieModel extends WB_Model
{
    private $_table = 'lms_Freebie';

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listFreebie($arr_condition=[])
    {

        $column = 'A.FreebieIdx,A.SiteCode,A.FreebieName,A.RefundSetPrice,A.Content,A.`Desc`,A.Stock,A.IsUse, A.RegDatm
                        ,B.SiteName,C.wAdminName as RegAdminName ';
        $from = '
                    from lms_freebie A
	                        left outer join lms_site B on A.SiteCode = B.SiteCode and B.IsStatus=\'Y\'
	                        left outer join wbs_sys_admin C on A.RegAdminIdx = C.wAdminIdx and C.wIsStatus=\'Y\' 
                    where A.IsStatus=\'Y\' ';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $order_by =$this->_conn->makeOrderBy(['A.FreebieIdx'=>'Desc'])->getMakeOrderBy();

        $result = $this->_conn->query('select '. $column .$from .$where. $order_by)->result_array();
        return $result;
    }

    public function findFreebieForModify($freebieIdx)
    {
        $column = 'A.FreebieIdx,A.SiteCode,A.FreebieName,A.RefundSetPrice,A.Content,A.`Desc`,A.Stock,A.IsUse, A.RegDatm, A.UpdDatm
                        ,B.SiteName,C.wAdminName as RegAdminName 
                        ,D.wAdminName as UpdAdminName ';
        $from = '
                    from lms_freebie A
	                        left outer join lms_site B on A.SiteCode = B.SiteCode and B.IsStatus=\'Y\'
	                        left outer join wbs_sys_admin C on A.RegAdminIdx = C.wAdminIdx and C.wIsStatus=\'Y\' 
	                        left outer join wbs_sys_admin D on A.UpdAdminIdx = D.wAdminIdx and D.wIsStatus=\'Y\'
                    where A.IsStatus=\'Y\' ';
        $where = $this->_conn->makeWhere(['EQ'=>['freebieIdx'=>$freebieIdx]])->getMakeWhere(true);

        $result = $this->_conn->query('select ' .$column .$from .$where)->row_array();
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

            $data = $this->inputCommon($input);
            $data = array_merge($data,[
                'SiteCode' => element('site_code',$input)
                ,'RegAdminIdx' => $this->session->userdata('admin_idx')
            ]);

            if($this->_conn->set($data)->insert($this->_table) === false) {
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
            $idx = element('idx',$input);

            $data = $this->inputCommon($input);
            $data = array_merge($data,[
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ]);

            if($this->_conn->set($data)->where('FreebieIdx',$idx)->update($this->_table) === false) {
                throw new \Exception('사은품 수정에 실패했습니다.');
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
    public function inputCommon($input=[])
    {
        $IsUse = element('is_use',$input);
        $FreebieName = element('FreebieName',$input);
        $RefundSetPrice = element('RefundSetPrice',$input);
        $Stock = element('Stock',$input);
        $Content = element('Content',$input);
        $Desc = element('Desc',$input);

        $input_data = [
            'FreebieName' => $FreebieName
            ,'RefundSetPrice' => $RefundSetPrice
            ,'Stock' => $Stock
            ,'Content' => $Content
            ,'Desc' => $Desc
            ,'IsUse' => $IsUse
        ];

        return $input_data;
    }
}