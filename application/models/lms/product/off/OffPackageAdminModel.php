<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/product/on/CommonLectureModel.php';

class OffPackageAdminModel extends CommonLectureModel
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
                    ,DATE_FORMAT(SaleStartDatm,\'%Y-%m-%d\') as SaleStartDatm
                    ,DATE_FORMAT(SaleEndDatm,\'%Y-%m-%d\') as SaleEndDatm
                    ,Aa.CcdName as SaleStatusCcd_Name,A.SiteCode,Ab.SiteName
                    ,B.CourseIdx,B.SubjectIdx,B.LearnPatternCcd,B.SchoolYear,B.FixNumber,B.StudyStartDate,B.StudyEndDate,B.IsLecOpen
                    ,B.SchoolStartYear,B.SchoolStartMonth,B.AcceptStatusCcd
                    ,Ba.CourseName,Bb.SubjectName,Bc.CcdName as LearnPatternCcd_Name
                    ,Bd.CcdName as StudyPatternCcd_Name
                    ,Be.CcdName as StudyApplyCcd_Name
                    ,Bg.CcdName as CampusCcd_Name
                    ,Bh.CcdName as AcceptStatusCcd_Name
                    ,Bi.CcdName as PackTypeCcd_Name
                    ,C.CateCode
                    ,Ca.CateName, Cb.CateName as CateName_Parent
                    ,D.SalePrice, D.SaleRate, D.RealSalePrice
                    ,IFNULL(F.DivisionCount,0) AS DivisionCount
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
                            left outer join lms_product_course Ba on B.CourseIdx = Ba.CourseIdx and Ba.IsStatus=\'Y\'
                            left outer join lms_product_subject Bb on B.SubjectIdx = Bb.SubjectIdx and Bb.IsStatus=\'Y\'
                            left outer join lms_sys_code Bc on B.LearnPatternCcd = Bc.Ccd and Bc.IsStatus=\'Y\'
                            left outer join lms_sys_code Bd on B.StudyPatternCcd = Bd.Ccd and Bd.IsStatus=\'Y\'
                            left outer join lms_sys_code Be on B.StudyApplyCcd = Be.Ccd and Be.IsStatus=\'Y\'
                            left outer join lms_sys_code Bg on B.CampusCcd = Bg.Ccd
                            left outer join lms_sys_code Bh on B.AcceptStatusCcd = Bh.Ccd
                            left outer join lms_sys_code Bi on B.PackTypeCcd = Bi.Ccd
                        join lms_product_r_category C on A.ProdCode = C.ProdCode and C.IsStatus=\'Y\'
                            join lms_sys_category Ca on C.CateCode = Ca.CateCode  and Ca.IsStatus=\'Y\'
                            left outer join lms_sys_category Cb on Ca.ParentCateCode = Cb.CateCode
                        left outer join lms_product_sale D on A.ProdCode = D.ProdCode and D.SaleTypeCcd=\'613001\' and D.IsStatus=\'Y\'	#Pc+모바일 판매가만 추출
                        left outer join (select ProdCode, count(*) as DivisionCount from lms_product_division where IsStatus=\'Y\' group by ProdCode) as F on A.ProdCode = F.ProdCode 
                        left outer join lms_product_copy_log Y on A.ProdCode = Y.ProdCode
                        left outer join wbs_sys_admin Z on A.RegAdminIdx = Z.wAdminIdx
                        join lms_sys_admin_r_site_campus X on (A.SiteCode = X.SiteCode and B.CampusCcd = X.CampusCcd) and X.IsStatus=\'Y\' and X.wAdminIdx='.$this->session->userdata('admin_idx').'
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
            if($this->_setDivision($input,$prodcode,'offpackageadmin') !== true) {
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
            if($this->_setDivision($input,$prodcode,'offpackageadmin') !== true) {
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
            ,'SaleStatusCcd'=>element('SaleStatusCcd',$input,'618001')
            ,'IsSaleEnd'=>element('IsSaleEnd',$input,'N')
            ,'IsCoupon'=>element('IsCoupon',$input,'N')
            ,'IsPoint'=>element('IsPoint',$input,'N')
            ,'PointApplyCcd'=>element('PointApplyCcd',$input,'635002')
            ,'PointSavePrice'=>get_var(element('PointSavePrice',$input),0)
            ,'PointSaveType'=>element('PointSaveType',$input,'R')
            ,'IsBest'=>element('IsBest',$input, 'N')
            ,'IsNew'=>element('IsNew',$input, 'N')
            ,'IsCart'=>element('IsCart',$input,'N')
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
            ,'LecSaleType'=>element('LecSaleType',$input,'N')
            ,'CourseIdx'=>element('CourseIdx',$input)
            ,'CampusCcd'=>element('CampusCcd',$input)
            ,'SchoolStartYear'=>element('SchoolStartYear',$input)
            ,'SchoolStartMonth'=>element('SchoolStartMonth',$input)
            ,'StudyPatternCcd'=>element('StudyPatternCcd',$input)
            ,'StudyApplyCcd'=>element('StudyApplyCcd',$input)
            ,'FixNumber'=>element('FixNumber',$input)
            ,'StudyStartDate'=>element('StudyStartDate',$input,null)
            ,'StudyEndDate'=>element('StudyEndDate',$input,null)

            ,'IsLecStart'=>element('IsLecStart',$input,'N')
            ,'IsPause'=>element('IsPause',$input,'N')
            ,'PauseNum'=>element('PauseNum',$input,0)
            ,'IsExten'=>element('IsExten',$input,'N')
            ,'ExtenNum'=>element('ExtenNum',$input,0)
            ,'IsRetake'=>element('IsRetake',$input,'N')
            ,'RetakeSaleRate'=>element('RetakeSaleRate',$input,0)
            ,'RetakePeriod'=>get_var(element('RetakePeriod',$input),0)

            ,'LecPlace'=>element('LecPlace',$input)
            ,'LecCalcType'=>element('LecCalcType',$input)
            ,'IsLecOpen'=>element('IsLecOpen',$input,'N')
            ,'AcceptStatusCcd'=>element('AcceptStatusCcd',$input,null)
        ];
    }


}