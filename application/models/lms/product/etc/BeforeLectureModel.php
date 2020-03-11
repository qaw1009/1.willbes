<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class BeforeLectureModel extends WB_Model
{
    protected $_table = [
        'before' => 'lms_Before_Lecture',
        'sale' => 'lms_Before_Lecture_SaleInfo',
        'before_product' => 'lms_Product_R_Before_Lecture',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 강좌목록추출
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listLecture($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {

            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';

        } else {

            $column = ' STRAIGHT_JOIN
                            A.*
                            ,tar.prodname_tar
                            ,ess.prodname_ess
                            ,cho.prodname_cho
                            ,\'0\' as applyCnt
                            ,IF( (NOW() BETWEEN ValidPeriodStartDate AND ValidPeriodEndDate) = 0, \'만료\', \'\') as dateStatus
                            ,Z.wAdminName
                            
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from
                        lms_before_lecture A
                        join 
                        (
                            select 	aa.blIdx, aa.BeforeLectureGroup, group_concat(concat(\'[\',cc.CcdName,\']\',\'[\',bb.ProdCode,\']\', bb.ProdName) separator \'<BR>\') as prodname_tar
                            ,group_concat(concat(aa.prodcode)) as prodcode_tar
                            from
                                lms_product_r_before_lecture aa
                                join lms_product bb on aa.ProdCode = bb.ProdCode
                                join lms_sys_code cc on bb.ProdTypeCcd = cc.Ccd
                            where aa.IsStatus=\'Y\' and bb.IsStatus=\'Y\' and cc.IsStatus=\'Y\' 
                                    and aa.BeforeLectureGroup=\'T\'
                            group by aa.BlIdx,aa.BeforeLectureGroup
                        ) as tar on A.BlIdx = tar.blIdx 
                        
                        left outer join 
                        (
                            select 	aa.blIdx, aa.BeforeLectureGroup, group_concat(concat(\'[\',cc.CcdName,\']\',\'[\',bb.ProdCode,\']\', bb.ProdName) separator \'<BR>\') as prodname_ess
                            ,group_concat(concat(aa.prodcode)) as prodcode_ess
                            from
                                lms_product_r_before_lecture aa
                                join lms_product bb on aa.ProdCode = bb.ProdCode
                                join lms_sys_code cc on bb.ProdTypeCcd = cc.Ccd
                            where aa.IsStatus=\'Y\' and bb.IsStatus=\'Y\' and cc.IsStatus=\'Y\' 
                                    and aa.BeforeLectureGroup=\'E\'
                            group by aa.BlIdx,aa.BeforeLectureGroup
                        ) as ess on A.BlIdx = ess.blIdx 
                        
                        left outer join 
                        (
                            select 	aa.blIdx, aa.BeforeLectureGroup, group_concat(concat(\'[\',cc.CcdName,\']\',\'[\',bb.ProdCode,\']\', bb.ProdName) separator \'<BR>\') as prodname_cho
                            ,group_concat(concat(aa.prodcode)) as prodcode_cho
                            from
                                lms_product_r_before_lecture aa
                                join lms_product bb on aa.ProdCode = bb.ProdCode
                                join lms_sys_code cc on bb.ProdTypeCcd = cc.Ccd
                            where aa.IsStatus=\'Y\' and bb.IsStatus=\'Y\' and cc.IsStatus=\'Y\' 
                                    and aa.BeforeLectureGroup=\'C\'
                            group by aa.BlIdx,aa.BeforeLectureGroup
                        ) as cho on A.BlIdx = cho.blIdx 
                        
                        left outer join wbs_sys_admin Z on A.RegAdminIdx = Z.wAdminIdx
                    where A.IsStatus=\'Y\'
        ';

        // 사이트 권한 추가
        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        //echo 'select ' . $column . $from . $where . $order_by_offset_limit;        exit;
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }


    /**
     * 선수강좌 등록
     * @param array $input
     * @return array|bool
     */
    public function addBeforeLecture($input=[])
    {

        $this->_conn->trans_begin();

        try {

            // 입력항목 구분
            $input_data = $this->inputCommon($input);

            /*----------------          선수강좌기본정보        ---------------*/
            $data = array_merge($input_data,[
                'SiteCode'=>element('site_code',$input)
                ,'RegAdminIdx'=>$this->session->userdata('admin_idx')
                ,'RegIp'=>$this->input->ip_address()
            ]);

            if($this->_conn->set($data)->insert($this->_table['before']) === false) {
                throw new \Exception('선수강좌기본정보 등록에 실패했습니다.');
            };

            $blidx = $this->_conn->insert_id();
            /*----------------          선수강좌기본정보        ---------------*/

            /*----------------          선수강좌할인율        ---------------*/
            if($this->_setSale($input,$blidx) !== true) {
                throw new \Exception('선수강좌 할인율 등록에 실패했습니다.');
            }
            //echo $this->_conn->last_query().'<BR><BR>';
            /*----------------          선수강좌할인율        ---------------*/

            /*----------------          연계강좌 등록        ---------------*/
            $set_product_result = $this->_setProduct($input,$blidx);
            if($set_product_result !== true) {
                throw new \Exception($set_product_result);
            }
            /*----------------          연계강좌  등록      ---------------*/

            $this->_conn->trans_commit();
            //$this->_conn->trans_rollback();

        } catch(\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 상품 및 강좌 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyBeforeLecture($input=[])
    {

        $this->_conn->trans_begin();

        try{

            $blidx = element('BlIdx',$input);

            // 입력항목 구분
            $input_data = $this->inputCommon($input);

            /*----------------          선수강좌기본정보        ---------------*/
            $data = array_merge($input_data,[
                'UpdAdminIdx'=>$this->session->userdata('admin_idx')
            ]);

            if ($this->_conn->set($data)->where('BlIdx', $blidx)->update($this->_table['before']) === false) {
                throw new \Exception('선수강좌기본정보 수정에 실패했습니다.');
            }
            /*----------------          선수강좌기본정보        ---------------*/

            /*----------------          선수강좌할인율        ---------------*/
            if($this->_setSale($input,$blidx) !== true) {
                throw new \Exception('선수강좌 할인율 등록에 실패했습니다.');
            }
            //echo $this->_conn->last_query().'<BR><BR>';
            /*----------------          선수강좌할인율        ---------------*/

            /*----------------          연계강좌 등록        ---------------*/
            $set_product_result = $this->_setProduct($input,$blidx);
            if($set_product_result !== true) {
                throw new \Exception($set_product_result);
            }
            //echo $this->_conn->last_query().'<BR><BR>';
            /*----------------          선수강좌할인율        ---------------*/

            $this->_conn->trans_commit();
            //$this->_conn->trans_rollback();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }


    /**
     * 선수강좌할인율 등록
     * @param array $input
     * @param $blidx
     * @return bool|string
     */
    public function _setSale($input=[],$blidx)
    {

        try {

            /*  기존 정보 상태값 변경 */
            $del_data = [
                'IsStatus' => 'N'
                , 'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            $this->_conn->set($del_data)->where('BlIdx', $blidx)->where('IsStatus', 'Y');
            if ($this->_conn->update($this->_table['sale']) === false) {
                throw new \Exception('이전 할인 정보 수정에 실패했습니다.');
            }
            /*  기존 정보 상태값 변경 */

            /*  할인율 등록 */
            $SaleBeforeLectureGroup = element('SaleBeforeLectureGroup',$input);     //필수, 선택 구분
            $DiscNum = element('DiscNum',$input);                                  //개
            $DiscRate = element('DiscRate',$input);                                 //할인율
            $DiscType = element('DiscType',$input);                                //타입

            if(empty($SaleBeforeLectureGroup) === false) {
                for ($i = 0; $i < count($SaleBeforeLectureGroup); $i++) {
                    if (get_var($DiscNum[$i]) !== '' && get_var($DiscRate[$i]) !== '') {
                        $data = [
                            'BlIdx' => $blidx
                            , 'BeforeLectureGroup' => $SaleBeforeLectureGroup[$i]
                            , 'OrderNum' => ($i + 1)
                            , 'DiscNum' => $DiscNum[$i]
                            , 'DiscRate' => $DiscRate[$i]
                            , 'DiscType' => $DiscType[$i]
                            , 'RegAdminIdx' => $this->session->userdata('admin_idx')
                            , 'RegIp' => $this->input->ip_address()
                        ];

                        if ($this->_conn->set($data)->insert($this->_table['sale']) === false) {
                            throw new \Exception('선수강좌 할인 정보 등록에 실패했습니다.');
                        }
                    }
                }
            }
            /*  할인율 등록 */

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }


    /**
     * 선수강좌 상품 등록
     * @param array $input
     * @param $blidx
     * @return bool|string
     */
    public function _setProduct($input=[],$blidx)
    {

        try {

            $ProdCode = element('ProdCode',$input);                                 //상품
            $BeforeLectureGroup = element('BeforeLectureGroup',$input);      //선수강좌그룹


            /*  기존 정보 상태값 변경 */
            $del_data = [
                'IsStatus' => 'N'
                , 'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            $this->_conn->set($del_data)->where('BlIdx', $blidx)->where('IsStatus', 'Y');
            if ($this->_conn->update($this->_table['before_product']) === false) {
                throw new \Exception('이전 선수강좌 연계 강좌 정보 수정에 실패했습니다.');
            }
            /*  기존 정보 상태값 변경 */


            /*  대상강좌 기 등록 여부 확인 : 대상강좌가 중복 등록 될 경우 이후 결제시 어떤것으로 조건강좌를 적용 할지 알지 못함*/
            $pre_check_product = array();
            if(empty($ProdCode) === false) {

                for ($i = 0; $i < count($ProdCode); $i++) {
                    if (get_var($BeforeLectureGroup[$i]) === 'T' && get_var($ProdCode[$i]) !== '') {
                        $pre_check_product[$i] = $ProdCode[$i];
                    }
                }

                $check_row = $this->_conn->getFindResult($this->_table['before_product'], 'count(*) as checkcnt ', [
                    'EQ' => [
                        'BeforeLectureGroup' => 'T'
                        ,'IsStatus' => 'Y'
                    ]
                    ,'IN' => ['ProdCode' => $pre_check_product]
                ]);
                //echo $this->_conn->last_query();

                if($check_row['checkcnt'] != '0') {
                    throw new \Exception('대상강좌가 이미 등록 되어 있습니다.');
                }
            }
            /*  대상강좌 기 등록 여부 확인 */


            /*  대상강좌/조건강좌 저장 */
            if(empty($ProdCode) === false) {
                for ($i = 0; $i < count($ProdCode); $i++) {
                    if (get_var($ProdCode[$i]) !== '') {
                        $data = [
                            'BlIdx' => $blidx
                            , 'ProdCode' => $ProdCode[$i]
                            , 'BeforeLectureGroup' => $BeforeLectureGroup[$i]
                            , 'RegAdminIdx' => $this->session->userdata('admin_idx')
                            , 'RegIp' => $this->input->ip_address()
                        ];

                        if ($this->_conn->set($data)->insert($this->_table['before_product']) === false) {
                            throw new \Exception('연계 강좌 정보 등록에 실패했습니다.');
                        }
                    }
                }
            }
            /*  대상강좌 저장 */

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 선수강좌 기본정보
     * @param $blidx
     * @return mixed
     */
    public function _findBeforeLectureForModify($blidx)
    {
        $column = 'A.*,D.wAdminName as RegAdminName,E.wAdminName as UpdAdminName';

        $from =' from
                        lms_before_lecture A
                        left outer join wbs_sys_admin D on A.RegAdminIdx = D.wAdminIdx
                        left outer join wbs_sys_admin E on A.UpdAdminIdx = E.wAdminIdx
                    Where A.IsStatus=\'Y\' 
        ';

        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes();
        $arr_condition['EQ']['A.BlIdx'] = $blidx;
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $result = $this->_conn->query('select ' .$column .$from .$where)->row_array();
        //echo $this->_conn->last_query();
        return $result;
    }

    /**
     * 할인율 정보 추출
     * @param $blidx
     * @return mixed
     */
    public function _findBeforeLectureSaleForModify($blidx,$group)
    {
        $column = 'B.*';

        $from =' from
                        lms_before_lecture A
                        join lms_before_lecture_saleinfo B on A.BlIdx = B.BlIdx 
                    Where A.IsStatus=\'Y\' And B.IsStatus=\'Y\'
        ';

        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes();
        $arr_condition = ['EQ' => ['A.BlIdx' => $blidx, 'BeforeLectureGroup' => $group]];
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $order_by = " Order by B.OrderNum ASC";

        $result = $this->_conn->query('select ' .$column .$from .$where .$order_by)->result_array();
        //echo $this->_conn->last_query();
        return $result;
    }

    /**
     * 상품 정보 추출
     * @param $blidx
     * @return mixed
     */
    public function _findBeforeLectureProductForModify($blidx)
    {

        $column = 'B.ProdCode,B.BeforeLectureGroup,C.ProdName,D.CcdName as ProdTypeCcd_Name,ifnull(E.RealSalePrice,0) as RealSalePrice ';

        $from =' from
                        lms_before_lecture A
                        join lms_product_r_before_lecture B on A.BlIdx = B.BlIdx
                        join lms_product C on B.ProdCode = C.ProdCode
                        join lms_sys_code D on C.ProdTypeCcd = D.Ccd
                        left outer join lms_product_sale E on C.ProdCode = E.ProdCode and E.SaleTypeCcd=\'613001\' and E.IsStatus=\'Y\'
                    Where A.IsStatus=\'Y\' And B.IsStatus=\'Y\' and C.IsStatus=\'Y\' and D.IsStatus=\'Y\'
        ';

        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes();
        //$arr_condition = ['EQ' => ['A.BlIdx' => $blidx, 'B.BeforeLectureGroup' => $group]];
        $arr_condition = ['EQ' => ['A.BlIdx' => $blidx]];
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $order_by = " Order by B.PrbIdx ASC";
        $result = $this->_conn->query('select ' .$column .$from .$where .$order_by)->result_array();
        //echo $this->_conn->last_query();
        return $result;
    }
    /**
     * 인풋항목 공통 처리
     * @param array $input
     * @param $input_product
     * @param $input_lecture
     */
    public function inputCommon($input=[])
    {

        $ValidPeriodStartDate = element('ValidPeriodStartDate',$input).' '.element('ValidPeriodStartDate_H',$input).':'.element('ValidPeriodStartDate_M',$input).':00';
        $ValidPeriodEndDate = element('ValidPeriodEndDate',$input).' '.element('ValidPeriodEndDate_H',$input).':'.element('ValidPeriodEndDate_M',$input).':59';
        //상품관리 테이블 입력
        $input_data = [
            'LecType'=>element('LecType',$input)
            ,'ValidPeriodStartDate'=>$ValidPeriodStartDate
            ,'ValidPeriodEndDate'=>$ValidPeriodEndDate
            ,'ConditionType'=>element('ConditionType',$input,'AND')
            ,'IsDup'=>element('IsDup',$input,'N')
            ,'IsUse'=>element('IsUse',$input,'N')
        ];

        return $input_data;
    }

    /**
     * 선수강좌 사용 변경
     * @param array $params
     * @return array|bool
     */
    public function _modifyLectureByColumn($params=[])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            foreach ($params as $BlIdx => $columns) {
                $this->_conn->set($columns)->set('UpdAdminIdx', $this->session->userdata('admin_idx'))->where('BlIdx', $BlIdx);
                if ($this->_conn->update($this->_table['before']) === false) {
                    throw new \Exception('선수강좌 정보 수정에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }
}