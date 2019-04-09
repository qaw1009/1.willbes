<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/product/on/CommonLectureModel.php';

class PackageAdminModel extends CommonLectureModel
{

    /**
     * 강좌목록추출
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listLecture($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $arr_condition_add = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {

            $column = ' STRAIGHT_JOIN
                    A.ProdCode,A.ProdName,A.IsNew,A.IsBest,A.IsUse,A.RegDatm
                    ,Aa.CcdName as SaleStatusCcd_Name,A.SiteCode,Ab.SiteName
                    ,B.LearnPatternCcd,B.SchoolYear,B.MultipleApply
                    ,Bc.CcdName as LearnPatternCcd_Name
                    ,Bd.CcdName as PackTypeCcd_Name
                    ,Be.CcdName as PackCateCcd_Name
                    ,C.CateCode
                    ,Ca.CateName, Cb.CateName as CateName_Parent
                    ,D.SalePrice, D.SaleRate, D.RealSalePrice
                    ,IFNULL(F.DivisionCount,0) AS DivisionCount
                    #,fn_product_count_cart(A.ProdCode) as CartCnt
                    #,fn_product_count_order(A.ProdCode,\'676002\') as PayIngCnt
                    #,fn_product_count_order(A.ProdCode,\'676001\') as PayEndCnt
                    ,0 as CartCnt       #장바구니테이블 스캔으로 인해 쿼리속도 저하
                    ,0 as PayIngCnt    #주문테이블 스캔으로 인해 쿼리속도 저하
                    ,0 as PayEndCnt    #주문테이블 스캔으로 인해 쿼리속도 저하
                    ,IFNULL(Y.ProdCode_Original,\'\') as ProdCode_Original
                    ,Z.wAdminName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from
                        lms_product A
                            left outer join lms_sys_code Aa on A.SaleStatusCcd = Aa.Ccd and Aa.IsStatus=\'Y\'
                            left outer join lms_site Ab on A.SiteCode = Ab.SiteCode
                        join lms_product_lecture B on A.ProdCode = B.ProdCode
                            left outer join lms_sys_code Bc on B.LearnPatternCcd = Bc.Ccd and Bc.IsStatus=\'Y\'
                            left outer join lms_sys_code Bd on B.PackTypeCcd = Bd.Ccd and Bd.IsStatus=\'Y\'
                            left outer join lms_sys_code Be on B.PackCateCcd = Be.Ccd and Be.IsStatus=\'Y\'
                        join lms_product_r_category C on A.ProdCode = C.ProdCode and C.IsStatus=\'Y\'
                            join lms_sys_category Ca on C.CateCode = Ca.CateCode  and Ca.IsStatus=\'Y\'
                            left outer join lms_sys_category Cb on Ca.ParentCateCode = Cb.CateCode
                        left outer join lms_product_sale D on A.ProdCode = D.ProdCode and D.SaleTypeCcd=\'613001\' and D.IsStatus=\'Y\'
                        left outer join (select ProdCode, count(*) as DivisionCount from lms_product_division where IsStatus=\'Y\' group by ProdCode) as F on A.ProdCode = F.ProdCode
                        left outer join lms_product_copy_log Y on A.ProdCode = Y.ProdCode	
                        left outer join wbs_sys_admin Z on A.RegAdminIdx = Z.wAdminIdx
                     where A.IsStatus=\'Y\'
        ';

        // 사이트 권한 추가
        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        if(empty($arr_condition_add) === false) {
            $where .= ' and '.$arr_condition_add;
        }

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        //echo 'select ' . $column . $from . $where . $order_by_offset_limit;
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }


    /**
     * T-PASS 강좌목록추출 [강사식별자 기준]
     * @param $is_count
     * @param $prof_idx
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listLectureForProfByTpass($is_count, $prof_idx, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {

            $column = ' STRAIGHT_JOIN
                    A.ProdCode,A.ProdName,A.IsNew,A.IsBest,A.IsUse,A.RegDatm
                    ,Aa.CcdName as SaleStatusCcd_Name,A.SiteCode,Ab.SiteName
                    ,B.LearnPatternCcd,B.SchoolYear,B.MultipleApply
                    ,Bc.CcdName as LearnPatternCcd_Name
                    ,Bd.CcdName as PackTypeCcd_Name
                    ,Be.CcdName as PackCateCcd_Name
                    ,C.CateCode
                    ,Ca.CateName, Cb.CateName as CateName_Parent
                    ,D.SalePrice, D.SaleRate, D.RealSalePrice
                    ,fn_product_count_cart(A.ProdCode) as CartCnt
                    ,fn_product_count_order(A.ProdCode,\'676002\') as PayIngCnt
                    ,fn_product_count_order(A.ProdCode,\'676001\') as PayEndCnt
                    ,IFNULL(Y.ProdCode_Original,\'\') as ProdCode_Original
                    ,Z.wAdminName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from
                        lms_product A
                        join (
                        SELECT b.ProdCode
                        FROM lms_product_division AS a
                        join lms_product_lecture AS b ON a.ProdCode = b.ProdCode AND b.LearnPatternCcd = \'615003\'
                        WHERE a.ProfIdx = '.$prof_idx.' AND a.IsStatus = \'Y\' AND b.IsTpass = \'Y\'
                        GROUP BY b.ProdCode
                        ) AS temp_a ON A.ProdCode = temp_a.ProdCode
                        left outer join lms_sys_code Aa on A.SaleStatusCcd = Aa.Ccd and Aa.IsStatus=\'Y\'
                        left outer join lms_site Ab on A.SiteCode = Ab.SiteCode
                        join lms_product_lecture B on A.ProdCode = B.ProdCode
                        left outer join lms_sys_code Bc on B.LearnPatternCcd = Bc.Ccd and Bc.IsStatus=\'Y\'
                        left outer join lms_sys_code Bd on B.PackTypeCcd = Bd.Ccd and Bd.IsStatus=\'Y\'
                        left outer join lms_sys_code Be on B.PackCateCcd = Be.Ccd and Be.IsStatus=\'Y\'
                        join lms_product_r_category C on A.ProdCode = C.ProdCode and C.IsStatus=\'Y\'
                        join lms_sys_category Ca on C.CateCode = Ca.CateCode  and Ca.IsStatus=\'Y\'
                        left outer join lms_sys_category Cb on Ca.ParentCateCode = Cb.CateCode
                        left outer join lms_product_sale D on A.ProdCode = D.ProdCode and D.SaleTypeCcd=\'613001\' and D.IsStatus=\'Y\'
                        left outer join lms_product_copy_log Y on A.ProdCode = Y.ProdCode	
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
     * 상품 및 강좌 등록
     * @param array $input
     * @return array|bool
     */
    public function addProduct($input=[])
    {

        $this->_conn->trans_begin();

        try {

            // 신규 상품코드 조회
            $row = $this->_conn->getFindResult($this->_table['product'], 'ifnull(max(ProdCode) + 1, 200001) as ProdCode');

            $prodcode = $row['ProdCode'];

            // 입력항목 구분
            $this->inputCommon($input, $input_product, $input_lecture);

            /*----------------          상품등록        ---------------*/
            $product_data = array_merge($input_product,[
                'ProdCode'=> $prodcode
                ,'ProdTypeCcd'=>element('ProdTypeCcd',$input)
                ,'SiteCode'=>element('site_code',$input)
                ,'RegAdminIdx'=>$this->session->userdata('admin_idx')
                ,'RegIp'=>$this->input->ip_address()
            ]);

            if($this->_conn->set($product_data)->insert($this->_table['product']) === false) {
                throw new \Exception('상품 등록에 실패했습니다.');
            };
            //echo $this->_conn->last_query().'; ';
            /*----------------          상품등록        ---------------*/

            /*----------------          강좌등록        ---------------*/
            $lecture_data = array_merge($input_lecture,[
                'ProdCode'=> $prodcode
                ,'LearnPatternCcd'=>element('LearnPatternCcd',$input)
            ]);
            if($this->_conn->set($lecture_data)->insert($this->_table['lecture']) === false) {
                throw new \Exception('강좌 등록에 실패했습니다.');
            }
            //echo $this->_conn->last_query().'<BR><BR>';
            /*----------------          강좌등록        ---------------*/

            /*----------------          카테고리등록        ---------------*/
            if($this->_setCategory($input,$prodcode) !== true) {
                throw new \Exception('카테고리 등록에 실패했습니다.');
            }
            /*----------------          카테고리등록        ---------------*/

            /*----------------          가격등록        ---------------*/
            if($this->_setPrice($input,$prodcode) !== true) {
                throw new \Exception('가격 등록에 실패했습니다.');
            }
            /*----------------          가격등록        ---------------*/

            /*----------------          강사료정산        ---------------*/
            if($this->_setDivision($input,$prodcode,'packageadmin') !== true) {
                throw new \Exception('강사료정산 등록에 실패했습니다.');
            }
            /*----------------          강사료정산        ---------------*/

            /*----------------          메모등록        ---------------*/
            if($this->_setMemo($input,$prodcode) !== true) {
                throw new \Exception('메모 등록에 실패했습니다.');
            }
            /*----------------          메모등록        ---------------*/

            /*----------------          컨텐트등록        ---------------*/
            if($this->_setContent($input,$prodcode) !== true) {
                throw new \Exception('컨텐트 등록에 실패했습니다.');
            }
            /*----------------          컨텐트등록        ---------------*/

            /*----------------          SMS등록        ---------------*/
            if($this->_setSms($input,$prodcode) !== true) {
                throw new \Exception('SMS 등록에 실패했습니다.');
            }
            /*----------------          SMS등록        ---------------*/

            /*----------------          자동지급단강좌 등록        ---------------*/
            if($this->_setSubProduct($input,$prodcode,'ProdCode_lecture','636001','자동지급단강좌') !== true) {
                throw new \Exception('자동지급단강좌 등록에 실패했습니다.');
            }
            /*----------------          자동지급단강좌등록        ---------------*/

            /*----------------          자동지급사은품 등록        ---------------*/
            if($this->_setSubProduct($input,$prodcode,'ProdCode_freebie','636004','자동지급사은품') !== true) {
                throw new \Exception('자동지급사은품 등록에 실패했습니다.');
            }
            /*----------------          자동지급사은품 등록        ---------------*/

            /*----------------          자동지급쿠폰 등록        ---------------*/
            if($this->_setAutoCoupon($input,$prodcode) !== true) {
                throw new \Exception('자동지급쿠폰 등록에 실패했습니다.');
            }
            /*----------------          자동지급쿠폰 등록        ---------------*/

            /*----------------          연결강좌(단과,패키지) 등록        ---------------*/
            if($this->_setSubLecture($input,$prodcode) !== true) {
                throw new \Exception('연결강좌 등록에 실패했습니다.');
            }
            /*----------------          연결강좌 등록        ---------------*/

            /*----------------          Json 데이터 등록        ---------------*/
            if($this->_setProdJsonData($prodcode) !== true) {
                throw new \Exception('JSON 데이터 등록에 실패했습니다.');
            }
            /*----------------          Json 데이터 등록        ---------------*/

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
    public function modifyProduct($input=[])
    {

        $this->_conn->trans_begin();

        try{

            $prodcode = element('ProdCode',$input);
            // 입력항목 구분
            $this->inputCommon($input, $input_product, $input_lecture);

            /*----------------          상품수정        ---------------*/
            $product_data = array_merge($input_product,[
                'UpdAdminIdx'=>$this->session->userdata('admin_idx')
            ]);
            if ($this->_conn->set($product_data)->set('UpdDatm', 'NOW()', false)->where('ProdCode', $prodcode)->update($this->_table['product']) === false) {
                throw new \Exception('상품 정보 수정에 실패했습니다.');
            }
            //echo $this->_conn->last_query();
            /*----------------          상품수정        ---------------*/

            /*----------------          강좌수정        ---------------*/
            $lecture_data = array_merge($input_lecture,[
                //'LearnPatternCcd'=>element('LearnPatternCcd',$input)
            ]);
            if ($this->_conn->set($lecture_data)->where('ProdCode', $prodcode)->update($this->_table['lecture']) === false) {
                throw new \Exception('강좌 정보 수정에 실패했습니다.');
            }
            //echo $this->_conn->last_query();
            /*----------------          강좌수정        ---------------*/

            /*----------------          카테고리등록        ---------------*/
            if($this->_setCategory($input,$prodcode) !== true) {
                throw new \Exception('카테고리 등록에 실패했습니다.');
            }
            /*----------------          카테고리등록        ---------------*/

            /*----------------          가격등록        ---------------*/
            if($this->_setPrice($input,$prodcode) !== true) {
                throw new \Exception('가격 등록에 실패했습니다.');
            }
            /*----------------          가격등록        ---------------*/

            /*----------------          강사료정산        ---------------*/
            if($this->_setDivision($input,$prodcode,'packageadmin') !== true) {
                throw new \Exception('강사료정산 등록에 실패했습니다.');
            }
            /*----------------          강사료정산        ---------------*/

            /*----------------          메모등록        ---------------*/
            if($this->_setMemo($input,$prodcode) !== true) {
                throw new \Exception('메모 등록에 실패했습니다.');
            }
            /*----------------          메모등록        ---------------*/

            /*----------------          컨텐트등록        ---------------*/
            if($this->_setContent($input,$prodcode) !== true) {
                throw new \Exception('컨텐트 등록에 실패했습니다.');
            }
            /*----------------          컨텐트등록        ---------------*/

            /*----------------          SMS등록        ---------------*/
            if($this->_setSms($input,$prodcode) !== true) {
                throw new \Exception('SMS 등록에 실패했습니다.');
            }
            /*----------------          SMS등록        ---------------*/

            /*----------------          자동지급단강좌 등록        ---------------*/
            if($this->_setSubProduct($input,$prodcode,'ProdCode_lecture','636001','자동지급단강좌') !== true) {
                throw new \Exception('자동지급단강좌 등록에 실패했습니다.');
            }
            /*----------------          자동지급단강좌등록        ---------------*/

            /*----------------          자동지급사은품 등록        ---------------*/
            if($this->_setSubProduct($input,$prodcode,'ProdCode_freebie','636004','자동지급사은품') !== true) {
                throw new \Exception('자동지급사은품 등록에 실패했습니다.');
            }
            /*----------------          자동지급사은품 등록        ---------------*/

            /*----------------          자동지급쿠폰 등록        ---------------*/
            if($this->_setAutoCoupon($input,$prodcode) !== true) {
                throw new \Exception('자동지급쿠폰 등록에 실패했습니다.');
            }
            /*----------------          자동지급쿠폰 등록        ---------------*/

            /*----------------          연결강좌(단과,패키지) 등록        ---------------*/
            if($this->_setSubLecture($input,$prodcode) !== true) {
                throw new \Exception('연결강좌 등록에 실패했습니다.');
            }
            /*----------------          연결강좌 등록        ---------------*/

            /*----------------          Json 데이터 등록        ---------------*/
            if($this->_setProdJsonData($prodcode) !== true) {
                throw new \Exception('JSON 데이터 등록에 실패했습니다.');
            }
            /*----------------          Json 데이터 등록        ---------------*/

            //$this->_conn->trans_rollback();
            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 인풋항목 공통 처리
     * @param array $input
     * @param $input_product
     * @param $input_lecture
     */
    public function inputCommon($input=[], &$input_product, &$input_lecture)
    {
        $SaleStartDat = element('SaleStartDat',$input);
        $SaleStartTime = element('SaleStartTime',$input);
        if($SaleStartDat === '') {
            $SaleStartDat = date("Y-m-d");
        }
        if($SaleStartTime === '') {
            $SaleStartTime = date('H');
        }
        $SaleStartDatm = $SaleStartDat.' '.$SaleStartTime.':00:00';

        $SaleEndDat = element('SaleEndDat',$input);
        $SaleEndTime = element('SaleEndTime',$input);
        if($SaleEndDat === '') {
            $SaleEndDat = "2030-12-31";
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
            ,'SaleStatusCcd'=>element('SaleStatusCcd',$input)
            ,'IsSaleEnd'=>element('IsSaleEnd',$input,'N')
            ,'IsCoupon'=>element('IsCoupon',$input,'N')
            ,'IsPoint'=>element('IsPoint',$input,'N')
            ,'PointApplyCcd'=>element('PointApplyCcd',$input)
            ,'PointSavePrice'=>get_var(element('PointSavePrice',$input),0)
            ,'PointSaveType'=>element('PointSaveType',$input)
            ,'IsBest'=>element('IsBest',$input, 'N')
            ,'IsNew'=>element('IsNew',$input, 'N')
            ,'IsRefund'=>element('IsRefund',$input,'N')
            ,'IsFreebiesTrans'=>element('IsFreebiesTrans',$input)
            ,'IsSms'=>element('IsSms',$input,'N')
            ,'IsDeliveryInfo'=>element('IsDeliveryInfo',$input,'N')
            ,'IsUse'=>element('IsUse',$input)
            ,'Keyword'=>element('Keyword',$input)
        ];

        $input_lecture = [
            'PackTypeCcd'=>element('PackTypeCcd',$input)
            ,'PackCateCcd'=>element('PackCateCcd',$input)
            ,'PackCateEtcMemo'=>element('PackCateEtcMemo',$input)
            ,'PackSelCount'=>element('PackSelCount',$input)
            ,'SchoolYear'=>element('SchoolYear',$input)
            ,'CourseIdx'=>element('CourseIdx',$input)
            ,'StudyPeriod'=>element('StudyPeriod',$input)
            ,'StudyStartDate'=>element('StudyStartDate',$input)
            ,'PcProvisionCcd'=>element('PcProvisionCcd',$input)                   //PC제공구분
            ,'MobileProvisionCcd'=>element('MobileProvisionCcd',$input)         //모바일제공구분
            ,'PlayerTypeCcds'=>implode(',', element('PlayerTypeCcds', $input))                //플레이어선택
            ,'MultipleApply'=>element('MultipleApply',$input)                        //수강배수정보 - 배수제한값
            ,'MultipleTypeCcd'=>element('MultipleTypeCcd',$input)               //수강배수정보 - 적용
            ,'AllLecTime'=>element('AllLecTime',$input)                               //전체강의시간
            ,'LecCalcType'=>element('LecCalcType',$input)                         //강사료정산 타입
            ,'IsLecStart'=>element('IsLecStart',$input,'N')
            ,'IsPause'=>element('IsPause',$input,'N')
            ,'PauseNum'=>element('PauseNum',$input)
            ,'IsExten'=>element('IsExten',$input,'N')
            ,'ExtenNum'=>element('ExtenNum',$input)
            ,'IsRetake'=>element('IsRetake',$input,'N')
            ,'RetakeSaleRate'=>element('RetakeSaleRate',$input)
            ,'RetakePeriod'=>get_var(element('RetakePeriod',$input),0)
            ,'IsEdit'=>element('IsEdit',$input,'N')
            ,'IsTpass'=>element('IsTpass',$input,'N')
            ,'ExternalCorpCcd'=>element('ExternalCorpCcd',$input)
            ,'ExternalLinkCode'=>element('ExternalLinkCode',$input)
        ];

    }
}